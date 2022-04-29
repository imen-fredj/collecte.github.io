<?php


class InfermierController
{

// Fonction affichage

    public function getAllInfer(){
        $infermiers = Infermier::getAll();
        return $infermiers;
    }

    // Fonction donnant les informations d'un infermier

    public function getOneInfer()
    {
        if (isset($_POST['id_infermier'])) {
            $data = array('id_infermier' => $_POST['id_infermier'],
            );
            $infermier = Infermier::getOne($data);
            return $infermier;
        }
    }

    public function find()
    {
        if (isset($_POST['search'])) {
            $data = array(
                'search' => $_POST['search'],
            );
            $infermier = Infermier::search($data);
            return $infermier;
        }
    }

    // Fonction d'ajout

    public function addInfer()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'nom' => $_POST['nom'],
                'prenom' => $_POST['prenom'],
                'cin' => $_POST['CIN'],
                'email' => $_POST['email'],
                'centre' =>  $_POST['centre'],

            );
            $result = Infermier::add($data);
            if ($result === 'ok') {
                Session::set('success','Infermier Ajouté');
                Redirect::to('home');
            }else{
                echo $result;
            }
        }
    }

// Fonction de mise à jour

    public function updateInfer()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'id_infermier' => $_POST['id_infermier'],
                'nom' => $_POST['nom'],
                'prenom' => $_POST['prenom'],
                'email' => $_POST['email'],
                'cin' => $_POST['cin'],
                'centre' => $_POST['centre'],
            );
            $result = Infermier::update($data);
            if ($result === 'ok') {
                Session::set('success', 'Infermier Modifié');
                Redirect::to('home');
            } else {
                echo $result;
            }
        }
    }
// Fonction de supression

public function deleteInfer()
{
    if (isset($_POST['id_infermier'])) {
        $data['id_infermier'] = $_POST['id_infermier'];
        $result = Infermier::delete($data);
        if ($result === 'ok') {
            Session::set('success', 'Infermier Supprimé');
            Redirect::to('home');
        } else {
            echo $result;
        }
    }
}

}                     