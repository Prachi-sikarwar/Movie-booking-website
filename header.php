<?php
include('config.php');
session_start();
date_default_timezone_set('Asia/Kathmandu');
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Movie Booking</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="all" />
    <link type="text/css" rel="stylesheet" href="http://www.dreamtemplate.com/dreamcodes/tabs/css/tsc_tabs.css" />
    <link rel="stylesheet" href="css/tsc_tabs.css" type="text/css" media="all" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src='js/jquery.color-RGBa-patch.js'></script>
    <script src='js/example.js'></script>

    <style>
        .logo h1 {
            color: #df1f26;
            font-size: 6rem;
            font-weight: bold;
            margin-right: 2rem;
        }
        .hero {
            margin-top: 0px;
            height: 500px;
            background-color: #000;
            position: relative;
            overflow: hidden;
        }
        .hero-slider {
            height: 100%;
            width: 100%;
            position: relative;
        }
        .slider-container {
            height: 100%;
            width: 100%;
            position: relative;
        }
        .slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .slide.active {
            opacity: 1;
        }
        .slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(0.7);
        }
        .slide-content {
            position: absolute;
            bottom: 20%;
            left: 10%;
            color: white;
            text-align: left;
            max-width: 800px;
            transform: translateY(20px);
            opacity: 0;
            transition: all 0.5s ease-in-out 0.3s;
        }
        .slide.active .slide-content {
            transform: translateY(0);
            opacity: 1;
        }
        .slide-content h2 {
            font-size: 4.5rem;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.9);
        }
        .slide-content p {
            font-size: 3.2rem;
            margin-bottom: 1.5rem;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.9);
        }
        .slide-content .book-now {
            padding: 0.8rem 2rem;
            font-size: 2.1rem;
            background-color: #df1f26;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .slide-content .book-now:hover {
            background-color: #c41920;
        }
        .slider-controls {
            position: absolute;
            bottom: 20%;
            right: 10%;
            display: flex;
            gap: 1rem;
        }
        .slider-controls button {
            background: rgba(255,255,255,0.2);
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            color: white;
            cursor: pointer;
            transition: all 0.3s;
        }
        .slider-controls button:hover {
            background: rgba(255,255,255,0.3);
        }
        .slider-dots {
            position: absolute;
            bottom: 10%;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 0.5rem;
        }
        .dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: rgba(255,255,255,0.5);
            cursor: pointer;
            transition: all 0.3s;
        }
        .dot.active {
            background: white;
            transform: scale(1.2);
        }
		

    </style>
</head>

<body>
<div class="header">
    <div class="header-top">
        <div class="wrap">
            <div class="h-logo">
                <div class="logo">
                    <h1>MovieBooking</h1>
                </div>
            </div>
            <div class="nav-wrap">
                <ul class="group" id="example-one">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="movies_events.php">Movies</a></li>
                    <li>
                        <?php 
                        if (isset($_SESSION['user'])) {
                            $us = mysqli_query($con, "SELECT * FROM tbl_registration WHERE user_id='" . $_SESSION['user'] . "'");
                            $user = mysqli_fetch_array($us);
                            echo "<a href='profile.php'>" . $user['name'] . "</a> <a href='logout.php'>Logout</a>";
                        } else {
                            echo "<a href='login.php'>Login</a> <a href='registration.php'>Register</a>";
                        }
                        ?>
                    </li>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>



<section class="hero">
    <div class="hero-slider">
        <div class="slider-container">
            <div class="slide active">
                <img src="w.jpg" alt="Movie 1">
                <div class="slide-content">
                    <h2>Latest Blockbuster</h2>
                    <p>Experience the magic of cinema</p>
                    <button class="book-now">Book Now</button>
                </div>
            </div>
            <div class="slide">
                <img src="t.avif" alt="Movie 2">
                <div class="slide-content">
                    <h2>Premium Experience</h2>
                    <p>Luxury seating & Dolby sound</p>
                    <button class="book-now">Book Now</button>
                </div>
            </div>
            <div class="slide">
                <img src="r.avif" alt="Movie 3">
                <div class="slide-content">
                    <h2>Discounted Tickets</h2>
                    <p>50% off on all tickets on first purchase</p>
                    <button class="book-now">Book Now</button>
                </div>	
            </div>
            <div class="slide">
                <img src="q.avif" alt="Movie 4">
                <div class="slide-content">
                    <h2>Exclusive offers on weekends</h2>
                    <p>Book fast and get your discounts</p>
                    <button class="book-now">Book Now</button>
                </div>
            </div>
        </div>
        <div class="slider-controls">
            <button class="prev-slide"><i class="fas fa-chevron-left"><</i></button>
            <button class="next-slide"><i class="fas fa-chevron-right">></i></button>
        </div>
        <div class="slider-dots"></div>
    </div>
</section>

<script>
function myFunction() {
    const input = document.getElementById('search111').value.trim();
    if (input === "") {
        alert("Please enter a movie name...");
        return false;
    }
    return true;
}

// Slider Functionality
const slides = document.querySelectorAll('.slide');
const dotsContainer = document.querySelector('.slider-dots');
const prevButton = document.querySelector('.prev-slide');
const nextButton = document.querySelector('.next-slide');
let currentSlide = 0;

// Create dots
slides.forEach((_, index) => {
    const dot = document.createElement('div');
    dot.classList.add('dot');
    if (index === 0) dot.classList.add('active');
    dot.addEventListener('click', () => goToSlide(index));
    dotsContainer.appendChild(dot);
});

const dots = document.querySelectorAll('.dot');

function updateSlider() {
    slides.forEach(slide => slide.classList.remove('active'));
    dots.forEach(dot => dot.classList.remove('active'));
    
    slides[currentSlide].classList.add('active');
    dots[currentSlide].classList.add('active');
}

function nextSlide() {
    currentSlide = (currentSlide + 1) % slides.length;
    updateSlider();
}

function prevSlide() {
    currentSlide = (currentSlide - 1 + slides.length) % slides.length;
    updateSlider();
}

function goToSlide(index) {
    currentSlide = index;
    updateSlider();
}

let slideInterval = setInterval(nextSlide, 5000);

function resetInterval() {
    clearInterval(slideInterval);
    slideInterval = setInterval(nextSlide, 5000);
}

prevButton.addEventListener('click', () => {
    prevSlide();
    resetInterval();
});

nextButton.addEventListener('click', () => {
    nextSlide();
    resetInterval();
});
</script>
</body>
</html>
