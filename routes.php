<?php

$router->map('GET', '/', 'Acme\Controllers\PageController@getShowHomePage', 'home');

$router->map('GET', '/register', 'Acme\Controllers\RegisterController@getShowRegisterPage', 'register');

$router->map('POST', '/register', 'Acme\Controllers\RegisterController@postShowRegisterPage', 'register_post');

$router->map('GET', '/login', 'Acme\Controllers\AuthenticationController@getLogInPage', 'login');

$router->map('POST', '/login', 'Acme\Controllers\AuthenticationController@postShowLoginPage', 'login_post');

$router->map('GET', '/logout', 'Acme\Controllers\AuthenticationController@getLogOutPage', 'logout');

$router->map('GET', '/success', 'Acme\Controllers\PageController@getSuccessPage', 'success');

$router->map('GET', '/testdb', 'Acme\Controllers\RegisterController@getTestDB', 'testdb');

$router->map('GET', '/page-not-found', 'Acme\Controllers\PageController@getShow404', '404');

/*
$router->map('GET', '/test', function(){

    //do the same thing in one line
    //$user = Acme\models\User::find(1);
    //$testimonials = $user->testimonials()->get();

    //$testimonials = Acme\models\User::find(1)->testimonials()->get();
    //dd($testimonials);
    //$testimonials = Acme\models\Testimonial::find(1);
    //dd($testimonials);


    //test slug


    $slugify = new Cocur\Slugify\Slugify();

    //change all to lower case, and blank space to dashes
    echo $slugify->slugify('Hello World!'); // hello-world
});
*/

$router->map('GET', '/[*]', 'Acme\Controllers\PageController@getShowPage', 'generic_page');


 ?>
