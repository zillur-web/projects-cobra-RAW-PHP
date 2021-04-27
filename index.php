<?php
require 'inc/header.php';
?>

<!-- main-area -->
<main>

    <!-- banner-area -->
    <section id="home" class="banner-area banner-bg fix">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-7 col-lg-6">
                    <div class="banner-content">
                        <h6 class="wow fadeInUp" data-wow-delay="0.2s">HELLO!</h6>
                        <h2 class="wow fadeInUp" data-wow-delay="0.4s">I am <span style="color: inherit;" class="txt-type" data-wait="3000" data-words='["<?= $author_name_assoc['name'];?>"]'></span></h2>
                        <p class="wow fadeInUp" data-wow-delay="0.6s">I'm <?= $author_name_assoc['name'].', '.$settings_assoc['tagline'];?></p>
                        <div class="banner-social wow fadeInUp" data-wow-delay="0.8s">
                            <ul>
                                <?php
                                foreach ($social_query as $key => $value) { ?>
                                    <li><a  target="_blank" href="<?= $value['link']?>"><i class="<?= $value['icon']?>"></i></a></li>
                                <?php }
                                ?>
                            </ul>
                        </div>
                        <a href="#portfolio" class="btn wow fadeInUp" data-wow-delay="1s">SEE PORTFOLIOS</a>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 d-none d-lg-block">
                    <div class="banner-img text-right">
                        <img src="front/assets/img/banner/banner_img.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="banner-shape"><img src="front/assets/img/shape/dot_circle.png" class="rotateme" alt="img"></div>
    </section>
    <!-- banner-area-end-->

    <!-- about-area-->
    <section id="about" class="about-area primary-bg pt-120 pb-120">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-img">
                        <img class="text-center" style="width: 500px;" src="front/assets/img/banner/banner2.png" title="me-01" alt="me-01">
                    </div>
                </div>
                <div class="col-lg-6 pr-90">
                    <div class="section-title mb-25">
                        <span>Introduction</span>
                        <h2>About Me</h2>
                    </div>
                    <div class="about-content">
                        <p><?=$settings_assoc['about'];?></p>
                        <h3>Qualifications:</h3>
                    </div>
                    <?php foreach ($qualification_query as $key => $value): ?>
                        <!-- Education Item -->
                        <div class="education">
                            <div class="year"><?=$value['year'];?></div>
                            <div class="line"></div>
                            <div class="location">
                                <span><?=$value['title'];?></span>
                                <div class="progressWrapper">
                                    <div class="progress">
                                        <div class="progress-bar wow slideInLefts" data-wow-delay="0.2s" data-wow-duration="2s" role="progressbar" style="width: <?=$value['result'].'%';?>;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Education Item -->
                        
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </section>
    <!-- about-area-end -->

    <!-- Services-area -->
    <section id="service" class="services-area pt-120 pb-50">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="section-title text-center mb-70">
                        <span>WHAT WE DO</span>
                        <h2>Services and Solutions</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                foreach ($services_query as $key => $value) { ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="icon_box_01 wow fadeInLeft" data-wow-delay="0.2s">
                            <i class="<?= $value['icon']?>"></i>
                            <h3><?= $value['title']?></h3>
                            <p><?= $value['summary']?></p>
                        </div>
                    </div>
                <?php }
                ?>
                
            </div>
        </div>
    </section>
    <!-- Services-area-end -->

    <!-- Portfolios-area -->
    <section id="portfolio" class="portfolio-area primary-bg pt-120 pb-90">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="section-title text-center mb-70">
                        <span>Portfolio Showcase</span>
                        <h2>My Recent Best Works</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach ($portfolio_query as $key => $value): ?>
                    <div class="col-lg-4 col-md-6 pitem">
                        <div class="speaker-box">
                            <div class="speaker-thumb">
                                <img style="width: 400px; height: 300px;" src="dashboard/upload/thumbnail/<?=$value['thumbnail'];?>" alt="img">
                            </div>
                            <div class="speaker-overlay">
                                <span><?= $value['category'];?></span>
                                <h4><a href="portfolio-single.php?id=<?=$value['id']?>"><?= $value['title'];?></a></h4>
                                <a href="portfolio-single.php?id=<?=$value['id']?>" class="arrow-btn">More information <span></span></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </section>
    <!-- services-area-end -->

    <!-- fact-area -->
    <section class="fact-area">
        <div class="container">
            <div class="fact-wrap">
                <div class="row justify-content-between">
                    <div class="col-xl-2 col-lg-3 col-sm-6">
                        <div class="fact-box text-center mb-50">
                            <div class="fact-icon">
                                <i class="flaticon-award"></i>
                            </div>
                            <div class="fact-content">
                                <h2><span class="count"><?= $facts_assoc['future_projects'];?></span></h2>
                                <span>Feature Item</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-sm-6">
                        <div class="fact-box text-center mb-50">
                            <div class="fact-icon">
                                <i class="flaticon-like"></i>
                            </div>
                            <div class="fact-content">
                                <h2><span class="count"><?= $facts_assoc['active_projects'];?></span></h2>
                                <span>Active Products</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-sm-6">
                        <div class="fact-box text-center mb-50">
                            <div class="fact-icon">
                                <i class="flaticon-event"></i>
                            </div>
                            <div class="fact-content">
                                <h2><span class="count"><?= $facts_assoc['year_experience'];?></span></h2>
                                <span>Year Experience</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-sm-6">
                        <div class="fact-box text-center mb-50">
                            <div class="fact-icon">
                                <i class="flaticon-woman"></i>
                            </div>
                            <div class="fact-content">
                                <h2><span class="count"><?= $facts_assoc['clients'];?></span></h2>
                                <span>Our Clients</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- fact-area-end -->

    <!-- testimonial-area -->
    <section class="testimonial-area primary-bg pt-115 pb-115">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="section-title text-center mb-70">
                        <span>testimonial</span>
                        <h2>happy customer quotes</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-9 col-lg-10">
                    <div class="testimonial-active">
                        <?php foreach ($quotes_query as $key => $value): ?>
                            <div class="single-testimonial text-center">
                                <div class="testi-avatar">
                                    <img style="border-radius: 50%;width: 100px;height: 100px;" src="dashboard/upload/quotes/<?=$value['image'] ?>" alt="img">
                                </div>
                                <div class="testi-content">
                                    <h4><span>“ </span><?=$value['quotes'] ?><span> ”</span></h4>
                                    <div class="testi-avatar-info">
                                        <h5><?=$value['name'] ?></h5>
                                        <span><?=$value['designation'] ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- testimonial-area-end -->

    <!-- brand-area -->
    <div class="barnd-area pt-100 pb-100">
        <div class="container">
            <div class="row brand-active">
                <?php foreach ($partner_query as $key => $value): ?>
                    <span>
                        <div class="col-xl-2">
                            <div class="single-brand">
                                <img style="width: 200px;" src="dashboard/upload/partner-company/<?=$value['company_logo'];?>" alt="img">
                            </div>
                        </div>
                    </span>
                <?php endforeach ?>
            </div>
        </div>
    </div>
    <!-- brand-area-end -->

    <!-- contact-area -->
    <section id="contact" class="contact-area primary-bg pt-120 pb-120">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="section-title mb-20">
                        <span>information</span>
                        <h2>Contact Information</h2>
                    </div>
                    <div class="contact-content">
                        <p>Event definition is - somthing that happens occurre How evesnt sentence. Synonym when an unknown printer took a galley.</p>
                        <h5>OFFICE IN <span>BANGLADESH</span></h5>
                        <div class="contact-list">
                            <ul>
                                <li><i class="fas fa-map-marker"></i><span>Address :</span><?=$settings_assoc['office_address'];?></li>
                                <li><i class="fas fa-headphones"></i><span>Phone :</span><?=$settings_assoc['phone'];?></li>
                                <li><i class="fas fa-globe-asia"></i><span>e-mail :</span><?=$settings_assoc['email'];?></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <?php
                    if (isset($_SESSION['MessageSend'])) {
                      ?>
                      <div class="alert alert-success">
                        <span>
                          <?php
                          echo $_SESSION['MessageSend'];
                          unset($_SESSION['MessageSend']);
                          ?>
                      </span>
                  </div>
                  <?php
              }
              if (isset($_SESSION['MessageNotSend'])) {
                  ?>
                  <div class="alert alert-danger">
                    <span>
                      <?php
                      echo $_SESSION['MessageNotSend'];
                      unset($_SESSION['MessageNotSend']);
                      ?>
                  </span>
              </div>
              <?php
          }
          ?> 
          <div class="contact-form">
            <form action="contact-post.php" method="POST">
                <input type="text" placeholder="your name *" name="name">
                <span class="text-danger">
                    <?php 
                    if (isset($_SESSION['MessageNameErr'])) {
                      echo "<style>.MessageNameErr{border:1px solid red;}</style>";
                      echo $_SESSION['MessageNameErr'];
                      unset($_SESSION['MessageNameErr']);
                  }
                  ?>
              </span>
              <input style="text-transform: lowercase;" type="email" placeholder="your email *" name="email">
              <span class="text-danger">
                <?php 
                if (isset($_SESSION['MessageEmalErr'])) {
                  echo "<style>.MessageEmalErr{border:1px solid red;}</style>";
                  echo $_SESSION['MessageEmalErr'];
                  unset($_SESSION['MessageEmalErr']);
              }
              ?>
          </span>
          <textarea name="message" id="message" placeholder="your message *"></textarea>
          <span class="text-danger">
            <?php 
            if (isset($_SESSION['MessageErr'])) {
              echo "<style>.MessageErr{border:1px solid red;}</style>";
              echo $_SESSION['MessageErr'];
              unset($_SESSION['MessageErr']);
          }
          ?>
      </span>
      <button class="btn">SEND</button>
  </form>
