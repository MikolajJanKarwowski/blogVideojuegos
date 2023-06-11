<?php 
require_once 'models/News.php';
class NewsController{
    public function index(){
        $new = new News();
        $news = $new->getAll(); 
        require_once 'views/news/index.php';
    }
    public function create(){
        Utils::isAdmin();
        require_once 'views/news/create.php';
    }
    public function save(){
        Utils::isAdmin();
        if(isset($_POST) && isset($_SESSION['identity'])){
            $user_id = $_SESSION['identity']->id;
            $categoria_id = isset($_POST['categoria'])? $_POST['categoria'] : false;
            $title = isset($_POST['title'])? $_POST['title'] : false;
            $article = isset($_POST['article'])? $_POST['article'] : false;
            
            if($user_id && $categoria_id && $title && $article){
                $news = new News();
                $news->setId_category($categoria_id);
                $news->setId_user($user_id);
                $news->setTitle($title);
                $news->setArticle($article);
                if(isset($_FILES['imagen'])){
                    $file = $_FILES['imagen'];
                    $filename = $file['name'];
                    $mimetype = $file['type'];

                    if($mimetype == "image/jpeg" || $mimetype == "image/jpg" || $mimetype == "image/png" || $mimetype == "image/gif"){
                        if(!is_dir("uploads/images")){
                            mkdir("uploads/images",0777,true);
                        }
                        $num = rand(1,40000);
                        $filename =$num . 'u'.$user_id. 'cat' . $categoria_id .$filename;
                        move_uploaded_file($file['tmp_name'],'uploads/images/'.$filename);
                        $news->setImagen($filename);
                    }

                }else{
                    $news->setImagen(null);
                }
                $save = $news->save();
                if($save){
                    $_SESSION['news_create'] = 'complete';
                }else{
                    $_SESSION['news_create'] = 'fail';
                }
            }

        }else{
            $_SESSION['news_create'] = 'fail';
        }
        header('Location: '. base_url . 'news/create');
    }
    public function ver(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $news = new News();
            $news->setId($id);
            $new = $news->getById();
            if($new){
                require_once 'views/news/ver.php';
            }else{
                header('Location: '. base_url);
            }
        }else{
            header('Location: '. base_url);
        }
    }
    public function delete(){
        Utils::isAdmin();
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $news = new News();
            $news->setId($id);
            $new = $news->deleteById();
        }
        header('Location: '. base_url);
    }
    public function edit(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $news = new News();
            $news->setId($id);
            $new = $news->getById();
            if($new){
                require_once 'views/news/edit.php';
            }else{
                header('Location: '. base_url);
            }
        }else{
            header('Location: '. base_url);
        }
    }
    public function update(){
        Utils::isAdmin();
        if(isset($_POST) && isset($_SESSION['identity']) && isset($_GET['id'])){
            $user_id = $_SESSION['identity']->id;
            $categoria_id = isset($_POST['categoria'])? $_POST['categoria'] : false;
            $title = isset($_POST['title'])? $_POST['title'] : false;
            $article = isset($_POST['article'])? $_POST['article'] : false;
            $id =$_GET['id'];            
            if($user_id && $categoria_id && $title && $article){
                $news = new News();
                $news->setId_category($categoria_id);
                $news->setId_user($user_id);
                $news->setTitle($title);
                $news->setArticle($article);
                $news->setId($id);
                if(isset($_FILES['imagen'])){
                    $file = $_FILES['imagen'];
                    $filename = $file['name'];
                    $mimetype = $file['type'];

                    if($mimetype == "image/jpeg" || $mimetype == "image/jpg" || $mimetype == "image/png" || $mimetype == "image/gif"){
                        if(!is_dir("uploads/images")){
                            mkdir("uploads/images",0777,true);
                        }
                        $num = rand(1,40000);
                        $filename =$num . 'u'.$user_id. 'cat' . $categoria_id .$filename;
                        move_uploaded_file($file['tmp_name'],'uploads/images/'.$filename);
                        $news->setImagen($filename);
                    }

                }else{
                    $news->setImagen(null);
                }
                $update = $news->update();
                if($update){
                    $_SESSION['news_edit'] = 'complete';
                }else{
                    $_SESSION['news_edit'] = 'fail';
                }
            }

        }else{
            $_SESSION['news_create'] = 'edit';
        }
        header('Location: '. base_url . 'news/edit');
    }
    
}
