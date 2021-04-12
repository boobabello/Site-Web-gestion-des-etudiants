<?php include('header.php') ?>

<?php

    $servername = 'localhost';
    $dbname = 'bdtest';
    $username = 'root';
    $password = '';

    $mail = valid_donnees($_POST["mail"]);
    $mdp = valid_donnees($_POST["mdp"]);

    function valid_donnees($donnees){
        $donnees = trim($donnees);
        $donnees = stripslashes($donnees);
        $donnees = htmlspecialchars($donnees);
        return $donnees;
    }


    if(!empty('$mail')
		&& !empty('$mdp')
		&& filter_var($mail, FILTER_VALIDATE_EMAIL)
		&& preg_match("/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/", $mdp)){


    		try{
                $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

                //On définit le mode d'erreur de PDO sur Exception
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sth = $dbco->prepare("SELECT * FROM Etudiants WHERE email=:mail AND mdp=:mdp");
                $sth->bindParam(':mail',$mail);
                $sth->bindParam(':mdp',$mdp);
                $sth->execute();

                $resultat = $sth->fetch(PDO::FETCH_ASSOC);

                if($mail==$resultat['email']
                    && $mdp==$resultat['mdp']){

                        echo "<pre>";
                        print_r($resultat);
                        echo "</pre>";
                    
                }

                else{
                    echo "<h3>Adresse email ou mot de passe invalide.<br/>Verifiez vos informations et reconnectez-vous!!!</3>";
                    echo "<pre>";
                    print_r($resultat);
                    echo "</pre>";
                }

                
                $sth->closeCursor();   
            }

            /*On capture les exceptions si une exception est lancée et on affiche
            *les informations relatives à celle-ci*/
            catch(PDOException $e){
                $dbco->rollBack();
                echo "Erreur : " . $e->getMessage();
            } 
    }        

    else{
    	header('location:index.php');
    }


?>

<?php include('footer.php') ?>