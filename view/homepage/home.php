<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learning Management System</title>
    <link rel="stylesheet" href="../../assets/css/home/home.css">
</head>
<body>
    <header>
        <nav>
            <div class="logo">LMS</div>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Features</a></li>
                <li><a href="#">Login</a></li>
                <li><a href="#">Register</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
            <button class="cta-button">Get Started</button>
        </nav>
        <section class="hero">
            <h1>Empowering Learning for Everyone, Anywhere</h1>
            <p>Join thousands of users leveraging our platform to learn, teach, and grow.</p>
            <button class="cta-button">Sign up now</button>
        </section>
    </header>

    <main>
        <section class="user-categories">
            <h2>Continue Your Journey As</h2>
            <div class="category-cards">
                <div class="card">
                    <h3>Admin</h3>
                    <p>Can create and manage courses, approve instructors, add/remove users, assign roles, and manage notifications and announcements.</p>
                    <a href="../admin/login.php"><button>Login</button></a> 
                    <a href="../admin/signup.php"><button>Signup</button></a>        
       
                    </div>
                <div class="card">
                    <h3>Instructor</h3>
                    <p>Can manage course, track students, issue certificates.</p>
                    <a href="../instructor/login.php"><button>Login</button></a> 
                    <a href="../instructor/signup.php"><button>Signup</button></a> 

                </div>
                <div class="card">
                    <h3>Student</h3>
                    <p>Can enroll courses,take quizes, recieve certificates.</p>
                    <a href="../student/sign_in.php"><button>Login</button></a> 
                    <a href="../instructor/signup.php"><button>Signup</button></a> 

                </div>
                <div class="card">
                    <h3>Moderator</h3>
                    <p>Can supprt users, assist with course managment,manage student, create events .</p>
                    <a href="../moderator/signin.php"><button>Login</button></a> 
                    <a href="../moderator/signup.php"><button>Signup</button></a> 

                </div>
            </div>
        </section>

        <section class="features">
            <h2>A Better Way to Learn</h2>
            <p>Our platform offers a range of features designed to enhance your learning experience.</p>
            <div class="features-cards">
                <div class="feature-card">
                    <h3>Login and Registration</h3>
                    <p>Secure and easy access to your personalized learning environment.</p>
                </div>
                <div class="feature-card">
                    <h3>User-Friendly Platform</h3>
                    <p>Intuitive interface designed for seamless navigation and interaction.</p>
                </div>
                <div class="feature-card">
                    <h3>Accessible Learning</h3>
                    <p>Learn anytime, anywhere with our mobile-responsive platform.</p>
                </div>
            </div>
        </section>

        

        <section class="testimonials">
            <h2>Hear from Our Users</h2>
            <p>Don’t just take our word for it. See what our users have to say about their experience.</p>
            <div class="testimonial-cards">
                <div class="testimonial-card">
                    <h3>Sarah Johnson</h3>
                    <p>"This LMS has streamlined our entire educational process. The user management and analytics tools are exceptional."</p>
                    <p>Admin</p>
                </div>
                <div class="testimonial-card">
                    <h3>Dr. Michael Lee</h3>
                    <p>"As an instructor, I find the course creation tools intuitive and powerful. It’s made my job so much easier."</p>
                    <p>Instructor</p>
                </div>
                <div class="testimonial-card">
                    <h3>Emily Chen</h3>
                    <p>"The platform is user-friendly and engaging. I love how I can track my progress and collaborate with peers."</p>
                    <p>Student</p>
                </div>
                <div class="testimonial-card">
                    <h3>Alex Rodriguez</h3>
                    <p>"The moderation tools are top-notch. It’s easy to review content and ensure a positive learning environment."</p>
                    <p>Moderator</p>
                </div>
            </div>
        </section>

        
    </main>

    <footer>
        <div class="footer-links">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Features</a></li>
                <li><a href="#">Pricing</a></li>
                <li><a href="#">About Us</a></li>
            </ul>
            <ul>
                <li><a href="#">Help Center</a></li>
                <li><a href="#">Terms of Service</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </div>
        <div class="newsletter">
            <label for="email">Subscribe to our newsletter</label>
            <input type="email" id="email" placeholder="Enter your email">
            <button class="cta-button">Subscribe</button>
        </div>
        <p>&copy; 2025 LMS Inc. All rights reserved.</p>
    </footer>
</body>
</html>