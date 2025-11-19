<?php session_start(); ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gimcanes!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/styles.css">
</head>

<body class="d-flex flex-column min-vh-100">

    <header class="card-header">
        <?php include 'parts/navbar.php'; ?>
    </header>

    <main class="px-4 py-4 mx-5">

        <h1>Llista</h1>

        <?php

        $productors = [];
        foreach ($productes as $prod) {
            echo '<div>'
                . 'ID: ' . htmlspecialchars($prod["id"]) . ' | '
                . 'Nom: ' . htmlspecialchars($prod["nom"]) . ' | '
                . 'Preu: ' . htmlspecialchars($prod["preu"]) . ' | '
                . 'Categoria: ' . htmlspecialchars($prod["categoria"]) . ' | '
                . 'Data/Hora: ' . htmlspecialchars($prod["data_hora"]) . ' | '
                . 'Productor: ' . htmlspecialchars($prod["productor"]) . ' | '
                . 'Correu: ' . htmlspecialchars($prod["correu"]) .
                '</div>';
            $productors[] = $prod["productor"];
        }


        if (!isset($_SESSION['guanyats']))
            $_SESSION['guanyats'] = [];
        $productors = array_unique($productors);
        if (count($productors) < 3) {
            echo '<div class="btn btn-danger">
            <h2>menys de 3 productors, no hi haurà sorteig.</h2>
        </div>';
        } else if (empty(array_diff($productors, $_SESSION['guanyats']))) {
            echo '<div class="btn btn-danger">
            <h2>tots els guanyadors ja han sigut guanyadors i no poden tornar a guanyar.</h2>
        </div>';
        } else {
            do {
                $nou_guanyador = $productors[array_rand($productors)];
            } while (in_array($nou_guanyador, $_SESSION['guanyats']));
            echo '<a href="index.php?r=doSorteig&win=' . urlencode($nou_guanyador) . '" class="btn btn-danger">Sorteig</a>';
        }

        ?>

    </main>



    <?php include 'parts/footer.php'; ?>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"></script>
<script src="js/popup.js"></script>

</html>