<?php
include_once "base.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resume</title>
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <!-- for web font -->
  <link rel="stylesheet" href="https://use.typekit.net/swe4czq.css">
  <!-- aos js stylesheet-->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <!-- animate css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <!-- my stylesheet -->
  <link rel="stylesheet" href="css/resumev2.css">
  <link rel="stylesheet" href="css/media.css">
  <!-- font awesome -->
  <script src="https://kit.fontawesome.com/d4ac8916dc.js" crossorigin="anonymous"></script>
  <!-- aos js script -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <!-- lottie js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.7.5/lottie.min.js" integrity="sha512-0bCDSnaX8FOD9Mq8WbHcDwshXwCB5V4EP+UBu87WQgga2b7lAsuEbaSmIZjH/XEmNhJuhrPbFHemre5HZwrk9w==" crossorigin="anonymous"></script>
  <!-- jquery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
  </script>
</head>

<body>

  <!-- header最外層 -->
  <header class="container-fluid title">
    <!-- navigation bar -->
    <nav>
      <div class="logo">
        <h4>Sadie Hsieh</h4>
      </div>
      <ul class="nav-links">
        <li><a href="#">Home</a></li>
        <li><a href="#about-me">About</a></li>
        <li><a href="#skills">Skills</a></li>
        <li><a href="#exps">Experience</a></li>
        <li><a href="#portfolio">works</a></li>
        <li><a href="login.html">login</a></li>


        <!-- Modal -->

      </ul>
      <div class="burger">
        <div class="l-1"></div>
        <div class="l-2"></div>
        <div class="l-3"></div>
      </div>
    </nav>
    <!-- naviagtion bar ends here -->
    <!-- header remaining space -->
    <div class="header-box">

      <div class="top-cap-wrapper text-center">
        <h1 class="top-cap ">Sadie Hsieh</h1>
        <span class="top-cap-line"></span>
        <p class="top-cap-dsp">Back-End Developer Based in Taipei</p>
      </div>
      <div class="me-icon ">
        <div class="bm " data-file="me" id="me-icon">
        </div>
      </div>
    </div>

  </header>

  <section>
    <div class="mid-sec-one container-fluid">
      <div class="sec-one-row">
        <div class="left">
          <?php
          $infos = $Info->all();
          foreach ($infos as $info) {


          ?>
            <!-- the caption of about me -->
            <h2 class="intro-cap" id="about-me">Hello, 我是<span style="color: var(--themeDarkest)"><?= $info['name'] ?></span>。
            </h2>
            <h3 class="intro-cap-desp">寫程式的文學人</h3>
            <div class="line"></div>


            <div class="intro-box">
              <img src="
            <?php
            $imgs = $Img->all(['sh' => 1]);
            foreach ($imgs as $img) {
              echo "image/" . $img['img'];
            }
            ?>
            
            " alt="profile-pic" id="my-img">
              <div class="sec-one-text-box">
                <p class="short-intro">
                  <?= $info['shortintro'] ?>
                </p>


                <div class="interest mt-5">
                  <p class="interest-title">當我不在寫程式，我在...</p>
                  <ul class="interest-list">
                    <?php
                    $aa = unserialize($info['hobbies']);
                    foreach ($aa as $a) {
                      echo "<li class='interest-item'>" . $a . "</li>";
                    }
                    ?>
                  </ul>
                </div>

              </div>
            </div>
        </div>
      </div>
    </div>
  </section>
<?php
          }
?>

