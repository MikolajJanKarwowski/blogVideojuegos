<?php 
    class News{
        private $id;
        private $id_user;
        private $id_category;
        private $title;
        private $article;
        private $imagen;
        private $date_creation;



        private $db;
        public function __construct(){
            $this->db = Db::connect();
        }

        


        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        


        

        /**
         * Get the value of id_user
         */ 
        public function getId_user()
        {
                return $this->id_user;
        }

        /**
         * Set the value of id_user
         *
         * @return  self
         */ 
        public function setId_user($id_user)
        {
                $this->id_user = $id_user;

                return $this;
        }

        /**
         * Get the value of id_category
         */ 
        public function getId_category()
        {
                return $this->id_category;
        }

        /**
         * Set the value of id_category
         *
         * @return  self
         */ 
        public function setId_category($id_category)
        {
                $this->id_category = $id_category;

                return $this;
        }

        /**
         * Get the value of title
         */ 
        public function getTitle()
        {
                return $this->title;
        }

        /**
         * Set the value of title
         *
         * @return  self
         */ 
        public function setTitle($title)
        {
                $this->title = $this->db->real_escape_string($title);

                return $this;
        }

        /**
         * Get the value of article
         */ 
        public function getArticle()
        {
                return $this->article;
        }

        /**
         * Set the value of article
         *
         * @return  self
         */ 
        public function setArticle($article)
        {
                $this->article = $this->db->real_escape_string($article);

                return $this;
        }

        /**
         * Get the value of imagen
         */ 
        public function getImagen()
        {
                return $this->imagen;
        }

        /**
         * Set the value of imagen
         *
         * @return  self
         */ 
        public function setImagen($imagen)
        {
                $this->imagen = $this->db->real_escape_string($imagen);

                return $this;
        }

        /**
         * Get the value of date_creation
         */ 
        public function getDate_creation()
        {
                return $this->date_creation;
        }

        /**
         * Set the value of date_creation
         *
         * @return  self
         */ 
        public function setDate_creation($date_creation)
        {
                $this->date_creation = $date_creation;

                return $this;
        }

        function save(){
            $sql = "INSERT INTO news values(null,{$this->getId_user()},{$this->getId_category()},'{$this->getTitle()}','{$this->getArticle()}','{$this->getImagen()}',curdate())";
            $save = $this->db->query($sql);
            $result = false;
            if($save){
                $result = true;
            }
            return $result;
        }
        function getAll(){
                $sql = "SELECT * FROM news";
                $save = $this->db->query($sql);
                $result = false;
                if($save){
                    $result = $save;
                }
                return $result;
        }
        function getById(){
                $sql = "SELECT * FROM news WHERE id = {$this->getId()}";
                $save = $this->db->query($sql);
                $result = false;
                if($save){
                    $result = $save->fetch_object();
                }
                return $result;   
        }
        function deleteById(){
                $sql = "delete FROM news WHERE id = {$this->getId()}";
                $delete = $this->db->query($sql);
                $result = false;
                if($delete){
                    $result = $delete;
                }
                return $result;   
        }
        function update(){
                $sql = "UPDATE news SET id_user = {$this->getId_user()}, 
                id_categoria = {$this->getId_category()}, 
                title = '{$this->getTitle()}',
                article = '{$this->getArticle()}',";
                if($this->getImagen() != null){
                        $sql .= "imagen='{$this->getImagen()}',";
                }
                $sql .= "date_creation = curdate() WHERE id = {$this->getId()}";
                $query = $this->db->query($sql);
                $result = false;
                if($query){
                        $result = $query;
                }
                return $result;
        }
    }
?>