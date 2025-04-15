<html>
<body>
<?php
include('header.php');
?>
<div class="content">
	<div class="wrap">
		<div class="content-top">
				<div class="listview_1_of_3 images_1_of_3">
					<h2 style="color:#555;">Upcoming Movies</h2>
					<?php 
					$qry3=mysqli_query($con,"SELECT * FROM tbl_news LIMIT 5");
					
					while($n=mysqli_fetch_array($qry3))
					{
					?>
				<div class="content-left">
					<div class="listimg listimg_1_of_2">
						 <img src="admin/<?php echo $n['attachment'];?>">
					</div>
					<div class="text list_1_of_2">
						  <div class="extra-wrap">
						  	<span style="text-color:#000" class="data"><strong><?php echo $n['name'];?></strong><br>
						  	<span style="text-color:#000" class="data"><strong>Cast :<?php echo $n['cast'];?></strong><br>
                                <div class="data">Release Date :<?php echo $n['news_date'];?></div>
                                
                                
                                
                                <span class="text-top"><?php echo $n['description'];?></span>
                          </div>
					</div>
					<div class="clear"></div>
				</div>
				<?php
				}
				?>
				
			
		</div>				
		<div class="listview_1_of_3 images_1_of_3">
					<h2 style="color:#555;">Movie Trailers</h2>
						<div class="middle-list">
					<?php 
					$qry4=mysqli_query($con,"SELECT * FROM tbl_movie ORDER BY rand() LIMIT 6");
				
					while($nm=mysqli_fetch_array($qry4))
					{
					?>
					
						<div class="listimg1">
							 <a target="_blank" href="<?php echo $nm['video_url'];?>"><img src="<?php echo $nm['image'];?>" alt=""/></a>
							 <a target="_blank" href="<?php echo $nm['video_url'];?>" class="link" style="text-decoration:none; font-size:14px;"><?php echo $nm['movie_name'];?></a>
						</div>
						<?php
					}
					?>
					</div>
					
					
		</div>			
		<?php include('movie_sidebar.php');?>
	</div>
</div>
<script>
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
<?php include('footer.php');?>
</div>
<?php include('searchbar.php');?>