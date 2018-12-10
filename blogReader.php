<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/JSON; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

include_once 'database.php';
include_once 'blog.php';
 
$database = new Database();
$db = $database->getConnection(); 
$blog = new Blog($db);

if ( isset($_GET['id']) )
{
	$blog->id = $_GET['id'];
	$blog->readSimple();	
 
	if($blog->name!=null)
	{ 
		$blogArr = array(
			"id" =>  $blog->id,
			"blogName" => $blog->name,
			"blogDescription" => $blog->description,
			"authorID" => $blog->authorID         
    );		
     
		http_response_code(200); 
		echo json_encode($blogArr);
	} 
	else
	{    
		http_response_code(404);
		echo json_encode(array("message" => "Blog does not exist."));
	}	
}
else
{
	$comm = $blog->read();
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
			array("message" => "No blogs found!")
		);
	}		
}
 





