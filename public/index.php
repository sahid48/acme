<?php

$controller = null;
$method = null;

include(__DIR__. "/../bootstrap/start.php");

//this file type use for password like trader_cdlshootingstar
//in mac and unix world we Cannot see . file type
//. file type is hidden
Dotenv::load(__DIR__ ."/../");
include(__DIR__. "/../bootstrap/db.php");

//echo "index page";
/*
//get url where user want to going
//GRAB THE url
$url = $_SERVER['REQUEST_URI'];
//echo $url."<br>";

//take a string, split it and convert to array
$url = explode('/',$_SERVER['REQUEST_URI']);
//var_dump($url);


//its working, but its not good practise, what if we have 150 pages
if($url[1] == "")
{
  //display a home Page
  include(__DIR__. "/../views/index.html");
  exit();
}
elseif($url[1] == "register")
{
  //display a home Page
  include(__DIR__. "/../views/register.php");
  exit();
}
elseif($url[1] == "doRegister")
{
  //display a home Page
  include(__DIR__. "/../views/doRegister.php");
  exit();
}

//and so on
*/


/*
//route to our application
//what kind of request coming
//where to go, is point to index page
//use closure or anonymous function
$router->map('GET', '/', function(){
  include(__DIR__. "/../views/index.html");
  //exit();
});

$router->map('GET', '/register', function(){
  include(__DIR__. "/../views/register.php");
  //exit();
});

$router->map('POST', '/register', function(){
  include(__DIR__. "/../views/register.php");
  //exit();
});

$router->map('GET', '/doRegister', function(){
  include(__DIR__. "/../views/doRegister.php");
  //exit();
});

$match = $router->match();

if ($match && is_callable($match['target']))
{
    call_user_func_array($match['target'], $match['params']);
}
else
{
    header($_SERVER['SERVER_PROTOCOL'] . '404 Not Found');
}
*/

include(__DIR__. "/../routes.php ");

//return array
$match = $router->match();

//dd($match);

//var_dump($match);
//var_dump($match['target']);     //controller
//var_dump($match['params']);     //method
//echo $_SERVER['SERVER_PROTOCOL'];
//var_dump(http_response_code());

//takes the Value from array and in one step assign those values to variables
//http://www.w3schools.com/php/func_array_list.asp

if (is_string($match['target']))
{
  list($controller, $method) = explode("@", $match['target']);
}

//this one is use for with methods
if (($controller != null) && (is_callable(array($controller, $method))))
{
    //create a new instance of a class, in this case
    //class name is PageController
    $object = new $controller();
    call_user_func_array(array($object, $method), array($match['params']));
}

//this one is use for closure
elseif ($match && is_callable($match['target']))
{
    call_user_func_array($match['target'], $match['params']);
}
else
{
    echo "Cannot find $controller -> $method";
    exit();
}



 ?>
