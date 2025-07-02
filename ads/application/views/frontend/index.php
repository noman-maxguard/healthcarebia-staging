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
                Premium Care at Home in Dubai
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

          <div id="banner-right" class="col-md-4">
						<div class="form-box" id="form-box">
							<div class="contact-form" id="contact-form">
								<h4 id="form-title">Get a Call Back</h4>
								<form
									id="callback-form"
									class="row request-form contact_form_header"
									method="post"
									action="<?= site_url('welcome/cform') ?>"
								>
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
	<h3>who we are</h3>
	<h5>The GCC’s First Concierge Wellness Service</h5>
	<p>Modern medicine often forgets the most important part of healthcare the human. Treatment is reactive, rushed, and transactional. Longevity, lifestyle, and individual needs are rarely prioritized. This broken, impersonal system is exactly what led to the birth of Healthcarebia an unparalleled healthcare experience tailored towards high achievers and individuals who are making an impact.</p>
	<p>
		Our commitment is unwavering, to provide an unparalleled healthcare experience that aligns with the standards of excellence you uphold in every facet of your life.</p>
</section>
<section class="offerings">
	<div class="left">
		<h1>Every IV protocol is tailored to your biology, lifestyle, and goals.</h1>
		<p>We’ve raised the bar by blending world-class medical expertise with hospitality-grade service. Every IV drip is crafted with the purest, most active ingredients. Every session is led by elite DHA approved nurses and doctors from around the world.</p>
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
<section class='drips' id="dripsPin">
	<h1>Our Featured IV Drips</h1>
	<div class="drip-wrap">
		<div class="drip-container">
			<div class="drip-card">
				<div class="img">
					<div class="img-inner"><img src="https://www.healthcarebia.ae/assets/frontend/img/myers-cocktail.webp" alt="Myers Cocktail Dubai" class="img-fluid"></div>
				</div>
				<div class="text">
					<h6>Myers Cocktail</h6>
					<ul class="listing-items checkpoints">
							<li>Immunity booster</li>
							<li>Increased vitality &amp; energy</li>
							<li>Improved digestion</li>
					</ul>
					<div class="prices mt-3">
							<span>From AED 1,495*</span>
							<p>* T&amp;C apply</p>
					</div>
				</div>
    	</div>
			<a href="<?=$this->data['whatsappHref']?>" target="_blank"><button class="booking">Book Now <img src="assets/frontend/img/calender.png"></button></a>
		</div>
		<div class="drip-container">
			<div class="drip-card">
				<div class="img">
					<div class="img-inner"><img src="https://www.healthcarebia.ae/assets/frontend/img/hangover-iv-drip.webp" alt="Myers Cocktail Dubai" class="img-fluid"></div>
				</div>
				<div class="text">
					<h6>Pre/Post Party IV drip</h6>
					<ul class="listing-items checkpoints">
							<li>Relief of Nausea, Headache and Body Pains</li>
							<li>Alcohol detoxification</li>
							<li>Energy increase</li>
					</ul>
					<div class="prices mt-3">
							<span>From AED 1,040*</span>
							<p>* T&amp;C apply</p>
					</div>
				</div>
    	</div>
			<a href="<?=$this->data['whatsappHref']?>" target="_blank"><button class="booking">Book Now <img src="assets/frontend/img/calender.png"></button></a>
		</div>
		<div class="drip-container">
			<div class="drip-card">
				<div class="img">
					<div class="img-inner"><img src="https://www.healthcarebia.ae/assets/frontend/img/nad-iv-drip.webp" alt="Myers Cocktail Dubai" class="img-fluid"></div>
				</div>
				<div class="text">
					<h6>NAD+ IV Drip</h6>
					<ul class="listing-items checkpoints">
							<li>Reverse the biological clock</li>
							<li>Promotes healthy brain function</li>
							<li>Repairs damaged DNA</li>
							<li>Slows cognitive decline</li>
					</ul>
					<div class="prices mt-3">
							<span>From AED 1,235*</span>
							<p>* T&amp;C apply</p>
					</div>
				</div>
    	</div>
			<a href="<?=$this->data['whatsappHref']?>" target="_blank"><button class="booking">Book Now <img src="assets/frontend/img/calender.png"></button></a>
		</div>
		<div class="drip-container">
			<div class="drip-card">
				<div class="img">
					<div class="img-inner"><img src="https://www.healthcarebia.ae/assets/frontend/img/immune-booster-iv-drip.webp" alt="Myers Cocktail Dubai" class="img-fluid"></div>
				</div>
				<div class="text">
					<h6>Immune System Mega Boost IV Drip</h6>
					<ul class="listing-items checkpoints">
							<li>Improved immunity</li>
							<li>Improved healing ability</li>
							<li>Prevents infections</li>
					</ul>
					<div class="prices mt-3">
							<span>From AED 1,105*</span>
							<p>* T&amp;C apply</p>
					</div>
				</div>
    	</div>
			<a href="<?=$this->data['whatsappHref']?>" target="_blank"><button class="booking">Book Now <img src="assets/frontend/img/calender.png"></button></a>
		</div>
		<div class="drip-container">
			<div class="drip-card">
				<div class="img">
					<div class="img-inner"><img src="https://www.healthcarebia.ae/assets/frontend/img/beauty-iv-drip.webp" alt="Myers Cocktail Dubai" class="img-fluid"></div>
				</div>
				<div class="text">
					<h6>Beauty IV Drip</h6>
					<ul class="listing-items checkpoints">
							<li>Improved skin & hair health</li>
							<li>Fights against free radicals</li>
							<li>Radiant & glowing skin</li>
					</ul>
					<div class="prices mt-3">
							<span>From AED 1,040*</span>
							<p>* T&amp;C apply</p>
					</div>
				</div>
    	</div>
			<a href="<?=$this->data['whatsappHref']?>" target="_blank"><button class="booking">Book Now <img src="assets/frontend/img/calender.png"></button></a>
		</div>
		<div class="drip-container">
			<div class="drip-card">
				<div class="img">
					<div class="img-inner"><img src="https://www.healthcarebia.ae/assets/frontend/img/ultra-detox.webp" alt="Myers Cocktail Dubai" class="img-fluid"></div>
				</div>
				<div class="text">
					<h6>Ultra Detox IV Drip</h6>
					<ul class="listing-items checkpoints">
							<li>Fights against Harmful Molecules</li>
							<li>Powerful Antioxidant</li>
							<li>Improved digestive system and liver functions</li>
					</ul>
					<div class="prices mt-3">
							<span>From AED 1,300*</span>
							<p>* T&amp;C apply</p>
					</div>
				</div>
    	</div>
			<a href="<?=$this->data['whatsappHref']?>" target="_blank"><button class="booking">Book Now <img src="assets/frontend/img/calender.png"></button></a>
		</div>
		<div class="drip-container">
			<div class="drip-card">
				<div class="img">
					<div class="img-inner"><img src="https://www.healthcarebia.ae/assets/frontend/img/hydration-iv-drip.webp" alt="Myers Cocktail Dubai" class="img-fluid"></div>
				</div>
				<div class="text">
					<h6>Swift Hydration IV Drip</h6>
					<ul class="listing-items checkpoints">
							<li>Rapid Skin Hydration</li>
							<li>Increase in Energy</li>
							<li>Reduced Skin inflammation</li>
					</ul>
					<div class="prices mt-3">
							<span>From AED 400*</span>
							<p>* T&amp;C apply</p>
					</div>
				</div>
    	</div>
			<a href="<?=$this->data['whatsappHref']?>" target="_blank"><button class="booking">Book Now <img src="assets/frontend/img/calender.png"></button></a>
		</div>
		<div class="drip-container">
			<div class="drip-card">
				<div class="img">
					<div class="img-inner"><img src="https://www.healthcarebia.ae/assets/frontend/img/her-iv-drip.webp" alt="Myers Cocktail Dubai" class="img-fluid"></div>
				</div>
				<div class="text">
					<h6>Her IV Drip</h6>
					<ul class="listing-items checkpoints">
							<li>Hydration</li>
							<li>Relief from cramps & belly aches</li>
							<li>Nutrient boost</li>
					</ul>
					<div class="prices mt-3">
							<span>From AED 975*</span>
							<p>* T&amp;C apply</p>
					</div>
				</div>
    	</div>
			<a href="<?=$this->data['whatsappHref']?>" target="_blank"><button class="booking">Book Now <img src="assets/frontend/img/calender.png"></button></a>
		</div>
		<div class="drip-container">
			<div class="drip-card">
				<div class="img">
					<div class="img-inner"><img src="https://www.healthcarebia.ae/assets/frontend/img/glow-skin-iv-drip.webp" alt="Myers Cocktail Dubai" class="img-fluid"></div>
				</div>
				<div class="text">
					<h6>Glow Skin IV Drip</h6>
					<ul class="listing-items checkpoints">
							<li>Improve skin hydration</li>
							<li>Reduce fine lines wrinkles</li>
							<li>Promotes collagen production</li>
							<li>Powerful anti-oxidant</li>
					</ul>
					<div class="prices mt-3">
							<span>From AED 720*</span>
							<p>* T&amp;C apply</p>
					</div>
				</div>
    	</div>
			<a href="<?=$this->data['whatsappHref']?>" target="_blank"><button class="booking">Book Now <img src="assets/frontend/img/calender.png"></button></a>
		</div>
		<div class="drip-container">
			<div class="drip-card">
				<div class="img">
					<div class="img-inner"><img src="https://www.healthcarebia.ae/assets/frontend/img/energy-iv-drip.webp" alt="Myers Cocktail Dubai" class="img-fluid"></div>
				</div>
				<div class="text">
					<h6>Energy IV Drip</h6>
					<ul class="listing-items checkpoints">
							<li>Improved energy</li>
							<li>Improved focus mental clarity</li>
							<li>Improved athletic performance</li>
					</ul>
					<div class="prices mt-3">
							<span>From AED 715*</span>
							<p>* T&amp;C apply</p>
					</div>
				</div>
    	</div>
			<a href="<?=$this->data['whatsappHref']?>" target="_blank"><button class="booking">Book Now <img src="assets/frontend/img/calender.png"></button></a>
		</div>
		<div class="drip-container">
			<div class="drip-card">
				<div class="img">
					<div class="img-inner"><img src="https://www.healthcarebia.ae/assets/frontend/img/mega-c-iv-drip.webp" alt="Myers Cocktail Dubai" class="img-fluid"></div>
				</div>
				<div class="text">
					<h6>Mega C IV Drip</h6>
					<ul class="listing-items checkpoints">
							<li>Source of concentrated Vitamin C</li>
							<li>Detox</li>
							<li>Increased immunity</li>
							<li>Reduced fatigue</li>
					</ul>
					<div class="prices mt-3">
							<span>From AED 650*</span>
							<p>* T&amp;C apply</p>
					</div>
				</div>
    	</div>
			<a href="<?=$this->data['whatsappHref']?>" target="_blank"><button class="booking">Book Now <img src="assets/frontend/img/calender.png"></button></a>
		</div>
		

  </div>
