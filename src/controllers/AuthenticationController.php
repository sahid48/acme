<?php
namespace Acme\Controllers;

use Acme\Validation\Validator;
use Acme\Models\User;
use duncan3dc\Laravel\BladeInstance;
use Acme\auth\LoggedIn;

/**
 *
 */
class AuthenticationController extends BaseController
{
    public function getLogInPage()
    {
        //include(__DIR__. "/../../views/login.html");
        //echo $this->twig->render('login.html');

        //use blade
        echo $this->blade->render("login", [
          'signer' => $this->signer
        ]);
    }


    public function postShowLoginPage()
    {
        //for csrf
        if (!$this->signer->validateSignature($_POST['_token'])) {
            header('HTTP/1.0 400 Bad Request');
            exit;
        }
        //echo "posted";
        $okay = true;
        $email = $_REQUEST['email'];
        $pass  = $_REQUEST['password'];

        $user = User::where('email', '=', $email)->first();

        if ($user != null)
        {
            //validate password
            if (! password_verify($pass, $user->password))
            {
                $okay = false;
            }
        }
        else
        {
            $okay = false;
        }

        if ($user->active == 0)
        {
            $okay = false;
        }

        if ($okay)
        {
            $_SESSION['user'] = $user;
            header("Location: /");
            exit();
            //dd(LoggedIn::user());
        }
        else
        {
            $_SESSION['msg'] = ["Invalid Login"];
            //echo $this->blade->render('login');
            echo $this->blade->render("login", [
              'signer' => $this->signer
            ]);
            unset($_SESSION['msg']);
            exit();
        }
    }

    public function getLogOutPage()
    {
        unset($_SESSION['user']);
        session_destroy();
        header("Location: /login");
        exit();
    }
}

 ?>
