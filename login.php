<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Demo :: Login</title>
        <meta name="description" content="Custom Login Form Styling with CSS3" />
        <meta name="keywords" content="css3, login, form, custom, input, submit, button, html5, placeholder" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap-dialog.min.css" rel="stylesheet" type="text/css"/>
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
                <h1>MyApp <strong>Login Form</strong> Demo</h1>
                <div class="support-note">
                    <span class="note-ie">Sorry, only modern browsers.</span>
                </div>
            </header>
            <section class="main">
                <form id="frmsubt" data-attr="./action/cLibrary.php" class="form-2">
                    <h1><span class="log-in">Log in</span></h1>
                    <p id="error_usrs" style="color:red; display:none;" >Please the enter Username</p>
                    <p id="error_pwd" style="color:red; display:none;" >Please the enter Password</p>
                    <p class="float">
                        <label for="login"><i class="icon-user"></i>Username</label>
                        <input type="text" id="txtusername" name="txtusername" placeholder="Username or email">
                    </p>
                    <p class="float">
                        <label for="password"><i class="icon-lock"></i>Password</label>
                        <input type="password" id="txtpwd" name="txtpwd" placeholder="Password" class="showpassword">
                    </p>
                    <p class="clearfix"> 
                        <input type="hidden" id="hdaction" name="hdaction" value="login"/>
                        <input type="submit" name="submit" value="Log in">
                    </p>
                </form>​​
            </section>
        </div>
        <!-- jQuery if needed -->
        <script type="text/javascript" src="js/jquery-1.10.2.js"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/bootstrap-dialog.min.js" type="text/javascript"></script>
        <script src="js/app.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(function () {
                $(".showpassword").each(function (index, input) {
                    var $input = $(input);
                    $("<p class='opt'/>").append(
                            $("<input type='checkbox' class='showpasswordcheckbox' id='showPassword' />").click(function () {
                        var change = $(this).is(":checked") ? "text" : "password";
                        var rep = $("<input placeholder='Password' type='" + change + "' />")
                                .attr("id", $input.attr("id"))
                                .attr("name", $input.attr("name"))
                                .attr('class', $input.attr('class'))
                                .val($input.val())
                                .insertBefore($input);
                        $input.remove();
                        $input = rep;
                    })
                            ).append($("<label for='showPassword'/>").text("Show password")).insertAfter($input.parent());
                });

                $('#showPassword').click(function () {
                    if ($("#showPassword").is(":checked")) {
                        $('.icon-lock').addClass('icon-unlock');
                        $('.icon-unlock').removeClass('icon-lock');
                    } else {
                        $('.icon-unlock').addClass('icon-lock');
                        $('.icon-lock').removeClass('icon-unlock');
                    }
                });
            });
        </script>
    </body>
</html>