<?php

use LDAP\Result;

class Utils{
    
    public static function unsetSession($name){
        if(isset($_SESSION[$name])){
            unset($_SESSION[$name]);
        }
    }
    public static function isAdmin(){
        if(isset($_SESSION['admin'])){
            return true;
        }else{
            header('Location:'.base_url);
        }
    }
    public static function getCategories(){
        $db = Db::connect();
        $sql = "SELECT * FROM categoria";
        $query = $db->query($sql);
        $result = false;
        if($query){
            $result = $query;
        }
        return $result;
    } 
    public static function isIndentify(){
        $result = false;
        if(isset($_SESSION['identity'])){
            $result = "<ul class='identity'>
            <li>
                {$_SESSION['identity']->email}
            </li>
            <li>
                {$_SESSION['identity']->name}
            </li>
        </ul>";
        }
        return $result;
            
        
    }
    public static function getCategoryById($id){
        $sql = "SELECT name from categoria where id = " . intval($id);
        $db = Db::connect();
        $query = $db->query($sql);
        $result = false;
        if($query){
            $result = $query;
        }
        return $result;
    }
    public static function getUserById($id){
        $sql = "SELECT name,surname from users where id = " . intval($id);
        $db = Db::connect();
        $query = $db->query($sql);
        $result = false;
        if($query){
            $result = $query;
        }
        return $result;
    }
}
?>