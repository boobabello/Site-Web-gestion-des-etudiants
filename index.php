<?php include('header.php') ?>

	<div class="entete">
		<h1>Bienvenue sur le site de l'universite!!!</h1>
	</div>
	
	<form action="verification.php" method="POST">

		<div class="indication">
			<p>Veuillez entrer vos informations pour vous connecter</p>
		</div>
        
        <div class="connexion">
        	<label for="mail">Adresse e-mail : </label>
        	<input type="email" id="mail" name="mail" required pattern="^[A-Za-z0-9._-]+@{1}[A-Za-z][A-Za-z]+\.{1}[A-Za-z]{2,}$" />
        </div>
        	
        <div class="connexion">
        	<label for="mdp">Mot de passe : </label>
        	<input type="password" id="mdp" name="mdp" minlength="8" required  minlength="8" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" />
        </div>

        <div class="validation" id="submit_c">
        	<input type="submit" value='LOGIN' />
        </div>

		<div class="validation" id="inscription">
        	<a class="stylebouton" href="inscription.php">Inscription</a>
        </div>                


        <?php
            if(isset($_GET['erreur'])){
                $err = $_GET['erreur'];
                if($err==1 || $err==2)
                    echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
            }
        ?>
    </form>
	

<?php include('footer.php') ?>