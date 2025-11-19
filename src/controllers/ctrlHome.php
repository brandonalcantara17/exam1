<?php
function ctrlHome($request, $response, $container)
{
    $cookieAccepted = $_SESSION['cookieAccepted'] ?? "none";

    $response->set('cookieAccepted', $cookieAccepted);
    $response->setTemplate('home.php');
    return $response;
}