<?php 
namespace App\Controllers;

use App\Core\App;

// require_once('../../src/PHPMailer');
// require_once('../../src/SMTP');
// require_once('../../src/Exception');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class enviaEmailController
{
    public function enviaEmail(){

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $assunto = $_POST['assunto'];
        $mensagem = $_POST['mensagem'];
        $data_envio = date('d/m/Y');
        $hora_envio = date('H:i:s');
      
        $arquivo = "
        <html>
        <p><b>Nome: </b>$nome</p>
        <p><b>E-mail: </b>$email</p>
        <p><b>Mensagem: </b>$mensagem</p>
        <p>Este e-mail foi enviado em <b>$data_envio</b> às <b>$hora_envio</b></p>
        </html>
            ";
        $mail = new PHPMailer(true);

        try{
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';
            $mail->Username = 'adoralerjf@gmail.com';
            $mail->Password = 'AdoraLer1234';
            $mail->Port = 587;

            $mail->setFrom('adoralerjf@gmail.com', $nome);
            $mail->addAddress('adoralerjf@gmail.com', 'AdoraLer');

            $mail->isHTML(true);
            $mail->Subject = $assunto;
            $mail->Body    = $arquivo;
            $mail->AltBody = strip_tags($arquivo);
            
            $mail->send();
            return redirect('contato');

        }catch (Exception)
        {
            echo "Mensagem não enviada. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
?>