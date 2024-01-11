<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class SendActivationEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $userEmail;
    protected $userName;
    protected $numberOfDays;

    public function __construct($userEmail, $userName, $numberOfDays)
    {
        $this->userEmail = $userEmail;
        $this->userName = $userName;
        $this->numberOfDays = $numberOfDays;
    }

    public function handle()
    {
        try {
            // Create a new instance of PHPMailer
            $mail = new PHPMailer(true);

            // Server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.office365.com';  // Replace with your SMTP host
            $mail->SMTPAuth = true;
            $mail->Username = 'bright.tembo@auditconsult.mw'; // Replace with your SMTP username
            $mail->Password = 'Bmtechs_123';  // Replace with your SMTP password
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Recipients
            $mail->setFrom('bright.tembo@auditconsult.mw', 'NPL'); // Replace with your email and name
            $mail->addAddress($this->userEmail, $this->userName);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Activation Email';
            $mail->Body = "Hi {$this->userName},<br><br>Your account has been activated. Your subscription will expire in {$this->numberOfDays} days.<br><br>Kind regards,<br>Your App";

            // Send email
            $mail->send();

            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
