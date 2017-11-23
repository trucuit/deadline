<?php

class Model
{
    protected $conn;
    protected $database = DB_NAME;
    protected $table = DB_TABLE;
    protected $resultQuery;

    public function __construct()
    {
        try {
            $this->conn = new PDO ("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connected failed: " . $e->getMessage();
            die();
        }

    }

    public function __destruct()
    {
        $this->conn = null;
    }

    public function setTable($table)
    {
        $this->table = $table;
    }

    public function insert($data)
    {
        $stmt = $this->conn->prepare("INSERT INTO `$this->table` (`name`, `price`, `image`, `description`) VALUES (:name, :price, :image, :description)");
        $stmt->bindParam(':name', $data['name'], PDO::PARAM_STR);
        $stmt->bindParam(':price', $data['price'], PDO::PARAM_INT);
        $stmt->bindParam(':image', $data['image']['name'], PDO::PARAM_STR);
        $stmt->bindParam(':description', $data['description'], PDO::PARAM_STR);
        $stmt->execute();
    }

    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM `$this->table` WHERE id=:id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function update($id, $data)
    {
        $stmt = $this->conn->prepare("UPDATE `$this->table` SET name=:name, price=:price, image=:image, description=:description WHERE id=:id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':name', $data['name'], PDO::PARAM_STR);
        if (is_array($data['image'])) {
            $stmt->bindParam(':image', $data['image']['name'], PDO::PARAM_STR);
        } else {
            $stmt->bindParam(':image', $data['image'], PDO::PARAM_STR);
        }
        $stmt->bindParam(':price', $data['price'], PDO::PARAM_INT);
        $stmt->bindParam(':description', $data['description'], PDO::PARAM_STR);
        $stmt->execute();
    }

    public function showAll($table)
    {
        $stmt = $this->conn->prepare("SELECT * FROM `$table`");
        $stmt->execute();
        return $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function show($table)
    {
        $stmt = $this->conn->prepare("SELECT * FROM `$table`");
        
        $stmt->execute();
         return $data = $stmt->fetch(PDO::FETCH_ASSOC);

    }

    public function execute($sql)
    {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
       return $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function isExist($query)
    {
        if ($query != null) {
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $this->resultQuery = $stmt->rowCount();
        }
        if ($this->resultQuery < 1) {
            return false;
        }
        return true;
    }
}

?>