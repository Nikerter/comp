<?php

if (isset($_GET["name"]) && isset($_GET["phonenumber"]) ) { 

	// Формируем массив для JSON ответа
    $result = array(
    	'name' => $_GET["name"],
    	'phonenumber' => $_GET["phonenumber"]
    ); 

    // Переводим массив в JSON
    echo json_encode($result); 
}

?>