<?php
    require_once "processa-email.php";
    if(isset($_POST["name"]) && !empty($_POST["name"]) && isset($_POST["email"]) && !empty($_POST["email"]) && isset($_POST["phone"]) && !empty($_POST["phone"])){
        $name = $_POST["name"];
        $email = $_POST['email'];
        $phone = $_POST["phone"];

        $m = new processa();

        

        if ($m->porcessaDados($name, $email) == true) {
            $m->notificar_felipe($name, $email, $phone);
        }else {
            echo "nao enviou o email para o felipe";
        }


    }


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Lobster&display=swap" rel="stylesheet">
    <title>Aprenda a montar o cubo mágico</title>
    <link rel="stylesheet" href="css/style-down.css">
</head>
<body>
    <header>
        <h1>Obrigado!</h1>
        <p>Agradecemos pelo seu interesse!</p>
    </header>
    <section>
        <h2> A sua apostila foi enviada no email informado!</h2>
        <a href="index.html" id="botao_baixar">Voltar</a>
    </section>
</body>
</html>