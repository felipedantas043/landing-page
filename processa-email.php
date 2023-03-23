<?php
        require_once "src/PHPMailer.php";
        require_once "src/SMTP.php";
        require_once "src/Exception.php";

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;
        use PHPMailer\PHPMailer\SMTP;
    class processa{
        public function porcessaDados($name, $email){
            
            $menssage = 'Aqui está seu pdf! Agradecemos por escolher o nosso site!';
            
            $mail = new PHPMailer(true);
            
            try {
                $mail->SMTPDebug = false;
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'email_remetente';
                $mail->Password = 'password_email_remetente';
                $mail->Port = 587;
                
                $mail->setFrom("email_remetente");
                $mail->addAddress($email);
                
                
                $mail->isHTML(true);
                $mail->Subject = utf8_decode("Olá, ".$name.", aqui está seu pdf APOSTILA MÉTODO AVANÇADO FRIDRICH.");
                $mail->Body = $menssage;
                $mail->addAttachment(utf8_decode('pdf/APOSTILA-MÉTODO-AVANÇADO-FRIDRICH.pdf'));
                
                
                if ($mail->send()) {
                    #echo "email eviado com sucesso!!!";
                    return true;
                    
                }else {
                    #echo "Erro ao enviar o email";
                    return false;
                }
                
            } catch (Exception $e) {
                echo "Erro ao enviar mensgem: {$mail->ErrorInfo}";
            }
        }
        public function notificar_felipe($nome_cliente, $email_cliente, $telefone){
            $mensagem_felipe = "<html>felipe, o usuário ".$nome_cliente.", acabou de receber a apostila do método avançado fridrich, com os seguintes dados:<br> Nome: ".$nome_cliente." <br>Email: ".$email_cliente."<br>Telefone: ".$telefone."<br></html>";
            
            $mail = new PHPMailer(true);

            try {
                $mail->SMTPDebug = false;
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'email_remetente';
                $mail->Password = 'password_email_remetente';
                $mail->Port = 587;
                
                $mail->setFrom("email_remetente");
                $mail->addAddress("email_destinatário");
                
                
                $mail->isHTML(true);
                $mail->Subject = utf8_decode('NOVO EMAIL DE: como montar o cubo mágico');
                $mail->Body = $mensagem_felipe;
                
                if ($mail->send()) {
                    #echo "email eviado com sucesso!!!";
                    return true;
                    
                }else {
                    #echo "Erro ao enviar o email";
                    return false;
                }
                
            } catch (Exception $e) {
                echo "Erro ao enviar mensgem: {$mail->ErrorInfo}";
            }
        }
    }

?>