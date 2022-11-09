<?php

    use PHPMailer\PHPMailer\PHPMailer;


    Class Mailer {

        private $mail;

        public function __construct() {

            // Este if impide que se arroje la exception "Cannot declare class PHPMailer\PHPMailer\Exception"
            if (!class_exists('PHPMailer\PHPMailer\Exception')) {
                require 'third-party/phpmailer/Exception.php';
                require 'third-party/phpmailer/PHPMailer.php';
                require 'third-party/phpmailer/SMTP.php';
            }

            //Crear una instancia de PHPMailer
            $this->email = new PHPMailer(true);
            //Definir que vamos a usar SMTP
            $this->email->IsSMTP();
            //Esto es para activar el modo depuración. En entorno de pruebas lo mejor es 2, en producción siempre 0
            // 0 = off (producción)
            // 1 = client messages
            // 2 = client and server messages
            $this->email->SMTPDebug  = 0;
            //Ahora definimos gmail como servidor que aloja nuestro SMTP
            $this->email->Host       = 'smtp-relay.sendinblue.com';
            //El puerto será el 587 ya que usamos encriptación TLS
            $this->email->Port       = 587;
            //Definmos la seguridad como TLS
            $this->email->SMTPSecure = 'tls';
            //Tenemos que usar gmail autenticados, así que esto a TRUE
            $this->email->SMTPAuth   = true;
            //Definimos la cuenta que vamos a usar. Dirección completa de la misma
            $this->email->Username   = "alanforno@yahoo.com";
            $this->email->Password   = "K0Vs3nEvSMfhIb8a";
            //Definimos el remitente (dirección y, opcionalmente, nombre)
            $this->email->SetFrom('infonete@grupo3.com', 'Infonete');

            $this->email->isHTML(true);
        }

        public function enviarMail($destinatario, $asunto, $mensaje) {
            $this->email->AddAddress($destinatario);
            $this->email->Subject = $asunto;
            $this->email->Body = $mensaje;

            if (!$this->email->Send()) {
                echo "Error: " . $this->email->ErrorInfo();
            }
        }

    }


?>