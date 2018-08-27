<?php
if (isset($_POST['tag'])) {
    $tag = $_POST['tag'];

    //load functions and open database
    require_once '../class/Fun.php';
    $fxn = new Fun();

    // prepare response for Android App
    $response = array("tag" => $tag, "success" => 0);


    if ($tag == 'get_audio') {

        $response["audios"] = $fxn->disAudio();

        //new lines to br
        foreach ($response["audios"] as $key => $row) {
            $response["audios"][$key]["body"] = nl2br($response["audios"][$key]["body"]);
        }

        $response["success"] = 1;

        //send data to Android Device in json format
        print(json_encode($response));
    }


    //close database
    $fxn->closeDB();
}

