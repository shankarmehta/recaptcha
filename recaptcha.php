<?php 

if (isset($_POST['submit'])) {
    $secret = '6LfE5hQTAAAAAIU5P_IQjg8JIZ_x4Rd4dSzysgSC';
    $response = $_POST['g-recaptcha-response'];
    $remoteip = $_SERVER['REMOTE_ADDR'];
    
    $url = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip");
    $result = json_decode($url, TRUE);

    if ($result['success'] == 1) {
        echo $_POST['myreq'];
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Google reCAPTCHA</title>
</head>

<body>
    <br><br>
    <form action="" method="post">
        <input type="text" name="myreq"><br>
        <div class="g-recaptcha" data-sitekey="6LfE5hQTAAAAAH2Aj5lMPSA4yUQzsEDGxoJbV4Ib"></div>
        <input type="submit" name="submit" value="Send Request!">
    </form>
</body>
<script src='https://www.google.com/recaptcha/api.js'></script>
</html>