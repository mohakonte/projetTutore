<?php 
function sanitize_my_email($field) {
    $field = filter_var($field, FILTER_SANITIZE_EMAIL);
    if (filter_var($field, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}
$to_email = 'mohakonte2011@hotmail.com'; 
$subject = 'Testing PHP Mail';
$message = 'This mail is sent using the PHP mail ';
$headers = 'From: noreply @ company. com';
//check if the email address is invalid $secure_check
$secure_check = sanitize_my_email($to_email);
if ($secure_check == false) {
    echo "Invalid input";
} else { //send email 
    
    $mail = mail($to_email, $subject, $message, $headers);
    if($mail){
        echo "This email is sent using PHP Mail";
    }else {echo "noop" ; var_dump($mail) ;}
    
}

$to      = 'mohakonte0896@gmail.com';
$subject = 'the subject';
$message = 'hello';
$headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
?>