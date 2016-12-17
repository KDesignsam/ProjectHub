<?php
session_start();

if (isset($_SESSION['cuserId']) == false) {

    header("Location: pageredirect.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Demo :: Account Information</title>
        <meta name="description" content="Custom Login Form Styling with CSS3" />
        <meta name="keywords" content="css3, login, form, custom, input, submit, button, html5, placeholder" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">        
        <link rel="stylesheet" type="text/css" href="css/banner1/style2.css" />
        <link rel="stylesheet" type="text/css" href="css/jquery.mCustomScrollbar.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap-dialog.min.css" />
        <link href="css/mystyle.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <script src="js/modernizr.custom.63321.js"></script>
        <!--[if lte IE 7]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
        <style>
            body {
                background: #e1c192 url(images/wood_pattern.jpg);
            }
        </style>
    </head>
    <body>
        <div id="loader" style="width: 100%; height: 100%; position:fixed; z-index: 1100; background: black; opacity: 0.8; display:none;">
            <div align="center" style="padding-top:250px;">
                <img alt="loader" src="images/ajax-loader.gif"/>
            </div>
        </div>
        <div class="container">
            <!-- Codrops top bar -->
            <div class="codrops-top">
            </div><!--/ Codrops top bar -->

            <header>
                <h1>My <strong>Account</strong> Form</h1>
                <div class="support-note">
                    <span class="note-ie">Sorry, only modern browsers.</span>
                </div>
            </header>
            <section class="main">
                <!--Register Starts-->
                <div id="" class="show">
                    <div class=" animated bounceInUp">
                        <form method="post" action="" data-attr="./action/cLibrary.php"  id="frmsubt">
                            <div class="log_inr">
                                <h1>
                                    Account Information
                                </h1>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group ful_wdth rel">
                                            <span class="txtrequired" style="left: 60px !important">
                                                <i>*</i>
                                            </span>
                                            <label for="lname">UserName</label>
                                            <input type="text" id="uname" name="uname" class="form-control">
                                            <span class="error cuname" style="color:#ffc107"></span>
                                        </div>
                                        <div class="form-group ful_wdth rel">
                                            <span class="txtrequired" style="left: 60px !important">
                                                <i>*</i>
                                            </span>
                                            <label for="lname">First Name</label>
                                            <input type="text" id="fname" name="fname" class="form-control">
                                            <span class="error cfname" style="color:#ffc107"></span>
                                        </div>
                                        <div class="form-group ful_wdth rel">
                                            <span class="txtrequired" style="left: 79px !important">
                                                <i>*</i>
                                            </span>
                                            <label for="lname">Email Address</label>
                                            <input type="text" id="emailadd" name="emailadd" class="form-control">
                                            <span class="error cemailadd" style="color:#ffc107"></span>
                                        </div>
                                        <div class="form-group ful_wdth rel">
                                            <label for="lname">New Password</label>
                                            <input type="password" id="nwpwd" name="nwpwd" class="form-control">
                                            <span class="error cnwpwd" style="color:#ffc107"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group ful_wdth rel">
                                            <span class="txtrequired" style="left:98px !important">
                                                <i>*</i>
                                            </span>
                                            <label for="lname">Website Domain</label>
                                            <input type="text" id="webdomain" name="webdomain" class="form-control">
                                            <span class="error cwebdomain" style="color:#ffc107"></span>
                                        </div>
                                        <div class="form-group ful_wdth rel">
                                            <span class="txtrequired" style="left: 60px !important">
                                                <i>*</i>
                                            </span>
                                            <label for="lname">Last Name</label>
                                            <input type="text" id="lname" name="lname" class="form-control">
                                            <span class="error clname" style="color:#ffc107"></span>
                                        </div>
                                        <div class="form-group ful_wdth rel">
                                            <label for="lname">Current Password</label>
                                            <input type="password" id="crtpwd" name="crtpwd" class="form-control" readonly="readonly" >
                                            <span class="error ccrtpwd" style="color:#ffc107"></span>
                                        </div>
                                        <div class="form-group ful_wdth rel">
                                            <label for="lname">Confirm New Password</label>
                                            <input type="password" id="cfrmpwd" name="cfrmpwd" class="form-control">
                                            <span class="error ccfrmpwd" style="color:#ffc107"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ful_wdth rel text-right">
                                    <input type="hidden" id="hdaction" name="hdaction" value="mainfrm"/>
                                    <button type="submit" class="btn discls">Save</button>    
                                    <button type="button" id="btnClose" class="btn discls">Close</button>    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--Register Ends-->
            </section>
        </div>
        <!-- jQuery if needed -->
        <script type="text/javascript" src="js/jquery-1.10.2.js"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/bootstrap-dialog.min.js" type="text/javascript"></script>
        <script src="js/app.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(function () {
                //Populate User List, If persent.
                populateData();
            });
        </script>
    </body>
</html>