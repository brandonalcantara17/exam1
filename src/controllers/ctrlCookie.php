<?php
function ctrlCookie($request, $response, $container)
{
    $answer = $request->get(INPUT_GET, "answer");
    if ($answer === "yes") {
        $cookieAccepted = $_SESSION['cookieAccepted'] = "yes";
    } elseif ($answer === "no") {
        $cookieAccepted = $_SESSION['cookieAccepted'] = "no";
    } else {
        $cookieAccepted = $_SESSION['cookieAccepted'] ?? "none";
    }
    
    $response->set('cookieAccepted', $cookieAccepted);
    $response->setTemplate("home.php");
    return $response;
}