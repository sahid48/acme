<?php
namespace Acme\Controllers;

//use Acme\Validation\Validator;
use duncan3dc\Laravel\BladeInstance;
use Kunststube\CSRFP\SignatureGenerator;

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

    //for csrf
    protected $signer;

    public function __construct()
    {
        //for csrf
        $this->signer = new SignatureGenerator(getenv('CSRF_SECRET'));

        //for bloade
        $this->blade = new BladeInstance("/vagrant/views", "/vagrant/cache/views");

    }
}

 ?>
