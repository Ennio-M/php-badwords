<?php
    $text = "It's what non-car people don't get. they see all cars as just ton-and-a-half, two-tons of wires, glass, metal and rubber. That’s all they see. People like you or I know, we have an unshakable belief that cars are living entities. You can develop a relationship with a car. And that’s just what non-car people don’t get… when something has foibles and won’t handle properly, that gives it a particularly human quality because it makes mistakes, and that’s how you can build a relationship with a car that other people won’t get.";
    if(isset($_GET['censura'])) {
        $badword = $_GET['censura'];
        $censored_text = str_replace($badword, '***', $text);
    } else {
        $censored_text = 'Inserisci una parola da censurare tramite il paramentro "censura"';
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
    <h4>Il paragrafo è lungo <?php echo strlen($text) ?> caratteri </h4>
    <hr>
    <h3>Paragrafo censurato:</h3>
    <p><?php echo $censored_text ?></p>
    <?php
        if(isset($_GET['censura'])) {
            echo '<h4>Il paragrafo è lungo '.strlen($censored_text).' caratteri </h4>';
        }
    ?>
</body>
</html>