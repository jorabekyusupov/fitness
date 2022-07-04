<?php
include "./admin/php/connect.php";

$connect = new DB;

if ($connect) {
    $db = $connect->getConnect();
    $Last_New = $db->query("select price,title,name,bodytext from work_new  order by id desc limit 3");
    $poster = $db->query("select image,title,bodytext,name from work_new  order by id desc limit 3");
    $query = $db->query("SELECT * FROM work_new order by id desc limit 5");
    $headera = $db->query("select image,price,name from work_new  order by id desc limit 3");
    $pic = $db->query("SELECT image,name,price FROM work_new ");
    $contact_header = $db->query("select  phone,address from contacts2  order by id desc limit 1");
    $logo = $db->query("select  image,name  from settings  order by id desc limit 1");
    $db2query = $db->query("select  title,description  from club_cards  order by id desc limit 1");

    $club_card =[];
    if ($db2query->num_rows > 0) {
        while ($queryAll = $db2query->fetch_object()) {
            $club_card[] = $queryAll;
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






    $foots = [];
    if ($pic->num_rows > 0) {
        while ($queryAll = $pic->fetch_object()) {
            $foots[] = $queryAll;
        }
    }








    $work = [];
    if ($query->num_rows > 0) {
        while ($queryAll = $query->fetch_object()) {
            $work[] = $queryAll;
        }
    }

    $head =[];

    while ($row = $headera->fetch_object()) {
//        print_r($row);
        $head[] = $row;
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
	<title>Fitmax - Home Fitness</title>
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
	<link rel="stylesheet" href="assets/css/jquery.fancybox.css">
	<link rel="stylesheet" href="assets/css/style.css">
</head>

<body id="home" class="page-fitness">
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
	<header class="header-fitness">
		<a href="#" class="nav-btn">
			<span></span>
			<span></span>
			<span></span>
		</a>
		<div class="top-panel">
			<div class="container">
				<div class="row top-panel-row">
					<div class="col-sm-4 top-panel-left">
						<ul class="header-cont">
                            <?php if (isset($contact_hedr)) {
                                foreach ($contact_hedr as $contacts) { ?>

							<li><i class="fa fa-map-marker" aria-hidden="true"></i><a href="mailto:crossFit@gmail.com"> <?= $contacts->address ?></a></li>


                                <?php }
                            } ?>


						</ul>

					</div>
					<div class="col-sm-4 top-panel-center">
						<ul class="header-cont">
							<li><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo date("F j, Y."); ?></li>
						</ul>
					</div>
					<div class="col-sm-4 top-panel-right">
						<ul class="header-cont">
                            <?php if (isset($contact_hedr)) {
                            foreach ($contact_hedr as $contacts) { ?>


							<li><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:+998939302209"> <?= $contacts->phone ?></a></li>


                            <?php }
                            } ?>

						</ul>
						<ul class="header-cont ml-3">
							<a href="admin/auth-login.php"><i class="fa fa-user-circle" aria-hidden="true"></i></a>
						</ul>
					</div>
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
							<a href="home-fitness.html">Home <i class="fa fa-caret"></i></a>

						</li>
						<li><a href="about.php">About</a></li>
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

	<!-- ============ S-FITNESS-SLIDER ============ -->
	<section class="s-fitness-slider">
		<div class="slider-navigation">
			<div class="container">
				<div class="slider-navigation-cover"></div>
			</div>
		</div>
		<div class="fitness-slider">

            <?php if (isset($head)) {
                foreach ($head as $come) { ?>

                    <div class="fitness-slide">
                        <div class="fitness-slider-effect">
                            <div data-hover-only="true" class="scene">
                                <span class="scene-item" data-depth="0.4" style="background-image: url(assets/img/effect-1-1.svg);"></span>
                            </div>
                        </div>
                        <div class="slide-img-cover">
                            <div data-hover-only="true" class="scene">
                                <img class="slide-img" style="border-radius: 5%" data-depth="0.5" src="<?=$come->image ?>" alt="img">
                            </div>
                        </div>
                        <div class="container">
                            <img class="slide-img-effect" src="assets/img/slider-square.svg" alt="img">
                            <div class="text-bg">yourself</div>
                            <div class="fitness-slide-cover">
                                <h2 class="title"><?= $come->price ?> <span><?= $come->name ?> </span></h2>
                            </div>
                        </div>
                    </div>

                <?php }
            } ?>





		</div>
	</section>
	<!-- ========== S-FITNESS-SLIDER END ========== -->

	<!-- ============ S-WELCOME-FITNESS ============ -->
	<section  class="s-welcome-fitness ">
		<div class="container ">
			<div class="welcome-fitness-row">
				<div class="welcome-fitness-img">
					<img class="rx-lazy" src="assets/img/placeholder-all.png" data-src="assets/img/home2-about.jpg" alt="img">
				</div>
				<div class="welcome-fitness-item">
					<div class="welcome-fitness-info">
						<h2 class="title-decor">Welcome To <span>Fitness</span></h2>
						<p>Maecenas consequat ex id lobortis venenatis. Mauris id erat enim. Morbi dolor dolor, auctor tincidunt lorem ut, venenatis dapibus mi. Nunc venenatis sollicitudin nisl vel auctor.</p>
						<a href="#" class="btn">read more</a>
					</div>
					<img class="fitness-img rx-lazy" src="assets/img/placeholder-all.png" data-src="assets/img/home2-about-2.jpg" alt="img">
				</div>
			</div>
		</div>
	</section>
	<!-- ========== S-WELCOME-FITNESS END ========== -->

	<!-- ============== S-CLUB-CARDS ============== -->
	<section class="s-club-cards club-cards-lite club-cards-fitness">



		<span class="section-title-bg">Club Cards</span>


		<div class="container">
            <?php if (isset($club_card)) {
            foreach ($club_card as $club_c) { ?>



			<h2 class="title-decor">Club <span><?= $club_c->title ?></span></h2>

		<div class="d-flex justify-content-center align-content-center mb-4">
            <p  > <?=substr($club_c->description, 0, 100 )?></p>
        </div>



            <?php }
            } ?>


			<div class="row">
                    <?php if (isset($headers)) {
                        foreach ($headers as $header) { ?>
				<div class="col-md-4 club-card-col">

                            <div class="club-card-item" style="background-image: url(assets/img/bg-price-1.svg);">
                                <div class="price-cover">
                                    <div class="price"> <?= $header->price ?></div>
                                    <div class="date">  <?= substr($header->bodytext, 0, 20) ?></div>
                                </div>
                                <div class="club-card-text"><p class="fs-14 m-0 font-weight-medium line-height-sm">
                                        <?= substr($header->title, 0, 80) ?>
                                    </p></div>
                                <a href="trainer.php" class="btn"><?= $header->name ?></a>
                            </div>




				</div>

                        <?php }
                    } ?>
			</div>
		</div>
	</section>
	<!-- ============ S-CLUB-CARDS END ============ -->

	<!-- =========== FITNESS-OUR-PROGRAM =========== -->
	<section class="fitness-our-program" style="background-image: url(assets/img/bg-best.svg);">
		<span class="section-title-bg">Our Programs</span>
		<div class="container">
			<h2 class="title-decor">Our <span>Programs</span></h2>
			<p class="slogan">Maecenas consequat ex id lobortis venenatis. Mauris id erat enim.</p>
			<div class="row">
				<div class="col-sm-4 fitness-program-col">
					<div class="fitness-program-item">
						<div class="fitness-program-item-front" style="background-image: url(assets/img/home2-program-1.jpg);">
							<div class="fitness-program-item-inner">
								<div class="date">monday 11:00AM</div>
								<h3>cardio training</h3>
							</div>
						</div>
						<div class="fitness-program-item-back" style="background-image: url(assets/img/home2-program-1.jpg);">
							<a href="program.html" class="fitness-program-item-inner">
								<div class="date">monday 11:00AM</div>
								<h3>cardio training</h3>
							</a>
						</div>
					</div>
				</div>
				<div class="col-sm-4 fitness-program-col">
					<div class="fitness-program-item">
						<div class="fitness-program-item-front" style="background-image: url(assets/img/home2-program-2.jpg);">
							<div class="fitness-program-item-inner">
								<div class="date">monday 11:00AM</div>
								<h3>Open Training</h3>
							</div>
						</div>
						<div class="fitness-program-item-back" style="background-image: url(assets/img/home2-program-2.jpg);">
							<a href="program.html" class="fitness-program-item-inner">
								<div class="date">monday 11:00AM</div>
								<h3>Open Training</h3>
							</a>
						</div>
					</div>
				</div>
				<div class="col-sm-4 fitness-program-col">
					<div class="fitness-program-item">
						<div class="fitness-program-item-front" style="background-image: url(assets/img/home2-program-3.jpg);">
							<div class="fitness-program-item-inner">
								<div class="date">monday 11:00AM</div>
								<h3>running</h3>
							</div>
						</div>
						<div class="fitness-program-item-back" style="background-image: url(assets/img/home2-program-3.jpg);">
							<a href="program.html" class="fitness-program-item-inner">
								<div class="date">monday 11:00AM</div>
								<h3>running</h3>
							</a>
						</div>
					</div>
				</div>
				<div class="col-sm-4 fitness-program-col">
					<div class="fitness-program-item">
						<div class="fitness-program-item-front" style="background-image: url(assets/img/home2-program-4.jpg);">
							<div class="fitness-program-item-inner">
								<div class="date">monday 11:00AM</div>
								<h3>group workouts</h3>
							</div>
						</div>
						<div class="fitness-program-item-back" style="background-image: url(assets/img/home2-program-4.jpg);">
							<a href="program.html" class="fitness-program-item-inner">
								<div class="date">monday 11:00AM</div>
								<h3>group workouts</h3>
							</a>
						</div>
					</div>
				</div>
				<div class="col-sm-4 fitness-program-col">
					<div class="fitness-program-item">
						<div class="fitness-program-item-front" style="background-image: url(assets/img/home2-program-5.jpg);">
							<div class="fitness-program-item-inner">
								<div class="date">monday 11:00AM</div>
								<h3>press</h3>
							</div>
						</div>
						<div class="fitness-program-item-back" style="background-image: url(assets/img/home2-program-5.jpg);">
							<a href="program.html" class="fitness-program-item-inner">
								<div class="date">monday 11:00AM</div>
								<h3>press</h3>
							</a>
						</div>
					</div>
				</div>
				<div class="col-sm-4 fitness-program-col">
					<div class="fitness-program-item">
						<div class="fitness-program-item-front" style="background-image: url(assets/img/home2-program-6.jpg);">
							<div class="fitness-program-item-inner">
								<div class="date">monday 11:00AM</div>
								<h3>yoga</h3>
							</div>
						</div>
						<div class="fitness-program-item-back" style="background-image: url(assets/img/home2-program-6.jpg);">
							<a href="program.html" class="fitness-program-item-inner">
								<div class="date">monday 11:00AM</div>
								<h3>yoga</h3>
							</a>
						</div>
					</div>
				</div>
			</div>
			<a href="program.html" class="btn">view more</a>
		</div>
	</section>
	<!-- ========= FITNESS-OUR-PROGRAM END ========= -->

	<!-- ============== S-BEST-TRAINER ============== -->
	<section class="s-best-trainer fitness-best-trainer">
		<span class="section-title-bg">Best Trainer</span>
		<div class="container">
			<h2 class="title-decor">Best <span>Trainer</span></h2>
			<p class="slogan">Maecenas consequat ex id lobortis venenatis. Mauris id erat enim.</p>
		</div>
		<div class="best-trainer-slider">
            <?php
            if (isset($work)) {
                foreach ($work as $key => $works) {
                    $cat = $db->query("select  Sport_name from categories where id= $works->category_id");
                    $cat1 = $cat->fetch_object();
                    ?>

                    <a href="trainer.php" class="best-trainer-slide">
                        <div class="best-trainer-img">
                            <img style="width: 400px;height: 400px;font-family: bold"  src=" <?= $works->image ?>" alt="img">
                        </div>
                        <h3 class="name"><?= $works->name ?></h3>

                        <div style="font-family: bold" class="prof"><?= $cat1->Sport_name ?></div>
                    </a>




                <?php }
            } ?>



		</div>
	</section>
	<!-- ============ S-BEST-TRAINER END ============ -->

	<!-- ============= S-FITNESS-BANNER ============= -->
	<section class="s-fitness-banner">
		<div class="fitness-banner-effect" style="background-image: url(assets/img/bg-best.svg);"></div>
		<div class="container">
			<div class="fitness-banner-row">
				<div class="fitness-banner-left" style="background-image: url(assets/img/best-1.jpg);"></div>
				<div class="fitness-banner-right">
					<h2>the best <span>trainers</span> are here</h2>
					<p>are you a trainer? <a href="trainer.php">check this out.</a></p>
				</div>
			</div>
		</div>
	</section>
	<!-- =========== S-FITNESS-BANNER END =========== -->

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

	<!-- ============= S-FITNESS-POSTS ============= -->
	<section class="s-fitness-posts">
		<div class="section-title-bg">Latest News</div>
		<div class="container">
			<h2 class="title-decor">Latest <span>News</span></h2>
			<p class="slogan">Maecenas consequat ex id lobortis venenatis. Mauris id erat enim.</p>
			<div class="row">
				<div class="col-md-4 fitness-post-col">
					<div class="post-item-cover">
						<div class="post-header" style="background-image: url(assets/img/home-price-1.svg);">
							<div class="date">31 Jan</div>
						</div>
						<div class="post-content">
							<h4 class="title"><a href="single-blog.php">Sed ut perspiciatis unde omnis</a></h4>
							<div class="text">
								<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem…</p>
							</div>
						</div>
						<div class="post-footer">
							<div class="meta">
								<span class="post-by"><i class="fa fa-user" aria-hidden="true"></i><a href="#">By Rovadex</a></span>
								<span class="post-category"><i class="fa fa-tag" aria-hidden="true"></i><a href="#">Fitness</a></span>
								<span class="post-comment"><i class="fa fa-comment" aria-hidden="true"></i><a href="#">1 Comments(s)</a></span>
								<span class="post-tags"><i class="fa fa-hashtag" aria-hidden="true"></i><a href="#">Aenean</a><a href="#">Mattis</a></span>
							</div>
							<a href="single-blog.php" class="btn"><span>read more</span></a>
						</div>
					</div>
				</div>
				<div class="col-md-4 fitness-post-col">
					<div class="post-item-cover">
						<div class="post-header" style="background-image: url(assets/img/home-price-2.svg);">
							<div class="date">31 Jan</div>
						</div>
						<div class="post-content">
							<h4 class="title"><a href="single-blog.php">Creating a WordPress Blog</a></h4>
							<div class="text">
								<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem…</p>
							</div>
						</div>
						<div class="post-footer">
							<div class="meta">
								<span class="post-by"><i class="fa fa-user" aria-hidden="true"></i><a href="#">By Rovadex</a></span>
								<span class="post-category"><i class="fa fa-tag" aria-hidden="true"></i><a href="#">Lifting</a></span>
								<span class="post-comment"><i class="fa fa-comment" aria-hidden="true"></i><a href="#">2 Comments(s)</a></span>
								<span class="post-tags"><i class="fa fa-hashtag" aria-hidden="true"></i><a href="#">Aenean</a><a href="#">Mattis</a></span>
							</div>
							<a href="single-blog.php" class="btn"><span>read more</span></a>
						</div>
					</div>
				</div>
				<div class="col-md-4 fitness-post-col">
					<div class="post-item-cover">
						<div class="post-header" style="background-image: url(assets/img/home-price-3.svg);">
							<div class="date">31 Jan</div>
						</div>
						<div class="post-content">
							<h4 class="title"><a href="single-blog.php">Sed ut perspiciatis unde omnis</a></h4>
							<div class="text">
								<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem…</p>
							</div>
						</div>
						<div class="post-footer">
							<div class="meta">
								<span class="post-by"><i class="fa fa-user" aria-hidden="true"></i><a href="#">By Rovadex</a></span>
								<span class="post-category"><i class="fa fa-tag" aria-hidden="true"></i><a href="#">Fitness</a></span>
								<span class="post-comment"><i class="fa fa-comment" aria-hidden="true"></i><a href="#">3 Comments(s)</a></span>
								<span class="post-tags"><i class="fa fa-hashtag" aria-hidden="true"></i><a href="#">Aenean</a><a href="#">Mattis</a></span>
							</div>
							<a href="single-blog.php" class="btn"><span>read more</span></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- =========== S-FITNESS-POSTS END =========== -->

	<!-- =========== S-FITNESS-GALLERY =========== -->
	<section class="s-fitness-gallery">
		<div class="section-title-bg">Our Gallery</div>
		<div class="container">
			<h2 class="title-decor">Our <span>Gallery</span></h2>
			<p class="slogan">Maecenas consequat ex id lobortis venenatis. Mauris id erat enim.</p>
			<div class="row-gallery">
				<div class="grid-gallery">
					<div class="grid-sizer"></div>

                    <?php
                    if (isset($foots)) {
                        foreach ($foots as $key => $pik) {

                            ?>


                            <div class="gallery-item">
                                <a href="assets/img/gall-1-min.jpg" data-fancybox="gallery1">
                                    <img src="<?=$pik->image ?>" alt="img">
                                    <div class="gal-item">
                                        <h4 class="title"><?= $pik->name ?></h4>
                                        <p><?= $pik->price ?></p>
                                    </div>
                                </a>
                            </div>


                        <?php }
                    } ?>






				</div>
			</div>
		</div>
	</section>
	<!-- =========== S-FITNESS-GALLERY END =========== -->

	<!-- ================== FOOTER ================== -->
	<footer class="footer-fitness">
		<div class="container">
			<div class="row">
				<div class="col-md-3 footer-item-logo">
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
				</div>
				<div class="col-md-3 footer-item footer-item-blog">
					<h3>Trainers</h3>
					<ul class="footer-blog">

						<li>
							<a href="blog.php" class="img-cover"><img src="assets/img/footer-icon-2.jpg" alt="img"></a>
							<div class="footer-blog-info">
								<div class="name"><a href="blog.php">Creating a Wordpress Blog</a></div>
								<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem…</p>
							</div>
						</li>
					</ul>
				</div>
				<div class="col-md-3 footer-item footer-item-link">
					<h3>Links</h3>
					<ul class="footer-link">
						<li><a href="index-2.html">home</a></li>
						<li><a href="services.php">Services</a></li>
						<li><a href="about.php">About</a></li>
						<li><a href="program.html">Program</a></li>
						<li><a href="blog.php">News</a></li>
						<li><a href="trainer.php">Trainer</a></li>
					</ul>
				</div>
				<div class="col-md-3 footer-item footer-item-subscribe">
					<h3>Subscribe</h3>
					<p>Strategi, teknologi og udviklingen.</p>
					<form class="subscribe-form">
						<input class="inp-form" type="email" name="subscribe" placeholder="Your E-mail">
						<button type="submit" class="btn-form"><i class="fa fa-search" aria-hidden="true"></i></button>
					</form>
				</div>
			</div>
			<div class="footer-bottom">
				<div class="copyright"><a href="#" target="_blank"></a></div>
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
	<script src="assets/js/isotope.pkgd.js"></script>
	<script src="assets/js/jquery.fancybox.js"></script>
	<script src="assets/js/rx-lazy.js"></script>
	<script src="assets/js/parallax.min.js"></script>
	<script src="assets/js/scripts.js"></script>
</body>

</html>