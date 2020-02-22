<?php
/*
@author Shayna Jamieson
@version 1.0
URL: http://sjamieson.greenriverdev.com/328/dating/classes/premium-member.php
Created: February 21, 2020
Last Modified: February 21, 2020
Description: This file serves to define premium member objects for the dating profile. Member
objects contain properties about the person signing up. These properties are the data that
we collect as the user fills out their profile sign-up form. Here we are able to add new
attributes to a member object as the user completes the form, as well as get their attributes
to display on our template views. Premium members are allowed to also fill out their indoor
and outdoor interests and have these displayed on their profiles.
 */

/*
 * The premium member class allows us to create user sign-up objects (with interests).
 *
 * The person signing up for the dating website will have their attributes filled
 * out as the complete the form, and then when they get to the summary screen
 * they will have all of their information saved and able to display.
 */
class PremiumMember extends Member
{
    private $_inDoorInterests;
    private $_outDoorInterests;

    /*
     * This method overrides its parent's membership type.
     *
     * @return String Type of current user's membership.
     */
    public function membershipType()
    {
        return "premium";
    }

    // Accessors

    /*
     * @return user's in-door interests
     */
    public function getInDoorInterests()
    {
        return $this->_inDoorInterests;
    }

    /*
     * @return user's out-door interests
     */
    public function getOutDoorInterests()
    {
        return $this->_outDoorInterests;
    }

    // Mutators

    /*
     * @param user's in-door interests
     */
    public function setInDoorInterests($inDoorInterests)
    {
        $this->_inDoorInterests = $inDoorInterests;
    }

    /*
     * @param user's out-door interests
     */
    public function setOutDoorInterests($outDoorInterests)
    {
        $this->_outDoorInterests = $outDoorInterests;
    }
}