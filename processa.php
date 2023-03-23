<?php


    require_once "src/PHPMailer.php";
    require_once "src/SMTP.php";
    require_once "src/Exception.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    if(isset($_POST["name"]) && !empty($_POST["name"]) && isset($_POST["email"]) && !empty($_POST["email"]) && isset($_POST["phone"]) && !empty($_POST["phone"])){
        $name = $_POST["name"];
        $email = $_POST['email'];
        $phone = $_POST["phone"];
        $mensagem_felipe = "<html>felipe, o usuário ".$name.", acabou de receber a apostila do método avançado fridrich, com os seguintes dados:<br> Nome: ".$name." <br>Email: ".$email."<br>Telefone: ".$phone."<br></html>";

        $menssage = 'Aqui está seu pdf! Agradecemos por escolher o nosso site!';

        $mail = new PHPMailer(true);
        
        try {
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'email_remetente';
            $mail->Password = 'password_email_remetente';
            $mail->Port = 587;

            $mail->setFrom("email_remetente");
            $mail->addAddress($email);


            $mail->isHTML(true);
            $mail->Subject = utf8_decode("APOSTILA MÉTODO AVANÇADO FRIDRICH.");
            $mail->Body = $menssage;
            $mail->addAttachment(utf8_decode('pdf/APOSTILA-MÉTODO-AVANÇADO-FRIDRICH.pdf'));

            if ($mail->send()) {
                echo "email eviado com sucesso!!!";

            
            }else {
                echo "Erro ao enviar o email";
            }

        } catch (Exception $e) {
            echo "Erro ao enviar mensgem: {$mail->ErrorInfo}";
        }

    }

?>