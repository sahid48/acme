<?php
namespace Acme\Controllers;

use Acme\Validation\Validator;
use Acme\Models\User;
use duncan3dc\Laravel\BladeInstance;
use Acme\email\SendEmail;
use Acme\Models\UserPending;

class RegisterController extends BaseController
{
    public function getShowRegisterPage()
    {
        //include(__DIR__. "/../../views/register.html");
        //echo $this->twig->render('register.html');

        //use blade
        echo $this->blade->render("register", [
          'signer' => $this->signer
        ]);
    }

    public function postShowRegisterPage()
    {
      //for csrf
      if (!$this->signer->validateSignature($_POST['_token'])) {
          header('HTTP/1.0 400 Bad Request');
          exit;
      }
      
        $validation_data = [
            "first_name" => "min:3",
            "last_name"  => "min:3",
            "email"      => "email",
            "verify_email"       => "email",
            "password"    => "alnum",
            "verify_password"    => "alnum",
            "emails"            => "unique:User",
            "verify_emails"       => "equalTo:email",
            "verify_passwords"    => "equalTo:password",
        ];
        //include(__DIR__. "/../views/register.php");
        //validate data

        $validator = new Validator();
        $errors = $validator->isValid($validation_data);
        //print_r($errors);

        /*
        $hash = password_hash("rasmuslerdorf", PASSWORD_DEFAULT);

        if (password_verify('rasmuslerdorf', $hash)) {
            echo 'Password is valid!';
        } else {
            echo 'Invalid password.';
        }
        */
        //exit();
        /*
        if ($Validator->isValid($validation_data))
        {

        }

        else die("Data not Valid");
        */
        //if validate fils the go back to register page
        //and display error messages

        if (sizeof($errors) > 0)
        {
            $_SESSION['msg'] = $errors;
            //header("Location: /register");

            //use twig
            //echo $this->twig->render('register.html', ['errors' => $errors]);

            //use blade

            echo $this->blade->render("register", [
              'signer' => $this->signer
            ]);
            unset($_SESSION['msg']);
            exit();
        }

        //if validate pass then go to save data in database
        /*   */
        $user = new User;
        //echo $_REQUEST['first_name'];
        $user->first_name = $_REQUEST['first_name'];
        $user->last_name  = $_REQUEST['last_name'];
        $user->email      = $_REQUEST['email'];
        $user->password   = password_hash($_REQUEST['password'], PASSWORD_DEFAULT);     //its different then laravel
        $user->save();

        //create a token to send a email

        $token = md5(uniqid(rand(), true)).md5(uniqid(rand(), true));

        $users_pending = new UserPending();
        $users_pending->token = $token;
        $users_pending->user_id = $user->id;
        $users_pending->save();

        //if user successfully registered then send a Email to him /her
        $message = $this->blade->render('emails.welcome-email', ['token' => $token]);
        $sendEmail = SendEmail::sendEmail($user->email, "Welcome to Acme", $message);

        header("Location: /success");
        exit();
        /*
        $_SESSION['success_msg'] = "You have been successfully Created";
        header("Location: /");
        exit();
        */
    }

    public function getLogInPage()
    {
        //include(__DIR__. "/../../views/login.html");
        //echo $this->twig->render('login.html');

        //use blade
        echo $this->blade->render("login");
    }

    //test method
    public function getTestDB()
    {
        $user = User::find(1);
        echo $user->last_name."<br>";
        echo $user->first_name."<br>";
    }

    public function getVerifyAccount()
    {
        $user_id = 0;
        $token = $_REQUEST['token'];

        //look up the token
        $users_pending = UserPending::where('token', '=', $token)->first();
        if ($users_pending != null)
        {
            //echo $this->blade->render("verify-account");
            $user_id = $users_pending->user_id;

            $user = User::find($user_id);
            $user->active     = 1;
            $user->save();

            //delete token from table
            UserPending::where('token', '=', $token)->delete();

            header("Location: /account-activated");
            exit();
        }
        else
        {
          header("Location: /page-not-found");
          exit();
        }

        //echo $this->blade->render("verify-account");
    }
}

 ?>
