<?php
function ctrlDoAfegir($request, $response, $container)
{
    $model = $container->Example();
    $data = $_POST;
    $nom = isset($data['name']) ? trim($data['name']) : '';
    $preu = isset($data['preu']) ? trim($data['preu']) : '';
    $categoria = isset($data['categoria']) ? trim($data['categoria']) : '';
    $data_hora = date('Y-m-d H:i:s'); //d-m-y error
    $productor = isset($data['productor']) ? trim($data['productor']) : '';
    $correu = isset($data['email']) ? trim($data['email']) : '';

    $push = $model->insert('productes', [
        'nom' => $nom,
        'preu' => $preu,
        'categoria' => $categoria,
        'data_hora' => $data_hora,
        'productor' => $productor,
        'correu' => $correu
    ]);

    if ($push['success']) {
        $response->set('message', 'afegit');
    } else {
        $response->set('message', 'Error, no sha pogut afegir');
    }

    // $response->setTemplate('home.php');
    $response->redirect("Location: ?r=home");
    return $response;
}