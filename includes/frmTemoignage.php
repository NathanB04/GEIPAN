<form action="index.php?page=temoignage" method="post" enctype="multipart/form-data">
    <ul>
        <li><label for="email">e-mail :</label><input type="text" id="email" name="email"  value="<?php echo $email;?>" /></li>
        <li><label for="dateTime">Date et heure de l'évènement :</label><input type="datetime-local" id="dateTime" name="dateTime" value="<?php echo $dateTime;?>"/></li>
        <li><label for="duration">Durée de l'évènement (en minutes):</label><input type="time" id="duration" name="duration" value="<?php echo $duration;?>"/></li>
        <!-- <li><label for="location">Lieu de l'évènement :</label><select name="location"  id="location"></li> -->
        <li><label for="cardinalPoint">Direction de l'observation :</label><select name="cardinalPoint" id="cardinalPoint" value="<?php echo $cardinalPoint;?>">
            <option value="north">Nord</option>
            <option value="south">Sud</option>
            <option value="east">Est</option>
            <option value="west">Ouest</option></select></li>

        <li><label for="weather">Conditions météorologiques :</label><select name="weather" id="weather" value="<?php echo $weather;?>">
            <option value="soleil">Ensoleillé</option>
            <option value="nuage">Nuageux</option>
            <option value="pluie">Pluvieux</option>
            <option value="vent">Venteux</option>
            <option value="neige">Neigeux</option></select></li>

        <li><label for="description">Descriptif de l'observation :</label><textarea id="description" name="description"  value="<?php echo $description;?>"></textarea></li>
        <li><label for="photo">Photo :</label><input type="file" id="photo" name="photo" /></li>
        <li><input type="reset" value="Effacer" /><input type="submit" value="Publier" name="temoignage" /></li>
    </ul>
