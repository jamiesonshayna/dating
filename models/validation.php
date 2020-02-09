<?php
/*
@author Shayna Jamieson
@version 1.0
URL: http://sjamieson.greenriverdev.com/328/dating/model/validation.php
Created: January 25, 2020
Last Modified: February 09, 2020
Description: This file will serve to validate user input in the form. We will
be validating the name, age, phone, email, and interests user selections. If the
user inputs an invalid input then we want to display an inline error message.
 */

/* Validate name
 *
 * @param String name
 * @return boolean
 */
function validName($name) {
    $tempName = trim($name); // trim whitespace
    // check for empty field or non-alphabetic
    return !empty($tempName) && isAlpha($tempName);
}

/* Validate age
 *
 * @param String age
 * @return boolean
 */
function validAge($age) {
    // check for empty field, number type, and correct age range
    return !empty($age) && ctype_digit($age) && $age >= 18 && $age <= 118;
}

/* Validate phone
 *
 * @param String phone
 * @return boolean
 */
function validPhone($phone) {
    // trim phone number for any whitespace or added characters
    $tempPhone = trim($phone);
    $trimArray = [" ", "-", ".", "(", ")"];
    for($i = 0; $i < sizeof($trimArray); $i++) {
        $tempPhone = ltrim($tempPhone, $trimArray[$i]);
    }

    // check for empty string, number type, and either with area code or full phone
    return !empty($tempPhone) && ctype_digit($tempPhone) &&
        (strlen($tempPhone) == 7 || strlen($tempPhone) == 10);
}

/* Validate email
 *
 * @param String email
 * @return boolean
 */
function validEmail($email) {
    $tempEmail = trim($email);
    // validate email with PHP function
    return filter_var($tempEmail, FILTER_VALIDATE_EMAIL);
}

/* Validate indoor and outdoor interests
 *
 * @param Array indoor/outdoor interests
 * @param Array valid indoor/outdoor interests
 * @return boolean
 */
function validInterests($validArray, $userInterests) {
    for($i = 0; $i < sizeof($userInterests); $i++) {
        if(!in_array($userInterests[$i], $validArray)) {
            return false;
        }
    } return true;
}