<?php

$router->map('GET', '/', 'Acme\Controllers\PageController@getShowHomePage', 'home');

$router->map('GET', '/register', 'Acme\Controllers\RegisterController@getShowRegisterPage', 'register');

$router->map('POST', '/register', 'Acme\Controllers\RegisterController@postShowRegisterPage', 'register_post');

$router->map('GET', '/login', 'Acme\Controllers\AuthenticationController@getLogInPage', 'login');

$router->map('POST', '/login', 'Acme\Controllers\AuthenticationController@postShowLoginPage', 'login_post');

$router->map('GET', '/logout', 'Acme\Controllers\AuthenticationController@getLogOutPage', 'logout');

//$router->map('GET', '/success', 'Acme\Controllers\PageController@getSuccessPage', 'success');

$router->map('GET', '/testdb', 'Acme\Controllers\RegisterController@getTestDB', 'testdb');

//$router->map('GET', '/page-not-found', 'Acme\Controllers\PageController@getShow404', '404');

$router->map('GET', '/verify-account', 'Acme\Controllers\RegisterController@getVerifyAccount', 'verify_account');

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


//Testimonail routes

$router->map('GET', '/testimonials', 'Acme\Controllers\TestimonialController@getShowTestimonials', 'testimonials');
//logged in user routes

if(Acme\Auth\LoggedIn::user()) {
$router->map('GET', '/add-testimonial', 'Acme\Controllers\TestimonialController@getShowAdd', 'add-testimonial');

$router->map('POST', '/add-testimonial', 'Acme\Controllers\TestimonialController@postShowAdd', 'add-testimonial_post');
}


// admin routes
if ((Acme\auth\LoggedIn::user()) && (Acme\auth\LoggedIn::user()->access_level == 2)) {
    $router->map('POST', '/admin/page/edit', 'Acme\controllers\AdminController@postSavePage', 'save_page');
    $router->map('GET', '/admin/page/add', 'Acme\controllers\AdminController@getAddPage', 'add_page');
}

$router->map('GET', '/[*]', 'Acme\Controllers\PageController@getShowPage', 'generic_page');

 ?>
