<?php
class Author
{     
    private $conn;
    private $table_name = "author";
 
    public $id;
    public $name;    
        
    public function __construct($db)
	{
        $this->conn = $db;
    }
		
	function read()
	{    
		$query = "SELECT * FROM " . $this->table_name;     
		$comm = $this->conn->prepare($query); 
		$comm->execute();
 
		return $comm;
	}
	
	function readSimple()
	{			 		
		$query = "SELECT * FROM " . $this->table_name . 
		" WHERE authorID = ? LIMIT 0,1";
		
		$comm = $this->conn->prepare( $query ); 
		$comm->bindParam(1, $this->id);    
		$comm->execute();    
		$row = $comm->fetch(PDO::FETCH_ASSOC);        	
		
		$this->name = $row['authorName'];		
	}
	
	function create()
	{
     
		$query = "INSERT INTO " . $this->table_name . 
		" SET authorName=:name";
		
		$comm = $this->conn->prepare($query);
     
		$this->name=htmlspecialchars(strip_tags($this->name));
		 		
		$comm->bindParam(":name", $this->name);
     
		if($comm->execute())
		{
			return true;
		}
		
		return false;     
	}
	
	function update()
	{    
		$query = "UPDATE " . $this->table_name . "
		SET authorName = :name
		WHERE authorID = :id";
		     		
		$comm = $this->conn->prepare($query);
  
		$this->id=htmlspecialchars(strip_tags($this->id));
		$this->name=htmlspecialchars(strip_tags($this->name));
		
		$comm->bindParam(':id', $this->id);
		$comm->bindParam(':name', $this->name);
		
		if($comm->execute())
		{
			return true;
		}
 
		return false;
	}
	
	function delete()
	{		
		$query = "DELETE FROM " . $this->table_name . " WHERE authorID = ?";	
		$comm = $this->conn->prepare($query);
		$this->id=htmlspecialchars(strip_tags($this->id));		
		$comm->bindParam(1, $this->id);
 
		if($comm->execute())
		{
			return true;
		}
 
		return false;
     
	}
}