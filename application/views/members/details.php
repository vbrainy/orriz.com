<!DOCTYPE html>
<html>
<head>
    <title>Site Title</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Bootstrap Css-->
    <link rel="stylesheet" href="<?php  echo base_url(); ?>public/css/bootstrap.min.css" />

    <!--Custom Css-->
    <link rel="stylesheet" href="<?php  echo base_url(); ?>public/css/style.css" />

    <!--Media Queries Css-->
    <link rel="stylesheet" href="<?php  echo base_url(); ?>public/css/screen.css" />

    <!--Jquery-1.11.1.min.js-->
    <script src="<?php  echo base_url(); ?>public/js/jquery-1.11.3.min.js"></script>

    <!--Bootstrap Jquery-->
    <script src="<?php  echo base_url(); ?>public/js/bootstrap.min.js"></script>

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/
           html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/
           respond.min.js"></script>
    <![endif]-->
</head>
<body>
	<div class="yellow-line"></div>
	<div class="header-inner-page">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="logo-text">
						<h1><a href="index.html">Website Logo</a></h1>
					</div>
					<div class="right-menu">
						<div class="right-menu-button-container">
							<button class="right-menu-button">
                                <img src="<?php echo base_url();?>/public/images/setting-icon.png" alt="Settings" />
							</button>
						</div>
						<div class="pop-over-menu">
							<ul>
                                <li><a href="#">Account Setting</a></li>
                                <li><a href="#">Help</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="<?php echo base_url('members/logout') ?>">Logout</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="first-step-form">
					<div class="form-title">
						<h5>Step 1 of 3 - Add Details</h5>
					</div>
					<div class="join-form-body">
						<div class="from-body-container">
							<h4 class="form-tagline">Fill in your Profile info</h4>
							<form role="form" method="post" action="<?php echo base_url();?>dashboard/memberdetail">
								<div class="details-form-group">
									<div class="step-label-col">
										<label class="step-label">City & Country:</label>
									</div>
									<div class="step-input-field">
										<div class="first-name-field">
										<input type="text" placeholder="Your City Name" name="city" class="join-form-control" required/>
										</div>
										<div class="last-name-field">
										<input type="text" placeholder="Your Country name"  name="country"class="join-form-control" required/>
										</div>
									</div>
								</div>
								<div class="details-form-group">
									<div class="step-label-col">
										<label class="step-label">Relationship Status</label>
									</div>
									<div class="step-input-field">
										<div class="relationship-field">
											<select name="relationship_status" class="join-form-control">
												<option>Single</option>
												<option>Dating</option>
												<option>In a relationship</option>
												<option>Engaged</option>
												<option>Married</option>
												<option>It's Complicated</option>
												<option>Open Relationship</option>
												<option>Separated</option>
												<option>Divorced</option>
												<option>Widowed</option>
											</select>
										</div>
									</div>
								</div>
								<div class="details-form-group">
									<div class="step-label-col">
										<label class="interested-in-label">Interested In:</label>
									</div>
									<div class="step-input-field">
										<div class="interest-checkbox-section">
											<div class="checkbox-col">
												<input type="checkbox" id="dating" class="interest-checkbox" value="Dating" name="dating"/>
												<label for="dating" class="interest-label">Dating</label>
											</div>
											<div class="checkbox-col">
												<input type="checkbox" id="friends" name="friends" value="Friends" class="interest-checkbox"/>
												<label for="friends" class="interest-label">Friends</label>
											</div>
										</div>
										<div class="interest-checkbox-section">
											<div class="checkbox-col">
												<input type="checkbox" id="serious-relationship" class="interest-checkbox" name="serious_relationship" value="Serious Relationship"/>
												<label for="serious-relationship" class="interest-label">Serious Relationship</label>
											</div>
											<div class="checkbox-col">
												<input type="checkbox" id="networking" class="interest-checkbox" name="networking" value="Networking"/>
												<label for="networking" class="interest-label">Networking</label>
											</div>
										</div>
									</div>
								</div>
								<div class="details-form-group">
									<div class="step-label-col">
										<label class="step-label">Religion:</label>
									</div>
									<div class="step-input-field">
										<input type="text" placeholder="Your Religion" name="religion" class="join-form-control" />
									</div>
								</div>
								<div class="details-form-group">
									<div class="step-label-col">
										<label class="step-label">School:</label>
									</div>
									<div class="step-input-field">
										<input type="text" placeholder="Your School Name" name="school" class="join-form-control" />
									</div>
								</div>
								<div class="details-form-group">
									<div class="step-label-col">
										<label class="step-label">College:</label>
									</div>
									<div class="step-input-field">
										<input type="text" placeholder="Your College Name" name="college" class="join-form-control" />
									</div>
								</div>
								<div class="details-form-group">
									<div class="step-label-col">
										<label class="step-label">University:</label>
									</div>
									<div class="step-input-field">
										<input type="text" placeholder="Your University Name" name="university" class="join-form-control" />
									</div>
								</div>
								<div class="details-form-group">
									<div class="step-label-col">
									</div>
									<div class="step-input-field">
										<input type="submit" value="Save & Continue" class="add-detail-submit-button" />
										<div class="skip-button">
											<span>or</span>
										<a class="add-detail-skip" href="<?php echo base_url('dashboard/aboutyourself'); ?>"> Skip </a>
										</div>
									</div>
								</div>
							</form>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="footer">
		<div class="container">
			<div class="col-xs-12">
				<div class="copyright">
					&copy 2015 Website Name. All rights reserved. <a href="#">Privacy Ploicy</a> | <a href="#">Terms of Service</a>
				</div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="yellow-line"></div>
	
	<!--Marquee Jquery-->
    <!--Marquee Jquery-->
    <script src="<?php  echo base_url(); ?>public/js/jquery.marquee.min.js"></script>

    <script>
        $(function (){
            $('.footer-gallery').marquee({
                speed: 50000,
                gap: 0,
                delayBeforeStart: 0,
                direction: 'left',
                duplicated: true
            });
        });
        $(".right-menu-button").click(function(){
            $(".pop-over-menu").slideToggle(500);
        });
    </script>
</body>
</html>