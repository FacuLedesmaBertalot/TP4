<?php
function dataSubmited() {
    $requestData = [];

    if (!empty($_POST)) {
        $requestData = $_POST;
    } elseif (!empty($_GET)) {
        $requestData = $_GET;
    }

    if (!empty($_FILES)) {
        foreach ($_FILES as $i => $a) {
            $requestData[$i] = $a;
        }
    }

    if (count($requestData)) {
        foreach ($requestData as $i => $valor) {
            if ($valor === "") {
                $requestData[$i] = 'null';
            }
        }
    }
    return $requestData;
}