</section>
<section class='services video-bg' id="servicesPin">
	<video src="assets/frontend/landingpage/video/waves.mp4" class="video-bg-media"
    autoplay
    muted
    loop
    playsinline></video>
	<div class="video-bg-overlay">
		<h2>Ultra-Personalized Services</h2>
	</div>
	<div class="pin-wrap">
    <div class="service-card" style="
			background-image: url('assets/frontend/img/human-first.jpg');
			background-size: cover;
			background-position: center;
			background-repeat: no-repeat;
			filter: brightness(0.8) saturate(1.5);">
      <p class="service">Human-First Protocols</p>
      <p>Holistic protocols tailored to your biology, goals and lifestyle</p>
    </div>
    <div class="service-card" style="
			background-image: url('assets/frontend/img/service1.jpg');
			background-size: cover;
			background-position: center;
			background-repeat: no-repeat;
			filter: brightness(0.8) saturate(1.5);">
      <p class="service">NAD+ IV Drip</p>
      <p>Unlock cellular energy and mental clarity. Trusted by VIPs and high performers</p>
    </div>
    <div class="service-card" style="
			background-image: url('assets/frontend/img/at-home.jpg');
			background-size: cover;
			background-position: center;
			background-repeat: no-repeat;
			filter: brightness(0.8) saturate(1.5);">
      <p class="service">Lab Tests at Home</p>
      <p>No more guesswork - just personalized care built around your unique biology.</p>
    </div>
    <div class="service-card" style="
			background-image: url('assets/frontend/img/holistic.jpg');
			background-size: cover;
			background-position: center;
			background-repeat: no-repeat;
			filter: brightness(0.8) saturate(1.5);">
      <p class="service">Holistic Care</p>
      <p>Create a deeply restorative multi-sensory environment at-home</p>
    </div>
    <div class="service-card" style="
			background-image: url('assets/frontend/img/discretion.jpg');
			background-size: cover;
			background-position: center;
			background-repeat: no-repeat;
			filter: brightness(0.8) saturate(1.5);">
      <p class="service">Discretion Guaranteed</p>
      <p>Discreet At-home concierge IV Therapy - completely secure, at your time</p>
    </div>
    <div class="service-card" style="
			background-image: url('assets/frontend/img/personal.jpg');
			background-size: cover;
			background-position: center;
			background-repeat: no-repeat;
			filter: brightness(0.8) saturate(1.5);">
      <p class="service">Personalized IV Therapy</p>
      <p>Tailor-made IV Drips for recovery, hydration, mental clarity, immunity and more</p>
    </div>
    <div class="service-spacer"></div>
  </div>
