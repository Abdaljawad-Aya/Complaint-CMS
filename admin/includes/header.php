<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Funda of Web IT | Admin Panel</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">


    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link type="text/css" href="css/theme.css" rel="stylesheet">
    <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
        rel='stylesheet'>


    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">


    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">



    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">

    <!-- for complaint details -->
    <script language="javascript" type="text/javascript">
            var popUpWin=0;
            function popUpWindow(URLStr, left, top, width, height)
                {
                if(popUpWin)
                {
                if(!popUpWin.closed) popUpWin.close();
                }
            popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+500+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}
    </script>

    <!-- for change password -->
    <script language="javascript" type="text/javascript">
    function valid() {
        if (document.chnpwd.password.value == "") {
            alert("Current")
        }
    }
    </script>

    <!-- for manage users popUpwin  -->
    <script language="javascript" type="text/javascript">
    var popUpWin = 0;

    function popUpWindow(URLStr, left, top, width, height) {
        if (popUpWin) {
            if (!popUpWin.closed) popUpWin.close();
        }
        popUpWin = open(URLStr, 'popUpWin',
            'toolbar=no, location=no, directories=no, status=no,menubar=no,scrollbars=yes, resizable=no, copyhistory=yes,width=' +
            600 + ',height=' + 600 + ',left=' + left + ', top=' + top + ',screenX=' + left + ',screenY=' + top + '')
    }
    </script>
    <!-- User Profile + Update Complaint -->
    <script>
    function f2() {
        window.close();
    }
    ser

    function f3() {
        window.print();
    }
    </script>

    <script type="text/javascript">
    function valid() {
        if (document.chngpwd.password.value == "") {
            alert("Current Password Filed is Empty !!");
            document.chngpwd.password.focus();
            return false;
        } else if (document.chngpwd.newpassword.value == "") {
            alert("New Password Filed is Empty !!");
            document.chngpwd.newpassword.focus();
            return false;
        } else if (document.chngpwd.confirmpassword.value == "") {
            alert("Confirm Password Filed is Empty !!");
            document.chngpwd.confirmpassword.focus();
            return false;
        } else if (document.chngpwd.newpassword.value != document.chngpwd.confirmpassword.value) {
            alert("Password and Confirm Password Field do not match  !!");
            document.chngpwd.confirmpassword.focus();
            return false;
        }
        return true;
    }
    </script>
</head>


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">