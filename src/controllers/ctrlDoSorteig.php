<?php
function ctrlDoSorteig($request, $response, $container)
{
    $nou_guanyador = $request->get(INPUT_GET, "win");

    // print_r($productors);

    // $nou_guanyador = null;
    // $nou_guanyador = $productors[array_rand($productors)];

    // $_SESSION['guanyats'] = [];
    $_SESSION['guanyats'][] = $nou_guanyador;
    $guanyats = $_SESSION['guanyats'];

    // print_r($nou_guanyador);
    // print_r($guanyats);

    $response->set('nou_guanyador', $nou_guanyador);
    $response->set('guanyats', $guanyats);
    $response->setTemplate('sorteig.php');

    return $response;
}