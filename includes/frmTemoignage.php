<form action="index.php?page=temoignage" method="post" enctype="multipart/form-data">
    <ul>
        <li><label for="email">e-mail :</label><input type="text" id="email" name="email"  value="<?php echo $email;?>" /></li>
        <li><label for="observation">Descriptif de l'bservation :</label><textarea id="observation" name="observation"  value="<?php echo $observation;?>"></textarea></li>
        <li><input type="reset" value="Effacer" /><input type="submit" value="Publier" name="temoignage" /></li>
    </ul>
</form>