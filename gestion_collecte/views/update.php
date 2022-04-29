

<?php 
	if(isset($_POST['id_medecin'])){
		$existMedecin = new MedecinController();
		$medecin = $existMedecin->getOneInfo();
	}else{
		Redirect::to('home');
	}
	if(isset($_POST['submit'])){
		$existMedecin = new MedecinController();
		$existMedecin->updateInfo();
	}
?>

<div class="container">
	<div class="row my-4">
		<div class="col-md-8 mx-auto">
			<div class="card">
				<div class="card-header">Modifier un medecin</div>
				<div class="card-body bg-light">
					<a href="<?php echo BASE_URL;?>" class="btn btn-sm btn-secondary mr-2 mb-2">
						<i class="fas fa-home"></i>
					</a>
					<form method="post">
						<div class="form-group">
							<label for="nom">Nom*</label>
							<input type="text" name="nom" class="form-control" placeholder="Nom"
							value="<?php echo $medecin->nom; ?>"
							>
						</div>
						<div class="form-group">
							<label for="prenom">Prénom*</label>
							<input type="text" name="prenom" class="form-control" placeholder="Prénom"
							value="<?php echo $medecin->prenom; ?>"
							>
						</div>
						<div class="form-group">
							<label for="mat">CIN*</label>
							<input type="text" name="cin" class="form-control" placeholder="CIN"
								value="<?php echo $medecin->cin; ?>">
						</div>
						<div class="form-group">
							<label for="depart">Email*</label>
							<input type="email" name="email" class="form-control" placeholder="Email"
							value="<?php echo $medecin->email; ?>">
							<input type="hidden" name="id_medecin" value="<?php echo $medecin->id_medecin;?>">
						</div>
						<div class="form-group">
							<label for="poste">Centre*</label>
							<input type="text" name="centre" class="form-control" placeholder="Centre"
							value="<?php echo $medecin->centre; ?>">
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
                                                        
                                                    