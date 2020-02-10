<?php
/*
@author Shayna Jamieson
@version 1.0
URL: http://sjamieson.greenriverdev.com/328/dating/model/validation.php
Created: January 25, 2020
Last Modified: February 09, 2020
Description: This file will serve to validate user input in the form. We will
be validating the name, age, phone, email, and interests user selections. If the
user inputs an invalid input then we want to display an inline error message. Here we are
checking if the specific field being validated has been called via AJAX. We return true or
false depending on if valid and the javascript file takes care of the inline validation.
 */

/* Validate first name
 *
 * @param String name
 * @return boolean
 */
// inline validation with AJAX
if(isset($_POST['firstName'])) {
    $tempName = $_POST['firstName'];
    // check for empty field or non-alphabetic
    $isValid = !ctype_space($tempName) && !empty($tempName) && ctype_alpha($tempName);

    echo json_encode($isValid);
}

// index.php validation on POST
function validFirstName($name) {
    // check for empty field or non-alphabetic
    return !ctype_space($name) && !empty($name) && ctype_alpha($name);
}

/* Validate last name
 *
 * @param String name
 * @return boolean
 */
// inline validation with AJAX
if(isset($_POST['lastName'])) {
    $tempName = $_POST['lastName'];
    // check for empty field or non-alphabetic
    $isValid = !ctype_space($tempName) && !empty($tempName) && ctype_alpha($tempName);

    $_SESSION['validLastName'] = $isValid;
    echo json_encode($isValid);
}

// index.php validation on POST
function validLastName($name) {
    // check for empty field or non-alphabetic
    return !ctype_space($name) && !empty($name) && ctype_alpha($name);
}

/* Validate age
 *
 * @param String age
 * @return boolean
 */
// inline validation with AJAX
if(isset($_POST['userAge'])) {
    $tempAge = $_POST['userAge'];

    // check for empty field, number type, and correct age range
    $isValid = !empty($tempAge) && ctype_digit($tempAge) && ((int)$tempAge >= 18 && (int)$tempAge <= 118);

    echo json_encode($isValid);
}

// index.php validation on POST
function validAge($age) {
    // check for empty field, number type, and correct age range
    return !empty($age) && ctype_digit($age) && ((int)$age >= 18 && (int)$age <= 118);
}


/* Validate phone
 *
 * @param String phone
 * @return boolean
 */
// inline validation with AJAX
if(isset($_POST['userPhone'])) {
    $tempPhone = $_POST['userPhone'];

    // check for empty string, number type, and either with area code or full phone
    $isValid = !ctype_space($tempPhone) && !empty($tempPhone) && ctype_digit($tempPhone) &&
        (strlen($tempPhone) == 7 || strlen($tempPhone) == 10);

    echo json_encode($isValid);
}

// index.php validation on POST
function validPhone($phone) {
    // check for empty string, number type, and either with area code or full phone
    return !ctype_space($phone) && !empty($phone) && ctype_digit($phone) &&
        (strlen($phone) == 7 || strlen($phone) == 10);
}

/* Validate email
 *
 * @param String email
 * @return boolean
 */
// inline validation with AJAX
if(isset($_POST['userEmail'])) {
    $tempEmail = $_POST['userEmail'];
    // validate email with PHP function
    $isValid = filter_var($tempEmail, FILTER_VALIDATE_EMAIL);

    echo json_encode($isValid);
}

// index.php validation on POST
function validEmail($email) {
    // validate email with PHP function
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

/* Validate ALL interests
 *
 * @param Array of interests
 * @param Array valid interests
 * @return boolean
 */
// inline validation with AJAX
if(isset($_POST['userInterests'])) {
    $interests = $_POST['userInterests'];

    $isValid = true;

    // loop through checking against valid interests array
    $validArray = $_POST['validInterests'];
    for($i = 0; $i < sizeof($interests); $i++) {
        if(!in_array($interests[$i], $validArray)) {
            $isValid = false;
            break;
        }
    }

    echo json_encode($isValid);
}

// index.php validation on POST
function validInterests($interests) {
    $isValid = true;

    global $validInterests;
    for($i = 0; $i < sizeof($interests); $i++) {
        if(!in_array($interests[$i], $validInterests)) {
            $isValid = false;
            break;
        }
    }

    return $isValid;
}