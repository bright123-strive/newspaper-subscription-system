<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class CheckSubscriptions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
      */
    // protected $signature = 'app:check-subscriptions';

    // /**
    //  * The console command description.
    //  *
    //  * @var string
    //  */
    // protected $description = 'Command description';

    // /**
    //  * Execute the console command.
    //  */
    // public function handle(): void
    // {
    //     //
    // }

    protected $signature = 'subscriptions:check';
    protected $description = 'Check and update subscription statuses';

    // public function handle()
    // {
    //     $this->info('Checking subscription statuses...');

    //     // Retrieve all userss
    //     $users = User::all();

    //     foreach ($users as $user) {
    //         // Retrieve the user's active subscriptions
    //         $subscriptions = $user->subscriptions()->where('end_date', '>', now())->get();

    //         foreach ($subscriptions as $subscription) {
    //             // Check if the subscription has already expired
    //             if (now() > $subscription->end_date) {
    //                 $subscription->update(['status' => 'expired']);
    //                 $status = 'Subscription has expired.';
    //             } else {
    //                 // Calculate the number of days remaining until expiration
    //                 // $daysRemaining = $subscription->end_date->diffInDays(now());
    //                 $daysRemaining = 4;
                    
    //                 // Check if the subscription is expiring in the next 5 days
    //                 if ($daysRemaining <= 5) {
    //                     $status = 'Subscription is expiring in ' . $daysRemaining . ' days.';
    //                 } else {
    //                     $status = 'Subscription is active. ' . $daysRemaining . ' days remaining.';
    //                 }
    //             }

    //             // Log or display the status as needed
    //             $this->info("User ID: {$user->id}, Subscription ID: {$subscription->id} - Status: {$status}");
    //         }
    //     }

    //     $this->info('Subscription check completed.');
    // }

    public function handle()
    {
        $this->info('Checking subscription statuses...');

        // Retrieve all users
        $users = User::all();

        foreach ($users as $user) {
            // Retrieve the user's active subscriptions
            $subscriptions = $user->subscriptions()->where('end_date', '>', now())->get();

            foreach ($subscriptions as $subscription) {
                // Check if the subscription has already expired
                if (now() > $subscription->end_date) {
                    $subscription->update(['status' => 'expired']);
                    $status = 'Subscription has expired.';
                    $this->sendExpirationEmail($user->email);
                } else {
                    // Calculate the number of days remaining until expiration
                    // $daysRemaining = $subscription->end_date->diffInDays(now());
                    $daysRemaining = 3;

                    // Check if the subscription is expiring in the next 5 days
                    if ($daysRemaining <= 5) {
                        $status = 'Subscription is expiring in ' . $daysRemaining . ' days.';
                        $this->sendExpiringEmail($user->email);
                    } else {
                        $status = 'Subscription is active. ' . $daysRemaining . ' days remaining.';
                    }
                }

                // Log or display the status as needed
                $this->info("User ID: {$user->id}, Subscription ID: {$subscription->id} - Status: {$status}");
            }
        }

        $this->info('Subscription check completed.');
    }

    protected function sendExpirationEmail($email)
    {
        $this->sendEmail($email, 'Subscription Expired', 'Your subscription has expired.');
    }

    protected function sendExpiringEmail($email)
    {
        $this->sendEmail($email, 'Subscription Expiring', 'Your subscription is expiring in the next 5 days.');
    }

    protected function sendEmail($recipient, $subject, $body)
    {
        require base_path("vendor/autoload.php");

        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.office365.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'bright.tembo@auditconsult.mw';
            $mail->Password = 'Bmtechs_123';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('bright.tembo@auditconsult.mw', 'NPL');
            $mail->addAddress($recipient);
            $mail->addReplyTo('bright.tembo@auditconsult.mw', 'Information');

            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $body;

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
