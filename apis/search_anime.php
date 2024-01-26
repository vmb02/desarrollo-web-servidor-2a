<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search anime</title>
</head>
<body>
    <form action="" method="post">
        Título: <input type="text" name="titulo"><br><br>
        Número de animes: <select name="limite">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="" selected>Sin límite</option>
        </select><br><br>
        Min score: <select name="minscore">
            <option value="1" selected>1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select><br><br>
        Max score: <select name="maxscore">
        <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10" selected>10</option>
        </select><br><br>
        <input type="submit" value="Buscar">
        
    </form>

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $titulo = $_POST["titulo"];
        $limite = $_POST["limite"];
        $minscore = $_POST["minscore"];
        $maxscore = $_POST["maxscore"];
        $titulo = preg_replace('/\s+/', '+', $titulo);
        $apiUrl = "https://api.jikan.moe/v4/anime?sfw&q=$titulo&limit=$limite&min_score=$minscore&max_score=$maxscore";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $apiUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        $array = json_decode($respuesta, true);  
        $animes = $array['data'];

        foreach($animes as $anime) { ?>
            <?php $imagen = $anime['images']['jpg']['image_url']; ?>

            <h1><?php echo $anime['title'] ?></h1>
            <img src="<?php echo $imagen ?>">
        <?php }
    }
    

    ?>
</body>
</html>