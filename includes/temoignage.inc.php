<h1>Observations</h1>
<?php

if (isset($_POST['temoignage'])) {
    $email = trim(mb_strtolower($_POST['email'])) ?? '';
    $dateTime = trim(mb_strtolower($_POST['obsDateTime'])) ?? '';
    $duration = trim(mb_strtolower($_POST['obsDuration'])) ?? '';
    $cardinalPoint = trim(mb_strtolower($_POST['obsCardinalPoint'])) ?? '';
    $weather = trim(mb_strtolower($_POST['obsWeather'])) ?? '';
    $description = trim(mb_strtolower($_POST['obsDescription'])) ?? '';

    $erreur = array();

    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        array_push($erreur, "Veuillez saisir un e-mail valide");

 

    if (count($erreur) === 0) {
        $serverName = "localhost";
        $userName = "root";
        $database = "geipan";
        $userPassword = "root";

        try {
            $conn = new PDO("mysql:host=$serverName;dbname=$database", $userName, $userPassword);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $requete = $conn->prepare("SELECT * FROM observations");
            $requete->execute();
            $resultat = $requete->fetchAll(PDO::FETCH_OBJ);
           
            if(count($resultat) !== 0) {
                echo "<p>Votre adresse est déjà enregistrée dans la base de données</p>";
            }

            else {
                $query = $conn->prepare("
                INSERT INTO observations(obsDateTime, obsDuration, obsCardinalPoint, obsWeather, obsDescription)
                VALUES (:obsDateTime, :obsDuration, :obsCardinalPoint, :obsWeather, :obsDescription)
                ");
                $query->bindParam(':email', $email, PDO::PARAM_STR_CHAR);
                $query->bindParam(':obsDateTime', $dateTime);
                $query->bindParam(':obsDuration', $duration);
                $query->bindParam(':obsCardinalPoint', $cardinalPoint, PDO::PARAM_STR_CHAR);
                $query->bindParam(':obsWeather', $weather);
                $query->bindParam(':obsDescription', $description);
                $query->execute();

                move_uploaded_file($fileTmpName, $path . $fileName);
                
                echo "<p>Insertions effectuées</p>";
            }
        } catch (PDOException $e) {
            die("Erreur :  " . $e->getMessage());
        }

        $conn = null;
    } else {
        $messageErreur = "<ul>";
        $i = 0;
        do {
            $messageErreur .= "<li>" . $erreur[$i] . "</li>";
            $i++;
        } while ($i < count($erreur));

        $messageErreur .= "</ul>";

        echo $messageErreur;
    }
} else {
    echo "<h2>Merci de renseigner le formulaire&nbsp;:</h2>";
    $name = $firstname = $email = '';
    include 'frmTemoignage.php';
}
    