</section>
<section class="testimonials">
  <!-- Swiper -->
  <div class="swiper myTestimonials">
    <div class="swiper-wrapper">
			<div class="swiper-slide slide">
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
      <div class="swiper-slide slide">
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
      <div class="swiper-slide slide">
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
              “I've had IV drips consistent for 4 years & this was the first time with active ingredients ! Noticeable difference compared to premixed bags. You can definitely feel effect of this IV therapy, Highly recommend the Myer's Cocktail”
            </p>
          </div>
        </div>
      </div>
    </div>
    <!-- navigation arrows -->
    <div class="swiper-button-prev" id='prev'></div>
    <div class="swiper-button-next" id='next'></div>
  </div>
</section>
<section class="end-section">
	<h1>Healing Body, Mind & Soul</h1>
	<a href="<?=$this->data['whatsappHref']?>" target="_blank"><button> Book your appointment with us now </button></a>
	
	<div class="contact-details">
		<li><img src="<?=base_url()?>assets/frontend/img/email-icon.png" alt="mobile">+971 4 225 0823</li>
		<li><i class="fab fa-whatsapp"></i>+971 54 707 7476</li>
		<li><img src="<?=base_url()?>assets/frontend/img/call-icon.png" alt="email">info@healthcarebia.ae</li>
	</div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
