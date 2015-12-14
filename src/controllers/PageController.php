<?php
namespace Acme\Controllers;
use Acme\models\Page;

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

    public function getShowPage()
    {
        $browser_title = "";
        $page_content  = "";
        $page_id = 0;
        //echo "About";
        //extract page name form urldecode

        $uri = explode('/', $_SERVER['REQUEST_URI']);
        $target = $uri[1];
        //find matching in database

        $page = Page::where('slug', '=', $target)->get();
        //dd($page);

        //look up page content
        foreach ($page as $item)
        {
            $browser_title = $item->browser_title;
            $page_content  = $item->page_content;
            $page_id = $item->id;
        }

        if (strlen($browser_title) == 0)
        {
            //echo "hej";
            header("HTTP/1.0 Not Found");
            header("Location: /page-not-found");
            exit();
        }
        //pass content to some blade template
        //render template

        echo $this->blade->render('generic-page', [
          'browser_title' => $browser_title,
          'page_content'  => $page_content,
          'page_id' => $page_id,
        ]);
    }
    /*
    public function getShow404()
    {
          echo $this->blade->render('page-not-found');
    }
    */
    /*
    public function getSuccessPage()
    {
          echo $this->blade->render('success');
          //echo "success";
    }
    */
}

 ?>
