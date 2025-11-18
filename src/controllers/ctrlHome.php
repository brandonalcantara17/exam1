<?php

function ctrlHome($request, $response, $container)
{



    $response->setTemplate("home.php");
    return $response;

}