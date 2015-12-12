<?php
namespace Acme\Controllers;
use duncan3dc\Laravel\BladeInstance;


/**
 *
 */
class PageController extends BaseController
{
    public function getShowHomePage()
    {
        //include(__DIR__. "/../../views/index.html");
        //this is twig
        //echo $this->twig->render('index.html');

        //use blade
        //$_SESSION['test'] = "<strong>I Hope This Work!</strong>";
        //echo $this->blade->render("home", ['test' => 'Hello, again.']);
        echo $this->blade->render("home");

        /*
          how we can access this on home.blade.php
          Hello World from blade <br>

          {{ $test }} <br>

          {!! $_SESSION['test'] !!}

        */

    }
}

 ?>
