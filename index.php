<?php
/**
 * @author Shayna Jamieson
 * @version 1.0
 * URL: http://sjamieson.greenriverdev.com/328/dating/index.php
 * Date: January 16, 2020
 * Last Modified: January 26, 2020
 * Description: This file serves to define a default route. When a user navigates to
 * the route of our directory they will be taken to the view that we have defined as views/home.html
 */

// start a session - ONLY ever need to put this in our controller (all other pages get by transference)
session_start();

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

require("vendor/autoload.php");
require_once("models/validation.php");
require_once("models/error-display.js");

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
    $_SESSION['first'] = $_POST['first-name'];
    $_SESSION['last'] = $_POST['last-name'];
    $_SESSION['age'] = $_POST['age'];
    $_SESSION['gender'] = $_POST['gender'];
    $_SESSION['phone'] = $_POST['phone'];

    $view = new Template();
    echo $view->render('views/profile.html');
});

// define a route that will take the user to the third screen of create a profile
// this will be the user profile page for interests
$f3->route('POST /interests', function() {
    // save user information in our session
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['state'] = $_POST['state'];
    $_SESSION['seeking'] = $_POST['seeking'];
    $_SESSION['bio'] = $_POST['bio'];

    $view = new Template();
    echo $view->render('views/interests.html');
});

// define a route that will take the user to the summary screen of create a profile
// this page will display the users form fields that were filled out
$f3->route('POST /summary', function() {
    // loop through our interests POST arrays to make an interests String
    $interests = "";

    if(is_array($_POST['interests'])) {
        foreach($_POST['interests'] as $value) {
            $interests .= $value . " ";
        }
    }

    // save all interests in our session to be displayed in summary
    $_SESSION['interests'] = $interests;

    $view = new Template();
    echo $view->render('views/summary.html');
});

// fun Fat-Free
$f3->run();
