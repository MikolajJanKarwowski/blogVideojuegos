<?php 
    require_once "models/Categoria.php";
    class CategoriaController{
        public function create(){
            Utils::isAdmin();
            require_once 'views/category/create.php';
        }
        public function save(){
            Utils::isAdmin();
            if(isset($_POST['name'])){
                $name = $_POST['name'];
                $categoria = new Categoria();
                $categoria->setName($name);
                $save = $categoria->save();
                if($save){
                    $_SESSION['category'] = 'complete';
                }else{
                    $_SESSION['category'] = 'fail';
                }
            }else{
                $_SESSION['category'] = 'fail';
            }
            header('Location:' .base_url . 'categoria/create');
        }
        public function index(){
            Utils::isAdmin();
            $categoria = new Categoria();
            $categorias = $categoria->getAll();
            require_once 'views/category/index.php';
        }
        public function ver(){
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $categoria = new Categoria();
                $categoria->setId($id);
                $cat = $categoria->getById();
                if($cat){
                    require_once 'views/category/ver.php';
                }else{
                    header('Location:' .base_url);
                }
            }else{
                header('Location:' .base_url);
            }
            
        }
        public function delete(){
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $categoria = new Categoria();
                $categoria->setId($id);
                $cat = $categoria->deleteById();
                if($cat){
                    $_SESSION['deleted'] = 'complete';
                }else{
                    $_SESSION['deleted'] = 'fail';
                }
            }else{
                $_SESSION['deleted'] = 'fail';
            }
            header('Location:' .base_url.'categoria/index');
        }
    }
?>