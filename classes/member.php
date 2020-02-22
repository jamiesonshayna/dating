<?php
/*
@author Shayna Jamieson
@version 1.0
URL: http://sjamieson.greenriverdev.com/328/dating/classes/member.php
Created: February 21, 2020
Last Modified: February 21, 2020
Description: This file serves to define member objects for the dating profile. Member
objects contain properties about the person signing up. These properties are the data that
we collect as the user fills out their profile sign-up form. Here we are able to add new
attributes to a member object as the user completes the form, as well as get their attributes
to display on our template views.
 */

/*
 * The member class allows us to create user sign-up objects.
 *
 * The person signing up for the dating website will have their attributes filled
 * out as the complete the form, and then when they get to the summary screen
 * they will have all of their information saved and able to display.
 */
class Member
{
    private $_fname;
    private $_lname;
    private $_age;
    private $_gender;
    private $_phone;
    private $_email;
    private $_state;
    private $_seeking;
    private $_bio;

    /*
     * This function will construct a Member object.
     *
     * @param fName user's first name
     * @param lName user's last name
     * @param age user's age
     * @param gender user's gender
     * @param phone user's phone number
     */
    public function __construct($fname, $lname, $age, $gender, $phone)
    {
        $this->_fname = $fname;
        $this->_lname = $lname;
        $this->_age = $age;
        $this->_gender = $gender;
        $this->_phone = $phone;
    }

    /*
     * This method returns the type of membership.
     *
     * This is so that on various screens we know to display or
     * skip premium membership details.
     * @return String The type of membership for current user.
     */
    public function membershipType()
    {
        return "normal";
    }

    // Accessors

    /*
     * @return user's first name
     */
    public function getFName()
    {
        return $this->_fname;
    }

    /*
     * @return user's last name
     */
    public function getLName()
    {
        return $this->_lname;
    }

    /*
     * @return user's age
     */
    public function getAge()
    {
        return $this->_age;
    }

    /*
     * @return user's gender
     */
    public function getGender()
    {
        return $this->_gender;
    }

    /*
     * @return user's phone number
     */
    public function getPhone()
    {
        return $this->_phone;
    }

    /*
     * @return user's email
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /*
     * @return user's state
     */
    public function getState()
    {
        return $this->_state;
    }

    /*
     * @return user's seeking preference
     */
    public function getSeeking()
    {
        return $this->_seeking;
    }

    /*
     * @return user's bio
     */
    public function getBio()
    {
        return $this->_bio;
    }

    // Mutators

    /*
     * @param user's first name
     */
    public function setFName($fName) {
        $this->_fname = $fName;
    }

    /*
     * @param user's last name
     */
    public function setLName($lName) {
        $this->_lname = $lName;
    }

    /*
     * @param user's age
     */
    public function setAge($age) {
        $this->_age = $age;
    }

    /*
     * @param user's gender
     */
    public function setGender($gender) {
        $this->_gender = $gender;
    }

    /*
     * @param user's phone number
     */
    public function setPhone($phone) {
        $this->_phone = $phone;
    }

    /*
     * @param user's email
     */
    public function setEmail($email) {
        $this->_email = $email;
    }

    /*
     * @param user's state
     */
    public function setState($state) {
        $this->_state = $state;
    }

    /*
     * @param user's seeking
     */
    public function setSeeking($seeking) {
        $this->_seeking = $seeking;
    }
    /*
     * @param user's bio
     */
    public function setBio($bio) {
        $this->_bio = $bio;
    }

}