<?php 
    class User{
        private $id;
        private $name;
        private $surname;
        private $email;
        private $password;
        private $rol;
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
         * Get the value of name
         */ 
        public function getName()
        {
                return $this->name;
        }

        /**
         * Set the value of name
         *
         * @return  self
         */ 
        public function setName($name)
        {
                $this->name = $this->db->real_escape_string($name);

                return $this;
        }

        /**
         * Get the value of surname
         */ 
        public function getSurname()
        {
                return $this->surname;
        }

        /**
         * Set the value of surname
         *
         * @return  self
         */ 
        public function setSurname($surname)
        {
                $this->surname = $this->db->real_escape_string($surname);

                return $this;
        }

        /**
         * Get the value of email
         */ 
        public function getEmail()
        {
                return $this->email;
        }

        /**
         * Set the value of email
         *
         * @return  self
         */ 
        public function setEmail($email)
        {
                $this->email = $this->db->real_escape_string($email);

                return $this;
        }

        /**
         * Get the value of password
         */ 
        public function getPassword()
        {
                return password_hash($this->db->real_escape_string($this->password),PASSWORD_BCRYPT,['cost'=>4]);
        }
        public function getCleanPassword(){
                return $this->password;
        }

        /**
         * Set the value of password
         *
         * @return  self
         */ 
        public function setPassword($password)
        {
                $this->password = $password;

                return $this;
        }

        /**
         * Get the value of rol
         */ 
        public function getRol()
        {
                return $this->rol;
        }

        /**
         * Set the value of rol
         *
         * @return  self
         */ 
        public function setRol($rol)
        {
                $this->rol = $rol;

                return $this;
        }



        function save(){
            $sql = "INSERT INTO users VALUES(NULL,'{$this->getName()}','{$this->getSurname()}','{$this->getEmail()}','{$this->getPassword()}','user')";
            $save = $this->db->query($sql);
            $result = false;
            if($save){
                $result = true;
            }
            return $result;
        }

        public function login(){
                $sql = "select * from users where email = '{$this->getEmail()}'";
                $login = $this->db->query($sql);
                $result = false;
                if($login && $login->num_rows == 1){
                        $usuario = $login->fetch_object();

                        $verify = password_verify($this->getCleanPassword(),$usuario->password);
                        if($verify){
                                $result = $usuario;
                        }
                }
                return $result;
        }
    }
?>