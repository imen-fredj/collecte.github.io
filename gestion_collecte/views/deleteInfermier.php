<?php 
	if(isset($_POST['id_infermier'])){
		$exitInfermier = new InfermierController();
		$exitInfermier->deleteInfer();
	}
?>
                                                        
                                                    