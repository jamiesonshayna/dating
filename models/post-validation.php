<?php
/*
@author Shayna Jamieson
@version 1.0
URL: http://sjamieson.greenriverdev.com/328/dating/model/post-validation.php
Created: February 21, 2020
Last Modified: February 21, 2020
Description: This file will serve to validate user input in the form. We will
be validating the name, age, phone, email, and interests user selections. If the
user inputs an invalid input then we want to display an inline error message. Here we are
checking if the specific field being validated on form post. We do also have validation
set up with AJAX for inline. This file however severs as the final validation before
saving user attributes in sessions.
 */

/*
 * Validator class will allow us to ensure that form data is correct.
 */
class PostValidator
{
    /* Validate first name
     *
     * @param String name
     * @return boolean
     */
    function validFirstName($name) {
        // check for empty field or non-alphabetic
        return !ctype_space($name) && !empty($name) && ctype_alpha($name);
    }

    /* Validate last name
     *
     * @param String name
     * @return boolean
     */
    function validLastName($name) {
        // check for empty field or non-alphabetic
        return !ctype_space($name) && !empty($name) && ctype_alpha($name);
    }

    /* Validate age
     *
     * @param String age
     * @return boolean
     */
    function validAge($age) {
        // check for empty field, number type, and correct age range
        return !empty($age) && ctype_digit($age) && ((int)$age >= 18 && (int)$age <= 118);
    }

    /* Validate phone
     *
     * @param String phone
     * @return boolean
     */
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
    function validInterests($interests, $validArray) {
        $isValid = true;

        for($i = 0; $i < sizeof($interests); $i++) {
            if(!in_array($interests[$i], $validArray)) {
                $isValid = false;
                break;
            }
        }
        return $isValid;
    }
}
