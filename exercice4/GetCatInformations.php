<?php

    require_once('./Cat.php');

    //----------First Cat-------------------------------------------------
    $mittens = new Cat('Mittens', 7, 'Grey', 'male', 'British Shorthair');
    $mittens = $mittens->getInfos(); // using getInfos()
    foreach ($mittens as $miau) 
    {
        echo $miau;
    }

    //----------Second Cat--------------------------------------------------
    $kittens = new Cat('Kittens', 1, 'Blue Grey', 'female', 'Russian Blue');
    $kittens = $kittens->getInfos(); // using getInfos()
    foreach ($kittens as $miau) 
    {
        echo $miau;
    }

    //----------Third Cat-----------------------------------------------------
    $tigros = new Cat('Los Tigros', 11, 'Black Silver', 'male', 'Maine Coon');
    $tigros = $tigros->getInfos(); // using getInfos()
    foreach ($tigros as $miau) 
    {
        echo $miau;
    }
?>
