<?php
namespace Acme\Validation;
use Respect\Validation\Validator as Valid;

/**
 *
 */
class Validator
{
  public function isValid($validation_data)
  {
      $errors = [];

      foreach ($validation_data as $name => $value)
      {   //echo $name." ";
          //if (isset($_REQUEST[$name]) && !empty($_REQUEST[$name]))
          if ($name == "verify_emails") {
            //echo "verify email found";
            $name = "verify_email";
          }
          if ($name == "verify_passwords") {
            //echo "verify password found";
            $name = "verify_password";
          }
          if ($name == "emails") {
            //echo "verify password found";
            $name = "email";
          }

            $exploded = explode(":", $value);
            //echo $exploded[0]."<br>";
            switch ($exploded[0])
            {
              case 'min':
                $min = $exploded[1];
                if(valid::alpha()->length($min)->validate($_REQUEST[$name]) == false)
                {
                    $errors[] = "$name must be at least $min Characters Long!";
                }
                break;
              case 'email':
              //echo "irum";
                if(valid::email()->validate($_REQUEST[$name]) == false)
                {
                  $errors[] = "You must enter a valid Email address";
                }
                break;
              case 'alnum':
              //echo "irum";
                if(valid::alnum()->length(4)->validate($_REQUEST[$name]) == false)
                {
                  $errors[] = "Password must be at least 4 Characters Long";
                }
                break;
              case 'equalTo':
                if(valid::equals($_REQUEST[$name])->validate($_REQUEST[$exploded[1]]) == false)
                {
                  $errors[] = "Values does not match verification value!";
                }
                break;
              case 'unique':
              //echo "unique";
                $model = "Acme\\models\\" . $exploded[1];
                $table = new $model;
                //dd($name);
                $results = $table::where($name, '=', $_REQUEST[$name])->first();
                //dd($results);
                if ($results != null)
                {
                    $errors[] = $_REQUEST[$name]. " already exist in this system!";
                }
                break;
              default:
                $errors[] = "No Values Found!";
                break;
            }

      }
      return $errors;
  }
}

/*
//only checking the data
$errors = [];
//if(validator::not(v::intVal())->validate($_REQUEST['first_name']) == false)
//if(validator::alpha()->noWhitespace()->length(3, 10)->validate($_REQUEST['first_name']) == false)
//if(validator::string()->length(3)->validate($_REQUEST['first_name']) == false)
if(validator::alpha()->notEmpty()->length(3, 10)->validate($_REQUEST['first_name']) == false)
{
  $errors[] = "First Name must be at least Three Characters Long and Not a white Space";
}
if(validator::alpha()->notEmpty()->length(3, 10)->validate($_REQUEST['last_name']) == false)
{
  $errors[] = "Last Name must be at least Three Characters Long and Not a white Space";
}
if(validator::email()->validate($_REQUEST['email']) == false)
{
  $errors[] = "You must enter a valid Email address";
}
if(validator::identical($_REQUEST['email'])->validate($_REQUEST['verify_email']) == false)
{
  $errors[] = "You must enter a same Email address";
}
if(validator::alnum()->length(8, 10)->validate($_REQUEST['password']) == false)
{
  $errors[] = "Password must be at least eight Characters Long";
}
//identical and equals are behave on same way
if(validator::equlas($_REQUEST['password'])->validate($_REQUEST['verify_password']) == false)
{
  $errors[] = "You must enter a same password";
}
print_r($errors);
exit();
*/



 ?>
