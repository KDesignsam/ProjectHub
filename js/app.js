$(document).ready(function () {

    //Login Form and Account Details.
    $("#frmsubt").on('submit', (function (e) {
        e.preventDefault();
        var url = $(this).attr('data-attr');
        console.log('url ' + url);
        var valdfrm = $("#hdaction").val();

        if (validAll(valdfrm)) {
            $("#loader").show();
            $.ajax({
                url: url,
                type: "POST",
                data: new FormData(this),
                contentType: false,
                processData: false,
                crossDomain: true,
                cache: false,
                error: function (jqXHR, textStatus, errorThrown) {

                    $("#loader").hide();
                    showMessages(false, "Some Error Occured.");
                    console.log("Error Status " + textStatus + " " + errorThrown);
                },
                success: function (data)
                {
                    $("#loader").hide();
                    console.log('status ' + data.status + ' result ' + data.result);
                    if (data.status === true) {
                        console.log(data.urls);
                        setTimeout(function () {
                            showMessages(true, data.result);
                        }, 1200);
                        setTimeout(function () {

                            if (data.urls != undefined && data.urls != "") {
                                window.location = data.urls;
                            } else {
                                window.location.href = window.location.pathname;
                            }
                        }, 3000);
                    } else {
                        showMessages(false, data.result);
                    }
                }
            });
        }
    }));

    $("#btnClose").on('click', function () {
        window.location = "./pageredirect.php?pageid=logout";
    });

});


function  populateData() {

    $.ajax({
        url: './action/cListdata.php',
        type: "GET",
        data: {'hdaction': 'populate'},
        dataType: 'json',
        cache: false,
        error: function (jqXHR, textStatus, errorThrown) {

            $("#loader").hide();
            showMessages(false, "Some Error Occured.");
            console.log("Error Status " + textStatus + " " + errorThrown);
        },
        success: function (data)
        {
            console.log('status ' + data.status + ' result ' + data.result);
            if (data.status === true) {
                console.log(data);
                if (data.content.length > 0) {
                    $.each(data.content, function (index, column) {

                        $("#uname").val(column.username);
                        $("#crtpwd").val(column.password);
                        $("#fname").val(column.firstname);
                        $("#lname").val(column.lastname);
                        $("#webdomain").val(column.websitedomain);
                        $("#emailadd").val(column.email);
                    });
                } else {
                    showMessages(false, "No record found.");
                }
            } else {
                showMessages(false, data.result);
            }
        }
    });

}

function showMessages(status, message) { //Status { 1=success message 0 = failed message}
    if (status === true) {
        BootstrapDialog.show({
            title: 'My App',
            message: message,
            type: BootstrapDialog.TYPE_SUCCESS
        });
    } else {
        BootstrapDialog.show({
            title: 'My App',
            message: message,
            type: BootstrapDialog.TYPE_DANGER
        });
    }
}

function validAll(frmname) {

    //Error Messages for UI
    $('#error_usrs').hide();
    $('#error_pwd').hide();

    $(".error").html("");

    if (frmname === "login") {
        //Warning of error for Textboxes.
        if ($.trim($("#txtusername").val()).length === 0) {
            $("#txtusername").focus();
            $('#error_usrs').show();
            return false;
        }
        if ($.trim($("#txtpwd").val()).length === 0) {
            $("#txtpwd").focus();
            $('#error_pwd').show();
            return false;
        }
    }
    if (frmname === "mainfrm") {

        if ($.trim($("#uname").val()).length === 0) {
            $("#uname").focus();
            $(".cuname").html("Enter the UserName.");
            return false;
        }
        if ($.trim($("#webdomain").val()).length === 0) {
            $("#webdomain").focus();
            $(".cwebdomain").html("Enter the Website Domain.");
            return false;
        }
        if ($.trim($("#webdomain").val()).length === 0) {
            $("#webdomain").focus();
            $(".cwebdomain").html("Enter the Website Domain.");
            return false;
        }
        var webdnstr = /^http(s?)\:\/\/[0-9a-zA-Z]([-.\w]*[0-9a-zA-Z])*(:(0-9)*)*(\/?)([a-zA-Z0-9\-\.\?\,\'\/\\\+&amp;%\$#_]*)?$/;
        var webdomain = $('#webdomain').val();
        if (!webdomain.match(webdnstr) || webdomain === '') {
            $("#webdomain").focus();
            $(".cwebdomain").html("Enter the valid Website Domain.");
            return false;
        }
        if ($.trim($("#fname").val()).length === 0) {
            $("#fname").focus();
            $(".cfname").html("Enter the First Name.");
            return false;
        }
        if ($.trim($("#lname").val()).length === 0) {
            $("#lname").focus();
            $(".clname").html("Enter the Last Name.");
            return false;
        }
        if ($.trim($("#emailadd").val()).length === 0) {
            $("#emailadd").focus();
            $(".cemailadd").html("Enter the Email.");
            return false;
        }
        var emailstr = /^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
        var email = $('#emailadd').val();
        if (!email.match(emailstr) || email === '') {
            $("#emailadd").focus();
            $(".cemailadd").html("Enter the valid E-mail Address.");
            return false;
        }
        if ($.trim($("#nwpwd").val()).length !== 0) {

            var pwdstr = /^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/;
            var pwd = $('#nwpwd').val();
            if (!pwd.match(pwdstr)) {
                $("#nwpwd").focus();
                $(".cnwpwd").html("Password must be at least 8 characters and must contain at least one lower case letter, \n\
                            one upper case letter and one digit");
                return false;
            }
        }
        if ($.trim($("#nwpwd").val()).length !== 0) {
            if ($.trim($("#cfrmpwd").val()) !== $.trim($("#nwpwd").val())) {
                $("#frmpwd").focus();
                $(".ccfrmpwd").html("Confirm Password not same as New Password.");
                return false;
            }
            var pwdstr = /^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/;
            var pwd = $('#cfrmpwd').val();
            if (!pwd.match(pwdstr)) {
                $("#cfrmpwd").focus();
                $(".ccfrmpwd").html("Password must be at least 8 characters and must contain at least one lower case letter, \n\
                            one upper case letter and one digit");
                return false;
            }
        }
    }
    return true;
}
