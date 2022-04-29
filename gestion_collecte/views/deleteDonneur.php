
<?php 
	if(isset($_POST['id_donneur'])){
		$exitDonneur = new DonneurController();
		$exitDonneur->deleteInfo();
	}
?>
      