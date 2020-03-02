<?php
/**
 * @author Shayna Jamieson
 * @version 1.0
 * URL: http://sjamieson.greenriverdev.com/328/dating/index.php
 * Date: January 16, 2020
 * Last Modified: February 21, 2020
 * Description: This file serves to define routes for this project. We are also able
 * to set error reporting as well as require the autoload.php. Requiring the autoload file
 * allows classes, validation, and the controller to process and display requests.
 */

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

require("vendor/autoload.php");

// start a session - ONLY ever need to put this in our controller (all other pages get by transference)
session_start();

// instantiate F3
$f3 = Base::instance(); // invoke static
$f3->set('DEBUG', 3);

$db = new Database(); // instantiate a new database -- NEED TO CREATE THIS CLASSES
// create our member controller class object
$controller = new MemberController($f3);

// define a default route
$f3->route('GET /', function() {
    $GLOBALS['controller']->home();
});

// keep track of form 1s valid state on POST
$validForm1 = true;
// define a route to the personal information form view.
$f3->route('GET|POST /personal-information', function($validForm1) {
    $GLOBALS['controller']->personalInformation($validForm1);
});

// keep track of valid form 2 on POST
$validForm2 = true;
// define a route to the profile information view.
$f3->route('GET|POST /profile', function($validForm2) {
    $GLOBALS['controller']->profile($validForm2);
});

// valid interests array
$validInterests = array("tv", "puzzles", "movies", "reading", "cooking", "playing cards", "board games",
    "video games", "hiking", "walking", "biking", "climbing", "swimming", "collecting");

// keep track of valid form 3 on POST
$validForm3 = true;
// define a route to the interests information form view.
$f3->route('GET|POST /interests', function($validForm3) {
    $GLOBALS['controller']->interests($validForm3);
});

// define a route to the summary display view.
$f3->route('GET|POST /summary', function() {
    $GLOBALS['controller']->summary();
});

// run Fat-Free
$f3->run();
