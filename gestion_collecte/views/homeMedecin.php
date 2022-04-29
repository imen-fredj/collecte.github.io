<?php 
	if(isset($_POST['find'])){
		$data = new DonneurController();
		$donneurs = $data->find();
	}else{
		$data = new DonneurController();
		$donneurs = $data->getAllInfo();
	}
?>
<div class="container">
	<div class="row my-5">
		<div class="col-md-3 mx-auto">
			<div class="card">
				<h3> Liste des donneurs </h3>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row my-4">
		<div class="col-md-15 mx-auto">
			<?php include('./views/includes/alerts.php');?>
			<div class="card">
				<div class="card-body bg-light">
					<a href="<?php echo BASE_URL;?>addDonneur" class="btn btn-sm btn-primary mr-2 mb-2">
						<i class="fas fa-plus"></i>
					</a>
					<a href="<?php echo BASE_URL;?>" class="btn btn-sm btn-secondary mr-2 mb-2">
						<i class="fas fa-home"></i>
					</a>
				<!--	<a href="<?php// echo BASE_URL;?>logout" title="Déconnexion" class="btn btn-link mr-2 mb-2">
						<i class="fas fa-user mr-2"> <?php// echo $_SESSION['username'];?></i>
					</a> -->
					<form method="post" class="float-right mb-2 d-flex flex-row">
						<input type="text" class="form-control" name="search" placeholder="Recherche">
						<button class="btn btn-info btn-sm" name="find" type="submit"><i class="fas fa-search"></i></button>
					</form>
					<table class="table table-hover">
					  <thead>
					    <tr>
					      <th scope="col">Nom</th>
					      <th scope="col">Prénom</th>
                          <th scope="col">Adresse</th>
                          <th scope="col">email</th>
					      <th scope="col">age</th>
					      <th scope="col">sexe</th>
                          <th scope="col">poids</th>
                          <th scope="col">taille</th>
                          <th scope="col">Type de sang</th>
                          <th scope="col">Date du dernier don</th>
					      <th scope="col">Action</th>
					    </tr>
					  </thead>
					  <tbody>
					    <?php foreach($donneurs as $donneur):?>
					    	<tr>
						      <th scope="row"><?php echo $donneur['nom']; ?></th>
						      <td><?php echo $donneur['prenom'];?></td>
						      <td><?php echo $donneur['adresse'];?></td>
						      <td><?php echo $donneur['email'];?></td>
                              <td><?php echo $donneur['age'];?></td>
                              <td><?php echo $donneur['sexe'];?></td>
                              <td><?php echo $donneur['poids'];?></td>
                              <td><?php echo $donneur['taille'];?></td>
                              <td><?php echo $donneur['type_sang'];?></td>
                              <td><?php echo $donneur['dernier_don'];?></td>
 
						
						      <td class="d-flex flex-row">
						      	<form method="post" class="mr-1" action="updateDonneur">
						      		<input type="hidden" name="id_donneur" value="<?php echo $donneur['id_donneur'];?>">
						      		<button class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button>
						      	</form>
						      	<form method="post" class="mr-1" action="deleteDonneur">
						      		<input type="hidden" name="id_donneur" value="<?php echo $donneur['id_donneur'];?>">
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
                                                        
                                                    