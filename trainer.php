<?php
include "./admin/php/connect.php";

$connect = new DB;

if ($connect) {
    $db = $connect->getConnect();
    $Last_New = $db->query("select image,title,bodytext,name from work_new  order by id desc limit 2");
    $poster = $db->query("select image,title,bodytext,name from work_new  order by id asc limit 3");
    $query = $db->query("SELECT * FROM work_new order by id asc limit 5");
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
	<title>Fitmax - Trainer</title>
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

<body id="home" class="page-trainer">
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
                        <ul class="header-cont">
                            <li><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo date("F j, Y."); ?></li>
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
						<li class="menu-active">
							<a href="trainer.html">Trainer <i class="fa fa-caret"></i></a>

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
			<h1 class="title">Trainer</h1>
			<ul class="breadcrambs">
				<li><a href="index-2.html">Home</a></li>
				<li>Trainer</li>
			</ul>
		</div>
	</section>
	<!-- ============= HEADER-TITLE END ============= -->

	<!-- ============= HEADER-TITLE END ============= -->
	<section class="s-our-trainer">
		<div class="container">
			<img class="about-effect-tringle" src="assets/img/tringle-about-top.svg" alt="img">
			<h2 class="title-decor">Our <span>Trainer</span></h2>
			<p class="slogan">Maecenas consequat ex id lobortis venenatis. Mauris id erat enim. Morbi dolor dolor, auctor tincidunt lorem ut, venenatis dapibus miq.</p>
			<div class="row our-trainer-row">




                <?php
                foreach ($headers as $trainer):
//                  $cat = $db->query("select  Sport_name from categories where id= $trainer->category_id");
//                  $cat1 = $cat->fetch_object();

                     ?>

                    <div class="col-md-12 mt-5 trainer-img-col">
                        <div class="trainer-img-cover">
                            <img class="our-trainer-effect-1" src="assets/img/line-red-1.svg" alt="img">
                            <img class="our-trainer-effect-2" src="assets/img/line-red-2.svg" alt="img">
                            <img class="our-trainer-effect-3" src="assets/img/square-yellow.svg" alt="img">
                            <img class="our-trainer-img"   src=" <?= $trainer->image ?>" alt="img">

                        </div>

                        <div class="col-md-7">
                            <div class="our-trainer-info">
                                <h3 class="name"><?= $trainer->name ?></h3>
                                <div class="prof"><?= $trainer->title ?></div>
                                <p><?= $trainer->bodytext ?></p>
                                <ul class="social-list">
                                    <li><a target="_blank" href="https://www.facebook.com/rovadex"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a target="_blank" href="https://twitter.com/RovadexStudio"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a target="_blank" href="https://www.youtube.com/"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                                    <li><a target="_blank" href="https://www.instagram.com/rovadex"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php  endforeach; ?>








			</div>
		</div>
	</section>
	<!-- ============= HEADER-TITLE END ============= -->

	<!-- ============= S-TRAINER-AWARDS ============= -->
	<section class="s-trainer-awards" style="background-image: url(assets/img/bg-2.jpg);">
		<div class="mask"></div>
		<img class="trainer-awards-effect" src="assets/img/bg-competitions.svg" alt="effect">
		<div class="container">
			<h2 class="title-decor">Trainer's <span>Awards</span></h2>
			<p class="slogan">Maecenas consequat ex id lobortis venenatis. Mauris id erat enim. Morbi dolor dolor, auctor tincidunt lorem ut, venenatis dapibus miq.</p>
			<div class="row">
				<div class="col-sm-6 col-lg-3 trainer-award-col">
					<i class="fa fa-users" aria-hidden="true"></i>
					<h3>body bulding</h3>
					<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem</p>
				</div>
				<div class="col-sm-6 col-lg-3 trainer-award-col">
					<i class="fa fa-trophy" aria-hidden="true"></i>
					<h3>lorem ipsum</h3>
					<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem</p>
				</div>
				<div class="col-sm-6 col-lg-3 trainer-award-col">
					<i class="fa fa-area-chart" aria-hidden="true"></i>
					<h3>dolor sit amet</h3>
					<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem</p>
				</div>
				<div class="col-sm-6 col-lg-3 trainer-award-col">
					<i class="fa fa-motorcycle" aria-hidden="true"></i>
					<h3>etiam aliquam</h3>
					<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem</p>
				</div>
			</div>
		</div>
	</section>
	<!-- =========== S-TRAINER-AWARDS END =========== -->

	<!-- =========== S-TRAINING-SCHEDULE =========== -->
	<section class="s-training-schedule" style="background-image: url(assets/img/bg-table-1.svg);">
		<div class="container">
			<h2 class="title-decor">Training <span>Schedule</span></h2>
			<p class="slogan">Maecenas consequat ex id lobortis venenatis. Mauris id erat enim. Morbi dolor dolor, auctor tincidunt lorem ut, venenatis dapibus miq.</p>
			<div class="training-schedule-cover">
				<h3 class="training-schedule-top"><?php echo date("F j, Y."); ?></h3>
				<div class="training-schedule-table">
					<table>
						<thead>
							<th></th>
							<th>monday</th>
							<th>tuesday</th>
							<th>wednesday</th>
							<th>thursday</th>
							<th>friday</th>
							<th>saturday</th>
							<th>sunday</th>
						</thead>
						<tbody>
							<tr>
								<td>9-00</td>
								<td>
									<h4>body bulding</h4>
									<div class="date">9-00 – 11:00</div>
									<div class="name">Mark Klark</div>
								</td>
								<td></td>
								<td></td>
								<td>
									<h4>boxing</h4>
									<div class="date">9-00 – 11:00</div>
									<div class="name">Mark Klark</div>
								</td>
								<td></td>
								<td></td>
								<td>
									<h4>boxing</h4>
									<div class="date">9-00 – 11:00</div>
									<div class="name">Mark Klark</div>
								</td>
							</tr>
							<tr>
								<td>10-00</td>
								<td></td>
								<td>
									<h4>yoga</h4>
									<div class="date">10-00 – 12:00</div>
									<div class="name">Mark Klark</div>
								</td>
								<td></td>
								<td></td>
								<td>
									<h4>body bulding</h4>
									<div class="date">10-00 – 12:00</div>
									<div class="name">Mark Klark</div>
								</td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>11-00</td>
								<td></td>
								<td></td>
								<td></td>
								<td>
									<h4>body bulding</h4>
									<div class="date">11-00 – 12:00</div>
									<div class="name">Mark Klark</div>
								</td>
								<td></td>
								<td>
									<h4>body bulding</h4>
									<div class="date">11-00 – 12:00</div>
									<div class="name">Mark Klark</div>
								</td>
								<td></td>
							</tr>
							<tr>
								<td>12-00</td>
								<td>
									<h4>body bulding</h4>
									<div class="date">12-00 – 13:00</div>
									<div class="name">Mark Klark</div>
								</td>
								<td></td>
								<td>
									<h4>karate</h4>
									<div class="date">12-00 – 13:00</div>
									<div class="name">Mark Klark</div>
								</td>
								<td></td>
								<td></td>
								<td></td>
								<td>
									<h4>karate</h4>
									<div class="date">12-00 – 13:00</div>
									<div class="name">Mark Klark</div>
								</td>
							</tr>
							<tr>
								<td>13-00</td>
								<td></td>
								<td>
									<h4>body bulding</h4>
									<div class="date">13-00 – 14:00</div>
									<div class="name">Mark Klark</div>
								</td>
								<td></td>
								<td></td>
								<td>
									<h4>body bulding</h4>
									<div class="date">13-00 – 14:00</div>
									<div class="name">Mark Klark</div>
								</td>
								<td></td>
								<td></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
	<!-- ========= S-TRAINING-SCHEDULE END ========= -->

	<!-- ============== S-TESTIMONIALS ============== -->
	<section class="s-testimonials testimonials-border" style="background-image: url(assets/img/bg-testimonials.jpg);">
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

	<!-- ============== S-BEST-TRAINER ============== -->
    <section class="s-best-trainer fitness-best-trainer">

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
                            <img style="width: 400px;height: 400px"  src=" <?= $works->image ?>" alt="img">
                        </div>
                        <h3 class="name"><?= $works->name ?></h3>

                        <div style="color: white;font-family:'Baskerville Old Face' " class="prof"><?= $cat1->Sport_name ?></div>
                    </a>




                <?php }
            } ?>



        </div>
    </section>
	<!-- ============ S-BEST-TRAINER END ============ -->

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