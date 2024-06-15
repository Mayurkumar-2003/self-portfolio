<?php
session_start();
$host = "localhost";
$user = "root";
$pass = "";
$db = "portfolio";

$obj = new mysqli($host, $user, $pass, $db);
// echo "<pre>"; print_r($obj); exit();
if ($obj->connect_errno != 0) {
    echo $obj->connect_error;
    exit;
}
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $textarea = $_POST['message'];

    $query = $obj->query("INSERT INTO portfolio(portfolio_name,portfolio_emai,portfolio_textarea) VALUES ('$name','$email','$textarea')");
    // echo "<pre>"; print_r($query); exit();
    if ($query) {
        header("location: index.php");
        echo "<script>alert('Your Details Submited')</script>";
    } else {
        echo "<script>alert('Details not submited')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mayur's Portfolio , PHP Web Developer</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
</head>

<body class="bg-black text-light">
    <div id="header">
        <div class="container">
            <nav>
                <span class="display-4 text-danger fw-bold mt-2">Mayur Prajapati</span>
                <ul id="sidemenu">
                    <li><a href="#header" class="text-light text-decoration-none position-relative">Home</a></li>
                    <li><a href="#about" class="text-light text-decoration-none position-relative">About</a></li>
                    <li><a href="#services" class="text-light text-decoration-none position-relative">Services</a></li>
                    <li><a href="#portfolio" class="text-light text-decoration-none position-relative">Blog</a></li>
                    <li><a href="#contact" class="text-light text-decoration-none position-relative">Contact</a></li>
                    <i class="fa-solid fa-xmark" onclick="closemenu()"></i>
                </ul>
                <i class="fa-solid fa-bars" onclick="openmenu()"></i>
            </nav>
            <div class="header-text ">
                <p>PHP Web Developer</p>
                <h1>Hi , I'm <span class="text-danger fw-bold display-5"> Mayur</span><br> Prajapati From Ahmedabad</h1>
            </div>
        </div>
    </div>
    <!-- --------About ------- -->
    <div id="about">
        <div class="container">
            <div class="row">
                <div class="about-col-1">
                    <img src="image/User1.png">
                </div>
                <!-- <div class="about-col-2">
                    <h1>About Me</h1>
                </div> -->
                <div class="about-col-2">
                    <h1 class="text-light display-4 fw-bold">About me</h1>
                    <p>I am a passionate PHP developer with experience in creating dynamic and responsive web applications. I enjoy problem-solving and continuously improving my skills to provide efficient and scalable solutions.</p>
                    <div class="tab-titles">
                        <p class="tab-links active-link fw-lighter " onclick="opentab('Skills')">Skills</p>
                        <!-- <p class="tab-links active-link fw-lighter " onclick="opentab('Education')">Education</p> -->
                        <p class="tab-links active-link fw-lighter " onclick="opentab('education')">Education</p>
                    </div>
                    <div class="tab-contents " id="Skills">
                        <ul>
                            <li><span class="text-info fw-bolder fs-5 ">PHP</span><br>PHP is a versatile scripting language crucial for dynamic web development.
                                I utilize PHP to create interactive and functional web applications.
                                My portfolio showcases PHP projects demonstrating my skills in backend development.
                                Explore how I leverage PHP to build robust and scalable web solutions. </li>
                            <li><span class="text-info fw-bolder fs-5 ">HTML</span><br>HTML is the foundational language of the web, used to create and structure web pages.
                                It defines the structure and content of a webpage through elements like tags and attributes.
                                HTML is essential knowledge for web development, forming the basis of every modern website.
                            </li>
                            <li><span class="text-info fw-bolder fs-5 ">MySql</span><br>Proficient in MySQL, adept at database design, querying, and optimization strategies.
                                Experienced in creating efficient SQL queries for data manipulation and retrieval.
                                Familiar with database normalization principles and ensuring data integrity.
                                Skills include stored procedures, triggers, and relational database management. </li>
                        </ul>
                    </div>
                    <div class="tab-contents active-tab" id="education">
                        <ul>
                            <li><span class="text-info fw-bolder fs-5 ">2020-2021</span><br>I'm Complete the 12th in V.V
                                Patel Higher Education School From Ahmedabad-382443 Gujarat.</li>
                            <li><span class="text-info fw-bolder fs-5 ">2021-2024</span><br>I have been Complete The My
                                Degree Of <br>Bachlor Of Computer Application From Ahmedabad.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ------------Services------- -->
    <!-- <div id="services">
        <div class="container">
            <h2 class="text-light display-4 fw-bold">My Services</h2>
            <div class="services-list ">
                <div class="fs-4 fw-bolder">
                <i class="fas fa-code"></i>
                    <h2 class="fs-1 fw-bolder mb-3">Web Development</h2>
                    <p>Creating dynamic and responsive websites using PHP, HTML, CSS, and JavaScript.</p>
                    <a href="#" class="text-decoration-none fs-3 text-light pt-5 d-inline-block">Learn More</a>
                </div>
                <div class=" fs-4 fw-bolder">
                <i class="fas fa-mobile-alt"></i>
                    <h2 class="fs-1 fw-bolder mb-3">Responsive Design</h2>
                    <p>Ensuring websites look great and work well on all devices, from desktops to smartphones.</p>
                    <a href="#" class="text-decoration-none fs-3 text-light pt-5 d-inline-block">Learn More</a>
                </div>
                <div class=" fs-4 fw-bolder">
                <i class="fas fa-database"></i>
                    <h2 class="fs-1  fw-bolder mb-3">Database Management</h2>
                    <p>Designing and managing databases to ensure data integrity and security.</p>
                    <a href="#" class="text-decoration-none fs-3 text-light pt-5 d-inline-block">Learn More</a>
                </div>
            </div>
        </div>
    </div> -->

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
    <!-- -------portfoli--------- -->
    <!-- <div id="portfolio">
        <div class="container">
            <h2 class="text-light display-4 fw-bold">My Work</h2>
            <div class="work-list">
                <div class="work">
                    <img src="image/work.jpg" alt="">
                    <div class="layer">
                        <h3 class="fw-bolder mb-4">Jodhpur Resort</h3>
                        <p>This is so Nice place for Picnic and also for marriege Destination.</p>
                        <a href=""><i class="fa-solid fa-up-right-from-square"></i></a>
                    </div>
                </div>
                <div class="work">
                    <img src="image/work.jpg" alt="">
                    <div class="layer">
                        <h3 class="fw-bolder mb-4">Jodhpur Resort</h3>
                        <p>This is so Nice place for Picnic and also for marriege Destination.</p>
                        <a href=""><i class="fa-solid fa-up-right-from-square"></i></a>
                    </div>
                </div>
                <div class="work">
                    <img src="image/work.jpg" alt="">
                    <div class="layer">
                        <h3 class="fw-bolder mb-4">Jodhpur Resort</h3>
                        <p>This is so Nice place for Picnic and also for marriege Destination.</p>
                        <a href=""><i class="fa-solid fa-up-right-from-square"></i></a>
                    </div>
                </div>
            </div>
            <a href="#" class="btn d-block" id="btn">See More</a>
        </div>
    </div> -->
    <section id="portfolio">
        <div class="container">
            <h2>Portfolio</h2>
            <div class="work-list">
                <div class="work">
                    <img src="image/work1.jpg" class="img-thumbail" alt="Work 1">
                    <div class="layer">
                        <h3>Landding Page</h3>
                        <p>Welcome to my portfolio! Explore my work as a PHP web developer, showcasing dynamic and responsive web solutions. Let's create something amazing together!</p>
                        <a href="#">View</a>
                    </div>
                </div>
                <div class="work">
                    <img src="image/work2.jpg" class="img-thumbail" alt="Work 2">
                    <div class="layer">
                        <h3>Dynamic Form</h3>
                        <p>Created dynamic forms in PHP, allowing flexible input fields based on user selections.
                            Utilized PHP's capabilities to dynamically generate and process form elements.
                        </p>
                        <a href="#">View</a>
                    </div>
                </div>
                <div class="work">
                    <img src="image/work3.jpg" alt="Work 3">
                    <div class="layer">
                        <h3>Website</h3>
                        <p>Developed dynamic websites using PHP, integrating backend logic seamlessly.
                            Implemented secure authentication, database interactions, and dynamic content generation in PHP.</p>
                        <a href="#">View</a>
                    </div>
                </div>
            </div>
            <!-- <a id="btn" href="#contact">Get in Touch</a> -->
        </div>
    </section>
    <!-- -------Contact--------- -->
    <div id="contact">
        <div class="container">
            <div class="row ">
                <div class="contact-left">
                    <h1 class="text-light">Contact Me</h1>
                    <p><i class="fa-regular fa-paper-plane"></i><a href="mailto: pmayurkumar234@gmail.com" style="text-decoration: none; color: #fff; ">pmayurkumar234@gmail.com</a></p>
                    <p><i class="fa-solid fa-square-phone"></i><a href="tel:+919104553201" style="text-decoration: none; color: #fff;">9104553201</a></p>
                    <div class="social-icons">
                        <a href="https://www.facebook.com/prajapati.mayur.528"><i class="fa-brands fa-facebook"></i></a>
                        <a href="https://www.instagram.com/mayur__kumar_/?hl=en"><i class="fa-brands fa-instagram"></i></a>
                        <a href="https://www.linkedin.com/in/prajapati-mayur-36245b190?     "><i class="fa-brands fa-linkedin"></i></a>
                        <!-- <a href=""><i class="fa-brands fa-twitter-square"></i></a> -->
                    </div>
                    <a href="MAYURKUMAR_PHP_WEB_DEVELOPER_Resume.pdf" target="_blank" class="btn1" download>Dowland CV</a>
                    <!-- <button type="submit" id="btn "><a href="" class="text-light">Dowland CV</a></button> -->
                </div>
                <div class="contact-right">
                    <form method="post" class="form" enctype="multipart/form-data">
                        <input type="text" name="name" class="form-control mb-2 text-black fs-6 p-2 m-3" placeholder="Your Name" required>
                        <input type="email" name="email" class="form-control mb-2 text-black p-2 m-3 fs-6" placeholder="Your Email" required>
                        <textarea name="message" class="form-control text-black mb-2 p-2 m-3 fs-6" rows="6" cols="100" placeholder="Your Message"></textarea><br>
                        <button class="btn btn-primary d-grid col-2 gap-3 ms-3 mb-3" name="submit" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="copyright w-100 text-center">
            <p>
                copyright &#169; Designed by PHP Web Developer Mayurkumar Prajapati.
            </p>
        </div>
    </div>
    <script>
        var tablinks = document.getElementsByClassName("tab-links");
        var tabcontents = document.getElementsByClassName("tab-contents");

        function opentab(tabname) {
            for (tablink of tablinks) {
                tablink.classList.remove("active-link");
            }
            for (tabcontent of tabcontents) {
                tabcontent.classList.remove("active-tab");
            }
            event.currentTarget.classList.add("active-link");
            document.getElementById(tabname).classList.add("active-tab");
        }
    </script>
    <script>
        var sidemenu = document.getElementById("sidemenu");

        function openmenu() {
            sidemenu.style.right = "0";
        }

        function closemenu() {
            sidemenu.style.right = "-200px";
        }
    </script>
</body>

</html>