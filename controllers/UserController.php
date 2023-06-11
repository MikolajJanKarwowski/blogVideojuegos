<?php 
    require_once 'models/User.php';
    class UserController{
        public function register(){
            require_once 'views/user/register.php';
        }
        public function save(){
            if(isset($_POST)){
                $name = isset($_POST['name'])? $_POST['name'] :false;
                $surname = isset($_POST['surname'])? $_POST['surname'] :false;
                $email = isset($_POST['email'])? $_POST['email'] :false;
                $password = isset($_POST['password'])? $_POST['password'] :false;
                if($name && $surname && $email && $password){
                    $user = new User();
                    $user->setEmail($email);
                    $user->setName($name);
                    $user->setPassword($password);
                    $user->setSurname($surname);
                    $save = $user->save();
                    if($save){
                        $_SESSION['register'] = 'complete';
                    }else{
                        $_SESSION['register'] = 'fail';
                    }
                }else{
                    $_SESSION['register'] = 'fail';
                }  
            }else{
                $_SESSION['register'] = 'fail';
            }
            header('Location: '.base_url.'user/register');
        }
        public function logIn(){
            require_once 'views/user/login.php';
        }
        public function identify(){
            if(isset($_POST)){
                //identificar usuario
                //crear query
                $usuario = new User();
                $usuario->setEmail($_POST['email']);
                $usuario->setPassword($_POST['password']);
                $identity = $usuario->login();
                if($identity){
                    $_SESSION['identity'] = $identity;
                    if($identity->rol == 'admin'){
                        $_SESSION['admin'] = true;
                    }
                    header("Location:".base_url);
                }else{
                    header("Location:".base_url.'user/login');  
                }
            }
          
        }
        public function logout(){
            Utils::unsetSession('identity');
            Utils::unsetSession('admin');
            header('Location: '.base_url);
        }
    }
?>