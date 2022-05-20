<?php
    $text = "It's what non-car people don't get. they see all cars as just ton-and-a-half, two-tons of wires, glass, metal and rubber. That’s all they see. People like you or I know, we have an unshakable belief that cars are living entities. You can develop a relationship with a car. And that’s just what non-car people don’t get… when something has foibles and won’t handle properly, that gives it a particularly human quality because it makes mistakes, and that’s how you can build a relationship with a car that other people won’t get.";
    if(isset($_GET['censura'])) {
        $badword = $_GET['censura'];
        $censored_num = substr_count(strtolower($text), $badword); //conto quante volte la parola da censurare è presente nel testo, convertendolo prima in minuscolo
        if($censored_num == 0) { //controllo che la parola da censurare sia nel testo
            $censored_text = 'La parola inserita non è presente nel testo';
        } else {
            $len = strlen($badword); //salvo la lunghezza della parola e inserisco tanti asterischi quante sono le lettere
            $censura = '';
            for($i = 0; $i < $len; $i++) {
                $censura .= '*';
            }
            $censored_text = str_ireplace($badword, $censura, $text); //utilizzo str_ireplace() perchè non è case sensitive
        }        
    } else {
        $censored_text = 'Inserisci una parola da censurare tramite il paramentro "censura"';
        $censored_num = 0;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Badword</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>PHP Badwords</h1>
    <h3>Paragrafo:</h3>
    <p><?php echo $text ?></p>
    <h4>Il paragrafo è lungo <?php echo strlen($text) ?> caratteri (<?php echo str_word_count($text).' parole' ?>)</h4>
    <hr>
    <h3>Paragrafo censurato:</h3>
    <p><?php echo $censored_text ?></p>
    <!-- In questa versione dell'esercizio la lunghezza del paragrafo non cambia, dal momento che inserisco tanti asterischi quanti sono i caratteri della parola da censurare -->
    <?php
        if($censored_num != 0) {
            echo '<h4>Ho censurato '.$censored_num,' parole</h4>';
            echo '<h4>Il paragrafo è lungo '.strlen($censored_text).' caratteri ('.str_word_count($censored_text).' parole)</h4>';
        }
    ?>
</body>
</html>