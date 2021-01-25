<?php
    include 'database.php';
    include 'authentication.php';

    date_default_timezone_set('Asia/Manila');

    if($_POST['action']=='add_note'){
        try{
            $name = $_POST["data"]["name"];
            $description = $_POST["data"]["description"];
            $user_id = $_POST["data"]["userID"];
            ///pdo
            $pdo->beginTransaction();
            $prepared_statement = $pdo->prepare("INSERT INTO notes(name, description, user_id, status, created_at) VALUES(?,?,?,?,?)");
            $prepared_statement->execute(array($name, $description, $user_id, 0, date("Y-m-d h:i:s")));
            $pdo->commit();
        }catch(Exception $e){
            $pdo->rollBack();
            throw $e;
        }
    }else if($_POST['action']=='get_notes')
    {
        $user_id = $_POST["user_id"];

        try{

            $sql = "SELECT * FROM notes WHERE user_id = $user_id";
            $stm = $pdo->query($sql);
            $rows = $stm->fetchAll(pdo::FETCH_ASSOC);
            echo json_encode($rows);

        }catch(Exception $e){
            throw $e;
        }
    }else if($_POST['action']=='delete_note'){
        

        $note_id = intval($_POST['id']);

        try{
            $pdo->beginTransaction();
            $prepared_statement = $pdo->prepare("DELETE FROM notes WHERE id=?");
            $prepared_statement->execute(array($note_id));
            $pdo->commit();
            echo "deleted";
        }catch(Exception $e){
            $pdo->rollBack();
            throw $e;
        }
    }else if($_POST['action']=='edit_note'){
    
        try{
            $pdo->beginTransaction();
            $prepared_statement = $pdo->prepare("UPDATE notes SET name=?, description=?, status=?, updated_at=? WHERE id=?");
            $prepared_statement->execute(array($_POST['data']['name'], $_POST['data']['description'], 1 , date("Y-m-d h:i:s"), $_POST['data']['id']));
            $pdo->commit();
            echo "edited";
        }catch(Exception $e){
            $pdo->rollBack();
            throw $e;
        }
    }else if($_POST['action']=='register'){

        try{
            $fullname = $_POST['data']['fullname'];
            $username = $_POST['data']['username'];
            $password = $_POST['data']['password'];
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            
            $pdo->beginTransaction();
            $prepared_statement = $pdo->prepare("INSERT INTO user(fullname, username, password) VALUES(?, ?, ?)");
            $prepared_statement->execute(array($fullname, $username, $hashed_password));
            $pdo->commit();

        }
        catch(Exception $e){
            $pdo->rollBack();
            throw $e;
        }
    }

?>