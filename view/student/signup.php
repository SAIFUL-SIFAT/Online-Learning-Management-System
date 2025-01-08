<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>Student Registration Form</title>
</head>
<body>

    <h1>STUDENT REGISTRATION FORM</h1>

    <form method="POST">
        
        <fieldset>
            <legend>Personal Information</legend>
            <table>
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" id="fullName" name="fullName" placeholder="Full Name" ></td>
                </tr>
                <tr>
                    <td>Last Name:</td>
                    <td><input type="text" id="lastName" name="lastName" placeholder="Last Name" ></td>
                </tr>

                
                <tr>
                    <td>Email Address:</td>
                    <td><input type="email" id="email" name="email" placeholder="example@example.com" ></td>
                </tr>

                
                <tr>
                    <td>Username:</td>
                    <td><input type="text" id="username" name="username" placeholder="Username" ></td>
                </tr>

                
                <tr>
                    <td>Password:</td>
                    <td><input type="password" id="password" name="password" placeholder="Password" ></td>
                </tr>

                
                <tr>
                    <td>Confirm Password:</td>
                    <td><input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" ></td>
                </tr>

                
                <tr>
                    <td>Phone Number:</td>
                    <td><input type="text" id="phone" name="phone" placeholder="Phone Number" ></td>
                </tr>

                
                <tr>
                    <td>Date of Birth:</td>
                    <td><input type="date" id="dob" name="dob" ></td>
                </tr>

               
                <tr>
                    <td>Country/Region:</td>
                    <td>
                        <select id="country" name="country" >
                            <option value="" selected disabled>Select Country/Region</option>
                            <option value="USA">USA</option>
                            <option value="Canada">Canada</option>
                            <option value="UK">United Kingdom</option>
                            <option value="India">India</option>
                            <option value="Australia">Australia</option>
                            <option value ="BANGLADESH">Bangladesh</option>
                        </select>
                    </td>
                </tr>

                
                <tr>
                    <td>Preferred Learning Language:</td>
                    <td>
                        <select id="language" name="language" >
                            <option value="" selected disabled>Select Language</option>
                            <option value="English">English</option>
                            <option value="Spanish">Spanish</option>
                            <option value="French">Bangla</option>
                            <option value="German">German</option>
                            <option value="Mandarin">Mandarin</option>
                        </select>
                    </td>
                </tr>

                
                <tr>
                    <td>Profile Picture (Optional):</td>
                    <td><input type="file" id="profilePicture" name="profilePicture"></td>
                </tr>
            </table>
        </fieldset>

        <fieldset>
        <tr><td>
        <input type="submit" value="Register">
        <input type="reset" value="Clear Form">
</td></tr>
</fieldset>
    </form>

</body>
</html>