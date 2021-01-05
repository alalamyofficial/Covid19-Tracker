<?php


    $jsonData = file_get_contents('https://pomber.github.io/covid19/timeseries.json');

    $data = json_decode($jsonData,true);


    foreach($data as $key => $value){

        $dayCount = count($value)-1;
        $dayCountPrev = $dayCount-1;

    }

    $total_cases = 0;
    $total_deaths = 0;
    $total_recovered = 0;

    foreach($data as $key => $value){

        $total_cases = $total_cases + $value[$dayCount]['confirmed'];
        $total_deaths = $total_deaths + $value[$dayCount]['deaths'];
        $total_recovered = $total_recovered + $value[$dayCount]['recovered'];

        

    }

?>