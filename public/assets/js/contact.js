const contact = {
    formContainer: null,
    containerAlert: null,
    init: function () {
        contact.formContainer = document.querySelector('#contact_form_container');
        // Par défaut, on cache la DIV du message flash
        contact.containerAlert = document.querySelector('#contact_flash_message div');
        contact.containerAlert.style.opacity = 0;
        // Affichage du formulaire de contact
        contact.displayForm();
        // Utilisation de MutationObserver
        contact.observe();
    },
    displayForm: function () {
        // On affiche le formulaire de contact
        const xhr = new XMLHttpRequest();
        xhr.open('GET', '/contact', true);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.responseType = 'json';
        xhr.onreadystatechange = () => {
            if (xhr.readyState === 4) {
                if (xhr.status >= 200 && xhr.status < 300) {
                    if (xhr.response.success && xhr.response.form) {
                        contact.formContainer.innerHTML = xhr.response.form;
                    }
                } else {
                    console.error('Erreur handleSubmitForm');
                }
            }
        };
        xhr.send();
    },
    handleSubmit: function (e) {
        // Stoppe soumission du formulaire
        e.preventDefault();
        // Récupération des données du formulaire
        const data = new FormData(e.target);
        // Création de l'appel xhr
        const xhr = new XMLHttpRequest();
        xhr.open('POST', e.target.getAttribute('action'), true);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.responseType = 'json';
        xhr.onreadystatechange = () => {
            if (xhr.readyState === 4) {
                if (xhr.status >= 200 && xhr.status < 300 && xhr.response) {
                    const classToAdd = xhr.response.success ? 'alert-success' : 'alert-danger';
                    contact.containerAlert.textContent = xhr.response.message;
                    contact.containerAlert.classList.remove('alert-success', 'alert-danger');
                    contact.containerAlert.classList.add(classToAdd);
                    contact.fadeout(contact.containerAlert);
                    if (xhr.response.success) {
                        contact.formContainer.innerHTML = xhr.response.form;
                    }
                } else {
                    console.error('Erreur handleSubmitForm');
                }
            }
        };
        xhr.send(data);
    },
    fadeout: elt => {
        elt.style.opacity = 1;
        const intervalId = setInterval(() => {
            if (elt.style.opacity > 0) {
                elt.style.opacity -= 0.1;
            } else {
                clearInterval(intervalId);
            }
        }, 350);
    },
    observe: function () {
        /**
         * MutationObserver
         * @link https://developer.mozilla.org/fr/docs/Web/API/MutationObserver
         */
        // Selectionne le noeud dont les mutations seront observées
        var targetNode = document.getElementById('contact_form_container');

        // Options de l'observateur (quelles sont les mutations à observer)
        var config = {
            attributes: true,
            childList: true,
            subtree: true
        };

        // Crée une instance de l'observateur lié à la fonction de callback
        var observer = new MutationObserver((mutationsList) => {
            // Fonction callback à exécuter quand une mutation est observée
            for (var mutation of mutationsList) {
                if (mutation.type == 'childList') {
                    if (contact.formContainer) {
                        contact.formContainer.addEventListener('submit', contact.handleSubmit);
                    }
                }
            }
        });

        // Commence à observer le noeud cible pour les mutations précédemment configurées
        observer.observe(targetNode, config);
    }
};

document.addEventListener('DOMContentLoaded', contact.init);