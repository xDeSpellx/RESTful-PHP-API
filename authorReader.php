<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/JSON; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

include_once 'database.php';
include_once 'author.php';
 
$database = new Database();
$db = $database->getConnection(); 
$author = new Author($db);

if ( isset($_GET['id']) )
{
	$author->id = $_GET['id'];
	$author->readSimple();	
 
	if($author->name!=null)
	{ 
		$authorArr = array(
			"id" =>  $author->id,
			"name" => $author->name,			
    );		
     
		http_response_code(200); 
		echo json_encode($authorArr);
	} 
	else
	{    
		http_response_code(404);
		echo json_encode(array("message" => "Author does not exist."));
	}	
}
else
{
	$comm = $author->read();
	$rows = $comm->rowCount();
 
	if($rows>0)
	{ 
		$response=array();
    
    
		while ($row = $comm->fetch(PDO::FETCH_ASSOC))
		{        
			$response[] = $row;          	    
		}
     
		http_response_code(200); 
		echo json_encode($response);
	}
	else
	{    
		http_response_code(404);    
    
		echo json_encode
		(
			array("message" => "No authors found!")
		);
	}		
}
 





