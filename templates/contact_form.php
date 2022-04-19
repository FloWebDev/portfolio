
<div class="col-12" id="contact_form_container">
    <form name="form" method="post" novalidate="novalidate" class="col-12" action="/contact">

    <div class="form-group">
        <label for="form_name" class="required">Votre nom (*)</label>
        <input type="text" id="form_name" name="form[name]" required="required" placeholder="Serge Karamazov" class="form-control">
    </div>

    <div class="form-group">
        <label for="form_email" class="required">Votre adresse email (*)</label>
        <input type="email" id="form_email" name="form[email]" required="required" placeholder="exemple@gmail.com" class="form-control">
    </div>

    <div class="form-group">
        <label for="form_telephone">Votre numéro de téléphone (facultatif)</label>
        <input type="text" id="form_telephone" name="form[telephone]" placeholder="06-01-02-03-04" class="autoCompletion form-control">
    </div>

    <div class="form-group">
        <label for="form_object" class="required">Objet de votre message (*)</label>
        <input type="text" id="form_object" name="form[object]" required="required" placeholder="Prise de contact" class="form-control">
    </div>

    <div class="form-group">
        <label for="form_body" class="required">Votre message (*)</label>
        <textarea id="form_body" name="form[body]" required="required" rows="7" placeholder="Bonjour..." class="form-control"></textarea>
    </div>

    <p><img src="data:image/jpeg;base64,<?php echo $captcha; ?>" alt=""></p>

    <div class="form-group"><label for="form_captcha" class="required">Insérez le nombre affiché dans l'image (*)</label><input type="number" id="form_captcha" name="form[captcha]" required="required" placeholder="????" class="form-control"></div>

    <input type="submit" class="btn btn-primary" value="Envoyer">

    </form>
</div>