</div>
</div>
</div>
</div>
</section>
<!-- contact-area-end -->

</main>
<!-- main-area-end -->
<script type="text/javascript">
    // ES6 Class
    class TypeWriter {
      constructor(txtElement, words, wait = 3000) {
        this.txtElement = txtElement;
        this.words = words;
        this.txt = '';
        this.wordIndex = 0;
        this.wait = parseInt(wait, 10);
        this.type();
        this.isDeleting = false;
    }

    type() {
    // Current index of word
    const current = this.wordIndex % this.words.length;
    // Get full text of current word
    const fullTxt = this.words[current];

    // Check if deleting
    if(this.isDeleting) {
      // Remove char
      this.txt = fullTxt.substring(0, this.txt.length - 1);
  } else {
      // Add char
      this.txt = fullTxt.substring(0, this.txt.length + 1);
  }
    // Insert txt into element
    this.txtElement.innerHTML = `<span class="txt">${this.txt}</span>`;

    // Initial Type Speed
    let typeSpeed = 100;

    if(this.isDeleting) {
      typeSpeed /= 2;
  }

    // If word is complete
    if(!this.isDeleting && this.txt === fullTxt) {
      // Make pause at end
      typeSpeed = this.wait;
      // Set delete to true
      this.isDeleting = true;
  } else if(this.isDeleting && this.txt === '') {
      this.isDeleting = false;
      // Move to next word
      this.wordIndex++;
      // Pause before start typing
      typeSpeed = 100;
  }
  setTimeout(() => this.type(), typeSpeed);
}
}

// Init On DOM Load
document.addEventListener('DOMContentLoaded', init);

// Init App
function init() {
  const txtElement = document.querySelector('.txt-type');
  const words = JSON.parse(txtElement.getAttribute('data-words'));
  const wait = txtElement.getAttribute('data-wait');
  // Init TypeWriter
  new TypeWriter(txtElement, words, wait);
}

</script>
<?php
require 'inc/footer.php';
?>
