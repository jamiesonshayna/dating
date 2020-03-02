<?php

require_once('/home/sjamieso/config-dating.php');

/*
@author Shayna Jamieson
@version 1.0
URL: http://sjamieson.greenriverdev.com/328/dating/models/database.php
Created: March 01, 2020
Last Modified: March 01, 2020
Description: This file will serve to connect to our database with credentials that are hosted
on the server. This file will allow the dating program to insert new members, find current members,
and get interests from the databases.
 */
class Database
{
    // PDO object
    private $_dbh;

    /*
     * Constructs a new Database PDO object
     */
    function __construct()
    {
        $this->_dbh = $this->connect();
    }

    /*
     * This method lets the program connect to the database
     *
     * @return This method returns the database connection (if successfully connected)
     * otherwise returns null;
     */
    function connect()
    {
        try {
            $dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            echo "connected!";
            return $dbh;
//            return new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        } catch(PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    /*
     * This method inserts a new member on sign-up into the database
     */
    function insertMember()
    {

    }

    /*
     * This method gets all members from the database
     *
     * @return an associative array of members
     */
    function getMembers()
    {

    }

    /*
     * This method returns a specific member (by id)
     *
     * @return one row from database of currently desired member
     */
    function getMember($member_id)
    {

    }

    /*
     * This method returns the interests of a specific member from the database.
     *
     * @return interests for a member
     */
    function getInterests()
    {

    }
}