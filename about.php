
<?php
include "./admin/php/connect.php";

$connect = new DB;

if ($connect) {
    $db = $connect->getConnect();
    $Last_New = $db->query("select price,title from work_new  order by id desc limit 3");
    $poster = $db->query("select image,title,bodytext,name from work_new  order by id desc limit 3");
    $query = $db->query("SELECT * FROM work_new order by id desc limit 4");
    $contact_header = $db->query("select  phone,address,email from contacts2  order by id desc limit 1");
    $logo = $db->query("select  image,name  from settings  order by id desc limit 1");

    $About_com = $db->query("select  image,title,phone,email,bodytext  from about_com  order by id desc limit 1");


    $About_coms = [];
    if ($About_com->num_rows > 0) {
        while ($queryAll = $About_com->fetch_object()) {
            $About_coms[] = $queryAll;
        }
    }







    $logotip = [];
    if ($logo->num_rows > 0) {
        while ($queryAll = $logo->fetch_object()) {
            $logotip[] = $queryAll;
        }
    }
    $contact_hedr = [];
    if ($contact_header->num_rows > 0) {
        while ($queryAll = $contact_header->fetch_object()) {
            $contact_hedr[] = $queryAll;
        }
    }




    $work = [];
    if ($query->num_rows > 0) {
        while ($queryAll = $query->fetch_object()) {
            $work[] = $queryAll;
        }
    }
    $headers = [];

    while ($row = $Last_New->fetch_object()) {
//        print_r($row);
        $headers[] = $row;
    }
    $posters = [];

    while ($row = $poster->fetch_object()) {
//        print_r($row);
        $posters[] = $row;
    }


}

?>








<!DOCTYPE html>
<html lang="zxx">

<head>
	<meta charset="UTF-8">
	<title>Fitmax - About</title>
	<!-- =================== META =================== -->
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="format-detection" content="telephone=no">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="assets/img/favicon.png">
	<!-- =================== STYLE =================== -->
	<link rel="stylesheet" href="assets/css/slick.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap-grid.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
</head>

