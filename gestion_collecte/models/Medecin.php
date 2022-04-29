
<?php

class Medecin{

    static public function getAll(){
        $stmt = DB::connect()->prepare("SELECT * FROM medecin");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt = null;
    }

    public function getOne($data)
    {
        $id = $data['id_medecin'];
        try {
            $query = "SELECT * FROM medecin WHERE id_medecin=:id_medecin";
            $statement = DB::connect()->prepare($query);
            $statement->execute(array(":id_medecin" => $id));
            $medecin = $statement->fetch(PDO::FETCH_OBJ);
            return $medecin;
        } catch (PDOException $ex) {
            echo 'erreur' . $ex->getMessage();
        }
    }

    public function search($data)
    {
        $search = $data['search'];
        try {
            $query = "SELECT * FROM medecin WHERE nom LIKE ?
                OR prenom LIKE ?
            ";
            $statement = DB::connect()->prepare($query);
            $statement->execute(array('%'.$search.'%', '%' . $search . '%'));
            $medecins = $statement->fetchAll();
            return $medecins;
        } catch (PDOException $ex) {
            echo 'erreur' . $ex->getMessage();
        }
    }

    static public function add($data)
    {
        $stmt = DB::connect()->prepare("INSERT INTO medecin(nom,prenom,cin,email,centre) VALUES 
                (:nom,:prenom,:cin,:email,:centre)");
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
        $stmt = DB::connect()->prepare("UPDATE medecin SET nom = :nom,prenom = :prenom,
         cin = :cin, email = :email, centre = :centre  WHERE id_medecin = :id_medecin");
        $stmt->bindParam(':id_medecin', $data['id_medecin'], PDO::PARAM_STR);
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
        $id = $data['id_medecin'];
        try {
            $query = "DELETE FROM medecin WHERE id_medecin=:id_medecin";
            $statement = DB::connect()->prepare($query);
            $statement->execute(array(":id_medecin" => $id));
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


                                              
                                                                                                       
                                                    