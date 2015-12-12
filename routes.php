<?php

$router->map('GET', '/', 'Acme\Controllers\PageController@getShowHomePage', 'home');

$router->map('GET', '/register', 'Acme\Controllers\RegisterController@getShowRegisterPage', 'register');

$router->map('POST', '/register', 'Acme\Controllers\RegisterController@postShowRegisterPage', 'register_post');

$router->map('GET', '/login', 'Acme\Controllers\RegisterController@getLogInPage', 'login');

$router->map('GET', '/testdb', 'Acme\Controllers\RegisterController@getTestDB', 'testdb');

$router->map('GET', '/about', 'Acme\Controllers\PageController@getShowPage', 'generic_page');


 ?>
