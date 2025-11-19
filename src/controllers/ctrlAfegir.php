<?php

use Models\ExampleModel;

function ctrlAfegir($request, $response, $container)
{
    $model = $container->Example();

    $table = "categories";
    $total = $model->getCategCount();
    $all = $model->selectAllFrom($table);


    // print_r($total);
    // print_r($all);


    $categories = [];
    foreach ($all as $row) {
        $id = isset($row['id']) ? $row['id'] : null;
        $name = isset($row['name']) ? $row['name'] : '--';
        $categories[] = [
            'name' => $name,
            'id' => $id
        ];
    }

    // print_r($categories);

    $response->set('all', $all);
    $response->set('total', $total);
    $response->set('categories', $categories);
    $response->setTemplate('afegir.php');
    return $response;
}