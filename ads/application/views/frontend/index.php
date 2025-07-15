<main class="home-page">
	<section class="banner new-banner">
		<video
			class="banner__bg-video"
			autoplay
			muted
			loop
			playsinline
		>
			<source src="assets/frontend/landingpage/video/home-video.mp4" type="video/mp4">
		</video>

		<div class="overly">
			<div class="banner-contant banner-contant-mob">
				<div class="container">
					<div class="row align-items-start">

						<!-- LEFT COLUMN -->
						<div id="banner-left" class="col-md-8">
							<div id="banner-text" class="banner-text">
								<h1 id="banner-heading" class="d-md-block">
									Tailored IV Drips.<br>
									Trusted by VIPs.
								</h1>
								<h3 id="banner-subheading" class="d-md-block">
									Premium At-Home Care in Dubai
								</h3>
							</div>

							<ul id="banner-features">
								<li class="feature-item">
									<span class="feature-icon">
										<img src="assets/frontend/img/shield.png" alt="Concierge Service">
									</span>
									<span class="feature-text">Concierge Service</span>
								</li>
								<li class="feature-item">
									<span class="feature-icon">
										<img src="assets/frontend/img/fda.png" alt="FDA DHA &amp; MOH Approved">
									</span>
									<span class="feature-text">FDA DHA & MOH Approved Ingredients</span>
								</li>
								<li class="feature-item">
									<span class="feature-icon">
										<img src="assets/frontend/img/lotus.png" alt="GCC Concierge Wellness">
									</span>
									<span class="feature-text">GCC’s 1st Concierge Wellness Service</span>
								</li>
							</ul>
						</div>

						<!-- RIGHT COLUMN -->
						<div id="banner-right" class="col-md-4">
							<div class="form-box" id="form-box">
								<div class="contact-form" id="contact-form">
									<h4 id="form-title">Get a Call Back</h4>
									<form
										id="callback-form"
										class="row request-form contact_form_header"
										method="post">
										<div class="col-md-6 mb-3">
											<input
												class="form-input"
												type="text"
												placeholder="Name"
												name="name"
												required
											/>
										</div>
										<div class="col-md-6 mb-3">
											<input
												class="form-input"
												type="text"
												placeholder="Last Name"
												name="lastname"
												required
											/>
										</div>
										<div class="col-md-6 mb-3">
											<input
												class="form-input"
												type="text"
												placeholder="Phone"
												name="mobile"
												required
												onkeypress="return onlyNumberKey(event)"
											/>
										</div>
										<div class="col-md-6 mb-3">
											<input
												class="form-input"
												type="email"
												placeholder="Email"
												name="email"
												required
											/>
										</div>
										<div class="col-md-12 mb-3">
											<textarea
												class="form-textarea"
												placeholder="Message"
												name="message"
												required
											></textarea>
											<input
												type="hidden"
												name="url_from"
												value="<?= current_url() ?>"
											/>
											<input
												type="hidden"
												name="form_name"
												value="request_a_call_back"
											/>
										</div>
										<div class="col-md-12">
											<input
												id="submit-btn"
												class="primary-btn"
												type="submit"
												value="Submit"
												name="submit"
											/>
										</div>
									</form>
									<div class="msg"></div>
									<div class="loading"></div>
								</div>
							</div>
						</div>


					</div> <!-- /.row -->
				</div> <!-- /.container -->
			</div> <!-- /.banner-contant -->
		</div> <!-- /.overly -->

	</section>
	<section class="about-us">
		<img src="<?=base_url()?>assets/frontend/img/logo2.png" alt="logo">
		<h3 style="text-transform: uppercase; letter-spacing: -5px;">who we are</h3>
		<h5>The GCC’s First Concierge Wellness Service</h5>
		<p>Modern medicine often forgets the most important part of healthcare: the human. Treatment is reactive, rushed, and transactional. Longevity, lifestyle, and individual needs are rarely prioritized. This broken, impersonal system is exactly what led to the birth of Healthcarebia, an unparalleled healthcare experience tailored for high achievers and individuals who are making an impact.</p>
		<p>
			Our commitment is unwavering: to provide an unparalleled healthcare experience that aligns with the standards of excellence you uphold in every facet of your life.</p>
	</section>
	<section class="offerings">
		<div class="left">
			<h1>Every IV protocol is tailored to your biology, lifestyle, and goals.</h1>
			<p>We’ve raised the bar by blending world-class medical expertise with hospitality-grade service. Every IV drip is crafted with the purest, most active ingredients. Every session is led by elite DHA-approved nurses and doctors from around the world.</p>
			<a href="https://healthcarebia.ae/iv-drip-dubai"><button>SEE OFFERINGS <img src="assets/frontend/img/arrow.png" alt="arrow"></button></a>
		</div>
		<div class="right">
			<div class="img-box box1">
				<img class="face1" src="assets/frontend/img/face2.jpeg" alt="">
			</div>
			<div class="img-box box2">
				<img class="face2" src="assets/frontend/img/face1.jpg" alt="">
			</div>
		</div>
	</section>
	<section class="drips">
  	<h1>Our Featured IV Drips</h1>
  	<div class="carousel-slick" id="carousel-slick">
			<div class="drip-container">
				<div class="drip-card">
					<div class="img">
						<div class="img-inner">
							<img
								src="https://www.healthcarebia.ae/assets/frontend/img/myers-cocktail.webp"
								alt="Myers Cocktail Dubai"
								class="img-fluid"
							>
						</div>
					</div>
					<div class="text">
						<h6>Myers Cocktail</h6>
						<ul class="listing-items checkpoints">
							<li>Immunity booster</li>
							<li>Increased vitality &amp; energy</li>
							<li>Improved digestion</li>
						</ul>
					</div>
				</div>
				<div class="prices mt-3">
					<span>From AED 2,300*</span>
					<p>* T&amp;C apply</p>
					<a href="<?=$this->data['whatsappHref']?>" target="_blank">
					<button class="booking">
						Book Now <img src="assets/frontend/img/calender.png" alt="calendar">
					</button>
				</a>
				</div>
			</div>
			<div class="drip-container">
				<div class="drip-card">
					<div class="img">
						<div class="img-inner">
							<img
								src="https://www.healthcarebia.ae/assets/frontend/img/hangover-iv-drip.webp"
								alt="Pre/Post Party IV Drip"
								class="img-fluid"
							>
						</div>
					</div>
					<div class="text">
						<h6>Pre/Post Party IV Drip</h6>
						<ul class="listing-items checkpoints">
							<li>Relief of Nausea, Headache and Body Pains</li>
							<li>Alcohol detoxification</li>
							<li>Energy increase</li>
						</ul>
					</div>
				</div>
				<div class="prices mt-3">
					<span>From AED 1,600*</span>
					<p>* T&amp;C apply</p>
					<a href="<?=$this->data['whatsappHref']?>" target="_blank">
					<button class="booking">
						Book Now <img src="assets/frontend/img/calender.png" alt="calendar">
					</button>
				</a>
				</div>
			</div>
			<div class="drip-container">
				<div class="drip-card">
					<div class="img">
						<div class="img-inner">
							<img
								src="https://www.healthcarebia.ae/assets/frontend/img/nad-iv-drip.webp"
								alt="NAD+ IV Drip"
								class="img-fluid"
							>
						</div>
					</div>
					<div class="text">
						<h6>NAD+ IV Drip</h6>
						<ul class="listing-items checkpoints">
							<li>Reverse the biological clock</li>
							<li>Promotes healthy brain function</li>
							<li>Repairs damaged DNA</li>
							<li>Slows cognitive decline</li>
						</ul>
					</div>
				</div>
				
				<div class="prices mt-3">
					<span>From AED 1,900*</span>
					<p>* T&amp;C apply</p>
					<a href="<?=$this->data['whatsappHref']?>" target="_blank">
						<button class="booking">
							Book Now <img src="assets/frontend/img/calender.png" alt="calendar">
						</button>
					</a>
				</div>
			</div>
			<div class="drip-container">
				<div class="drip-card">
					<div class="img">
						<div class="img-inner">
							<img src="https://www.healthcarebia.ae/assets/frontend/img/immune-booster-iv-drip.webp" alt="Immune System Mega Boost IV Drip" class="img-fluid">
						</div>
					</div>
					<div class="text">
						<h6>Immune System Mega Boost IV Drip</h6>
						<ul class="listing-items checkpoints">
							<li>Improved immunity</li>
							<li>Improved healing ability</li>
							<li>Prevents infections</li>
						</ul>
					</div>
				</div>
				<div class="prices mt-3">
					<span>From AED 1,105*</span>
					<p>* T&amp;C apply</p>
				<a href="<?=$this->data['whatsappHref']?>" target="_blank">
					<button class="booking">Book Now <img src="assets/frontend/img/calender.png"></button>
				</a>
				</div>
			</div>
			<div class="drip-container">
			<div class="drip-card">
				<div class="img">
					<div class="img-inner">
						<img src="https://www.healthcarebia.ae/assets/frontend/img/beauty-iv-drip.webp" alt="Beauty IV Drip" class="img-fluid">
					</div>
				</div>
				<div class="text">
					<h6>Beauty IV Drip</h6>
					<ul class="listing-items checkpoints">
						<li>Improved skin & hair health</li>
						<li>Fights against free radicals</li>
						<li>Radiant & glowing skin</li>
					</ul>
				</div>
			</div>
			<div class="prices mt-3">
				<span>From AED 1,600*</span>
				<p>* T&amp;C apply</p>
				<a href="<?=$this->data['whatsappHref']?>" target="_blank">
					<button class="booking">Book Now <img src="assets/frontend/img/calender.png"></button>
				</a>
			</div>
		</div>

		<div class="drip-container">
			<div class="drip-card">
				<div class="img">
					<div class="img-inner">
						<img src="https://www.healthcarebia.ae/assets/frontend/img/ultra-detox.webp" alt="Ultra Detox IV Drip" class="img-fluid">
					</div>
				</div>
				<div class="text">
					<h6>Ultra Detox IV Drip</h6>
					<ul class="listing-items checkpoints">
						<li>Fights against Harmful Molecules</li>
						<li>Powerful Antioxidant</li>
						<li>Improved digestive system and liver functions</li>
					</ul>
				</div>
			</div>
			<div class="prices mt-3">
				<span>From AED 1,300*</span>
				<p>* T&amp;C apply</p>
				<a href="<?=$this->data['whatsappHref']?>" target="_blank">
					<button class="booking">Book Now <img src="assets/frontend/img/calender.png"></button>
				</a>
			</div>
		</div>

		<div class="drip-container">
			<div class="drip-card">
				<div class="img">
					<div class="img-inner">
						<img src="https://www.healthcarebia.ae/assets/frontend/img/hydration-iv-drip.webp" alt="Swift Hydration IV Drip" class="img-fluid">
					</div>
				</div>
				<div class="text">
					<h6>Swift Hydration IV Drip</h6>
					<ul class="listing-items checkpoints">
						<li>Rapid Skin Hydration</li>
						<li>Increase in Energy</li>
						<li>Reduced Skin inflammation</li>
					</ul>
				</div>
			</div>
			<div class="prices mt-3">
				<span>From AED 400*</span>
				<p>* T&amp;C apply</p>
				<a href="<?=$this->data['whatsappHref']?>" target="_blank">
					<button class="booking">Book Now <img src="assets/frontend/img/calender.png"></button>
				</a>
			</div>
		</div>

		<div class="drip-container">
			<div class="drip-card">
				<div class="img">
					<div class="img-inner">
						<img src="https://www.healthcarebia.ae/assets/frontend/img/her-iv-drip.webp" alt="Her IV Drip" class="img-fluid">
					</div>
				</div>
				<div class="text">
					<h6>Her IV Drip</h6>
					<ul class="listing-items checkpoints">
						<li>Hydration</li>
						<li>Relief from cramps & belly aches</li>
						<li>Nutrient boost</li>
					</ul>
				</div>
			</div>
			<div class="prices mt-3">
				<span>From AED 1,500*</span>
				<p>* T&amp;C apply</p>
				<a href="<?=$this->data['whatsappHref']?>" target="_blank">
					<button class="booking">Book Now <img src="assets/frontend/img/calender.png"></button>
				</a>
			</div>
		</div>

		<div class="drip-container">
			<div class="drip-card">
				<div class="img">
					<div class="img-inner">
						<img src="https://www.healthcarebia.ae/assets/frontend/img/glow-skin-iv-drip.webp" alt="Glow Skin IV Drip" class="img-fluid">
					</div>
				</div>
				<div class="text">
					<h6>Glow Skin IV Drip</h6>
					<ul class="listing-items checkpoints">
						<li>Improve skin hydration</li>
						<li>Reduce fine lines and wrinkles</li>
						<li>Promotes collagen production</li>
						<li>Powerful anti-oxidant</li>
					</ul>
				</div>
			</div>
			<div class="prices mt-3">
				<span>From AED 900*</span>
				<p>* T&amp;C apply</p>
				<a href="<?=$this->data['whatsappHref']?>" target="_blank">
					<button class="booking">Book Now <img src="assets/frontend/img/calender.png"></button>
				</a>
			</div>
		</div>

		<div class="drip-container">
			<div class="drip-card">
				<div class="img">
					<div class="img-inner">
						<img src="https://www.healthcarebia.ae/assets/frontend/img/energy-iv-drip.webp" alt="Energy IV Drip" class="img-fluid">
					</div>
				</div>
				<div class="text">
					<h6>Energy IV Drip</h6>
					<ul class="listing-items checkpoints">
						<li>Improved energy</li>
						<li>Improved focus and mental clarity</li>
						<li>Improved athletic performance</li>
					</ul>
				</div>
			</div>
			<div class="prices mt-3">
				<span>From AED 1,100*</span>
				<p>* T&amp;C apply</p>
				<a href="<?=$this->data['whatsappHref']?>" target="_blank">
					<button class="booking">Book Now <img src="assets/frontend/img/calender.png"></button>
				</a>
			</div>
		</div>

		<div class="drip-container">
			<div class="drip-card">
				<div class="img">
					<div class="img-inner">
						<img src="https://www.healthcarebia.ae/assets/frontend/img/mega-c-iv-drip.webp" alt="Mega C IV Drip" class="img-fluid">
					</div>
				</div>
				<div class="text">
					<h6>Mega C IV Drip</h6>
					<ul class="listing-items checkpoints">
						<li>Source of concentrated Vitamin C</li>
						<li>Detox</li>
						<li>Increased immunity</li>
						<li>Reduced fatigue</li>
					</ul>
				</div>
			</div>
			<div class="prices">
				<span>From AED 1,000*</span>
				<p>* T&amp;C apply</p>
				<a href="<?=$this->data['whatsappHref']?>" target="_blank">
					<button class="booking">Book Now <img src="assets/frontend/img/calender.png"></button>
				</a>
			</div>
		</div>

  	</div>
