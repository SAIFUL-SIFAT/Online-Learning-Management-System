<!DOCTYPE html>
<html lang="en">

<head>
    <title>Student Registration Form</title>
    <link rel="stylesheet" href="../../assets/css/student/sign_up.css">
</head>

<body>
    <h1>STUDENT REGISTRATION FORM</h1>

    <form id="registrationForm" action="../../control/student/reg_control.php" method="POST">
        <fieldset>
            <legend>Personal Information</legend>
            <table>
                <tr>
                    <td>ID:</td>
                    <td><input type="text" id="id" name="student_id" placeholder="Student ID"></td>
                </tr>
                <tr>
                    <td>Full Name:</td>
                    <td>
                        <input type="text" id="fullName" name="full_name" placeholder="Full Name">
                        <div id="full_name_error" class="error"></div>
                    </td>
                </tr>
                <tr>
                    <td>Last Name:</td>
                    <td>
                        <input type="text" id="lastName" name="last_name" placeholder="Last Name">
                        <div id="last_name_error" class="error"></div>
                    </td>
                </tr>
                <tr>
                    <td>Email Address:</td>
                    <td>
                        <input type="email" id="email" name="email" placeholder="example@example.xyz">
                        <div id="email_error" class="error"></div>
                    </td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td>
                        <input type="password" id="password" name="password" placeholder="Password">
                        <div id="password_error" class="error"></div>
                    </td>
                </tr>
                <tr>
                    <td>Confirm Password:</td>
                    <td>
                        <input type="password" id="confromPassword" name="confromPassword" placeholder="Confirm Password">
                        <div id="confirm_password_error" class="error"></div>
                    </td>
                </tr>
                <tr>
                    <td>Phone Number:</td>
                    <td>
                        <input type="text" id="phone" name="phone" placeholder="Phone Number">
                        <div id="phone_error" class="error"></div>
                    </td>
                </tr>
                <tr>
                    <td>Date of Birth:</td>
                    <td><input type="date" id="dob" name="dob"></td>
                </tr>
                <tr>
                    <td>Country/Region:</td>
                    <td>
                        <select id="country" name="country">
                            <option value="" selected disabled>Select Country/Region</option>
                            <option value="USA">USA</option>
                            <option value="Canada">Canada</option>
                            <option value="UK">United Kingdom</option>
                            <option value="India">India</option>
                            <option value="Australia">Australia</option>
                            <option value="BANGLADESH">Bangladesh</option>
                        </select>
                        <div id="country_error" class="error"></div>
                    </td>
                </tr>
                <tr>
                    <td>Profile Picture (Optional):</td>
                    <td><input type="file" id="profilePicture" name="profile_picture"></td>
                </tr>
                <tr>
                    <td>Preferred Medium Language:</td>
                    <td>
                        <input type="checkbox" id="mediumEnglish" name="preferred_language" value="English">
                        <label for="mediumEnglish">English</label>

                        <input type="checkbox" id="mediumBangla" name="preferred_language" value="Bangla">
                        <label for="mediumBangla">Bangla</label>

                        <input type="checkbox" id="mediumSpanish" name="preferred_language" value="Spanish">
                        <label for="mediumSpanish">Spanish</label>

                        <input type="checkbox" id="mediumGerman" name="preferred_language" value="German">
                        <label for="mediumGerman">German</label>
                    </td>
                </tr>
            </table>
        </fieldset>

        <fieldset>
            <tr>
                <td>
                    <input type="submit" value="Register" class="submit">
                    <input type="reset" value="Clear Form" class="clearfrom">
                    <a href="..\..\view\student\sign_in.php">Sign In</a>
                </td>
            </tr>
        </fieldset>
    </form>
    <script src="../../assets/js/student/sign_up.js"></script>
</body>

</html>
