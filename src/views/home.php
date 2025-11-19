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

    <h1>Ecollista — la teva llista eco</h1>
    <div class="col-12 col-md-6 col-lg-3 rounded mb-2">
      <a class="btn btn-primary w-100" href="/?r=afegir">Afegir un
        producte</a>
      <a class="btn btn-primary w-100" href="/?r=llista">Productes</a>
    </div>
  </main>



  <?php include 'parts/footer.php'; ?>


  <?php
  if ($cookieAccepted === "none") {
    include 'parts/cookie.php';
  }
  ?>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="js/popup.js"></script>

</html>