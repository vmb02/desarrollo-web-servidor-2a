<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Pregunta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .correcta {
            color: green;
        }
        .falsa {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Buscador de preguntas</h1><br>
        <form action="" method="post">
            Cantidad de preguntas: <input type="text" name="cantidad"><br><br>
            Categoría: <select name="categoria">
            <option selected value="">Cualquiera</option>
                <option value="23">Historia</option>
                <option value="22">Geografía</option>
                <option value="27">Animales</option>
                <option value="15">Videojuegos</option>
            </select><br><br>
            Dificultad: <select name="dificultad">
                <option selected value="">Cualquiera</option>
                <option value="easy">Fácil</option>
                <option value="medium">Normal</option>
                <option value="hard">Difícil</option>
            </select><br><br>

            <input class="btn btn-primary" type="submit" value="Buscar">
        </form>
    </div><br>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $cantidad = $_POST["cantidad"];
        $categoria = $_POST["categoria"];
        $dificultad = $_POST["dificultad"];

        $a = "amount=$cantidad";
        $c = "category=$categoria";
        $d = "difficulty=$dificultad";

        $apiUrl = "https://opentdb.com/api.php?$a&$c&$d";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $apiUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        $array = json_decode($respuesta, true);  
        $preguntas = $array['results'];

        foreach($preguntas as $pregunta) { ?>
            <div class="container">
            <h1><?php echo $pregunta['question'] ?></h1>
            <p><?php echo $pregunta['category'] ?></p>
            <p><?php echo $pregunta['difficulty'] ?></p>
            <p class="correcta"><?php echo $pregunta['correct_answer'] ?></p>
            <?php
                $falsas = $pregunta['incorrect_answers'];
                foreach($falsas as $falsa) { ?>
                    <p class="falsa"><?php echo $falsa ?></p>
                <?php }
            ?>
            </div>
        <?php }
    }
    ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>