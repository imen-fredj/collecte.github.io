
<?php 

class User{

	static public function login($data){
		$email = $data['email'];
		try{
			$query = 'SELECT FROM users WHERE email=:email';
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array(":email" => $email));
			$user = $stmt->fetch(PDO::FETCH_OBJ);
			return $user;
		}catch(PDOException $ex){
			echo 'erreur' . $ex->getMessage();
		}
	}

	static public function createUser($data){
		$role = $_POST['txt_role'];
		$stmt = DB::connect()->prepare('INSERT INTO users (cin,email,mdp,role)
			VALUES (:cin,:email,:mdp,:($role))');
		$stmt->bindParam(':cin',$data['cin']);
		$stmt->bindParam(':email',$data['email']);
		$stmt->bindParam(':mdp',$data['mdp']);
		$stmt->bindParam(':($role)',$data['role']);

		if($stmt->execute()){
			return 'ok';
		}else{
			return 'error';
		}
		$stmt->close();
		$stmt = null;
	}

}

 ?>
                                                    
                                                