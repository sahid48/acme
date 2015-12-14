<?php
namespace Acme\email;

/**
 *
 */
class SendEmail
{

  public static function sendEmail($to, $subject, $message, $from = "")
  {
      if (strlen($from) == 0)
      {
          $from = getenv('SMTP_FROM');
      }

              //use some kind of transport
              $transport = \Swift_SmtpTransport::newInstance(getenv('SMTP_HOST'), getenv('SMTP_PORT'))
                ->setUsername(getenv('SMTP_USER'))
                ->setPassword(getenv('SMTP_PASS'));

              $mailer = \Swift_Mailer::newInstance($transport);

              // Create the message
              $message = \Swift_Message::newInstance()

              // Give the message a subject
              ->setSubject($subject)

              // Set the From address with an associative array
              ->setFrom($from)

              // Set the To addresses with an associative array
              ->setTo($to)

              // Give it a body
              ->setBody($message, 'text/html');

              $result = $mailer->send($message);
  }
}

 ?>
