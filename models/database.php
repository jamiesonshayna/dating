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

/*
 *CREATE TABLE member
(
    member_id INT AUTO_INCREMENT,
    fname VARCHAR(255) NULL,
    lname VARCHAR(255) NULL,
    age INT NULL,
    gender VARCHAR(255) NULL,
    phone VARCHAR(255) NULL,
    email VARCHAR(255) NULL,
    state VARCHAR(255) NULL,
    seeking VARCHAR(255) NULL,
    bio VARCHAR(255) NULL,
    premium tinyint NULL,
    image VARCHAR(255) NULL,
    PRIMARY KEY (member_id)
    );
 *
 *
 * CREATE TABLE member
(
    interest_id INT NOT NULL AUTO_INCREMENT,
    interest VARCHAR(255) NULL,
    type VARCHAR(255) NULL,
    PRIMARY KEY (interest_id)
    );
 *
 *
 * CREATE TABLE member_interest
(
    member_interest_id INT NOT NULL AUTO_INCREMENT,
    member_id INT NOT NULL,
    interest_id INT NOT NULL,
    PRIMARY KEY (member_interest_id),
    FOREIGN KEY (member_id) REFERENCES member (member_id),
    FOREIGN KEY (interest_id) REFERENCES interest (interest_id)
    );
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
            return new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        } catch(PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    /*
     * This method inserts a new member on sign-up into the database
     *
     * @param member object to get attributes for insert
     * @return the id of the new inserted member
     */
    function insertMember($member, $interests)
    {
        $sql = "";
        // define the query
        if($member->membershipType() == 'normal') {
            $sql .= "INSERT INTO member VALUES(default, :fname, :lname, :age, :gender, :phone, :email,
        :state, :seeking, :bio, 0, :interests, '')";
        } else {
            $sql .= "INSERT INTO member VALUES(default, :fname, :lname, :age, :gender, :phone, :email,
        :state, :seeking, :bio, 1, :interests, '')";
        }


        // prepare the statement
        $statement = $this->_dbh->prepare($sql);

        // bind the parameters
        $statement->bindParam(':fname', $member->getFName());
        $statement->bindParam(':lname', $member->getLName());
        $statement->bindParam(':age', $member->getAge());
        $statement->bindParam(':gender', $member->getGender());
        $statement->bindParam(':phone', $member->getPhone());
        $statement->bindParam(':email', $member->getEmail());
        $statement->bindParam(':state', $member->getState());
        $statement->bindParam(':seeking', $member->getSeeking());
        $statement->bindParam(':bio', $member->getBio());
        $statement->bindParam(':interests', $interests);

        // execute statement
        $statement->execute();

        return $this->_dbh->lastInsertId();
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
     * @param Member ID for query
     * @return one row from database of currently desired member
     */
    function getMember($member_id)
    {

    }

    /*
     * This method returns the interests of a specific member from the database.
     *
     * @param Member ID for query
     * @return interests for a member
     */
    function getInterests($member_id)
    {

    }
}