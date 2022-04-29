
<?php 
	if(isset($_POST['id_medecin'])){
		$exitMedecin = new MedecinController();
		$exitMedecin->deleteInfo();
	}
?>
                                                        
                                                    