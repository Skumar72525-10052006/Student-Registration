<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Home Page</title>
    <link rel="stylesheet" href="./assets/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <!--* Home Page Header & Navbar -->
    <header>
        <div class="container">
            <div class="logo-container">
            <img src="./assets/img/logo.webp" alt="High School Logo">
            <h1 class="school-name">D.A.V Public School</h1>
            </div>
        </div>
        <nav>
            <div id="navbar">
                <div class="hamburger">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
                <ul class="nav-menu">
                    <li><a href="#home" class="nav-link">Home</a></li>
                    <li><a href="#about" class="nav-link">About</a></li>
                    <li><a href="#contact" class="nav-link">Contact</a></li>
                    <li><a href="./login.php" target="_blank" class="login-btn">Login</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <section class="hero" id="home">
            <h1>Welcome to the Registration Portal</h1>
            <p class="hero-text">Start your academic journey with us</p>
            <div class="cta-buttons">
                <a href="./register.php" target="_blank" class="btn primary-btn">Register Now</a>
            </div>
        </section>
    
        <section class="features">
            <h2>Why Choose Us</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <h3>Excellence in Education</h3>
                    <p>Committed to providing quality education and fostering academic growth</p>
                </div>
                <div class="feature-card">
                    <h3>Modern Facilities</h3>
                    <p>State-of-the-art infrastructure and learning resources</p>
                </div>
                <div class="feature-card">
                    <h3>Expert Faculty</h3>
                    <p>Learn from experienced and dedicated teachers</p>
                </div>
            </div>
        </section>
        
        <section class="about-details" id="about">
            <div class="container">
                <h2>About D.A.V Public School</h2>
                <div class="about-content">
                    <div class="about-text">
                        <p>Founded in 1986, D.A.V Public School has been a beacon of educational excellence for over three decades. Our institution is committed to nurturing young minds and developing well-rounded individuals who are ready to face the challenges of tomorrow.</p>
            
                        <h3>Our Mission</h3>
                        <p>To provide comprehensive education that combines academic excellence with character development, enabling students to become responsible global citizens.</p>
            
                        <h3>Key Highlights</h3>
                        <ul class="highlights-list">
                            <li>CBSE Affiliated Institution</li>
                            <li>Experienced faculty with average 15+ years of teaching experience</li>
                            <li>State-of-the-art Science and Computer laboratories</li>
                            <li>Extensive sports facilities including indoor and outdoor games</li>
                            <li>Regular workshops and seminars for holistic development</li>
                            <li>Strong focus on extra-curricular activities</li>
                        </ul>

                        <h3>Academic Excellence</h3>
                        <p>Our school consistently achieves outstanding academic results with a 100% pass rate in board examinations. We offer a comprehensive curriculum from Primary to Senior Secondary levels with special focus on:</p>
                        <ul class="academics-list">
                            <li>Science and Mathematics</li>
                            <li>Languages and Literature</li>
                            <li>Arts and Creativity</li>
                            <li>Physical Education</li>
                            <li>Technology and Innovation</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>


        <!-- Contact Section -->
        <section id="contact" class="contact">
            <h2 class="section-title">Contact Me</h2>
            <div class="contact-content">
                <form class="contact-form">
                    <input type="text" placeholder="Your Name" required>
                    <input type="email" placeholder="Your Email" required>
                    <textarea placeholder="Your Message" required></textarea>
                    <button type="submit" class="btn primary">Send Message</button>
                </form>
                <div class="contact-info">
                    <div class="info-item">
                        <i class="fas fa-envelope"></i>
                        <p>sonukumarpaw@gmail.com</p>
                    </div>
                    <div class="info-item">
                        <a href="tel:+919434853756"><i class="fas fa-phone" style="color: black;"></i></a>
                        <p>+91 9434853756</p>
                    </div>
                    <div class="info-item">
                        <a href="https://wa.me/+919434853756"><i class="fa-brands fa-whatsapp fa-xl" style="color: #25d366;"></i></a>
                        <p>+91 9434853756</p>
                    </div>
                    <div class="social-links">
                        <a href="https://github.com/Skumar72525-10052006"><i class="fab fa-github"></i></a>
                        <a href="https://www.linkedin.com/in/sonu-kumar-7003a5325/"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
    <div class="container">
        <p>&copy; 2024 D.A.V Public School. All rights reserved.</p>
        <div class="footer-links">
            <a href="privacy.html">Privacy Policy</a>
            <a href="terms.html">Terms of Use</a>
        </div>
    </div>
    </footer>

</body>
<script src="script.js"></script>
<script>
const hamburger = document.querySelector(".hamburger");
const navMenu = document.querySelector(".nav-menu");

hamburger.addEventListener("click", () => {
    hamburger.classList.toggle("active");
    navMenu.classList.toggle("active");
});

document.querySelectorAll(".nav-link").forEach(n => n.addEventListener("click", () => {
    hamburger.classList.remove("active");
    navMenu.classList.remove("active");
}));
</script>
</html>