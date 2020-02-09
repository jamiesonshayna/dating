<!--
@author Shayna Jamieson
@version 1.0
URL: http://sjamieson.greenriverdev.com/328/dating/views/personal-information.html
Created: January 25, 2020
Last Modified: January 26, 2020
Description: This file serves as first screen of the user's profile registration process. It
accepts user information such as name, age, gender, and phone number. It posts to the next form (profile).
-->
<include href="views/header-with-nav.html">
    <div class="container card mt-3">
        <div class="card-body">
            <h1 class="toast-header text-dark">Personal Information</h1>
            <form method="post" action="profile">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="first-name" class="font-weight-bold"><span class="required">*</span> First Name</label>
                            <input type="text" class="form-control" id="first-name" name="fName" aria-describedby="first-name">
                            <span id="error-first" class="d-none">invalid first name</span>
                        </div>
                        <div class="form-group">
                            <label for="last-name" class="font-weight-bold"><span class="required">*</span> Last Name</label>
                            <input type="text" class="form-control" id="last-name" name="last-name" aria-describedby="last-name">
                            <span id="error-last" class="d-none">invalid last name</span>
                        </div>
                        <div class="form-group">
                            <label for="age" class="font-weight-bold"><span class="required">*</span> Age</label>
                            <input type="text" class="form-control" id="age" name="age" aria-describedby="age" placeholder="">
                            <span id="error-age" class="d-none">invalid age</span>
                        </div>
                        <div class="form-group">
                            <label for="gender-male" class="font-weight-bold">Gender</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="gender-male" value="Male">
                                <label class="form-check-label pl-1" for="gender-male">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="gender-female" value="Female">
                                <label class="form-check-label pl-1" for="gender-female">Female</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="font-weight-bold"><span class="required">*</span> Phone Number</label>
                            <input type="text" class="form-control" id="phone" name="phone" aria-describedby="phone" placeholder="">
                            <span id="error-phone" class="d-none">invalid phone number</span>
                        </div>
                    </div> <!-- end of user input area (column)-->
                    <div id="privacy" class="col-md-4 pt-2 text-center">
                        <div class="alert alert-secondary" role="alert">
                            <span class="font-weight-bold">Note: </span>All information entered is protected by our <a href="#">privacy policy</a>. Profile information can only be viewed by others with your permission.
                        </div>
                    </div>
                </div> <!-- end of column that has light alert -->
            <button type="submit" class="btn-sm btn-dark float-right">Next ></button>
            </form> <!-- end of form that holds our submit button (routed to first sign-up screen) -->
        </div>
    </div>
    <include href="views/footer.html">