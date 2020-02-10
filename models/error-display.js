/*
@author Shayna Jamieson
@version 1.0
URL: http://sjamieson.greenriverdev.com/328/dating/models/error-display.js
Created: February 9, 2020
Last Modified: February 9, 2020
Description: This file serves to help with AJAX calls. The forms on each page have
real-time validation and use AJAX to handle displaying the span errors as well as
validating with our PHP validation file.
 */
$(document).ready(function() {
    // validate the first name with PHP file and provide inline validation
    $("#first-name").on("blur", function() {
        let first = document.getElementById('first-name').value;
        $.ajax({
            url: 'models/validation.php',
            method: 'post',
            data: {
                firstName: first
            },
            success: function (response) {
                let errorSpan = $('#error-first');
                let errorSpan2 = $('#error-first-name');
                if(response === "false") {
                    errorSpan.removeClass();
                    errorSpan.addClass('error');
                    errorSpan2.removeClass();
                    errorSpan2.addClass('valid');
                } else {
                    errorSpan.removeClass();
                    errorSpan.addClass('valid');
                    errorSpan2.removeClass();
                    errorSpan2.addClass('valid');
                }
            }
        });
    });

    // validate the last name with PHP file and provide inline validation
    $("#last-name").on("blur", function() {
        let last = document.getElementById('last-name').value;
        $.ajax({
            url: 'models/validation.php',
            method: 'post',
            data: {
                lastName: last
            },
            success: function (response) {
                let errorSpan = $('#error-last');
                let errorSpan2 = $('#error-last-name');
                if(response === "false") {
                    errorSpan.removeClass();
                    errorSpan.addClass('error');
                    errorSpan2.removeClass();
                    errorSpan2.addClass('valid');
                } else {
                    errorSpan.removeClass();
                    errorSpan.addClass('valid');
                    errorSpan2.removeClass();
                    errorSpan2.addClass('valid');
                }
            }
        });
    });

    // validate age with PHP file and provide inline validation
    $("#age").on("blur", function() {
        let age = document.getElementById('age').value;
        $.ajax({
            url: 'models/validation.php',
            method: 'post',
            data: {
                userAge: age
            },
            success: function (response) {
                let errorSpan = $('#error-age');
                let errorSpan2 = $('#error-user-age');
                if(response === "false") {
                    errorSpan.removeClass();
                    errorSpan.addClass('error');
                    errorSpan2.removeClass();
                    errorSpan2.addClass('valid');
                } else {
                    errorSpan.removeClass();
                    errorSpan.addClass('valid');
                    errorSpan2.removeClass();
                    errorSpan2.addClass('valid');
                }
            }
        });
    });

    // validate phone with PHP file and provide inline validation
    $("#phone").on("blur", function() {
        let phone = document.getElementById('phone').value;
        $.ajax({
            url: 'models/validation.php',
            method: 'post',
            data: {
                userPhone: phone
            },
            success: function (response) {
                let errorSpan = $('#error-phone');
                let errorSpan2 = $('#error-user-phone');
                if(response === "false") {
                    errorSpan.removeClass();
                    errorSpan.addClass('error');
                    errorSpan2.removeClass();
                    errorSpan2.addClass('valid');
                } else {
                    errorSpan.removeClass();
                    errorSpan.addClass('valid');
                    errorSpan2.removeClass();
                    errorSpan2.addClass('valid');
                }
            }
        });
    });

    // validate email with PHP file and provide inline validation
    $("#email").on("blur", function() {
        let email = document.getElementById('email').value;
        $.ajax({
            url: 'models/validation.php',
            method: 'post',
            data: {
                userEmail: email
            },
            success: function (response) {
                let errorSpan = $('#error-email');
                let errorSpan2 = $('#error-user-email');
                if(response === "false") {
                    errorSpan.removeClass();
                    errorSpan.addClass('error');
                    errorSpan2.removeClass();
                    errorSpan2.addClass('valid');
                } else {
                    errorSpan.removeClass();
                    errorSpan.addClass('valid');
                    errorSpan2.removeClass();
                    errorSpan2.addClass('valid');
                }
            }
        });
    });

    // validate email with PHP file and provide inline validation
    $('input:checkbox').on('click', function() {
        let validArray = ["tv", "puzzles", "movies", "reading", "cooking", "playing cards", "board games",
        "video games", "hiking", "walking", "biking", "climbing", "swimming", "collecting"];
        let interestsArray = [];

        let tempArray = document.getElementsByName("interests[]");
        for(let i = 0; i < tempArray.length; i++) {
            if(tempArray[i].checked) {
                interestsArray.push(tempArray[i].value);
            }
        }

        $.ajax({
            url: 'models/validation.php',
            method: 'post',
            data: {
                userInterests: interestsArray,
                validInterests: validArray
            },
            success: function (response) {
                console.log(response);
                let errorSpan = $('#error-interests');
                let errorSpan2 = $('#error-user-interests');
                if(response === "false") {
                    errorSpan.removeClass();
                    errorSpan.addClass('error');
                    errorSpan2.removeClass();
                    errorSpan2.addClass('valid');
                } else {
                    errorSpan.removeClass();
                    errorSpan.addClass('valid');
                    errorSpan2.removeClass();
                    errorSpan2.addClass('valid');
                }
            }
        });
    });
});





