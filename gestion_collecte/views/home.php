<?php 
	if(isset($_POST['find'])){
		$data = new MedecinController();
		$medecins = $data->find();
	}else{
		$data = new MedecinController();
		$medecins = $data->getAllInfo();
	}
?>

<div class="container">
	<div class="row my-7">
		<div class="col-md-3 mx-auto">
			<div class="card">
				<h3> Liste des medecins </h3>
			</div>
		</div>
	</div>
</div>


<div class="container">
	<div class="row my-4">
		<div class="col-md-10 mx-auto">
			<?php include('./views/includes/alerts.php');?>
			<div class="card">
				<div class="card-body bg-light">
					<a href="<?php echo BASE_URL;?>add" class="btn btn-sm btn-primary mr-2 mb-2">
						<i class="fas fa-plus"></i>
					</a>
					<a href="<?php echo BASE_URL;?>" class="btn btn-sm btn-secondary mr-2 mb-2">
						<i class="fas fa-home"></i>
					</a>
				<!--	<a href="<?php // echo BASE_URL;?>logout" title="Déconnexion" class="btn btn-link mr-2 mb-2">
						<i class="fas fa-user mr-2"> <?php // echo $_SESSION['username'];?></i>
					</a>-->
					<form method="post" class="float-right mb-2 d-flex flex-row">
						<input type="text" class="form-control" name="search" placeholder="Recherche">
						<button class="btn btn-info btn-sm" name="find" type="submit"><i class="fas fa-search"></i></button>
					</form>
					<table class="table table-hover">
					  <thead>
					    <tr>
                          <th scope="col">ID</th>
					      <th scope="col">Nom</th>
					      <th scope="col">Prénom</th>
                          <th scope="col">CIN</th>
					      <th scope="col">Email</th>
					      <th scope="col">Centre</th>
                          <th scope="col">Action</th>
					    </tr>
					  </thead>
					  <tbody>
					    <?php foreach($medecins as $medecin):?>
					    	<tr>
						      <th scope="row"><?php echo $medecin['id_medecin'];?></th>
                              <td><?php echo $medecin['nom']; ?></td>
						      <td><?php echo $medecin['prenom'];?></td>
                              <td><?php echo $medecin['cin'];?></td>
						      <td><?php echo $medecin['email'];?></td>
						      <td><?php echo $medecin['centre'];?></td>

						      <td class="d-flex flex-row">
						      	<form method="post" class="mr-1" action="update">
						      		<input type="hidden" name="id_medecin" value="<?php echo $medecin['id_medecin'];?>">
						      		<button class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button>
						      	</form>
						      	<form method="post" class="mr-1" action="delete">
						      		<input type="hidden" name="id_medecin" value="<?php echo $medecin['id_medecin'];?>">
						      		<button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
						      	</form>
						      </td>
						    </tr>
					   	<?php endforeach;?>
					  </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Partie Infermier -->

<?php 
	if(isset($_POST['find'])){
		$data = new InfermierController();
		$infermiers = $data->find();
	}else{
		$data = new InfermierController();
		$infermiers = $data->getAllInfer();
	}
?>
<div class="container">
	<div class="row my-7">
		<div class="col-md-3 mx-auto">
			<div class="card">
				<h3> Liste des Infirmiers </h3>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row my-4">
		<div class="col-md-10 mx-auto">
			<?php include('./views/includes/alerts.php');?>
			<div class="card">
				<div class="card-body bg-light">
					<a href="<?php echo BASE_URL;?>addInfermier" class="btn btn-sm btn-primary mr-2 mb-2">
						<i class="fas fa-plus"></i>
					</a>
					<a href="<?php echo BASE_URL;?>" class="btn btn-sm btn-secondary mr-2 mb-2">
						<i class="fas fa-home"></i>
					</a>
				<!--	<a href="<?php // echo BASE_URL;?>logout" title="Déconnexion" class="btn btn-link mr-2 mb-2">
						<i class="fas fa-user mr-2"> <?php // echo $_SESSION['username'];?></i>
					</a>-->
					<form method="post" class="float-right mb-2 d-flex flex-row">
						<input type="text" class="form-control" name="search" placeholder="Recherche">
						<button class="btn btn-info btn-sm" name="find" type="submit"><i class="fas fa-search"></i></button>
					</form>
					<table class="table table-hover">
					  <thead>
					    <tr>
                          <th scope="col">ID</th>
					      <th scope="col">Nom</th>
					      <th scope="col">Prénom</th>
                          <th scope="col">CIN</th>
					      <th scope="col">Email</th>
					      <th scope="col">Centre</th>
                          <th scope="col">Action</th>
					    </tr>
					  </thead>
					  <tbody>
					    <?php foreach($infermiers as $infermier):?>
					    	<tr>
						      <th scope="row"><?php echo $infermier['id_infermier'];?></th>
                              <td><?php echo $infermier['nom']; ?></td>
						      <td><?php echo $infermier['prenom'];?></td>
                              <td><?php echo $infermier['cin'];?></td>
						      <td><?php echo $infermier['email'];?></td>
						      <td><?php echo $infermier['centre'];?></td>

						      <td class="d-flex flex-row">
						      	<form method="post" class="mr-1" action="updateInfermier">
						      		<input type="hidden" name="id_infermier" value="<?php echo $infermier['id_infermier'];?>">
						      		<button class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button>
						      	</form>
						      	<form method="post" class="mr-1" action="deleteInfermier">
						      		<input type="hidden" name="id_infermier" value="<?php echo $infermier['id_infermier'];?>">
						      		<button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
						      	</form>
						      </td>
						    </tr>
					   	<?php endforeach;?>
					  </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
                       