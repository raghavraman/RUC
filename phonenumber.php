<?php
 session_start();
 $user_id = $_SESSION['user_id'];
 if($user_id == null || $user_id = "")
 {
    header('location: index.php');
 }
 ?>
<html>

<head>
    <meta charset="utf-8" />
    <title>RUC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <!-- The stylesheets -->
    <link rel="stylesheet" href="assets/css/styles.css" />
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700" />
    <!--[if lt IE 9]>
          <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    <script type="text/javascript">
    //Function when users enters phone number
    function numentered() {
        console.log(document.getElementById("number").value);
    }
    </script>
</head>

<body>
    <div class="container">
        <div class="row ">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel codeVerfiy">
                    <div class="panel-heading rucheader">
                        <div class="banner">
                            <div class="rucHeaderContent">
                                RUC!
                            </div>
                        </div>
                        <div class="banner-line">
                        </div>
                    </div>
                    <div class="panel-body">
                        <div>
                            <h2 class="signUp"> 
                                Almost done!
                            </h2>
                        </div>
                        <div>
                            <h3><label>
                                Please enter your phone number for RUC! updates (format: xxx-xxx-xxxx) </label>
                            </h3>
                        </div>
                        <div class="codeBox">
                            <form class="form-inline" action="phonenumberhandler.php" method="POST">
                              <div class="form-group mx-sm-3 mb-2">
                                <input id="phnumber" type="tel" name="phnumber" class="form-control" tabindex="1"  placeholder="XXX-XXX-XXXX" pattern="^\d{3}-\d{3}-\d{4}$" value="" required> 
                              </div>
                              <button type="submit" class="btn btn-primary mb-2">Submit</button>
                            </form>
                        </div><div>
                            <h3>
                                Skip this? Click <span><a href="home.php" class="signUp">here.</a></span>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>