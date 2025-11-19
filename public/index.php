<?php
session_start();
/**
 * Aquest fitxer és un exemple de Front Controller, pel qual passen totes les requests.
 */

include "../src/config.php";
include "../src/controllers/ctrlHome.php";
include "../src/controllers/ctrlResult.php";
include "../src/controllers/ctrlCookie.php";
include "../src/controllers/ctrlAfegir.php";
include "../src/controllers/ctrlLlista.php";
include "../src/controllers/ctrlSorteig.php";
include "../src/controllers/ctrlDoAfegir.php";
include "../src/controllers/ctrlDoSorteig.php";


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
include "../src/Models/ProductsModel.php";
include "../src/Models/CategoriesModel.php";

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

if ($r == "") {
    $response = ctrlCookie($request, $response, $container);
} elseif ($r == "home") {
    $response = ctrlHome($request, $response, $container);
} elseif ($r == "afegir") {
    $response = ctrlAfegir($request, $response, $container);
} elseif ($r == "llista") {
    $response = ctrlLlista($request, $response, $container);
}
// elseif ($r == "sorteig") {
//     $response = ctrlSorteig($request, $response, $container);
// } 
elseif ($r == "doAfegir") {
    $response = ctrlDoAfegir($request, $response, $container);
} elseif ($r == "doSorteig") {
    $response = ctrlDoSorteig($request, $response, $container);
} elseif ($r == "result") {
    $response = ctrlResult($request, $response, $container);
} else {
    echo "No existeix la ruta";
}

$response->execute();