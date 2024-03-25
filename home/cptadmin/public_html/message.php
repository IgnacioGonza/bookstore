 <?php
 ini_set("include_path", '/home/cptadmin/php:' . ini_get("include_path") );
 require_once 'Mail.php';
 require_once 'Mail/RFC822.php';
 
 //Check if user send-to address is valid
 function send_email ($to, $from, $subject, $body, $is_body_html = false) {
     if (! valid_email($to)) {
         throw new Exception('This To address is invalid: ' .
                             htmlspecialchars($to));
     }
     if (! valid_email($from)) {
         throw new Exception('This From address is invalid: ' .
                              htmlspecialchars($from));
     }

//SMTP server configuration
$smtp = array();
$smtp['host'] = 'ssl://mail.c4ubooks.com';
$smtp['port'] = 465;
$smtp['auth'] = true;
$smtp['username'] = 'no_reply@c4ubooks.com';
$smtp['password'] = 'P4ssword!';

$mailer = Mail::factory('smtp', $smtp);
if (PEAR::isError($mailer)) {
    throw new Exception('Could not create mailer.');
}

$recipients = array();
$recipients[] = $to;

// Set the headers
$headers = array();
$headers['From'] = $from;
$headers['To'] = $to;
$headers['Subject'] = $subject;
if ($is_body_html) {
    $headers['Content-type'] = 'text/html';
}

//Send the email
$result = $mailer->send($recipients, $headers, $body);

//Check the result and throw an error if one exists
if (PEAR::isError($result)) {
    throw new Exception('Error sending mail: ' .
                         htmlspecialchars($result->getMessage()) );
}

} 

function valid_email($email) {
    $emailObjects = Mail_RFC822::parseAddressList ($email);
    if (PEAR::isError($emailObjects)) { return false; }
    
    $emailObject = $emailObjects[0];
    $email = $emailObject->mailbox . '@' . $emailObject->host;
    
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        return false;
    } else {
        return true;
    }
    
}
?>