<section class="mid-sec-two container-fluid">
  <!-- skills caption section -->

  <h2 class="short-cap" id="skills">Skills</h2>
  <div class="line"></div>

  <!-- skill cards -->
  <div class="mid-sec-two-row row">

    <div class="card card01 col-5 col-sm-12 shadow">
      <div class="card-header card01-header">
        <img src="image/front-hand.png" alt="front of hand" class="card-icon" id="front">
        <h3 class="card-cap">Front-End</h3>
      </div>
      <ul class="list-group list-group-flush card01-kids">
        <?php
        $skills = $Skills->all(['tech' => 'frontend', 'sh' => 1]);
        foreach ($skills as $skill) {
          echo  "<li class='list-group-item card01-kids'>" . $skill['name'] . "</li>";
        }
        ?>

      </ul>
    </div>


    <div class="card card02 col-5 col-sm-12 shadow">
      <div class="card-header card02-header">
        <img src="image/back-hand.png" alt="back of hand" class="card-icon" id="back ">
        <h3 class="card-cap">Back-End</h3>
      </div>
      <ul class="list-group list-group-flush card02-kids">
        <?php
        $skills = $Skills->all(['tech' => 'backend', 'sh' => 1]);
        foreach ($skills as $skill) {
          echo  "<li class='list-group-item card02-kids'>" . $skill['name'] . "</li>";
        }
        ?>

      </ul>
    </div>
    <div class="card card03 col-5 col-sm-12 shadow">
      <div class="card-header card03-header">
        <img src="image/lipsx0.5.png" alt="lips" class="card-icon" id="lips">
        <h3 class="card-cap">Language </h3>
      </div>
      <ul class="list-group list-group-flush card03-kids text-center">
        <?php
        $skills = $Skills->all(['tech' => 'language', 'sh' => 1]);
        foreach ($skills as $skill) {
          echo  "<li class='list-group-item card03-kids'>" . $skill['name'] . "</li>";
        }
        ?>


      </ul>
    </div>


    <div class="card card04 col-5  col-sm-12 shadow">
      <div class="card-header card04-header">
        <img src="image/tool.png" alt="lips" class="card-icon" id="tool">
        <h3 class="card-cap" id="card-cap-others">Others</h3>
      </div>
      <ul class="list-group list-group-flush card04-kids">
        <?php
        $skills = $Skills->all(['tech' => 'visual', 'sh' => 1]);
        foreach ($skills as $skill) {
          echo  "<li class='list-group-item card04-kids'>" . $skill['name'] . "</li>";
        }
        ?>


      </ul>
    </div>
  </div>
  </div>
</section>
<section class="mid-sec-seven" id="eduCon">
<div class="mid-sec-seven-row">
<h2 class="short-cap" id="con">Education/Looking For... </h2>
    <div class="line-seven"></div>
    <div class="row con-row">
        <div class="col-6" ></div>
        <div class="col-6"></div>
    </div>
</div>
</section>
<section class="mid-sec-three" id="exp">
  <div class="mid-sec-three-row">
    <h2 class="short-cap" id="exps">Experience</h2>
    <div class="line-three"></div>


    <div class="timeline">
      <?php
      $exps = $Exps->all(['sh' => 1]);
      $i = 0;
      $state = TRUE;
      foreach ($exps as $exp) {
        //echo "<div class='eg-one timeline-element-box'>";
        if ($i % 2 != 0) {
          $state = False;
        } else {
          $state = True;
        }
        switch ($state) {
          case True:
            echo "<div class='eg-one timeline-element-box'>";
            echo  "<div class='element-content'>";
            break;
          case False:
            echo "<div class='eg-one timeline-element-box right-box'>";
            echo  "<div class='element-content right-element'>";
        }
        $i++;

        echo "<div class='ele-cap-box'>";
        echo "<h2 class='ele-cap'>" . $exp['name'] . "</h2>";
        echo "<h3 class='ele-sub'>" . $exp['title'] . "</h3>";
        echo "<h3 class='period'>📍" . $exp['start'] . "~" . $exp['end'] . "</h3>";
        echo "</div>";
        echo "<hr class='timeline-hr'>";
        echo "<ul class='timeline-ul'>";
        $tt = unserialize($exp['list']);
        foreach ($tt as $t) {
          echo "<li class='timeline-li'>" . $t . "</li>";
        }
        echo "</ul>";
        echo "</div>";
        echo "</div>";
        echo $state;
      }
      ?>




    </div>
  </div>

</section>
<!-- download resume -->
<section class="mid-sec-four">
  <div class="mid-sec-four-row text-center">
    <h3 class="four-sub-cap">I'm currently looking for a back-end developer or front-end developer position.
    </h3>
    <h2 class="">Let's build something wonderful together!</h2>
    <button class="dwn-btn"><a href="resume/resume.pdf" class="resume-link" download>download resume
      </a></button>
  </div>
</section>
<section class="mid-sec-six" id="autobiography">
  <div class="mid-sec-six-row ">
    <h2 class="short-cap pro-short-cap" id="bio">Autobiography</h2>
    <div class="line-five line"></div>
    <p class="mt-5 bio-text">
      <?php
      $Bio = new DB('bio');
      $bio = $Bio->all(['sh' => 1]);
      echo nl2br($bio[0][2]);


      ?>

    </p>


  </div>
