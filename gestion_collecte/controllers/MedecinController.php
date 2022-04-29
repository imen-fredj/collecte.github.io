                                                        
<?php


class MedecinController
{

// Fonction affichage

    public function getAllInfo(){
        $medecins = Medecin::getAll();
        return $medecins;
    }

    // Fonction donnant les informations d'un medecin

    public function getOneInfo()
    {
        if (isset($_POST['id_medecin'])) {
            $data = array(
                'id_medecin' => $_POST['id_medecin'],
            );
            $medecin = Medecin::getOne($data);
            return $medecin;
        }
    }

    public function find()
    {
        if (isset($_POST['search'])) {
            $data = array(
                'search' => $_POST['search'],
            );
            $medecins = Medecin::search($data);
            return $medecins;
        }
    }

    // Fonction d'ajout

    public function addInfo()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'nom' => $_POST['nom'],
                'prenom' => $_POST['prenom'],
                'cin' => $_POST['CIN'],
                'email' => $_POST['email'],
                'centre' =>  $_POST['centre'],
                'role' =>  $_POST['role'],

            );
            $result = Medecin::add($data);
            if ($result === 'ok') {
                Session::set('success','Medecin Ajouté');
                Redirect::to('home');
            }else{
                echo $result;
            }
        }
    }

// Fonction de mise à jour

    public function updateInfo()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'id_medecin' => $_POST['id_medecin'],
                'nom' => $_POST['nom'],
                'prenom' => $_POST['prenom'],
                'email' => $_POST['email'],
                'cin' => $_POST['cin'],
                'centre' => $_POST['centre'],
            );
            $result = Medecin::update($data);
            if ($result === 'ok') {
                Session::set('success', 'Medecin Modifié');
                Redirect::to('home');
            } else {
                echo $result;
            }
        }
    }
// Fonction de supression

public function deleteInfo()
{
    if (isset($_POST['id_medecin'])) {
        $data['id_medecin'] = $_POST['id_medecin'];
        $result = Medecin::delete($data);
        if ($result === 'ok') {
            Session::set('success', 'Medecin Supprimé');
            Redirect::to('home');
        } else {
            echo $result;
        }
    }
}

}                     