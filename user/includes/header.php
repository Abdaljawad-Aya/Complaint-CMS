<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>USER SIDE</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">


   <script>
    // register Complaint
    function getCat(val) {
        $.ajax({
            type: "POST",
            url: "getsubcat.php",
            data: 'catid=' + val,
            success: function(data) {
                $("#subcategory").html(data);
            }
        });
    }
    </script>

    <script>
    // login

    function valid() {
        if (document.forgot.password.value != document.forgot.confirmpassword.value) {
            alert("password and Confrim password Field do not match");
            document.forgot.confirmpassword.focus();
            return false;
        }
        return true;
    }
    </script>

    <script>
    // registration
    function userAvailability() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "check_availability.php",
            data: 'email=' + $("#email").val(),
            type: "POST",
            success: function(data) {
                $("#user-availability-status1").html(data);
                $("#loaderIcon").hide();
            },
            error: function() {}
        });
    }
    </script>

    <script type="text/javascript">
    function valid() {
        if (document.chngpwd.password.value == "") {
            alert("Current Password Field is Empty !!");
            document.chngpwd.password.focus();
            return false;
        } else if (document.chngpwd.newpassword.value == "") {
            alert("New Password Field is Empty !!");
            document.chngpwd.newpassword.focus();
            return false;
        } else if (document.chngpwd.newpassword.value != document.chngpwd.confirmpassword.value) {
            alert("Password and Confirm Password Field do not match");
            document.chngpwd.confirmpassword.focus();
            return false;
        }
        return true;
    }
    </script>
</head>

<body class="hold-transition dark-mode layout-fixed layout-navbar-fixed layout-footer-fixed">