</section>
<!-- portfolio section starts here -->
<section class="mid-sec-five" id="portfolio">
  <div class="mid-sec-five-row ">
    <div class="pro-box container">
      <h2 class="short-cap pro-short-cap" id="works">Selected Works</h2>
      <div class="line-five line"></div>
      <?php
      $works = $Works->all(['sh=>1']);




      ?>

      <!-- <div class="row row-one">
        <div class="col-xl-4 col-sm-12 pro-block" id="row-1-a">
          <div class="square">
            <div class="text-box">
              <h4 class="port-heading">perpectual calendar</h4>
              <span class="hashtag htag">HTML</span>
              <ul class="port-ul">
                <li>可以切換每個月分，並顯示當下日期</li>
                <li>有小to-do list功能，可以作為簡單提醒事項</li>
                <li>利用地鐵影像影像與建築創造出都市美學氛圍
                </li>
              </ul>
              <div class="go-icon ">
                <a href="#" target="_blank" rel="noopener noreferrer" class="go-link">
                  <i class="fas fa-arrow-right fa-2x go-arrow"></i>
                </a>
              </div>
            </div>

          </div>
        </div>
        <div class="col-xl-4 col-sm-12 pro-block" id="row-1-b">
          <div class="square">
            <div class="text-box">
              <h4 class="port-heading">perpectual calendar</h4>
              <span class="hashtag htag">HTML</span>
              <ul class="port-ul">
                <li>可以切換每個月分，並顯示當下日期</li>
                <li>有小to-do list功能，可以作為簡單提醒事項</li>
                <li>利用地鐵影像影像與建築創造出都市美學氛圍
                </li>
              </ul>
              <div class="go-icon ">
                <a href="#" target="_blank" rel="noopener noreferrer" class="go-link">
                  <i class="fas fa-arrow-right fa-2x go-arrow"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-sm-12 pro-block" id="row-1-c">
          <div class="square">
            <div class="text-box">
              <h4 class="port-heading">perpectual calendar</h4>
              <span class="hashtag htag">HTML</span>
              <ul class="port-ul">
                <li>可以切換每個月分，並顯示當下日期</li>
                <li>有小to-do list功能，可以作為簡單提醒事項</li>
                <li>利用地鐵影像影像與建築創造出都市美學氛圍
                </li>
              </ul>
              <div class="go-icon ">
                <a href="#" target="_blank" rel="noopener noreferrer" class="go-link">
                  <i class="fas fa-arrow-right fa-2x go-arrow"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row row-two">
        <div class="col-xl-4 col-sm-12 pro-block" id="row-2-a">
          <div class="square">
            <div class="text-box">
              <h4 class="port-heading">perpectual calendar</h4>
              <span class="hashtag htag">HTML</span>
              <ul class="port-ul">
                <li>可以切換每個月分，並顯示當下日期</li>
                <li>有小to-do list功能，可以作為簡單提醒事項</li>
                <li>利用地鐵影像影像與建築創造出都市美學氛圍
                </li>
              </ul>
              <div class="go-icon ">
                <a href="#" target="_blank" rel="noopener noreferrer" class="go-link">
                  <i class="fas fa-arrow-right fa-2x go-arrow"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-sm-12 pro-block" id="row-2-b">
          <div class="square">
            <div class="text-box">
              <h4 class="port-heading">perpectual calendar</h4>
              <span class="hashtag htag">HTML</span>
              <ul class="port-ul">
                <li>可以切換每個月分，並顯示當下日期</li>
                <li>有小to-do list功能，可以作為簡單提醒事項</li>
                <li>利用地鐵影像影像與建築創造出都市美學氛圍
                </li>
              </ul>
              <div class="go-icon ">
                <a href="#" target="_blank" rel="noopener noreferrer" class="go-link">
                  <i class="fas fa-arrow-right fa-2x go-arrow"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-sm-12 pro-block" id="row-2-c">
          <div class="square">
            <div class="text-box">
              <h4 class="port-heading">perpectual calendar</h4>
              <span class="hashtag htag">HTML</span>
              <ul class="port-ul">
                <li>可以切換每個月分，並顯示當下日期</li>
                <li>有小to-do list功能，可以作為簡單提醒事項</li>
                <li>利用地鐵影像影像與建築創造出都市美學氛圍
                </li>
              </ul>
              <div class="go-icon ">
                <a href="#" target="_blank" rel="noopener noreferrer" class="go-link">
                  <i class="fas fa-arrow-right fa-2x go-arrow"></i>
                </a>
              </div>
            </div>
          </div>
        </div>

      </div>

      <div class="row row-three">
        <div class="col-xl-4 col-sm-12 pro-block" id="row-3-a">
          <div class="square">
            <div class="text-box">
              <h4 class="port-heading">perpectual calendar</h4>
              <span class="hashtag htag">HTML</span>
              <ul class="port-ul">
                <li>可以切換每個月分，並顯示當下日期</li>
                <li>有小to-do list功能，可以作為簡單提醒事項</li>
                <li>利用地鐵影像影像與建築創造出都市美學氛圍
                </li>
              </ul>
              <div class="go-icon ">
                <a href="#" target="_blank" rel="noopener noreferrer" class="go-link">
                  <i class="fas fa-arrow-right fa-2x go-arrow"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-sm-12 pro-block" id="row-3-b">
          <div class="square">
            <div class="text-box">
              <h4 class="port-heading">perpectual calendar</h4>
              <span class="hashtag htag">HTML</span>
              <ul class="port-ul">
                <li>可以切換每個月分，並顯示當下日期</li>
                <li>有小to-do list功能，可以作為簡單提醒事項</li>
                <li>利用地鐵影像影像與建築創造出都市美學氛圍
                </li>
              </ul>
              <div class="go-icon ">
                <a href="#" target="_blank" rel="noopener noreferrer" class="go-link">
                  <i class="fas fa-arrow-right fa-2x go-arrow"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-sm-12 pro-block" id="row-3-c">
          <div class="square">
            <div class="text-box">
              <h4 class="port-heading">perpectual calendar</h4>
              <span class="hashtag htag">HTML</span>
              <ul class="port-ul">
                <li>可以切換每個月分，並顯示當下日期</li>
                <li>有小to-do list功能，可以作為簡單提醒事項</li>
                <li>利用地鐵影像影像與建築創造出都市美學氛圍
                </li>
              </ul>
              <div class="go-icon ">
                <a href="#" target="_blank" rel="noopener noreferrer" class="go-link">
                  <i class="fas fa-arrow-right fa-2x go-arrow"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div> -->
    </div>
  </div>
