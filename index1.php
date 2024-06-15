<?php
session_start();

$host = "localhost";
$user = "root";
$pass = "";
$db = "portfolio";

$obj = new mysqli($host, $user, $pass, $db);

if ($obj->connect_errno != 0) {
    echo $obj->connect_error;
    exit();
}

if (isset($_POST['submit'])) {
    $name = $obj->real_escape_string($_POST['name']);
    $email = $obj->real_escape_string($_POST['email']);
    $textarea = $obj->real_escape_string($_POST['message']);

    $stmt = $obj->prepare("INSERT INTO portfolio (portfolio_name, portfolio_email, portfolio_textarea) VALUES (?, ?, ?)");
    $stmt->bind_param('sss', $name, $email, $textarea);

    if ($stmt->execute()) {
        echo "<script>alert('Your Details Submitted');</script>";
    } else {
        echo "<script>alert('Details not submitted');</script>";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mayur Prajapati's Portfolio - PHP Web Developer</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <!-- <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', 'sans-serif';
        }
        html {
            scroll-behavior: smooth;
        }
        body {
            font-family: serif;
        }
        #header {
            height: 100vh;
            width: 100%;
            background-image: url('image/img1.jpg');
            background-size: cover;
            background-position: end;
            background-attachment: fixed;
        }
        .container {
            padding: 10px 10%;
        }
        nav {
            align-items: center;
            flex-wrap: wrap;
            display: flex;
            justify-content: space-between;
        }
        nav ul li {
            list-style: none;
            display: inline-block;
            margin: 10px 20px;
            font-size: 25px;
        }
        nav ul li a::after {
            position: absolute;
            content: '';
            height: 3px;
            width: 0;
            background: #ff004f;
            left: 0;
            bottom: -6px;
            transition: 0.8s;
        }
        nav ul li a:hover::after {
            width: 100%;
        }
        .header-text {
            font-size: 60px;
            margin-top: 150px;
            margin-left: 50px;
        }
        #about {
            padding: 35px 0;
        }
        .row {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        .about-col-1 {
            flex-basis: 35%;
        }
        .about-col-1 img {
            width: 100%;
            border-radius: 45px;
        }
        .about-col-2 {
            flex-basis: 60%;
        }
        .text-light {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        .tab-titles {
            margin: 20px 0 40px;
            display: flex;
        }
        .tab-links {
            cursor: pointer;
            margin-right: 50px;
            font-size: 30px;
            position: relative;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
        .tab-links::after {
            content: '';
            position: absolute;
            height: 3px;
            width: 0;
            background: #ff004f;
            left: 0;
            bottom: -8px;
            transition: 0.8s;
        }
        .tab-links.active-link::after {
            width: 50%;
        }
        .tab-contents {
            display: none;
        }
        .tab-contents ul li {
            list-style: none;
            margin: 10px 0;
        }
        .tab-contents.active-tab {
            display: block;
        }
        #services {
            padding: 30px 0;
        }
        .services-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            grid-gap: 40px;
            margin-top: 50px;
        }
        .services-list div {
            background: #262626;
            padding: 30px;
            transition: background 0.5s, transform 0.5s;
            border-radius: 10px;
        }
        .services-list div i {
            font-size: 35px;
            margin-bottom: 30px;
        }
        .services-list div:hover {
            background: rgb(245, 58, 58);
            transform: translateY(-10px);
        }
        #portfolio {
            padding: 50px;
        }
        .work-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            grid-gap: 40px;
        }
        .work {
            border-radius: 10px;
            position: relative;
            overflow: hidden;
        }
        .work img {
            border-radius: 12px;
            display: block;
            margin-top: 40px;
            width: 100%;
            transition: transform 0.5s;
        }
        .layer {
            width: 100%;
            height: 0;
            background: linear-gradient(rgba(0, 0, 0, 0.6), #ff004f);
            border-radius: 10px;
            position: absolute;
            left: 0;
            bottom: 0;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 40px;
            text-align: center;
            font-size: 14px;
            transition: height 0.5s;
        }
        .layer a {
            margin-top: 20px;
            color: #ff004f;
            text-decoration: none;
            font-size: 18px;
            line-height: 60px;
            background: white;
            width: 60px;
            height: 60px;
            text-align: center;
            border-radius: 50%;
        }
        .work:hover img {
            transform: scale(1.1);
        }
        .work:hover .layer {
            height: 100%;
        }
        #btn {
            color: white;
            width: fit-content;
            margin: 50px auto;
            text-decoration: none;
            margin-top: 20px;
            border: 2px solid #ff004f;
            border-radius: 6px;
            padding: 14px 50px;
            transition: background 0.5s;
        }
        #btn:hover {
            background: #ff004f;
            font-size: 20px;
            color: white;
        }
        .contact-left {
            flex-basis: 35%;
        }
        .contact-right {
            flex-basis: 60%;
        }
        .contact-left p {
            margin-top: 30px;
        }
        .contact-left p i {
            color: #ff004f;
            margin-right: 15px;
            font-size: 25px;
        }
        .social-icons {
            margin-top: 30px;
        }
        .social-icons a {
            text-decoration: none;
            font-size: 30px;
            color: #ababab;
            display: inline-block;
            margin-right: 30px;
            transition: transform 0.5s;
        }
        .social-icons a:hover {
            color: #ff004f;
            transform: translateY(-5px);
        }
        .btn1 {
            display: block;
            text-decoration: none;
            color: white;
            background: #ff004f;
            width: fit-content;
            margin: 50px auto;
            text-decoration: none;
            margin-top: 20px;
            border: 2px solid #ff004f;
            border-radius: 6px;
            padding: 14px 50px;
        }
        .contact-right form {
            width: 100%;
        }
        form.btn-primary {
            padding: 14pz 60px;
            cursor: pointer;
        }
        .copyright {
            padding: 25px 0;
            margin-top: 20px;
            background: #262626;
        }
        .copyright i {
            color: #ff004f;
        }
        .fa-solid.fa-xmark {
            display: none;
        }
        .fa-solid.fa-bars {
            display: none;
        }
        @media only screen and (max-width:1000px) {
            #header {
                background-image: url('image/Phone_Background.png');
            }
            .header-text {
                margin-top: 100%;
                font-size: 15px;
            }
            .fa-solid.fa-xmark {
                display: block;
            }
            .fa-solid.fa-bars {
                display: block;
                font-size: 25px;
            }
            nav ul {
                top: 0;
                right: -200px;
                position: fixed;
                background: #ff004f;
                width: 200px;
                height: 100vh;
                padding-top: 50px;
                z-index: 2;
                transition: right 0.5s;
            }
            nav ul li {
                display: block;
                margin: 25px;
            }
            nav .fa-solid.fa-xmark {
                cursor: pointer;
                top: 25px;
                left: 25px;
                font-size: 35px;
                position: absolute;
            }
        }
    </style> -->
