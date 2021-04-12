<?php include('header.php') ?>

	

<?php

    $servername = 'localhost';
    $dbname = 'bdtest';
    $username = 'root';
    $password = '';

	$nom = valid_donnees($_POST["nom"]);
	$prenom = valid_donnees($_POST["prenom"]);
	$dateDeNaissance = valid_donnees($_POST["dateDeNaissance"]);
	$sexe = valid_donnees($_POST["sexe"]);
	$mail = valid_donnees($_POST["mail"]);
	$telephone = valid_donnees($_POST["telephone"]);
	$filiere = valid_donnees($_POST["filiere"]);
    $mdp = valid_donnees($_POST["mdp"]);
    $cmdp = valid_donnees($_POST["cmdp"]);


    function valid_donnees($donnees){
        $donnees = trim($donnees);
        $donnees = stripslashes($donnees);
        $donnees = htmlspecialchars($donnees);
        return $donnees;
    }
    
    
        if(!empty($nom)
            && !empty($prenom)
            && !empty($mail)
            && !empty($mdp)
            && preg_match("/^[A-Za-z '-]+$/", $nom)
            && preg_match("/^[A-Za-z '-]+$/", $prenom)
            && filter_var($mail, FILTER_VALIDATE_EMAIL)
            && preg_match("/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/", $mdp)
            && ($mdp == $cmdp)){

                try{
                    $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

                    //On définit le mode d'erreur de PDO sur Exception
                    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $dbco->beginTransaction();

                    $sth = $dbco->prepare("INSERT INTO Etudiants(nom,prenom,dateDeNaissance,sexe,email,telephone,filiere,mdp)
                            VALUES(:nom, :prenom, :dateDeNaissance, :sexe, :mail, :telephone, :filiere, :mdp)");

                    $sth->bindParam(':nom',$nom);
                    $sth->bindParam(':prenom',$prenom);
                    $sth->bindParam(':dateDeNaissance',$dateDeNaissance);
                    $sth->bindParam(':sexe',$sexe);
                    $sth->bindParam(':mail',$mail);
                    $sth->bindParam(':telephone',$telephone, PDO::PARAM_INT);
                    $sth->bindParam(':filiere',$filiere);
                    $sth->bindParam(':mdp',$mdp);
                    $sth->execute();

                    $dbco->commit();
                    header("location:merci.php");

                }

                /*On capture les exceptions si une exception est lancée et on affiche
                *les informations relatives à celle-ci*/
                catch(PDOException $e){
                    $dbco->rollBack();
                    echo "Erreur : " . $e->getMessage();
                }
   
        }
    
        else{
            header('location:inscription.php');
        }

        $conn = null;
?>

<?php include('footer.php') ?>