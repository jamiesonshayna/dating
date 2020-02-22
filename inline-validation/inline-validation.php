<?php
/*
@author Shayna Jamieson
@version 1.0
URL: http://sjamieson.greenriverdev.com/328/dating/inline-validation/inline-validation.php
Created: January 25, 2020
Last Modified: February 21, 2020
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
if(isset($_POST['firstName'])) {
    $tempName = $_POST['firstName'];
    // check for empty field or non-alphabetic
    $isValid = !ctype_space($tempName) && !empty($tempName) && ctype_alpha($tempName);

    echo json_encode($isValid);
}

/* Validate last name
 *
 * @param String name
 * @return boolean
 */
if(isset($_POST['lastName'])) {
    $tempName = $_POST['lastName'];
    // check for empty field or non-alphabetic
    $isValid = !ctype_space($tempName) && !empty($tempName) && ctype_alpha($tempName);

    $_SESSION['validLastName'] = $isValid;
    echo json_encode($isValid);
}

/* Validate age
 *
 * @param String age
 * @return boolean
 */
if(isset($_POST['userAge'])) {
    $tempAge = $_POST['userAge'];

    // check for empty field, number type, and correct age range
    $isValid = !empty($tempAge) && ctype_digit($tempAge) && ((int)$tempAge >= 18 && (int)$tempAge <= 118);

    echo json_encode($isValid);
}

/* Validate phone
 *
 * @param String phone
 * @return boolean
 */
if(isset($_POST['userPhone'])) {
    $tempPhone = $_POST['userPhone'];

    // check for empty string, number type, and either with area code or full phone
    $isValid = !ctype_space($tempPhone) && !empty($tempPhone) && ctype_digit($tempPhone) &&
        (strlen($tempPhone) == 7 || strlen($tempPhone) == 10);

    echo json_encode($isValid);
}

/* Validate email
 *
 * @param String email
 * @return boolean
 */
if(isset($_POST['userEmail'])) {
    $tempEmail = $_POST['userEmail'];
    // validate email with PHP function
    $isValid = filter_var($tempEmail, FILTER_VALIDATE_EMAIL);

    echo json_encode($isValid);
}

/* Validate ALL interests
 *
 * @param Array of interests
 * @param Array valid interests
 * @return boolean
 */
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