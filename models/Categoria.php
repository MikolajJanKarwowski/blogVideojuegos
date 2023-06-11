<?php 

class Categoria{
    private $id;
    private $name;
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

   


    function save(){
        $sql = "INSERT INTO categoria VALUES(NULL,'{$this->getName()}')";
        $save = $this->db->query($sql);
        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }
    function getAll(){
        $sql = "SELECT * from categoria";
        $query = $this->db->query($sql);
        $result = false;
        if($query){
            $result = $query;
        }
        return $result;
    }
    function getById(){
        $sql = "SELECT * from categoria where id = {$this->getId()}";
        $query = $this->db->query($sql);
        $result = false;
        if($query){
            $result = $query->fetch_object();
        }
        return $result;
    }
    function deleteById(){
        $sql = "DELETE from categoria where id = {$this->getId()}";
        $query = $this->db->query($sql);
        $result = false;
        if($query){
            $result = $query;
        }
        return $result;
    }

}

?>