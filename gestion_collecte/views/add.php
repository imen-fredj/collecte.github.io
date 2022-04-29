                                                    
<?php 
	if(isset($_POST['submit'])){
		$newMedecin = new MedecinController();
		$newMedecin->addInfo();
	}
?>
<div class="container">
	<div class="row my-4">
		<div class="col-md-8 mx-auto">
			<div class="card">
				<div class="card-header">Ajouter un medecin</div>
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
							<label for="mat">CIN*</label>
							<input type="text" name="CIN" class="form-control" placeholder="CIN" required>
						</div>
						<div class="form-group">
							<label for="depart">Email*</label>
							<input type="email" name="email" class="form-control" placeholder="Email" required>
						</div>
						<div class="form-group">
							<label for="poste">Centre*</label>
							<input type="text" name="centre" class="form-control" placeholder="Centre" required>
						</div>
                        <div class="form-group">
							<label for="poste">Role*</label>
							<input type="text" name="role" class="form-control" placeholder="Role" required>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary" name="submit">Valider</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
                                                    
                                                