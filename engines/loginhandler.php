<?php
        session_start();
       if($_SERVER['REQUEST_METHOD']=== "POST"){
        $username = $_POST['username'];
        $pwd = $_POST['pwd'];
        require_once '../classes/Dbh.php';
        require_once '../classes/Login.php';
        if (isset($_POST['remember-me']) && ($_POST['remember-me']==="on")){
                setcookie("username", $username, time() + 60 * 60 * 24 * 100, "/");
                setcookie("password", $pwd, time() + 60 * 60 * 24 * 100, "/");
            }
            else{
                setcookie("username", "", time() - 3600, "/");
                setcookie("password", "", time() - 3600, "/");
            }
       
        $login = new Login($username,$pwd);
        //$login->rememeberMe();
        $login->loginUser();
        
}
