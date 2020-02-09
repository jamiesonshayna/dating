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
                if(response === "false") {
                    errorSpan.removeClass();
                    errorSpan.addClass('error');
                } else {
                    errorSpan.removeClass();
                    errorSpan.addClass('valid');
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
                if(response === "false") {
                    errorSpan.removeClass();
                    errorSpan.addClass('error');
                } else {
                    errorSpan.removeClass();
                    errorSpan.addClass('valid');
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
                if(response === "false") {
                    errorSpan.removeClass();
                    errorSpan.addClass('error');
                } else {
                    errorSpan.removeClass();
                    errorSpan.addClass('valid');
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
                if(response === "false") {
                    errorSpan.removeClass();
                    errorSpan.addClass('error');
                } else {
                    errorSpan.removeClass();
                    errorSpan.addClass('valid');
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
                if(response === "false") {
                    errorSpan.removeClass();
                    errorSpan.addClass('error');
                } else {
                    errorSpan.removeClass();
                    errorSpan.addClass('valid');
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
        for(var i = 0; i < tempArray.length; i++) {
            if(tempArray[i].checked) {
                console.log(tempArray[i].value);
            }
        }

        // // loop through all of our interests to get values
        // $('input:checkbox[name=interests]:checked').each(function() {
        //     console.log($(this).val());
        //     interestsArray.push($(this).value);
        // });

        console.log(interestsArray.toString());

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
                if(response === "false") {
                    errorSpan.removeClass();
                    errorSpan.addClass('error');
                } else {
                    errorSpan.removeClass();
                    errorSpan.addClass('valid');
                }
            }
        });
    });
});





