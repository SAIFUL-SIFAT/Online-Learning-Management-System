<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learning Management System</title>
    <link rel="stylesheet" href="assets/css/home/home.css">
</head>
<body>
    <header>
        <nav>
            <div class="logo">LMS</div>
        </nav>
        <section class="hero">
            <h1>Empowering Learning for Everyone, Anywhere</h1>
            <p>Join thousands of users leveraging our platform to learn, teach, and grow.</p>
            <a href="view/student/sign_in.php">
                <button class="cta-button">Sign up now</button>
            </a>
        </section>
    </header>

    <main>
        <section class="user-categories">
            <h2>Continue Your Journey As</h2>
            <div class="category-cards">
                <div class="card">
                    <h3>Admin</h3>
                    <p>Can create and manage courses, approve instructors, add/remove users, assign roles, and manage notifications and announcements.</p>
                    <div>
                        <a href="view/admin/login.php"><button>Login</button></a>
                        <a href="view/admin/signup.php"><button>Signup</button></a>
                    </div>

                    </div>
                <div class="card">
                    <h3>Instructor</h3>
                    <p>Can manage course, track students, issue certificates.</p>
                    <div>
                        <a href="view/instructor/login.php"><button>Login</button></a>
                        <a href="view/instructor/signup.php"><button>Signup</button></a>
                    </div>

                </div>
                <div class="card">
                    <h3>Student</h3>
                    <p>Can enroll courses, take quiz, receive certificates.</p>
                    <div>
                        <a href="view/student/sign_in.php"><button>Login</button></a>
                        <a href="view/student/sign_up.php"><button>Signup</button></a>
                    </div>

                </div>
                <div class="card">
                    <h3>Moderator</h3>
                    <p>Can support users, assist with course management, manage student, create events .</p>
                    <div>
                        <a href="view/moderator/signin.php"><button>Login</button></a>
                        <a href="view/moderator/signup.php"><button>Signup</button></a>
                    </div>

                </div>
            </div>
        </section>
</body>
</html>