<body id="home" class="page-about">
	<!--================ PRELOADER ================-->
	<div class="preloader-cover">
		<div id="cube-loader">
			<div class="caption">
				<div class="cube-loader">
					<div class="cube loader-1"></div>
					<div class="cube loader-2"></div>
					<div class="cube loader-4"></div>
					<div class="cube loader-3"></div>
				</div>
			</div>
		</div>
	</div>
	<!--============== PRELOADER END ==============-->
	
	<!-- ================= HEADER ================= -->
	<header class="header">
		<a href="#" class="nav-btn">
			<span></span>
			<span></span>
			<span></span>
		</a>
		<div class="top-panel">
			<div class="container">
				<div class="header-left">
					<ul class="header-cont">
                        <?php if (isset($contact_hedr)) {
                            foreach ($contact_hedr as $contacts) { ?>

                                <li><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:+998939302209"> <?= $contacts->phone ?></a></li>


                            <?php }
                        } ?>

                        <ul style="padding-left: 100px;" class="header-cont ">
                            <li><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo date("F j, Y. "); ?></li>
                        </ul>
					</ul>
				</div>
				<div class="header-right">
					<form class="search-form">
						<input type="search" class="search-form__field" placeholder="Search" value="" name="s">
						<button type="submit" class="search-form__submit"><i class="fa fa-search" aria-hidden="true"></i></button>
					</form>
					<ul class="social-list">
						<li><a target="_blank" href="https://www.facebook.com/rovadex"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a target="_blank" href="https://twitter.com/RovadexStudio"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li><a target="_blank" href="https://www.youtube.com/"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
						<li><a target="_blank" href="https://www.instagram.com/rovadex"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
						<li
								class="header-cont ">
							<a href="admin/auth-login.php"><i class="fa fa-user-circle" aria-hidden="true"></i></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="header-menu">
			<div class="container">
                <div class="header-logo">
                    <div class="row d-flex">
                        <?php if (isset($logotip)) {
                        foreach ($logotip as $logotips) { ?>

                        <div><a href="index.php" class="logo"><img style="width: 45px;height: 45px;" src="<?= $logotips->image ?>" alt="logo"></a></div>
                        <div style="margin-top: 7px;margin-left: 5px;"><a href="index.php" class="logo"> <p><?= $logotips->name ?> </p>  </a></div>
                    </div>


                    <?php }
                    } ?>
                </div>
				<nav class="nav-menu">
					<ul class="nav-list">
						<li >
							<a href="index.php">Home <i class="fa fa-caret"></i></a>

						</li>
						<li class="menu-active"><a href="about.html">About</a></li>
						<li><a href="services.php">Services</a></li>
						<li >
							<a href="trainer.php">Trainer <i class="fa fa-caret"></i></a>

						</li>

						<li><a href="contacts.php">Contacts</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</header>
	<!-- =============== HEADER END =============== -->

	<!-- =============== HEADER-TITLE =============== -->
	<section class="s-header-title" style="background-image: url(assets/img/bg-1-min.png);">
		<div class="container">
			<h1 class="title">About</h1>
			<ul class="breadcrambs">
				<li><a href="index-2.html">Home</a></li>
				<li>About</li>
			</ul>
		</div>
	</section>
	<!-- ============= HEADER-TITLE END ============= -->

	<!-- ============== S-ABOUT-PROGRAM ============== -->
	<section class="s-about">
		<div class="container">
			<img class="about-effect-tringle" src="assets/img/tringle-about-top.svg" alt="img">
			<div class="row about-row">

                <?php if (isset($About_coms)) {
                foreach ($About_coms as $About_headers) { ?>


				<div class="col-md-5 about-img-col">
					<div class="about-img-cover">
						<div class="about-img-1">
							<img class="about-img-effect-1" src="assets/img/square-yellow.svg" alt="img">
							<img class="about-img-effect-2" src="assets/img/group-circle-2.svg" alt="img">

						</div>
						<div class="about-img-2">
							<img src="<?= $About_headers->image ?>" alt="img">
						</div>
					</div>
				</div>
				<div class="col-md-7 about-info-cover">
					<h2 class="title-decor"><?= $About_headers->title ?></h2>
					<div class="text">
						<p><?= $About_headers->bodytext ?></p>
<!--						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut <a href="contacts.php">enim ad minim</a> veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>-->
					</div>
					<ul class="about-cont">
						<li><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:18004886040"><?= $About_headers->phone ?></a></li>
						<li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:fitmax@gmail.com"><?= $About_headers->email ?></a></li>
					</ul>
					<ul class="social-list">
						<li><a target="_blank" href="https://www.facebook.com/rovadex"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a target="_blank" href="https://twitter.com/RovadexStudio"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li><a target="_blank" href="https://www.youtube.com/"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
						<li><a target="_blank" href="https://www.instagram.com/rovadex"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
					</ul>
				</div>

                <?php }
                } ?>




			</div>
		</div>
	</section>
	<!-- ============ S-ABOUT-PROGRAM END ============ -->

	<!-- ============== S-ABOUT-BOTTOM ============== -->
	<section class="s-about-bottom">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="about-bottom-item">
						<div class="date-cover">
							<div class="date">10</div>
							<h4>years</h4>
						</div>
						<div class="about-bottom-info">Facilis voluptas harum natus enim dolorum dolores</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="about-bottom-item">
						<div class="date-cover">
							<div class="date">27</div>
							<h4>trainer</h4>
						</div>
						<div class="about-bottom-info">But I must explain to you all this mistaken idea of</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="about-bottom-item">
						<div class="date-cover">
							<div class="date">18</div>
							<h4>club</h4>
						</div>
						<div class="about-bottom-info">Nor again is there anyone who loves or pursues or</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- ============ S-ABOUT-BOTTOM END ============ -->

	<!-- ============= S-TRAINER-AWARDS ============= -->
	<section class="s-about-information counter-animate counter-active" style="background-image: url(assets/img/bg-2.jpg);">
		<div class="mask"></div>
		<img class="trainer-awards-effect" src="assets/img/bg-competitions.svg" alt="effect">
		<div class="container">
			<div class="about-info-row">
				<div class="about-info-col">
					<div class="number" data-number="30">0</div>
					<h3>trainings</h3>
				</div>
				<div class="about-info-col">
					<div class="number" data-number="60">0</div>
					<h3>lorem ipsum</h3>
				</div>
				<div class="about-info-col">
					<div class="number" data-number="26">0</div>
					<h3>dolor sit amet</h3>
				</div>
				<div class="about-info-col">
					<div class="number" data-number="430">0</div>
					<h3>quia dolor sit</h3>
				</div>
				<div class="about-info-col">
					<div class="number" data-number="130">0</div>
					<h3>lorem ipsum</h3>
				</div>
			</div>
		</div>
	</section>
	<!-- =========== S-TRAINER-AWARDS END =========== -->

	<!-- =============== S-OUT-TRAINER =============== -->
	<section class="s-out-trainer" style="background-image: url(assets/img/bg-contacts.svg);">
		<div class="container">
			<h2 class="title-decor">Our <span>Trainer</span></h2>
			<p class="slogan">Maecenas consequat ex id lobortis venenatis. Mauris id erat enim. Morbi dolor dolor, auctor tincidunt lorem ut, venenatis dapibus miq.</p>
			<div class="row">
                <?php
                if (isset($work)) {
                    foreach ($work as $key => $works) {
                        $cat = $db->query("select  Sport_name from categories where id= $works->category_id");
                        $cat1 = $cat->fetch_object();
                        ?>
                        <div class="col-md-6 out-trainer-col">
                            <div class="out-trainer-item">
                                <a href="trainer.php" style="width: 100px;height: 300px" class="out-trainer-img"><img  src=" <?= $works->image ?>" alt="img"></a>
                                <div class="out-trainer-info">
                                    <h3><a href="trainer.php"><?= $works->name ?></a></h3>
                                    <div class="prof"><?= $cat1->Sport_name ?></div>
                                    <p> <?= substr($works->bodytext, 0, ) ?></p>
                                    <ul class="social-list">
                                        <li><a target="_blank" href="https://www.facebook.com/rovadex"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a target="_blank" href="https://twitter.com/RovadexStudio"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                        <li><a target="_blank" href="https://www.youtube.com/"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                                        <li><a target="_blank" href="https://www.instagram.com/rovadex"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>





                    <?php }
                } ?>










			</div>
		</div>
	</section>
	<!-- ============= S-OUT-TRAINER END ============= -->

	<!-- ============== S-TESTIMONIALS ============== -->
    <section class="s-testimonials testimonials-border s-fitness-testimonials" style="background-image: url(assets/img/bg-testimonials.jpg);">
        <div class="mask"></div>
        <img class="testimonials-effect" src="assets/img/bg-testi-2.svg" alt="effect">
        <div class="container">
            <div class="testimonials-slider">
                <?php foreach ($posters as $poster_new): ?>

                    <div class="testimonial-slide">
                        <img
                                src=" <?= $poster_new->image ?>"

                                alt=""
                        />
                        <h3 class="name">  <?= $poster_new->name ?></h3>
                        <div class="prof"> <?= substr($poster_new->title, 0, 80) ?></div>
                        <p> <?= substr($poster_new->bodytext, 0, 80) ?></p>
                    </div>
                <?php endforeach; ?>




            </div>
        </div>
    </section>
	<!-- ============ S-TESTIMONIALS END ============ -->

	<!--================== S-CLIENTS ==================-->
	<section class="s-clients">
		<div class="container">
			<div class="clients-cover">
				<div class="client-slide">
					<div class="client-slide-cover">
						<img src="assets/img/partners-1.svg" alt="img">
					</div>
				</div>
				<div class="client-slide">
					<div class="client-slide-cover">
						<img src="assets/img/partners-2.svg" alt="img">
					</div>
				</div>
				<div class="client-slide">
					<div class="client-slide-cover">
						<img src="assets/img/partners-3.svg" alt="img">
					</div>
				</div>
				<div class="client-slide">
					<div class="client-slide-cover">
						<img src="assets/img/partners-4.svg" alt="img">
					</div>
				</div>
				<div class="client-slide">
					<div class="client-slide-cover">
						<img src="assets/img/partners-5.svg" alt="img">
					</div>
				</div>
				<div class="client-slide">
					<div class="client-slide-cover">
						<img src="assets/img/partners-6.svg" alt="img">
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================ S-CLIENTS END ================-->

	<!-- ================ S-CONTACTS ================ -->
	<section class="s-contacts" style="background-image: url(assets/img/bg-contacts.svg);">
		<div class="container">
			<h2 class="title-decor">Contact <span>Us</span></h2>
			<p class="slogan">Maecenas consequat ex id lobortis venenatis. Mauris id erat enim. Morbi dolor dolor, auctor tincidunt lorem ut, venenatis dapibus miq.</p>
			<div class="row">
				<div class="col-md-5 col-lg-4">
                    <?php if (isset($contact_hedr)) {
                    foreach ($contact_hedr as $contacts) { ?>
					<div class="contact-item">
						<div class="contact-item-left">
							<img src="assets/img/icon-1.svg" alt="img">
							<h4>need help</h4>
						</div>
						<div class="contact-item-right">
							<ul class="contact-item-list">
								<li><a href="tel:18004886040"><?= $contacts->phone ?></a></li>

							</ul>
						</div>
					</div>
					<div class="contact-item">
						<div class="contact-item-left">
							<img src="assets/img/icon-2.svg" alt="img">
							<h4>questions</h4>
						</div>
						<div class="contact-item-right">
							<ul class="contact-item-list">
								<li><a href="mailto:team@gmail.com"><?=substr($contacts->email, 0, 20)?></a></li>

							</ul>
						</div>
					</div>
					<div class="contact-item">
						<div class="contact-item-left">
							<img src="assets/img/icon-3.svg" alt="img">
							<h4>address</h4>
						</div>
						<div class="contact-item-right">
							<ul class="contact-item-list">
								<li><?= $contacts->address ?></li>
							</ul>
						</div>
					</div>

                    <?php }
                    } ?>

				</div>
				<div class="col-md-7 col-lg-8">
                    <form class="m-5" action="./admin/php/contactCreate.php" method="post" enctype="multipart/form-data">
						<ul class="form-cover">
							<li class="inp-name">
								<label>Name * (required)</label>
								<input id="name" type="text" name="name">
							</li>
							<li class="inp-email">
								<label>E-mail * (required)</label>
								<input id="email" type="email" name="email">
							</li>
							<li class="inp-text">
								<label>Message * (required)</label>
								<textarea id="comments" name="bodytext"></textarea>
							</li>
						</ul>
						<div class="checkbox-wrap">
							<div class="checkbox-cover">
								<input type="checkbox" name="agreement">
								<p>By using this form you agree with the storage and handling of your data by this website.</p>
							</div>
						</div>
						<div class="btn-form-cover">
							<button id="#submit" type="submit" class="btn">send comment</button>
						</div>
					</form>
					<div id="message"></div>
				</div>
			</div>
		</div>
	</section>
	<!-- ============== S-CONTACTS-END ============== -->

	<!-- ================== FOOTER ================== -->
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-3 footer-item-logo">
                    <div class="header-logo">
                        <div class="row d-flex">
                            <?php if (isset($logotip)) {
                            foreach ($logotip as $logotips) { ?>

                            <div><a href="index.php" class="logo"><img style="width: 75px;height: 75px;" src="<?= $logotips->image ?>" alt="logo"></a></div>
                            <div style="margin-top: 7px;margin-left: 5px;"><a href="index.php" class="logo"> <p style="font-size: 40px"><?= $logotips->name ?> </p>  </a></div>
                        </div>


                        <?php }
                        } ?>
                    </div>



					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</p>
					<ul class="social-list">
						<li><a target="_blank" href="https://www.facebook.com/rovadex"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a target="_blank" href="https://twitter.com/RovadexStudio"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li><a target="_blank" href="https://www.youtube.com/"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
						<li><a target="_blank" href="https://www.instagram.com/rovadex"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
					</ul>
				</div>
				<div class="col-sm-6 col-lg-3 footer-item footer-item-list">
					<h3>Links</h3>
					<ul class="footer-link">
						<li><a href="#">Sed ut perspiciatis unde</a></li>
						<li><a href="#">Omnis iste natus error sit</a></li>
						<li><a href="#">Voluptatem accusantium</a></li>
						<li><a href="#">Doloremque laudantium</a></li>
					</ul>
				</div>
				<div class="col-sm-6 col-lg-3 footer-item">
					<h3>Contact us</h3>
					<ul class="footer-cont">

                        <?php if (isset($contact_hedr)) {
                        foreach ($contact_hedr as $contacts) { ?>

						<li><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:18004886040"><?= $contacts->phone ?></a></li>
						<li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:crossFit@gmail.com"><?= $contacts->email ?></a></li>
						<li><i class="fa fa-map-marker" aria-hidden="true"></i><a href="mailto:crossFit@gmail.com"><?= $contacts->address ?></a></li>
                        <?php }
                        } ?>

					</ul>
				</div>
				<div class="col-sm-6 col-lg-3 footer-item">
					<h3>Blog</h3>
					<ul class="footer-blog">
						<li>
							<a href="blog.php" class="img-cover"><img src="assets/img/footer-icon-1.jpg" alt="img"></a>
							<div class="footer-blog-info">
								<div class="name"><a href="blog.php">Sed ut perspiciatis</a></div>
								<p>Omnis iste natus error sit voluptatem…</p>
							</div>
						</li>
						<li>
							<a href="blog.php" class="img-cover"><img src="assets/img/footer-icon-2.jpg" alt="img"></a>
							<div class="footer-blog-info">
								<div class="name"><a href="blog.php">Sed ut perspiciatis</a></div>
								<p>Omnis iste natus error sit voluptatem…</p>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<div class="footer-bottom">
				<div class="copyright"><a href="#" target="_blank"></a></div>
				<ul class="footer-menu">
					<li><a href="index.php">Home</a></li>
					<li class="active"><a href="about.php">About</a></li>
					<li><a href="services.php">Services</a></li>

					<li><a href="contacts.php">Contacts</a></li>
				</ul>
			</div>
		</div>
	</footer>
	<!-- ================ FOOTER END ================ -->

	<!--=================== TO TOP ===================-->
	<a class="to-top" href="#home">
		<i class="fa fa-chevron-up" aria-hidden="true"></i>
	</a>
	<!--================= TO TOP END =================-->

	<!--=================== SCRIPT	===================-->
	<script src="assets/js/jquery-2.2.4.min.js"></script>
	<script src="assets/js/slick.min.js"></script>
	<script src="assets/js/scripts.js"></script>
</body>

</html>