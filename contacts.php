<?php
include "./admin/php/connect.php";

$connect = new DB;

if ($connect) {
    $db = $connect->getConnect();

    $contact_header = $db->query("select  phone,address,email from contacts2  order by id desc limit 1");
    $logo = $db->query("select  image,name  from settings  order by id desc limit 1");

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


}

?>


















<!DOCTYPE html>
<html lang="zxx">

<head>
	<meta charset="UTF-8">
	<title>Fitmax - Contacts</title>
	<!-- =================== META =================== -->
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="format-detection" content="telephone=no">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="assets/img/favicon.png">
	<!-- =================== STYLE =================== -->
	<link rel="stylesheet" href="assets/css/bootstrap-grid.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
</head>

<body id="home">
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
						<li><a href="about.php">About</a></li>
						<li><a href="services.php">Services</a></li>
						<li >
							<a href="trainer.php">Trainer <i class="fa fa-caret"></i></a>

						</li>

						<li class="menu-active"><a href="contacts.html">Contacts</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</header>
	<!-- =============== HEADER END =============== -->

	<!-- =============== HEADER-TITLE =============== -->
	<section class="s-header-title" style="background-image: url(assets/img/bg-1-min.png);">
		<div class="container">
			<h1 class="title">Contacts</h1>
			<ul class="breadcrambs">
				<li><a href="index-2.html">Home</a></li>
				<li>Contacts</li>
			</ul>
		</div>
	</section>
	<!-- ============= HEADER-TITLE END ============= -->

	<!-- ================== S-MAP ================== -->
	<section class="s-map">
		<div id="map" class="cont-map google-map"></div>
	</section>
	<!-- ================ S-MAP END ================ -->


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
                                        <li><a href="mailto:team@gmail.com"><?=substr($contacts->address, 0, 30)?></a></li>
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
					<h3>Trainers</h3>
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
					<li><a href="about.php">About</a></li>
					<li><a href="services.php">Services</a></li>

					<li class="active"><a href="contacts.php">Contacts</a></li>
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
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB4fusEY9kSwNHgtK8KOgyoTsyP5Tb2NXo"></script>
	<script src="assets/js/scripts.js"></script>
</body>

</html>