<script>
	document.addEventListener('DOMContentLoaded', () => {
		const container = document.querySelector('.offerings .right');
		const images    = container.querySelectorAll('img');
		const maxScale  = 1.5;  // 120% max
		const minScale  = 1.0;  // 100% normal

		function onScroll() {
			const rect = container.getBoundingClientRect();
			const winH = window.innerHeight;

			// compute a 0→1 ratio for how "into view" the box is:
			// 0 = just below the viewport bottom
			// 1 = scrolled so the top hits the viewport top
			let ratio = (winH - rect.top) / (winH + rect.height);
			ratio = Math.max(0, Math.min(1, ratio));

			// map that 0→1 to minScale→maxScale
			const scale = minScale + (maxScale - minScale) * ratio;

			images.forEach(img => {
				img.style.transform = `scale(${scale})`;
			});
		}

		// bind + init
		window.addEventListener('scroll', onScroll, { passive: true });
		onScroll();

		new Swiper(".myTestimonials", {
				loop: true,
				autoplay: {
					delay: 7000,
					disableOnInteraction: false,
				},
				pagination: {
					el: ".swiper-pagination",
					clickable: true,
				},
				navigation: {
					nextEl: ".swiper-button-next",
					prevEl: ".swiper-button-prev",
				},
				spaceBetween: 30,
			});
	});
</script>
<script>
  gsap.registerPlugin(ScrollTrigger);

window.addEventListener("load", () => {
  const section  = document.getElementById("dripsPin");
  const dripWrap = section.querySelector(".drip-wrap");
  const lastCard = dripWrap.querySelector(".drip-container:last-child");

  gsap.to(dripWrap, {
    // x is now a function, so it's re-evaluated on each refresh
    x: () => {
      const wrapRect = section.getBoundingClientRect();
      const lastRect = lastCard.getBoundingClientRect();
      // distance to scroll = (lastCard’s right edge – container’s left edge) – viewport width
      return -((lastRect.right - wrapRect.left) - window.innerWidth);
    },
    ease: "none",
    scrollTrigger: {
      trigger: section,
      start: "top top",
      // end is also a function, so it grows/shrinks with the viewport
      end: () => {
        const wrapRect = section.getBoundingClientRect();
        const lastRect = lastCard.getBoundingClientRect();
        const dist = (lastRect.right - wrapRect.left) - window.innerWidth;
        return `+=${dist}`;
      },
      scrub: true,
      pin: true,
      anticipatePin: 1,
			// pinSpacing: false,
      invalidateOnRefresh: true 
    }
  });
});
</script>
<script>
  gsap.registerPlugin(ScrollTrigger);

  window.addEventListener("load", () => {
    const section = document.getElementById("servicesPin");
    const pinWrap = section.querySelector(".pin-wrap");
    const lastItem = pinWrap.querySelector(".pin-wrap > *:last-child");

    gsap.to(pinWrap, {
      x: () => {
        const wrapRect = section.getBoundingClientRect();
        const lastRect = lastItem.getBoundingClientRect();
        // negative distance = how far left to move
        return -((lastRect.right - wrapRect.left) - window.innerWidth);
      },
      ease: "none",
      scrollTrigger: {
        trigger: section,
        start: "top top",
        end: () => {
          const wrapRect = section.getBoundingClientRect();
          const lastRect = lastItem.getBoundingClientRect();
          const dist = (lastRect.right - wrapRect.left) - window.innerWidth;
          return `+=${dist}`;
        },
        scrub: true,
        pin: true,
        anticipatePin: 1,
        invalidateOnRefresh: true, // recompute x/end on resize/orientation change
        // markers: true // uncomment to debug start/end positions
      }
    });
  });
</script>








