<?php

class Infermier{

    static public function getAll(){
        $stmt = DB::connect()->prepare("SELECT * FROM infermier");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt = null;
    }

    public function getOne($data)
    {
        $id = $data['id_infermier'];
        try {
            $query = "SELECT * FROM infermier WHERE id_infermier=:id_infermier";
            $statement = DB::connect()->prepare($query);
            $statement->execute(array(":id_infermier" => $id));
            $infermier = $statement->fetch(PDO::FETCH_OBJ);
            return $infermier;
        } catch (PDOException $ex) {
            echo 'erreur' . $ex->getMessage();
        }
    }

    public function search($data)
    {
        $search = $data['search'];
        try {
            $query = "SELECT * FROM infermier WHERE nom LIKE ?
                OR prenom LIKE ?
            ";
            $statement = DB::connect()->prepare($query);
            $statement->execute(array('%'.$search.'%', '%' . $search . '%'));
            $infermiers = $statement->fetchAll();
            return $infermiers;
        } catch (PDOException $ex) {
            echo 'erreur' . $ex->getMessage();
        }
    }

    static public function add($data)
    {
        $stmt = DB::connect()->prepare("INSERT INTO infermier(nom,prenom,cin,email,centre,role) VALUES 
                (:nom,:prenom,:cin,:email,:centre,:role)");
        $stmt->bindParam(':nom', $data['nom'], PDO::PARAM_STR);
        $stmt->bindParam(':prenom', $data['prenom'], PDO::PARAM_STR);
        $stmt->bindParam(':cin', $data['cin'], PDO::PARAM_STR);
        $stmt->bindParam(':email', $data['email'], PDO::PARAM_STR);
        $stmt->bindParam(':centre', $data['centre'], PDO::PARAM_STR);
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
        $stmt = DB::connect()->prepare("UPDATE infermier SET nom = :nom,prenom = :prenom,
                    cin = :cin, email = :email, centre = :centre  WHERE id_infermier = :id_infermier");
        $stmt->bindParam(':id_infermier', $data['id_infermier'], PDO::PARAM_STR);
        $stmt->bindParam(':nom', $data['nom'], PDO::PARAM_STR);
        $stmt->bindParam(':prenom', $data['prenom'], PDO::PARAM_STR);
        $stmt->bindParam(':cin', $data['cin'], PDO::PARAM_STR);
        $stmt->bindParam(':email', $data['email'], PDO::PARAM_STR);
        $stmt->bindParam(':centre', $data['centre'], PDO::PARAM_STR);
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
        $id = $data['id_infermier'];
        try {
            $query = "DELETE FROM infermier WHERE id_infermier=:id_infermier";
            $statement = DB::connect()->prepare($query);
            $statement->execute(array(":id_infermier" => $id));
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
