<?php

function ctrlResult($request, $response, $container)
{
    $model = $container->Example();

    $all = $model->selectAllFrom('Example');
    $response->set('all', $all);

    // $response->redirect("index.php?r=updateGimcana");
    $response->setTemplate("result.php");
    return $response;
}