<?php
function ctrlLlista($request, $response, $container)
{
    $model = $container->Example();
    $all = $model->selectAllProductes();

    // print_r($all);


    $productes = [];
    foreach ($all as $row) {
        $id = isset($row['id']) ? $row['id'] : null;
        $nom = isset($row['nom']) ? $row['nom'] : '--';
        $preu = isset($row['preu']) ? $row['preu'] : '--';
        $categoria = isset($row['categoria']) ? $row['categoria'] : '--';
        $data_hora = isset($row['data_hora']) ? $row['data_hora'] : '--';
        $productor = isset($row['productor']) ? $row['productor'] : '--';
        $correu = isset($row['correu']) ? $row['correu'] : '--';
        $productes[] = [
            'id' => $id,
            'nom' => $nom,
            'preu' => $preu,
            'categoria' => $categoria,
            'data_hora' => $data_hora,
            'productor' => $productor,
            'correu' => $correu,
        ];
    }

    $response->set('productes', $productes);
    $response->set("all", $all);
    $response->setTemplate('llista.php');
    return $response;
}