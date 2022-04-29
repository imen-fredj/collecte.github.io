                                                
<?php 
	if(isset($_POST['submit'])){
		$newInfermier = new DonneurController();
		$newInfermier->addInfo();
    
	}
?>
<div class="container">
	<div class="row my-4">
		<div class="col-md-8 mx-auto">
			<div class="card">
				<div class="card-header">Ajouter un Donneur</div>
				<div class="card-body bg-light">
					<a href="<?php echo BASE_URL;?>" class="btn btn-sm btn-secondary mr-2 mb-2">
						<i class="fas fa-home"></i>
					</a>
					<form method="post">
						<div class="form-group">
							<label for="nom">Nom*</label>
							<input type="text" name="nom" class="form-control" placeholder="Nom" required>
						</div>
						<div class="form-group">
							<label for="prenom">Prénom*</label>
							<input type="text" name="prenom" class="form-control" placeholder="Prénom" required>
						</div>
						<div class="form-group">
							<label for="mat">adresse*</label>
							<input type="text" name="adresse" class="form-control" placeholder="adresse" required>
						</div>
						<div class="form-group">
							<label for="depart">numero*</label>
							<input type="text" name="numero" class="form-control" placeholder="numero" required>
						</div>
						<div class="form-group">
							<label for="poste">email*</label>
							<input type="email" name="email" class="form-control" placeholder="email" required>
						</div>
                        <div class="form-group">
							<label for="poste">age*</label>
							<input type="text" name="age" class="form-control" placeholder="age" required>
						</div>
                        <div class="form-group">
							<label for="poste">sexe*</label>
							<input type="text" name="sexe" class="form-control" placeholder="sexe" required>
						</div>
                        <div class="form-group">
							<label for="poste">poids*</label>
							<input type="text" name="poids" class="form-control" placeholder="poids" required>
						</div>
                        <div class="form-group">
							<label for="poste">taille*</label>
							<input type="text" name="taille" class="form-control" placeholder="taille" required>
						</div>
                        <div class="form-group">
							<label for="poste">type de sang*</label>
							<input type="text" name="type_sang" class="form-control" placeholder="type_sang" required>
						</div>
                        <div class="form-group">
							<label for="poste">date de dernier don*</label>
							<input type="Date" name="dernier_don" class="form-control" placeholder="dernier_don" required>
						</div>
                        <!--
						<div class="form-group">
							<select class="form-control" name="statut">
								<option value="1">Apte</option>
								<option value="0">Non apte</option>
							</select>
						</div>-->
						<div class="form-group">
							<button type="submit" class="btn btn-primary" name="submit">Valider</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>