</section>


<footer>
  <div class="icon-box">
    <?php
    $links = $Links->all();
    foreach ($links as $link) {
      $name = $link['name'];

      switch ($name) {

        case 'github':
          echo "<a href='" . $link['link'] . "' target='_blank'>";
          echo "<div class='icon-wrapper'>";
          echo "<i class='fab fa-github fa-2x'>";
          echo " </i>";
          echo "</div>";
          echo "</a>";
          break;

        case 'linkedin':
          echo "<a href='" . $link['link'] . "' target='_blank'>";
          echo "<div class='icon-wrapper'>";
          echo "<i class='fab fa-linkedin fa-2x'>";
          echo " </i>";
          echo "</div>";
          echo "</a>";
          break;
        case 'email':
          echo "<a href='mailto:" . $link['link'] . "' target='_blank'>";
          echo "<div class='icon-wrapper'>";
          echo "<i class='far fa-envelope fa-2x'>";
          echo " </i>";
          echo "</div>";
          echo "</a>";
          break;
      }
    }
    ?>
  </div>
</footer>

<script>
  AOS.init();
</script>
<script>
  let bm = document.getElementsByClassName('bm');
  Array.prototype.forEach.call(bm, icon => {
    let anim = bodymovin.loadAnimation({
      container: icon,
      path: `image/${icon.dataset.file}.json`,
      renderer: 'svg',
      loop: true,
      autoplay: true,
    })
  })



  function navSlide() {
    const burger = document.querySelector(".burger");
    const nav = document.querySelector(".nav-links");
    const navLinks = document.querySelectorAll(".nav-links li");

    burger.addEventListener("click", () => {

      nav.classList.toggle("nav-active");


      navLinks.forEach((link, index) => {
        if (link.style.animation) {
          link.style.animation = ""
        } else {
          link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 0.5}s`;
        }
      });

      burger.classList.toggle("toggle");
      console.log('burger')
    });

  }

  navSlide();
</script>
</body>

</html>