<?php


class DonneurController
{

// Fonction affichage

    public function getAllInfo(){
        $donneurs = Donneur::getAll();
        return $donneurs;
    }

    // Fonction donnant les informations d'un medecin

    public function getOneInfo()
    {
        if (isset($_POST['id_donneur'])) {
            $data = array(
                'id_donneur' => $_POST['id_donneur'],
            );
            $donneur = Donneur::getOne($data);
            return $donneur;
        }
    }

    public function find()
    {
        if (isset($_POST['search'])) {
            $data = array(
                'search' => $_POST['search'],
            );
            $donneurs = Donneur::search($data);
            return $donneurs;
        }
    }

    // Fonction d'ajout

    public function addInfo()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'nom' => $_POST['nom'],
                'prenom' => $_POST['prenom'],
                'adresse' => $_POST['adresse'],
                'numero' => $_POST['numero'],
                'email' => $_POST['email'],
                'age' => $_POST['age'],
                'sexe' => $_POST['sexe'],
                'poids' => $_POST['poids'],
                'taille' => $_POST['taille'],
                'type_sang' => $_POST['type_sang'],
                'dernier_don' => $_POST['dernier_don'],
            );
            $result = Donneur::add($data);
            if ($result === 'ok') {
                Session::set('success','Donneur Ajouté');
                Redirect::to('homeMedecin');
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
                'id_donneur' => $_POST['id_donneur'],
                'nom' => $_POST['nom'],
                'prenom' => $_POST['prenom'],
                'adresse' => $_POST['adresse'],
                'numero' => $_POST['numero'],
                'email' => $_POST['email'],
                'age' => $_POST['age'],
                'sexe' => $_POST['sexe'],
                'poids' => $_POST['poids'],
                'taille' => $_POST['taille'],
                'type_sang' => $_POST['type_sang'],
                'dernier_don' => $_POST['dernier_don'],
            );
            $result = Donneur::update($data);
            if ($result === 'ok') {
                Session::set('success', 'Donneur Modifié');
                Redirect::to('homeMedecin');
            } else {
                echo $result;
            }
        }
    }
// Fonction de supression

public function deleteInfo()
{
    if (isset($_POST['id_donneur'])) {
        $data['id_donneur'] = $_POST['id_donneur'];
        $result = Donneur::delete($data);
        if ($result === 'ok') {
            Session::set('success', 'Donneur Supprimé');
            Redirect::to('homeMedecin');
        } else {
            echo $result;
        }
    }
}

}                     