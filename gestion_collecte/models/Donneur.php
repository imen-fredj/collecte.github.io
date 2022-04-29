<?php

class Donneur{

    static public function getAll(){
        $stmt = DB::connect()->prepare("SELECT * FROM donneur");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt = null;
    }

    public function getOne($data)
    {
        $id = $data['id_donneur'];
        try {
            $query = "SELECT * FROM donneur WHERE id_donneur=:id_donneur";
            $statement = DB::connect()->prepare($query);
            $statement->execute(array(":id_donneur" => $id));
            $donneur = $statement->fetch(PDO::FETCH_OBJ);
            return $donneur;
        } catch (PDOException $ex) {
            echo 'erreur' . $ex->getMessage();
        }
    }

    public function search($data)
    {
        $search = $data['search'];
        try {
            $query = "SELECT * FROM donneur WHERE nom LIKE ?
                OR prenom LIKE ?
            ";
            $statement = DB::connect()->prepare($query);
            $statement->execute(array('%'.$search.'%', '%' . $search . '%'));
            $donneurs = $statement->fetchAll();
            return $donneurs;
        } catch (PDOException $ex) {
            echo 'erreur' . $ex->getMessage();
        }
    }

    static public function add($data)
    {
        $stmt = DB::connect()->prepare("INSERT INTO donneur(nom,prenom,adresse,numero,email,age,sexe,poids,taille,type_sang,dernier_don) VALUES 
                (:nom,:prenom,:adresse,:numero,:email,:age,:sexe,:poids,:taille,:type_sang,:dernier_don)");
        $stmt->bindParam(':nom', $data['nom'], PDO::PARAM_STR);
        $stmt->bindParam(':prenom', $data['prenom'], PDO::PARAM_STR);
        $stmt->bindParam(':adresse', $data['adresse'], PDO::PARAM_STR);
        $stmt->bindParam(':numero', $data['numero'], PDO::PARAM_STR);
        $stmt->bindParam(':email', $data['email'], PDO::PARAM_STR);
        $stmt->bindParam(':age', $data['age'], PDO::PARAM_STR);
        $stmt->bindParam(':sexe', $data['sexe'], PDO::PARAM_STR);
        $stmt->bindParam(':poids', $data['poids'], PDO::PARAM_STR);
        $stmt->bindParam(':taille', $data['taille'], PDO::PARAM_STR);
        $stmt->bindParam(':type_sang', $data['type_sang'], PDO::PARAM_STR);
        $stmt->bindParam(':dernier_don', $data['dernier_don'], PDO::PARAM_STR);
       // $stmt->bindParam(':statut', $data['statut'], PDO::PARAM_STR);
        if ($stmt->execute()) {
            return 'ok';
        } else {
            return 'error';
        }
        $stmt->close();
        $stmt = null;
    }
    static public function update($data)
    {
        $stmt = DB::connect()->prepare("UPDATE medecin SET nom = :nom,prenom = :prenom,
                    adresse = :adresse, numero = :numero, email = :email, age = :age , sexe = :sexe 
                    , poids = :poids , taille = :taille , type_sang = :type_sang , dernier_don = :dernier_don  
                    , statut = :statut WHERE id_donneur = :id_donneur");
               $stmt->bindParam(':nom', $data['nom'], PDO::PARAM_STR);
               $stmt->bindParam(':prenom', $data['prenom'], PDO::PARAM_STR);
               $stmt->bindParam(':adresse', $data['adresse'], PDO::PARAM_STR);
               $stmt->bindParam(':numero', $data['numero'], PDO::PARAM_STR);
               $stmt->bindParam(':email', $data['email'], PDO::PARAM_STR);
               $stmt->bindParam(':age', $data['age'], PDO::PARAM_STR);
               $stmt->bindParam(':sexe', $data['sexe'], PDO::PARAM_STR);
               $stmt->bindParam(':poids', $data['poids'], PDO::PARAM_STR);
               $stmt->bindParam(':taille', $data['taille'], PDO::PARAM_STR);
               $stmt->bindParam(':type_sang', $data['type_sang'], PDO::PARAM_STR);
               $stmt->bindParam(':dernier_don', $data['dernier_don'], PDO::PARAM_STR);
               //$stmt->bindParam(':statut', $data['statut'], PDO::PARAM_STR);
        if ($stmt->execute()) {
            return 'ok';
        } else {
            return 'error';
        }
        $stmt->close();
        $stmt = null;
    }
    static public function delete($data)
    {
        $id = $data['id_donneur'];
        try {
            $query = "DELETE FROM donneur WHERE id_donneur=:id_donneur";
            $statement = DB::connect()->prepare($query);
            $statement->execute(array(":id_donneur" => $id));
            if ($statement->execute()) {
                return 'ok';
            } else {
                return 'error';
            }
            $statement->close();
            $statement = null;
        } catch (PDOException $ex) {
            echo 'erreur' . $ex->getMessage();
        }
    }


}

