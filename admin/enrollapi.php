<?php
$json = file_get_contents('php://input');
$_POST = json_decode($json);

if ($_POST->action == 'saveImage') {
    try {
        $array = (array) $_POST->data;
        $prettyJsonString = json_encode($array, JSON_PRETTY_PRINT);
        $file = $_POST->id . ".json";
        $fp = fopen("../jsonStudent/" . $file, "wb");
        fwrite($fp,  json_encode($array));
        fclose($fp);

        echo json_encode(true);
    } catch (\Throwable $th) {
        echo json_encode(false);
    }
}
