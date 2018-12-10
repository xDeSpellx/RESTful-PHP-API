<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once 'database.php'; 
include_once 'blog.php';
 
$database = new Database();
$db = $database->getConnection();
 
$blog = new Blog($db);
$data = json_decode(file_get_contents("php://input"));
 
if(!empty($data->name) && !empty($data->description) && !empty($data->authorID))
{    
    $blog->name = $data->name;
    $blog->description = $data->description;
    $blog->authorID = $data->authorID;
   
    if($blog->create())
	{     
        http_response_code(201);
        echo json_encode(array("message" => "Blog was created."));
    }
     
    else
	{        
        http_response_code(503);     
        echo json_encode(array("message" => "Unable to create blog."));
    }
} 
else
{
    http_response_code(400); 
    echo json_encode(array("message" => "Unable to create blog. Data is incomplete."));
}
