<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $error = false;

    if (empty($_POST['make']) || strlen($_POST['make']) < 2) { // VW has no more than 2 charakters, this is why 2 is choosen here.
        // display error
        echo 'Enter a brand with at least 2 characters';
        echo '<br>';

        $error = true;
    }

    if (empty($_POST['model']) || strlen($_POST['model']) < 1) {  // some chinese companies may have models with only 1 character.
        // display error
        echo 'Please enter a model with atleast 1 character.';
        echo '<br>';

        $error = true;
    }


    if (empty($_POST['year']) || strlen($_POST['year']) < 4 && strlen($_POST['year']) > 5) { // a year needs to have 4 characters (2018) 
        // display error
        echo 'The year needs at least 4 characters';
        echo '<br>';

        $error = true;
    }

    if (empty($_POST['color']) || !in_array($_POST['color'], ['blue', 'red', 'green', 'yellow', 'black', 'white'])) { // a valid value which is in the array (select option) must be choosen
        // display error
        echo 'please select a valid color';
        echo '<br>';

        $error = true;
    }

    if ($error) {
        http_response_code(400);
        echo 'problem detected please check your informations';
    } else {
        echo 'Your informations are valid and were enregistered';
    }

} else {
    // display error
    http_response_code(405);
    echo 'not ok';
}

