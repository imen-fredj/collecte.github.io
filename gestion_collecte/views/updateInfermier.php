
<?php 
	if(isset($_POST['id_infermier'])){
		$existInfermier = new InfermierController();
		$infermier = $existInfermier->getOneInfer();
	}else{
		Redirect::to('home');
	}
	if(isset($_POST['submit'])){
		$existInfermier = new InfermierController();
		$existInfermier->updateInfer();
	}
?>

<div class="container">
	<div class="row my-4">
		<div class="col-md-8 mx-auto">
			<div class="card">
				<div class="card-header">Modifier un infermier</div>
				<div class="card-body bg-light">
					<a href="<?php echo BASE_URL;?>" class="btn btn-sm btn-secondary mr-2 mb-2">
						<i class="fas fa-home"></i>
					</a>
					<form method="post">
						<div class="form-group">
							<label for="nom">Nom*</label>
							<input type="text" name="nom" class="form-control" placeholder="Nom"
							value="<?php echo $infermier->nom; ?>"
							>
						</div>
						<div class="form-group">
							<label for="prenom">Prénom*</label>
							<input type="text" name="prenom" class="form-control" placeholder="Prénom"
							value="<?php echo $infermier->prenom; ?>"
							>
						</div>
						<div class="form-group">
							<label for="mat">CIN*</label>
							<input type="text" name="cin" class="form-control" placeholder="CIN"
								value="<?php echo $infermier->cin; ?>">
						</div>
						<div class="form-group">
							<label for="depart">Email*</label>
							<input type="email" name="email" class="form-control" placeholder="Email"
							value="<?php echo $infermier->email; ?>">
							<input type="hidden" name="id_infermier" value="<?php echo $infermier->id_infermier;?>">
						</div>
						<div class="form-group">
							<label for="poste">Centre*</label>
							<input type="text" name="centre" class="form-control" placeholder="Centre"
							value="<?php echo $infermier->centre; ?>">
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