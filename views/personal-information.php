<!--
@author Shayna Jamieson
@version 1.0
URL: http://sjamieson.greenriverdev.com/328/dating/views/personal-information.html
Created: January 25, 2020
Last Modified: February 21, 2020
Description: This file serves as first screen of the user's profile registration process. It
accepts user information such as name, age, gender, and phone number. It posts to the next form (profile).
There is not as much area for code reduction here other than placing the header and footer in included files.
Much of this page is build with custom input areas.
-->
<include href="views/header-with-nav.html">
    <div class="container card mt-3">
        <div class="card-body">
            <h1 class="toast-header text-dark">Personal Information</h1>
            <form method="post" action="#">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="first-name" class="font-weight-bold"><span class="required">*</span> First Name</label>
                            <input type="text" class="form-control" id="first-name" name="fName" aria-describedby="first-name" value="{{ @fName }}">
                            <span id="error-first" class="d-none">invalid first name</span>
                            <check if="{{isset(@errors['first-name'])}}">
                                <p id="error-first-name" class="error-post"> {{@errors['first-name']}}</p>
                            </check>
                        </div>
                        <div class="form-group">
                            <label for="last-name" class="font-weight-bold"><span class="required">*</span> Last Name</label>
                            <input type="text" class="form-control" id="last-name" name="last-name" aria-describedby="last-name" value="{{ @lName }}">
                            <span id="error-last" class="d-none">invalid last name</span>
                            <check if="{{isset(@errors['last-name'])}}">
                                <p id="error-last-name" class="error-post"> {{@errors['last-name']}}</p>
                            </check>
                        </div>
                        <div class="form-group">
                            <label for="age" class="font-weight-bold"><span class="required">*</span> Age</label>
                            <input type="text" class="form-control" id="age" name="age" aria-describedby="age" value="{{ @userAge }}">
                            <span id="error-age" class="d-none">invalid age</span>
                            <check if="{{isset(@errors['age'])}}">
                                <p id="error-user-age" class="error-post"> {{@errors['age']}}</p>
                            </check>
                        </div>
                        <div class="form-group">
                            <label for="gender-male" class="font-weight-bold">Gender</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="gender-male" value="Male"
                                <check if="{{ @userGender == Male }}">
                                    checked="checked"
                                </check>>
                                <label class="form-check-label pl-1" for="gender-male">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="gender-female" value="Female"
                                <check if="{{ @userGender == Female }}">
                                    checked="checked"
                                </check>>
                                <label class="form-check-label pl-1" for="gender-female">Female</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="font-weight-bold"><span class="required">*</span> Phone Number</label>
                            <input type="text" class="form-control" id="phone" name="phone" aria-describedby="phone" value="{{ @userPhone }}">
                            <span id="error-phone" class="d-none">invalid phone number</span>
                            <check if="{{isset(@errors['phone'])}}">
                                <p id="error-user-phone" class="error-post"> {{@errors['phone']}}</p>
                            </check>
                        </div>
                        <label for="premium" class="font-weight-bold">Premium Membership</label><br>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" value="premium" id="premium" name="premium[]">
                            <label for="premium" class="form-check-label">Sign me up for a Premium Account!</label>
                        </div> <!-- end of user input area for premium membership -->
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