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


        <?php if (!empty($message)): ?>
            <div class="alert alert-info">
                <?= htmlspecialchars($message) ?>
            </div>
        <?php endif; ?>

        <?php // print_r($categories); ?>

        <h1>Afegir un producte</h1>

        <form action="?r=doAfegir" method="POST">
            <label>Nom del producte</label><br>
            <input type="text" class="form-control" id="name" name="name" required><br>
            <label>Categoria: </label><br>
            <select id="categoria" name="categoria" required>
                <?php
                foreach ($categories as $categ) {
                    echo '<option value="' . htmlspecialchars($categ['id']) . '">' . htmlspecialchars($categ['name']) . '</option>';
                }
                ?>
            </select><br>
            <label>Descripció curta</label><br>
            <input type="text" class="form-control" id="descripcio" name="descripcio" required><br>
            <label>Productor</label>
            <input type="text" class="form-control" id="productor" name="productor" required><br>
            <label>Email de contacte</label>
            <input type="text" class="form-control" id="email" name="email" required><br>
            <label>Preu</label>
            <input type="text" class="form-control" id="preu" name="preu" required><br>
            <button type="submit" class="btn btn-primary">Aceptar</button>
        </form>


    </main>



    <?php include 'parts/footer.php'; ?>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"></script>

<script src="js/popup.js"></script>
<script src="js/validate.js"></script>

</html>