</section>

	<section class='services video-bg'> 
		<video src="assets/frontend/landingpage/video/waves.mp4" class="video-bg-media"
			autoplay
			muted
			loop
			playsinline></video>
		<div class="video-bg-overlay">
			<h2>Our Services</h2>
		</div>
		<div id="myServices" class="carousel slide" data-bs-ride="carousel">
				<div class="carousel-inner">
					<div class="carousel-item active ">
						<div class="card-wrapper">
							<div class="service-card card" style="
								background-image: url('assets/frontend/img/img1.png');
								background-size: cover;
								background-position: center;
								background-repeat: no-repeat;
								filter: brightness(0.7) saturate(1.5);">
								<p class="service">Human-First Protocols</p>
								<p>Protocols tailored to your biology, goals, and lifestyle</p>
							</div>
							<div class="service-card card" style="
								background-image: url('assets/frontend/img/img6.png');
								background-size: cover;
								background-position: center;
								background-repeat: no-repeat;"
								>
								<p class="service">NAD+ IV Drip</p>
								<p>Recharge cellular energy, enhance mental clarity, and support longevity.</p>
							</div>
							<div class="service-card card" style="
								background-image: url('assets/frontend/img/img2.png');
								background-size: cover;
								background-position: center;
								background-repeat: no-repeat;"
								>
								<p class="service">Lab Tests at Home</p>
								<p>No more guesswork — just personalized care built around your unique biology.</p>
							</div>
						</div>
					</div>
					<div class="carousel-item">
						<div class="card-wrapper">
							<div class="service-card card" style="
								background-image: url('assets/frontend/img/img7.png');
								background-size: cover;
								background-position: center;
								background-repeat: no-repeat;
								">
								<p class="service">Holistic Care</p>
								<p>Create a deeply restorative multi-sensory environment at home</p>
							</div>
							<div class="service-card card" style="
								background-image: url('assets/frontend/img/img4.png');
								background-size: cover;
								background-position: center bottom;
								background-repeat: no-repeat;">
								<p class="service">Discretion Guaranteed</p>
								<p>Discreet at home concierge IV therapy — completely secure, at your convenience</p>
							</div>
							<div class="service-card card" style="
								background-image: url('assets/frontend/img/img5.png');
								background-size: cover;
								background-position: center;
								background-repeat: no-repeat;">
								<p class="service">Personalized IV Therapy</p>
								<p>Tailor-made IV Drips for recovery, hydration, mental clarity, immunity, and more</p>
							</div>
						</div>
					</div>
				</div>
		</div>
	</section>
	<section class="testimonials">
		<div id="myTestimonials" class="carousel carousel-dark slide" data-bs-ride="carousel">
			<div class="carousel-inner">
				<div class="carousel-item active">
					<h2>Testimonials</h2>
					<div class="testimonial-item">
						<div class="testimonial-video-div">
							<div class="testimonial-video-wrapper">
								<iframe
									class="testimonial-video"
									src="https://www.youtube.com/embed/Cke0_5vsi8Q"
									title="YouTube video player"
									frameborder="0"
									allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
									allowfullscreen
								></iframe>
							</div>
						</div>
						<div class="testimonial-copy">
							<h3>Mo Aziz</h3>
							<p>
								“I just had a NAD+ drip via Healthcarebia’s IV drip home service in Dubai, and I feel absolutely incredible. Their IV therapy is efficient, reliable, and truly top-notch, making a real difference in my productivity and energy level.”
							</p>
						</div>
					</div>
				</div>
				<div class="carousel-item">
					<h2>Testimonials</h2>
					<div class="testimonial-item">
						<div class="testimonial-video-div">
							<div class="testimonial-video-wrapper">
								<iframe
									class="testimonial-video"
									src="https://www.youtube.com/embed/ipUMjVFkipc"
									title="YouTube video player"
									frameborder="0"
									allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
									allowfullscreen
								></iframe>
							</div>
						</div>
						<div class="testimonial-copy">
							<h3>Gala</h3>
							<p>
								“After trying Healthcarebia’s immune booster IV drip, I experienced a noticeable boost in energy and overall wellness. The treatment was effective, professionally administered, and made me feel confident about my health journey.”
							</p>
						</div>
					</div>
				</div>
				<div class="carousel-item">
					<h2>Testimonials</h2>
					<div class="testimonial-item">
						<div class="testimonial-video-div">
							<div class="testimonial-video-wrapper">
								<iframe
									class="testimonial-video"
									src="https://www.youtube.com/embed/AkeO7vjzBYQ"
									title="YouTube video player"
									frameborder="0"
									allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
									allowfullscreen
								></iframe>
							</div>
						</div>
						<div class="testimonial-copy">
							<h3>Jeremy Gwyer</h3>
							<p>
								“I've had IV drips consistently for 4 years & this was the first time with active ingredients! Noticeable difference compared to premixed bags. You can definitely feel the effect of this IV therapy. Highly recommend the Myer's Cocktail”
							</p>
						</div>
					</div>
				</div>
			</div>
			<button class="carousel-control-prev" type="button" 		    data-bs-target="#myTestimonials" data-bs-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="visually-hidden" style="color:brown;">Previous</span>
			</button>
			<button class="carousel-control-next" type="button" 	data-bs-target="#myTestimonials" data-bs-slide="next" style="color:brown">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Next</span>
			</button>
		</div>
	</section>
	<section class="end-section">
		<h1 style="letter-spacing: -5px;">Healing Body, Mind & Soul</h1>
		<a href="<?=$this->data['whatsappHref']?>" target="_blank"><button> Book your appointment with us now </button></a>
		
		<div class="contact-details">
			<li>
				<a href="tel:+97142250823">
					<img src="<?=base_url()?>assets/frontend/img/email-icon.png" alt="mobile">
					+971 4 225 0823
				</a>
			</li>
			<li>
				<a href="<?=$this->data['whatsappHref']?>">
					<i class="fab fa-whatsapp"></i>
					+971 54 707 7476
				</a>
			</li>
			<li>
				<a href="mailto:info@healthcarebia.ae">
					<img src="<?=base_url()?>assets/frontend/img/call-icon.png" alt="email">
					info@healthcarebia.ae
				</a>
			</li>

		</div>
	</section>
