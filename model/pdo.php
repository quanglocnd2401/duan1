<?php 
    function pdo_get_connection(){
        $hostname = "localhost";
        $db_name = "duan1";
        $username = "root";
        $password = "";
        try{
            $conn = new PDO("mysql:host=$hostname;dbname=$db_name", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            return $conn;
        }
        catch(PDOException $e){
            error_log($e->getMessage());
            return false;
        }
    }
    function pdo_execute($sql){
        $sql_args = array_slice(func_get_args(),1);
        try{
            $conn = pdo_get_connection();
            if($conn){
                $stmt = $conn->prepare($sql);
                $stmt->execute($sql_args);
            }
        }
        catch(PDOException $e){
            throw $e;
        }
    }
    
    function pdo_query($sql){
        $sql_args = array_slice(func_get_args(),1);
        try{
            $conn = pdo_get_connection();
            $stmt = $conn->prepare($sql);
            $stmt->execute($sql_args);
            $rows = $stmt->fetchAll();
            return $rows;
        }catch(PDOException $e){
            throw $e;
        }
    }
    function pdo_query_one($sql){
        $sql_args = array_slice(func_get_args(),1);
        try{
            $conn = pdo_get_connection();
            $stmt = $conn->prepare($sql);
            $stmt->execute($sql_args);
            $rows = $stmt->fetch(PDO::FETCH_ASSOC);
            return $rows;
        }catch(PDOException $e){
            throw $e;
        }
    }
    function nums_row($sql) {
        $sql_args = array_slice(func_get_args(), 1);
        try {
            $conn = pdo_get_connection();
            $stmt = $conn->prepare($sql);
            $stmt->execute($sql_args);
            $rows = $stmt->rowCount();

            $conn = null;
            return $rows;
        } catch (PDOException $e) {
            
            echo "Lỗi: " . $e->getMessage();
            return false;
        }
    }
    
    

    
?>