</head>
<body>
    <!-- Header Section -->
    <header id="header">
        <div class="container">
            <nav>
                <ul>
                    <li><a href="#header">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#portfolio">Portfolio</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </nav>
            <div class="header-text">
                <h1>Mayur Prajapati</h1>
                <p>PHP Web Developer</p>
            </div>
        </div>
    </header>

    <!-- About Section -->
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="about-col-1">
                    <img src="image/User1.png" class="img-thumbail" alt="Profile Image">
                </div>
                <div class="about-col-2">
                    <h2>About Me</h2>
                    <p>I am a passionate PHP developer with experience in creating dynamic and responsive web applications. I enjoy problem-solving and continuously improving my skills to provide efficient and scalable solutions.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services">
        <div class="container">
            <h2>Services</h2>
            <div class="services-list">
                <div>
                    <i class="fas fa-code"></i>
                    <h3>Web Development</h3>
                    <p>Creating dynamic and responsive websites using PHP, HTML, CSS, and JavaScript.</p>
                </div>
                <div>
                    <i class="fas fa-mobile-alt"></i>
                    <h3>Responsive Design</h3>
                    <p>Ensuring websites look great and work well on all devices, from desktops to smartphones.</p>
                </div>
                <div>
                    <i class="fas fa-database"></i>
                    <h3>Database Management</h3>
                    <p>Designing and managing databases to ensure data integrity and security.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section id="portfolio">
        <div class="container">
            <h2>Portfolio</h2>
            <div class="work-list">
                <div class="work">
                    <img src="image/work1.jpg" alt="Work 1">
                    <div class="layer">
                        <h3>Project Title</h3>
                        <p>Short description of the project.</p>
                        <a href="#">View</a>
                    </div>
                </div>
                <div class="work">
                    <img src="image/work2.jpg" alt="Work 2">
                    <div class="layer">
                        <h3>Project Title</h3>
                        <p>Short description of the project.</p>
                        <a href="#">View</a>
                    </div>
                </div>
                <div class="work">
                    <img src="image/work3.jpg" alt="Work 3">
                    <div class="layer">
                        <h3>Project Title</h3>
                        <p>Short description of the project.</p>
                        <a href="#">View</a>
                    </div>
                </div>
            </div>
            <a id="btn" href="#contact">Get in Touch</a>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <h2>Contact</h2>
            <div class="row">
                <div class="contact-left">
                    <p><i class="fas fa-map-marker-alt"></i> Location: City, Country</p>
                    <p><i class="fas fa-phone-alt"></i> Phone: +123 456 789</p>
                    <p><i class="fas fa-envelope"></i> Email: example@example.com</p>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="contact-right">
                    <form method="POST" action="">
                        <input type="text" name="name" placeholder="Your Name" required>
                        <input type="email" name="email" placeholder="Your Email" required>
                        <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
                        <button class="btn1" name="submit" type="submit">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer>
        <div class="container">
            <div class="copyright">
                <p>&copy; 2024 Mayur Prajapati. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
