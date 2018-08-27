<?php

require_once 'class/Fun.php';
$fxn = new Fun();
session_start();

?>

<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <link rel='stylesheet' type='text/css' href='public/css/main.css'/>
    <title>Tanamo Inc</title>

</head>

<body>

<!--header-->
<div class="head-section">
    <div class="container">

        <div class="logo">
            <a href="https://www.facebook.com/Tanamo-Inc-204731483344765"><img src="public/imag/logo.png"
                                                                               id="logo"></a>
        </div>

        <marquee class="aas">****Welcome To Oasis Of Hope:TimeNoDey Series!!! ****
        </marquee>

    </div>

</div>

<?php
//check if user made a logout
$fxn->logout();
//check password and username only if not logged in.
if (!$fxn->isLoggedIn()) {
    $fxn->login();
}
//check once again if user is logged in after a login attempt
if (!$fxn->isLoggedIn()) {
    $fxn->loginform();
    exit;
} else {
    echo "<div id='userbar'><h2>" . $fxn->user() . "</h2>" .
        "<p><a href='index.php?logout=logout'>" .
        "<img class='logout' src='public/imag/logout.jpg' alt='logout'>" .
        "</a></p></div>";
}
?>

<!--ITEMS-->
<div class="section">
    <!--Adder-->
    <div>
        <img class="adder" src="public/imag/add.png" alt="Add new item">
        <?php
        $fxn->audioEditor(0, "", "", "");
        ?>
    </div>

    <!--Contents-->
    <?php
    $audios = $fxn->disAudio();
    if ($audios == null) {
        echo("<h2>Empty Content</h2>");
    } else {
        foreach ($audios as $audio) {

            echo("<div class='box'>" .
                "<div class='box-details'>" .
                "<p>" . htmlspecialchars($audio["title"]) . "</p>" .
                "<p>" . htmlspecialchars(substr($audio["body"], 0, 100)) . "..." . "</p>" .
                "<div class='iconbar'>" .
                "<img class='editorr' src='public/imag/edit.png' alt='edit'>" .
                "<img class='deletor' src='public/imag/del.png' alt='delete'>" .
                "</div>" .
                "</div>");

            $fxn->audioEditor($audio["id"], htmlspecialchars($audio["title"]), htmlspecialchars($audio["body"]), $audio["audio"]);

            echo("</div>");

        }
    }
    ?>

</div>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="public/js/main.js"></script>

</body>

</html>
