<?php
    include "BaseDAO.php";
    class loginUserDAO extends BaseDAO{
        function loginUser($user_name, $user_password){
            try{
                $details = array();
                $this->openConn();
                $stmt = $this->dbh->prepare("SELECT * FROM user_tbl WHERE user_name=? AND user_pass=?");
                $stmt->bindParam(1,$user_name);
                $stmt->bindParam(2, $user_password);
                $stmt->execute();
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    if($user_name == $row['user_name'] && $user_password == $row['user_pass']){
                        $_SESSION['SESS_id'] = $row['id'];
                        $_SESSION['sess_complete_name'] = $row['user_complete_name'];
                        $_SESSION['sess_id'] = $row['id'];
                        return 1;
                    }else{
                        return 0;
                    }
                }
                $this->closeConn();
                return $details;
            }catch (Exception $e){
                $e->getMessage();
            }
        }
    }