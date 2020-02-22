<?php
/**
 * @author Shayna Jamieson
 * @version 1.0
 * URL: http://sjamieson.greenriverdev.com/328/dating/index.php
 * Date: January 16, 2020
 * Last Modified: February 21, 2020
 * Description: This file serves to define a default route. When a user navigates to
 * the route of our directory they will be taken to the view that we have defined as views/home.html
 */

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

require("vendor/autoload.php");

// start a session - ONLY ever need to put this in our controller (all other pages get by transference)
session_start();

// instantiate F3
$f3 = Base::instance(); // invoke static

// create our member controller class object
$controller = new MemberController($f3);

// define a default route
// when the user navigates to the route directory of the project
// this is what they should see
$f3->route('GET /', function() {
    $GLOBALS['controller']->home();
});

// keep track of form 1s valid state on POST
$validForm1 = true;

// define a route that will take the user to the create a profile form
// this will be the first screen the user sees after they click 'create a profile'
$f3->route('GET|POST /personal-information', function($validForm1) {
    $GLOBALS['controller']->personalInformation($validForm1);
});

// keep track of valid form 2 on POST
$validForm2 = true;

// define a route that will take the user to the second screen of create a profile
// this will be the user profile page for email, state, seeking, and a biography.
$f3->route('GET|POST /profile', function($validForm2) {
    $GLOBALS['controller']->profile($validForm2);
});

// valid interests array
$validInterests = array("tv", "puzzles", "movies", "reading", "cooking", "playing cards", "board games",
    "video games", "hiking", "walking", "biking", "climbing", "swimming", "collecting");

// keep track of valid form 3 on POST
$validForm3 = true;

// define a route that will take the user to the third screen of create a profile
// this will be the user profile page for interests
$f3->route('GET|POST /interests', function($validForm3) {
    $GLOBALS['controller']->interests($validForm3);
});

// define a route that will take the user to the summary screen of create a profile
// this page will display the users form fields that were filled out
$f3->route('GET|POST /summary', function() {
    $GLOBALS['controller']->summary();
});

// fun Fat-Free
$f3->run();
