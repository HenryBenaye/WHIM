<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Coaches </title>
</head>
<body>
    
    <?php

    require 'data.php';

    $data = new data(); 
    $coaches = $data->get_coach();
    $currentday = date('l');
    $checkAvailable;

    switch($currentday) 
    {
        case 'Monday':
            $checkAvailable = 'ma';
            break;
        case 'Tuesday':
            $checkAvailable = 'di';
            break;
        case 'Wednesday':
            $checkAvailable = 'wo';
            break;
        case 'Thursday':
            $checkAvailable = 'do';
            break;
        case 'Friday':
            $checkAvailable = 'vr';
            break;
    }

    foreach ($coaches as $coach) {
        if (strpos($coach['available_days'], $checkAvailable) !== false) {
            echo $coach['username'] . '<br>';
            echo "<img src='" . $coach['image_url'] . "'>" . '<br>';
        }
    }

    ?>
    
</body>
</html>