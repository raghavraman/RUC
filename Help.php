<?php
/**
 * Created by IntelliJ IDEA.
 * User: omkar
 * Date: 4/6/2018
 * Time: 11:21 PM
 */

session_start();
$user_id = $_SESSION['user_id'];
if($user_id == null || $user_id = "")
{
    header('location: index.php');
}

?>

<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="assets/css/home.css" />
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

    <script type="text/javascript">

        $(document).ready(function() {
            $('[data-toggle="offcanvas"]').click(function() {
                $("#navigation").toggleClass("hidden-xs");
            });
        });

    </script>
</head>
<body class="home">
<div class="container-fluid display-table">
    <div class="row display-table-row">
        <div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
            <div class="logo">
                <a href="profile.php"><img src="uploads/RUC_logo.jpg" style="max-width:auto;max-height:auto;width:80px;"></a>
            </div>
            <div class="navi">
                <ul>
                    <li><a href="home.php"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Home</span></a></li>
                    <li><a href="profile.php"><i class="fa fa-user" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Profile</span></a></li>
                    <li><a href="cmhelp.php"><i class="fa fa-globe"></i><span class="hidden-xs hidden-sm">Community Help</span></a></li>
                    <li><a href="challenge.php"><i class="fa fa-trophy" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Challenges</span></a></li>
                    <li><a href="LeaderBoard.php"><i class="fa fa-users" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Leaderboard</span></a></li>
                    <li><a href="redeem.php"><i class="fa fa-money" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Redeem</span></a></li>
                    <li class="active"><a href="Help.php"><i class="fa fa fa-info" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Help</span></a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-10 col-sm-11 display-table-cell v-align">
            <!--<button type="button" class="slide-toggle">Slide Toggle</button> -->
            <div class="row">
                <header>
                    <div class="col-md-7">
                        <nav class="navbar-default pull-left">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="offcanvas" data-target="#side-menu" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                        </nav>
                        <div class="search hidden-xs hidden-sm">
                            <h2><b>Help</b></h2>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="header-rightside">
                            <ul class="list-inline header-top pull-right">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['user_name'];?>
                                        <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <div class="navbar-content">
                                                <span><?php echo $_SESSION['user_name'];?></span>
                                                <p class="text-muted small">
                                                    <?php echo $_SESSION['user_email'];?>
                                                </p>
                                                <div class="divider">
                                                </div>
                                                <a href="logout.php" class="view btn-sm active">Logout</a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </header>
            </div>


            <div style="padding-top: 20px; padding-left: 20px; "><h3><b>Verification Codes</b></div></h3>

            <div class="card" style="display: block; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            margin-top: 10px">
                <div class='row'>
                    <div style="padding-left: 20px">
                        <b style="color:#F57C00">What is a verification code?</b>
                    </div>
                </div>
                <div class='row'>
                <div style="padding-left: 20px; padding-top: 20px;">
                    <b>In order to sign up for RUC! Users have to have a verification code from their friend. This helps make sure that the RUC! Community doesn’t have any “weirdos” in it.</b>
                </div>
            </div>
            </div>

            <div class="card" style="display: block; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            margin-top: 10px">
                <div class='row'>
                    <div style="padding-left: 20px">
                        <b style="color:#F57C00">How do I give a verification code to my friend?</b>
                    </div>
                </div>
                <div class='row'>
                    <div style="padding-left: 20px; padding-top: 20px;">
                        <b>On your profile page, click “Refer a Friend”. A window will pop up where you can enter your friend’s name and their email. This email must be a gmail so that they can log-in. After this, you will get a 6-digit/letter code and you can tell that code to your friend so they can use that code (and the email you listed for them) to sign up!</b>
                    </div>
                </div>
            </div>

            <div class="card" style="display: block; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            margin-top: 10px">
                <div class='row'>
                    <div style="padding-left: 20px">
                        <b style="color:#F57C00">How do I see who I’ve given a code to?</b>
                    </div>
                </div>
                <div class='row'>
                    <div style="padding-left: 20px; padding-top: 20px;">
                        <b>If you click on “View Verification Codes” you can see a list of everyone you have generated a code for but that hasn’t signed up yet. At this time you can’t delete the code once you generate it, so watch your spelling! If your friend has used their code, it will not show up anymore but you should be able to look them up on RUC!</b>
                    </div>
                </div>
            </div>

            <div class="card" style="display: block; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            margin-top: 10px">
                <div class='row'>
                    <div style="padding-left: 20px">
                        <b style="color:#F57C00">Help! I forgot what code I generated for my friend.</b>
                    </div>
                </div>
                <div class='row'>
                    <div style="padding-left: 20px; padding-top: 20px;">
                        <b>If they haven’t redeemed it yet, they will appear in the “View Verification Codes” window from your profile, along with their assigned code</b>
                    </div>
                </div>
            </div>

            <div class="card" style="display: block; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            margin-top: 10px">
                <div class='row'>
                    <div style="padding-left: 20px">
                        <b style="color:#F57C00">How many verification codes do I have?</b>
                    </div>
                </div>
                <div class='row'>
                    <div style="padding-left: 20px; padding-top: 20px;">
                        <b>When you first sign up, everyone gets 5 verification codes. As you use them, this number goes down. You can always see how many you have left by checking on your profile page.</b>
                    </div>
                </div>
            </div>

            <div class="card" style="display: block; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            margin-top: 10px">
                <div class='row'>
                    <div style="padding-left: 20px">
                        <b style="color:#F57C00">How do I get more verification codes?</b>
                    </div>
                </div>
                <div class='row'>
                    <div style="padding-left: 20px; padding-top: 20px;">
                        <b>In order to get more verification codes, you need to earn points and redeem them on the “Redeem” page. Each verification code costs 4 points.</b>
                    </div>
                </div>
            </div>

            <div class="card" style="display: block; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            margin-top: 10px">
                <div class='row'>
                    <div style="padding-left: 20px">
                        <b style="color:#F57C00">How many points do I get when a friend signs up using my code?</b>
                    </div>
                </div>
                <div class='row'>
                    <div style="padding-left: 20px; padding-top: 20px;">
                        <b>Every time a friend signs up to RUC! using your code, you get 5 points!</b>
                    </div>
                </div>
            </div>


            <div id ='points' style="padding-top: 20px; padding-left: 20px; "><h3><b>Points</b></div></h3>

            <div class="card" style="display: block; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            margin-top: 10px">
                <div class='row'>
                    <div style="padding-left: 20px">
                        <b style="color:#F57C00">What are points?</b>
                    </div>
                </div>
                <div class='row'>
                    <div style="padding-left: 20px; padding-top: 20px;">
                        <b>Points are a type of currency used on RUC! Users earn points through various activities on RUC! Then, they can redeem these points on the redemption page.</b>
                    </div>
                </div>
            </div>

            <div class="card" style="display: block; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            margin-top: 10px">
                <div class='row'>
                    <div style="padding-left: 20px">
                        <b style="color:#F57C00">Where can I see my points?</b>
                    </div>
                </div>
                <div class='row'>
                    <div style="padding-left: 20px; padding-top: 20px;">
                        <b>You can see your current points listed on your profile page.</b>
                    </div>
                </div>
            </div>

            <div class="card" style="display: block; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            margin-top: 10px">
                <div class='row'>
                    <div style="padding-left: 20px">
                        <b style="color:#F57C00">How can I earn points?</b>
                    </div>
                </div>
                <div class='row'>
                    <div style="padding-left: 20px; padding-top: 20px;">
                        <b>You can earn points through a variety of activities! You can earn points by posting, commenting, or liking posts a certain number of times, posting community help tasks (the longer you help the more points you get!), and completing or winning challenges. You can also get points when you get your friends to sign up with your verification codes!</b>
                    </div>
                </div>
            </div>

            <div class="card" style="display: block; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            margin-top: 10px">
                <div class='row'>
                    <div style="padding-left: 20px">
                        <b style="color:#F57C00">What can I redeem points for?</b>
                    </div>
                </div>
                <div class='row'>
                    <div style="padding-left: 20px; padding-top: 20px;">
                        <b>Currently, you can redeem points for more verification codes. We are working on adding deals in the community with places you go to, so that you can use your points for discounts. Check back soon!</b>
                    </div>
                </div>
            </div>


            <div id="bt" style="padding-top: 20px; padding-left: 20px; "><h3><b>Badges and Trophies</b></div></h3>

            <div style="padding-top: 20px; padding-left: 20px; "><b><h4>Badges</b></h4></div>

            <div class="card" style="display: block; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            margin-top: 10px">
                <div class='row'>
                    <div style="padding-left: 20px">
                        <b style="color:#F57C00">How do I earn a badge?</b>
                    </div>
                </div>
                <div class='row'>
                    <div style="padding-left: 20px; padding-top: 20px;">
                        <b>You can earn badges by completing tasks on RUC! Such as posting or liking things on the newsfeed.</b>
                    </div>
                </div>
            </div>

            <div class="card" style="display: block; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            margin-top: 10px">
                <div class='row'>
                    <div style="padding-left: 20px">
                        <b style="color:#F57C00">What badges can I earn?</b>
                    </div>
                </div>
                <div class='row'>
                    <div style="padding-left: 20px; padding-top: 20px;">
                        <b>Currently you can earn the following badges: Content to be added <br> In the future we will have more badges for you to earn, so check back!</b>
                    </div>
                </div>
            </div>

            <div class="card" style="display: block; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            margin-top: 10px">
                <div class='row'>
                    <div style="padding-left: 20px">
                        <b style="color:#F57C00">Do my badges disappear?</b>
                    </div>
                </div>
                <div class='row'>
                    <div style="padding-left: 20px; padding-top: 20px;">
                        <b>Badges do not disappear. Once you earn them, you have them forever!</b>
                    </div>
                </div>
            </div>


            <div style="padding-top: 20px; padding-left: 20px; "><h4><b>Trophies</b></div></h4>

            <div class="card" style="display: block; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            margin-top: 10px">
                <div class='row'>
                    <div style="padding-left: 20px">
                        <b style="color:#F57C00">How do I earn a trophy?</b>
                    </div>
                </div>
                <div class='row'>
                    <div style="padding-left: 20px; padding-top: 20px;">
                        <b>You can earn a trophy by coming in first, second, or third place on the leaderboard! Check you points against the leaders on the leaderboard page.</b>
                    </div>
                </div>
            </div>

            <div class="card" style="display: block; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            margin-top: 10px">
                <div class='row'>
                    <div style="padding-left: 20px">
                        <b style="color:#F57C00">Where can I see my trophies?</b>
                    </div>
                </div>
                <div class='row'>
                    <div style="padding-left: 20px; padding-top: 20px;">
                        <b>You can see your trophies by looking on your profile page.</b>
                    </div>
                </div>
            </div>

            <div class="card" style="display: block; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            margin-top: 10px">
                <div class='row'>
                    <div style="padding-left: 20px">
                        <b style="color:#F57C00">What trophies can I earn? </b>
                    </div>
                </div>
                <div class='row'>
                    <div style="padding-left: 20px; padding-top: 20px;">
                        <b>You can earn three different trophies: Content to be added</b>
                    </div>
                </div>
            </div>

            <div id='leaderboard' style="padding-top: 20px; padding-left: 20px; "><h3><b>Leaderboard</b></div></h3>

            <div class="card" style="display: block; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            margin-top: 10px">
                <div class='row'>
                    <div style="padding-left: 20px">
                        <b style="color:#F57C00">What is the leaderboard?</b>
                    </div>
                </div>
                <div class='row'>
                    <div style="padding-left: 20px; padding-top: 20px;">
                        <b>The leaderboard shows who has the most points on RUC! Points constantly change based on users earning and redeeming points.</b>
                    </div>
                </div>
            </div>

            <div class="card" style="display: block; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            margin-top: 10px">
                <div class='row'>
                    <div style="padding-left: 20px">
                        <b style="color:#F57C00">How often does the leaderboard update?</b>
                    </div>
                </div>
                <div class='row'>
                    <div style="padding-left: 20px; padding-top: 20px;">
                        <b>The leaderboard is a live-update board, where you can see in real time who has the most points.</b>
                    </div>
                </div>
            </div>


