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
            <option selected value="">Todos</option>
            <?php for($i = 1; $i <= 5; $i++) {?>
                <option value="<?php echo $i ?>"><?php echo $i ?></option>
            <?php } ?>
        </select><br><br>
        Min score: <select name="minscore">
            <option selected hidden value="1">1</option>
            <?php for($i = 1; $i <= 10; $i++) { ?>
                <option value="<?php echo $i ?>"><?php echo $i ?></option>
            <?php } ?>

        </select><br><br>
        Max score: <select name="maxscore">
            <option selected hidden value="10">10</option>
            <?php for($i = 1; $i <= 10; $i++) { ?>
                <option value="<?php echo $i ?>"><?php echo $i ?></option>
            <?php } ?>
                
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

        $q = "q=$titulo";
        $limit = "limit=$limite";
        $min_score = "min_score=$minscore";
        $max_score = "max_score=$maxscore";

        $apiUrl = "https://api.jikan.moe/v4/anime?$q&$limit&$min_score&$max_score";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $apiUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        $array = json_decode($respuesta, true);  
        $animes = $array['data'];

        foreach($animes as $anime) { ?>
            <?php $imagen = $anime['images']['jpg']['image_url']; ?>

            <h1><?php echo $anime['title'] ?></h1>
            <p><a href="show_anime.php?id=<?php echo $anime['mal_id'] ?>">Ver detalles</a></p>
            <p><?php echo $anime['score'] ?></p>
            <img src="<?php echo $imagen ?>">
        <?php }
    }
    

    ?>
</body>
</html>