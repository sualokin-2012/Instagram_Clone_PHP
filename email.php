<?php

session_start();
$userId = $_SESSION['userId'];

$to      = 'userId';
$subject = 'Password Reset';

// Message
$message = '
<html>
<head>
  <title>Password Reset</title>
</head>
<body>
  <p>Please reset your password here</p>
  <a href="https://php-project-jkim789.c9users.io/passwordreset.html/?userId=<?php echo $uid; ?>" class="text-center">Reset Password</a>  
</body>
</html>
';

$headers = 'From: prog8165@gmail.com' . "\r\n" .
    'Reply-To: prog8165@gmail.com' . "\r\n" .
    'PHP/' . phpversion();

mail($to, $subject, $message, $headers);

?>

<html>
<head>
  <title>Password Reset</title>
</head>
<body>
  <p>Please reset your password here</p>
  <a href="https://php-project-jkim789.c9users.io/passwordreset.html/?userId=<?php echo $uid; ?>" class="text-center">Reset Password</a>  
</body>
</html>