</main>
<script>
	document.addEventListener('DOMContentLoaded', () => {
		const container = document.querySelector('.offerings .right');
		const images    = container.querySelectorAll('img');
		const maxScale  = 1.5;  // 120% max
		const minScale  = 1.0;  // 100% normal

		function onScroll() {
			const rect = container.getBoundingClientRect();
			const winH = window.innerHeight;

			let ratio = (winH - rect.top) / (winH + rect.height);
			ratio = Math.max(0, Math.min(1, ratio));

			// map that 0→1 to minScale→maxScale
			const scale = minScale + (maxScale - minScale) * ratio;

			images.forEach(img => {
				img.style.transform = `scale(${scale})`;
			});
		} 
		window.addEventListener('scroll', onScroll, { passive: true });
		onScroll();
	});
	$(document).ready(function(){
  $('.carousel-slick').slick({
    slidesToShow: 3,
		autoplay: false,
		autoplaySpeed: 2000,
    dots: false,
		arrows: true,
    centerMode: false,
		infinite: true,
		touchMove: true,
    touchThreshold: 10, 
    responsive: [
      {
        breakpoint: 1190, 
        settings: {
          slidesToShow: 2,
          centerMode: false 
        }
      },
      {
        breakpoint: 720,
        settings: {
          slidesToShow: 1,
          centerMode: false
        }
      }
    ]
  });
});

</script>









