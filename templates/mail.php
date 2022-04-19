<p>Nouveau message envoyé depuis la messagerie du site :</p>
<p>
    Nom : <?php echo htmlspecialchars($name); ?><br>
    Répondre à : <b><?php echo htmlspecialchars($addressFrom); ?></b><br>
    Téléphone : <?php 
        $telephone = !empty($telephone) ? htmlspecialchars($telephone) : 'N.C.';
        echo $telephone;
    ?><br>
    Message :
</p>
<p><i><?php echo nl2br(htmlspecialchars($message)); ?></i></p>