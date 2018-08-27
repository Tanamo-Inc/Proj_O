<?php
require_once '../class/Fun.php';
$fxn = new Fun();
session_start();

//continue only if user is logged in
if (!$fxn->isLoggedIn()) {
    exit;
}

function audioUpload($files)
{
    $soundurl = "";

    $fileName = $_FILES['soundfile']['name'];
    $tmpName = $_FILES['soundfile']['tmp_name'];
    $fileSize = $_FILES['soundfile']['size'];
    $fileType = $_FILES['soundfile']['type'];

    if ($fileType != 'audio/mpeg' && $fileType != 'audio/mpeg3' && $fileType != 'audio/mp3' && $fileType != 'audio/x-mpeg' && $fileType != 'audio/x-mp3' && $fileType != 'audio/x-mpeg3' && $fileType != 'audio/x-mpg' && $fileType != 'audio/x-mpegaudio' && $fileType != 'audio/x-mpeg-3') {
        echo('Error Uploading Audio file!!!!.');
    } else if ($fileSize > 10485760) {
        echo('File should not be more than 10mb');
    } else {
        if ($_FILES["soundfile"]["error"] > 0) {
            echo "Error: " . $_FILES["soundfile"]["error"];
        } else {
            if (move_uploaded_file($tmpName, "../public/upload/" . $fileName)) {
                $soundurl = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER['REQUEST_URI']) . "../public//upload/" . $fileName;
            } else
                echo "Please create a directory named 'public/upload' in: " . "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER['REQUEST_URI']) . "/";
        }
    }

    return $soundurl;
}

//check for tags and process delete and edit
if (!empty($_POST['tag'])) {
    //process song
    if ($_POST['tag'] == "editorr") {
        $audio = audioUpload($_FILES);

        if ($_POST['id'] == 0)
            $fxn->newAudio($_POST['body'], $_POST['title'], $audio);
        else
            $fxn->updateAudio($_POST['id'], $_POST['body'], $_POST['title'], $audio);
    }

    if ($_POST['tag'] == "deletor") {

        $fxn->delAudio($_POST['id']);
    }

}
?>

<script type="text/javascript"> window.location.href = "../index.php" </script>

