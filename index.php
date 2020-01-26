<?php
/**
 * @author Shayna Jamieson
 * @version 1.0
 * URL: http://sjamieson.greenriverdev.com/328/dating/index.php
 * Date: January 16, 2020
 * Description: This file serves to define a default route. When a user navigates to
 * the route of our directory they will be taken to the view that we have defined as views/home.html
 */

// start a session - ONLY ever need to put this in our controller (all other pages get by transference)
session_start();

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

require("vendor/autoload.php");

// instantiate F3
$f3 = Base::instance(); // invoke static

// define a default route
// when the user navigates to the route directory of the project
// this is what they should see
$f3->route('GET /', function() {
    // create a new view object by instantiating the fat-free templating class
    $view = new Template();

    // on the object template we render the home page through this route
    echo $view->render('views/home.html');
});

// crete a route for the navigation bar to return the user to the home page
$f3->route('GET /home', function() {
    // create a new view object by instantiating the fat-free templating class
    $view = new Template();

    // on the object template we render the home page through this route
    echo $view->render('views/home.html');
});

// define a route that will take the user to the create a profile form
// this will be the first screen the user sees after they click 'create a profile'
$f3->route('GET /personal-information', function() {
    $view = new Template();
    echo $view->render('views/personal-information.html');
});

// define a route that will take the user to the second screen of create a profile
// this will be the user profile page for email, state, seeking, and a biography.
$f3->route('POST /profile', function() {
    // save user information in our session
    $_SESSION['first-name'] = $_POST['first-name'];
    $_SESSION['last-name'] = $_POST['last-name'];
    $_SESSION['age'] = $_POST['age'];
    $_SESSION['gender'] = $_POST['gender'];
    $_SESSION['phone'] = $_POST['phone'];

    $view = new Template();
    echo $view->render('views/profile.html');
});

// fun Fat-Free
$f3->run();
