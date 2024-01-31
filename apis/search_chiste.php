<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Chiste</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <?php 
        $apiUrl = "https://api.chucknorris.io/jokes/categories";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $apiUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);

        $array = json_decode($response, TRUE); 
        $categorias = $array;
    ?>
    <div class="container">
        <h1>Buscador de Chistes de Chuck Norris</h1><br>

        <form action="" method="post">
            Categoría: <select name="categoria">
                <?php 
                foreach($categorias as $cat) { ?>
                    <option value="<?php echo $cat ?>"><?php echo $cat ?></option>
                <?php }
                ?>
            </select><br><br>
            <input class="btn btn-primary" type="submit" value="Buscar">
        </form>
    </div><br>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $categoria = $_POST["categoria"];
        $c = "category=$categoria";

        $apiUrl = "https://api.chucknorris.io/jokes/random?$c";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $apiUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);
        $array = json_decode($respuesta, true);  
        $chiste = $array['value']; ?>

        <div class="container">
            <h2><?php echo $chiste ?></h2>
        </div>
    <?php }
    ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>