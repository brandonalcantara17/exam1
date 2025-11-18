<?php
session_start();
/**
 * Aquest fitxer és un exemple de Front Controller, pel qual passen totes les requests.
 */

include "../src/config.php";
include "../src/controllers/ctrlHome.php";
include "../src/controllers/ctrlResult.php";

/**
 * Carreguem les classes del Framework Emeset
 */

include "../src/Emeset/Container.php";
include "../src/Emeset/Request.php";
include "../src/Emeset/Response.php";
include "../src/Container.php";

/**
 * Carreguem els models
 */
include "../src/Models/Db.php";
include "../src/Models/ExampleModel.php";

$request = new \Emeset\Request();
$response = new \Emeset\Response();
$container = new Container($config);

/* 
 * Aquesta és la part que fa que funcioni el Front Controller.
 * Si no hi ha cap paràmetre, carreguem la pàgina d'inici.
 * Si hi ha paràmetre, carreguem la pàgina que correspongui.
 * Si no existeix la pàgina, carreguem la pàgina d'error.
 */
$r = '';
if (isset($_REQUEST["r"])) {
    $r = $_REQUEST["r"];
}

/* Front Controller, aquí es decideix quina acció s'executa */

if ($r == "" || $r == "home") {
    $response = ctrlHome($request, $response, $container);
} elseif ($r == "result") {
    $response = ctrlResult($request, $response, $container);
} else {
    echo "No existeix la ruta";
}

$response->execute();