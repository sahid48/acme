<?php
namespace Acme\Controllers;

//use Acme\Validation\Validator;
use duncan3dc\Laravel\BladeInstance;
/**
 *
 */
class BaseController
{
    /*
    //use for twig
    //start
    protected $loader;
    protected $twig;

    public function __construct()
    {
        $this->loader = new \Twig_Loader_Filesystem(__DIR__ ."/../../views");
        $this->twig = new \Twig_Environment($this->loader, [
          'cache' => false, 'debug' => true
        ]);
    }


    //end
    */

    //now we are using laravel blade package

    protected $blade;

    public function __construct()
    {
        $this->blade = new BladeInstance("/vagrant/views", "/vagrant/cache/views");
    }
}

 ?>
