<?php include('header.php') ?>


<form method="post" action="traitement.php">

	<div class="indication">
		<p>Veuillez entrer vos informations pour vous enregistrer</p>
	</div>

	<div class="infos">
		<label for="nom">Nom : </label>
		<input type="text" id="nom" name="nom" maxlength="30" required pattern="^[A-Za-z '-]+$" />
	</div>

	<div class="infos">
		<label for="prenom">Prenom : </label>
		<input type="text" id="prenom" name="prenom" maxlength="30" required pattern="^[A-Za-z '-]+$" />
	</div>

	<div class="infos">
		<label for="dateDeNaissance">Date de naissnce : </label>
		<input type="date" id="dateDeNaissance" name="dateDeNaissance" required />
	</div>
		
	<div class="infos">
		<label for="sexe">Sexe : </label>
		<input type="radio" class="sexe" name="sexe" value="homme" required />Homme     
		<input type="radio" class="sexe" name="sexe" value="femme" required />Femme
	</div>

	<div class="infos">
		<label for="email">Email : </label>
		<input type="email" id="email" name="mail" required pattern="^[A-Za-z0-9._-]+@{1}[A-Za-z][A-Za-z]+\.{1}[A-Za-z]{2,}$" />
	</div>

	<div class="infos">
		<label for="telephone">Numero de telephone : </label>
		<input type="tel" id="telephone" name="telephone" pattern="^6{1}[0-9]+" maxlength="9" />
	</div>

	<div class="infos">
		<label for="filiere">Filiere : </label>
		<select id="filiere" name="filiere" required>
			<option value="informatique">Informatique</option>
			<option value="mathematique">Mathematique</option>
			<option value="physique">Physique</option>
			<option value="chimie">Chimie</option>
			<option value="biologie">Biologie</option>
		</select>
	</div>

	<div class="infos">
		<label for="mdp">Mot de Passe : </label>
		<input type="password" id="mdp" name="mdp" minlength="8" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" />
	</div>

	<div class="infos">
		<label>Confirmer mot de Passe : </label>
		<input type="password" id="cmdp" name="cmdp" minlength="8" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" />
	</div>

	<div class="validation" id="submit_i">
		<input type="submit" value="Enregistrer" />
	</div>			
		

</form>

	

<?php include('footer.php') ?>