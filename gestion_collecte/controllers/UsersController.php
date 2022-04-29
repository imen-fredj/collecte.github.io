
<?php 

class UsersController {

	public function auth(){
		if(isset($_POST['submit'])){
			$data['email'] = $_POST['email'];
			$result = User::login($data);
			if($result->email === $_POST['email'] && password_verify($_POST['mdp'],$result->mdp)){

				$_SESSION['logged'] = true;
				$_SESSION['mdp'] = $result->mdp;

				switch($_POST['txt_role']){
					case 'Admin':
						Redirect::to('home');
					break;
					case 'Medecin':
						Redirect::to('homeMedecin');
					break;
					default:
				       Session::set('error','email ou mot de passe est incorrect');
				       Redirect::to('login');
					}
			}
		}
	}

	public function register(){
		if(isset($_POST['submit'])){
			$options = [
				'cost' => 12
			];
			$mdp = password_hash($_POST['mdp'],PASSWORD_BCRYPT,$options);
			$data = array(
				'cin' => $_POST['cin'],
				'email' => $_POST['email'],
				'role' => $_POST['txt_role'],
				'mdp' => $mdp,
			);
			$result = User::createUser($data);
			if($result === 'ok'){
				Session::set('success','Compte crée');
				Redirect::to('login');
			}else{
				echo $result;
			}
		}
	}

	static public function logout(){
		session_destroy();
	}


}
                                                        
                                                    