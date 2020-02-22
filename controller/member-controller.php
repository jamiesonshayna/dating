<?php
/*
@author Shayna Jamieson
@version 1.0
URL: http://sjamieson.greenriverdev.com/328/dating/controller/member-controller.php
Created: February 21, 2020
Last Modified: February 21, 2020
Description: This file serves to help refine the index.php file for this project. Here
we can define all of our routes with function calls that can be made from index. These
functions will do the validation work, routing, session saving, etc.
 */

/*
 * The member controller class takes care of session setting, validation, and routes.
 *
 * @attribute $_f3 object
 * @attribute $_val validation class
 */
class MemberController
{
    private $_f3;
    private $_val;

    public function __construct($f3)
    {
        $this->_f3 = $f3;
        $this->_val = new PostValidator();
    }

    public function home()
    {
        // create a new view object by instantiating the fat-free templating class
        $view = new Template();

        // on the object template we render the home page through this route
        echo $view->render('views/home.html');
    }

    public function personalInformation($validForm1)
    {
        // if we are checking our data from post
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // validate for first name
            $first = $_POST['fName'];
            $this->_f3->set('fName', $first);
            if($this->_val->validFirstName($first)) {
                $_SESSION['firstName'] = $first;
            } else {
                $this->_f3->set("errors['first-name']","invalid first name");
                $validForm1 = false;
            }

            // validate for last name
            $last = $_POST['last-name'];
            $this->_f3->set('lName', $last);
            if($this->_val->validLastName($last)) {
                $_SESSION['lastName'] = $last;
            } else {
                $this->_f3->set("errors['last-name']","invalid last name");
                $validForm1 = false;
            }

            // validate for age
            $age = $_POST['age'];
            $this->_f3->set('userAge', $age);
            if($this->_val->validAge($age)) {
                $_SESSION['userAge'] = $age;
            } else {
                $this->_f3->set("errors['age']","invalid age");
                $validForm1 = false;
            }

            // validate for phone
            $phone = $_POST['phone'];
            $this->_f3->set('userPhone', $phone);
            if($this->_val->validPhone($phone)) {
                $_SESSION['userPhone'] = $phone;
            } else {
                $this->_f3->set("errors['phone']","invalid phone number");
                $validForm1 = false;
            }

            // set non-required attributes
            $gender = $_POST['gender'];
            $this->_f3->set('userGender', $gender);
            $_SESSION['userGender'] = $gender;

            // ALL REQUIRED FORM FIELDS ARE VALID
            if($validForm1) {
                // check whether or not we have a premium member
                if(isset($_POST["premium"])) {
                    $member = new PremiumMember($first, $last, $age, $gender, $phone);
                    $_SESSION['member'] = $member;
                } else {
                    $member = new Member($first, $last, $age, $gender, $phone);
                    $_SESSION['member'] = $member;
                }
                $this->_f3->reroute('/profile');
            }
        }
        $view = new Template();
        echo $view->render('views/personal-information.php');
    }

    public function profile($validForm2)
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // validate email
            $email = $_POST['email'];
            $this->_f3->set('userEmail', $email);
            if($this->_val->validEmail($email)) {
                $_SESSION['userEmail'] = $email;
            } else {
                $this->_f3->set("errors['email']","invalid email address");
                $validForm2 = false;
            }

            // set non-required attributes
            $state = $_POST['state'];
            $this->_f3->set('userState', $state);
            $_SESSION['userState'] = $state;

            $seeking = $_POST['seeking'];
            $this->_f3->set('userSeeking', $seeking);
            $_SESSION['userSeeking'] = $seeking;

            $bio = $_POST['bio'];
            $this->_f3->set('userBio', $bio);
            $_SESSION['userBio'] = $bio;

            // ALL REQUIRED FORM FIELDS ARE VALID
            if($validForm2) {
                // retrieve our member object to set new attributes
                $memberObject = $_SESSION['member'];

                $memberObject->setEmail($email);
                $memberObject->setState($state);
                $memberObject->setSeeking($seeking);
                $memberObject->setBio($bio);

                // reset new member object with new attributes to session
                $_SESSION['member'] = $memberObject;

                // reroute to summary screen if the user is normal else, go to interests
                if($memberObject->membershipType() == "normal") {
                    $this->_f3->reroute('/summary');
                } else {
                    $this->_f3->reroute('/interests');
                }
            }
        }

        $view = new Template();
        echo $view->render('views/profile.html');
    }

    public function interests($validForm3)
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // validate interests
            $interests = $_POST['interests'];
            $interestsText = "";


            global $validInterests;
            $this->_f3->set('interestSticky', $interests);
            if($this->_val->validInterests($interests, $validInterests)) {
                if(is_array($_POST['interests'])) {
                    foreach($_POST['interests'] as $value) {
                        $interestsText .= $value . " ";
                    }
                }

                $this->_f3->set('userInterests', $interestsText);
                $_SESSION['userInterests'] = $interestsText;
            } else {
                $this->_f3->set("errors['interests']","invalid interests, please submit again");
                $validForm3 = false;
            }
            // ALL REQUIRED FORM FIELDS ARE VALID
            if($validForm3) {
                // retrieve our member object to set new attributes
                $memberObject = $_SESSION['member'];

                $memberObject->setInDoorInterests($interestsText);

                // save back into session for member
                $_SESSION['member'] = $memberObject;

                $this->_f3->reroute('/summary');
            }
        }
        $view = new Template();
        echo $view->render('views/interests.html');
    }

    public function summary()
    {
        $view = new Template();
        echo $view->render('views/summary.html');
    }
}