<?php
class Blog
{     
    private $conn;
    private $table_name = "blog";
 
    public $id;
    public $name;
    public $description;
    public $authorID;
        
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
		" WHERE blogID = ? LIMIT 0,1";
		
		$comm = $this->conn->prepare( $query ); 
		$comm->bindParam(1, $this->id);    
		$comm->execute();    
		$row = $comm->fetch(PDO::FETCH_ASSOC);        	
		
		$this->name = $row['blogName'];
		$this->description = $row['blogDescription'];	
		$this->authorID = $row['authorID'];    
	}

	function create()
	{
     
		$query = "INSERT INTO " . $this->table_name . 
		" SET blogName=:name, blogDescription=:description, authorID=:authorID";
		
		$comm = $this->conn->prepare($query);
     
		$this->name=htmlspecialchars(strip_tags($this->name));
		$this->description=htmlspecialchars(strip_tags($this->description));
		$this->authorID=htmlspecialchars(strip_tags($this->authorID));		
 		
		$comm->bindParam(":name", $this->name);
		$comm->bindParam(":description", $this->description);
		$comm->bindParam(":authorID", $this->authorID);		
     
		if($comm->execute())
		{
			return true;
		}
		
		return false;     
	}
		
	function update()
	{    
		$query = "UPDATE " . $this->table_name . "
		SET blogName = :name, blogDescription = :description, authorID = :authorID
		WHERE blogID = :id";
		     		
		$comm = $this->conn->prepare($query);
  
		$this->id=htmlspecialchars(strip_tags($this->id));
		$this->name=htmlspecialchars(strip_tags($this->name));
		$this->description=htmlspecialchars(strip_tags($this->description));
		$this->authorID=htmlspecialchars(strip_tags($this->authorID));		
	
	
		$comm->bindParam(':id', $this->id);
		$comm->bindParam(':name', $this->name);
		$comm->bindParam(':description', $this->description);
		$comm->bindParam(':authorID', $this->authorID);			
		
		if($comm->execute())
		{
			return true;
		}
 
		return false;
	}
	
	function delete()
	{		
		$query = "DELETE FROM " . $this->table_name . " WHERE blogID = ?";	
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
