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
require("models/validation.php");

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

// keep track of form 1s valid state on POST
$validForm1 = true;

// define a route that will take the user to the create a profile form
// this will be the first screen the user sees after they click 'create a profile'
$f3->route('GET|POST /personal-information', function($f3, $validForm1) {
    // if we are checking our data from post
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // validate for first name
        $first = $_POST['fName'];
        $f3->set('fName', $first);
        if(validFirstName($first)) {
            $_SESSION['first-Name'] = $first;
        } else {
            $f3->set("errors['first-name']","invalid first name");
            $validForm1 = false;
        }

        // validate for last name
        $last = $_POST['last-name'];
        $f3->set('lName', $last);
        if(validLastName($last)) {
            $_SESSION['last-Name'] = $last;
        } else {
            $f3->set("errors['last-name']","invalid last name");
            $validForm1 = false;
        }

        // validate for age
        $age = $_POST['age'];
        $f3->set('userAge', $age);
        if(validAge($age)) {
            $_SESSION['userAge'] = $age;
        } else {
            $f3->set("errors['age']","invalid age");
            $validForm1 = false;
        }

        // validate for phone
        $phone = $_POST['phone'];
        $f3->set('userPhone', $phone);
        if(validPhone($phone)) {
            $_SESSION['userPhone'] = $phone;
        } else {
            $f3->set("errors['phone']","invalid phone number");
            $validForm1 = false;
        }

        // set non-required attributes
        $gender = $_POST['gender'];
        $f3->set('userGender', $gender);
        $_SESSION['userGender'] = $gender;

        // ALL REQUIRED FORM FIELDS ARE VALID
        if($validForm1) {
            $f3->reroute('/profile');
        }
    }
    $view = new Template();
    echo $view->render('views/personal-information.php');
});

// keep track of valid form 2 on POST
$validForm2 = true;

// define a route that will take the user to the second screen of create a profile
// this will be the user profile page for email, state, seeking, and a biography.
$f3->route('GET|POST /profile', function($f3, $validForm2) {
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // validate email
        $email = $_POST['email'];
        $f3->set('userEmail', $email);
        if(validEmail($email)) {
            $_SESSION['user-email'] = $email;
        } else {
            $f3->set("errors['email']","invalid email address");
            $validForm2 = false;
        }

        // set non-required attributes
        $state = $_POST['state'];
        $f3->set('userState', $state);
        $_SESSION['userState'] = $state;

        $seeking = $_POST['seeking'];
        $f3->set('userSeeking', $seeking);
        $_SESSION['userSeeking'] = $seeking;

        $bio = $_POST['bio'];
        $f3->set('userBio', $bio);
        $_SESSION['userBio'] = $bio;

        // ALL REQUIRED FORM FIELDS ARE VALID
        if($validForm2) {
            $f3->reroute('/interests');
        }
    }

    $view = new Template();
    echo $view->render('views/profile.html');
});

// valid interests array
$validInterests = array("tv", "puzzles", "movies", "reading", "cooking", "playing cards", "board games",
    "video games", "hiking", "walking", "biking", "climbing", "swimming", "collecting");

// keep track of valid form 3 on POST
$validForm3 = true;

// define a route that will take the user to the third screen of create a profile
// this will be the user profile page for interests
$f3->route('GET|POST /interests', function($f3, $validForm3) {
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // validate interests
        $interests = $_POST['interests'];
        $interestsText = "";

        if(validInterests($interests)) {
            if(is_array($_POST['interests'])) {
                foreach($_POST['interests'] as $value) {
                    $interestsText .= $value . " ";
                }
            }

            $f3->set('userInterests', $interestsText);
            $_SESSION['userInterests'] = $interestsText;
        } else {
            $f3->set("errors['interests']","invalid interests");
            $validForm3 = false;
        }
        // ALL REQUIRED FORM FIELDS ARE VALID
        if($validForm3) {
            $f3->reroute('/summary');
        }
    }
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
