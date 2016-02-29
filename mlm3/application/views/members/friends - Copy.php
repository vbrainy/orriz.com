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

    <link rel="stylesheet" href="<?php  echo base_url(); ?>public/css/browse.css" />
    <!--Jquery-1.11.1.min.js-->
    <script src="<?php  echo base_url(); ?>public/js/jquery-1.11.3.min.js"></script>

    <!--Bootstrap Jquery-->
    <script src="<?php  echo base_url(); ?>public/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="<?php  echo base_url(); ?>public/css/popup.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php  echo base_url(); ?>public/css/error.css" />

    <script src="<?php  echo base_url(); ?>public/js/typeahead.min.js"></script>
    <script>
        $(document).ready(function(){
            $('input.typeahead').typeahead({
                name: 'typeahead',
                remote:'<?php echo base_url('dashboard/suggestions'); ?>?key=%QUERY',
                limit : 10
            });
        });
    </script>

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/
           html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/
           respond.min.js"></script>
    <![endif]-->
</head>
<body>


<div class="yellow-line"></div>
<?php $this->load->view('members/dashboard_top'); ?>
<div class="clearfix"></div>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="cover-picture-profile">

                <div class="cover-picture" id="cover_picture"  >
                    <div class="profile-picture">


                        <img src="<?php echo base_url(); ?>public/images/thumb/<?php if(!empty($image)){ echo $image; }else echo "no.png"; ?>" alt="Profile Picture" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<div class="container">
    <div class="row">

        <div class="col-sm-10">
            <div class="posts-ads-container">
                <div class="wall-posts">
                   <div class="col-sm-10">
                       <h4>Friend Requests</h4>
                       <?php if(isset($messages1)){echo $messages1;}?>
                       <?php if(isset($friend_requests)){
                           foreach($friend_requests as $rows){ ?>
                               <div class="content"><img src="<?php echo base_url(); ?>public/images/thumb/<?php if(($rows['image'])!=null) echo $rows['image']; else echo "no.png"; ?>" width="80px;" height="80px;"><?php echo $rows['first_name'].' '.$rows['last_name'] ?>

                                   <a href="<?php
                                       echo base_url('dashboard/requestaccept').'?friend_id='.$rows['id'];
                                    ?>"><button class="btn-primary pull-right">Accept</button> </a>
                                   <a href="<?php
                                   echo base_url('dashboard/requestdelete').'?friend_id='.$rows['id'];
                                   ?>"><button class="btn-primary pull-right">Delete</button> </a>
                               </div><br style="clear:both">
                           <?php }}?>

                       <h4> Friends List</h4>
                        <?php if(isset($messages)){echo $messages;}?>
                        <?php if(isset($friend_list)){
                            foreach($friend_list as $rows){ ?>
                                <div class="content"><img src="<?php echo base_url(); ?>public/images/thumb/<?php if(($rows['image'])!=null) echo $rows['image']; else echo "no.png"; ?>" width="80px;" height="80px;"><?php echo $rows['first_name'].' '.$rows['last_name'] ?>

                                        <a href="<?php if($rows['status']==2){

                                            echo base_url('dashboard/unfriend').'?friend_id='.$rows['id'];;
                                        } ?>"><button class="btn-primary pull-right"><?php echo "unfriend"; ?></button> </a></div><br style="clear:both">
                            <?php }}?>

                    </div>
                    <?php  echo $this->pagination->create_links();  ?>
                </div>
            </div>

        </div>
        <div class="col-sm-2">
            <div class="sidebar-ads">
                <img src="<?php echo base_url(); ?>public/images/sidebar-ad.jpg" alt="Sidebar Ad" />
            </div>
        </div>
    </div>
</div>
<br>
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
<div id="overlay-back"></div>

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

<script>
    window.onload;
    {
        time = new Date().getUTCHours();
        minute = new Date().getUTCMinutes();
        timezone = new Date().getTimezoneOffset();
        if (timezone > 0) {
            hour= time*60+minute+timezone;
            currenttime= hour/60;
        }else
            hour= time*60+minute-timezone;
        currenttime= hour/60;
        if (currenttime >= 5 && currenttime < 10) {
            document.getElementById("cover_picture").style.background = "url(<?php echo base_url(); ?>public/images/morning.png)";
        }else if(currenttime >= 10 && currenttime < 16){
            document.getElementById("cover_picture").style.background = "url(<?php echo base_url(); ?>public/images/afternoon.png)";

        }else if (currenttime >= 16 && currenttime < 19){
            document.getElementById("cover_picture").style.background = "url(<?php echo base_url(); ?>public/images/evening.png)";

        }else if(currenttime >= 19 && currenttime < 30) {
            document.getElementById("cover_picture").style.background = "url(<?php echo base_url(); ?>public/images/night.png)";
        }else if(currenttime >= 0 && currenttime < 5) {
            document.getElementById("cover_picture").style.background = "url(<?php echo base_url(); ?>public/images/night.png)";
        }


    }
</script>




<script>
    window.onload; {
        var a=0;
        a =<?php if(!empty($message)){echo 1;}else echo 0 ?>;

        if(a===1)  {
            $('#overlay-back').fadeIn(500, function () {
                $('#error').show();
            });
            $("#error_btn").on('click', function() {
                $('#error').hide();
                $('#overlay-back').fadeOut(500);
            });

        } else {
            $('#error').hide();
        }

        ;}
</script>

</body>
</html>