<?php

namespace App\Http\Livewire\Admin\SubscriptionMgt;

use Livewire\Component;
use App\Models\Subscription;
use App\Models\User;
use Carbon\Carbon;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Console\Command;
use App\Jobs\SendActivationEmail;
use Illuminate\Support\Facades\Response; 



use Illuminate\Support\Facades\DB;


class Index extends Component
{


    public function activateSubscription($id)
    {
        // Retrieve the subscription duration
        $duration = Subscription::where('id', $id)->first()->duration;

        $userId= Subscription::where('id',$id)->first()->user_id;
        $userEmail=User::where('id',$userId)->first()->email;
        $userName=User::where('id',$userId)->first()->name;
       

        


        // Update all subscriptions with the given ID
        Subscription::where('id', $id)->update([
            'status' => 'active',
            'start_date' => now(),
            'end_date' => now()->addMonths($duration),
        ]);
         
        //get subscription start date and end date
        $startDate=Subscription::where('id',$id)->first()->start_date;
        $endDate=Subscription::where('id',$id)->first()->end_date;
        $numberOfDays = $endDate->diffInDays($startDate);

        //send an email
        try {
            // Create a new instance of PHPMailer
            $mail = new PHPMailer(true);

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
            $mail->addAddress($userEmail, $userName);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Activation Email';
            $mail->Body = "Hi {$userName},<br><br>Your account has been activated. Your subscription will expire in {$numberOfDays} days.<br><br>Kind regards,<br>Your App";

            // Send email
            $mail->send();

            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        

                
        return redirect(route('all-subscriptions'))->with('status', 'Subscription activated.');
        
        
    }


    public function render()
    {

        $userSubscriptions = Subscription::all();


    // Process the data
    $subscriptionData = [];
    foreach ($userSubscriptions as $subscription) {
        // Get publication subscription data
        $publicationSubscriptionData = DB::table('publication_subscription')
            ->select(
                DB::raw('SUM(copies) as total_copies'),
                DB::raw('SUM(total_price) as total_price')
            )
            ->where('subscription_id', $subscription->id)
            ->first();

        // Calculate remaining days
        $remainingDays = now()->diffInDays($subscription->end_date);

        $subscriptionData[] = [
            'subscription_id' => $subscription->id,
            'user_id' => $subscription->user_id,
            'location' => $subscription->location,
            'region' => $subscription->region,
            'status' => $subscription->status,
            'total_copies' => $publicationSubscriptionData->total_copies,
            'total_price' => $publicationSubscriptionData->total_price,
            'remaining_days' => $remainingDays,
        ];
    }




        return view('livewire.admin.subscription-mgt.index',[
            'subscriptionData' => $subscriptionData,
        ]);
    }
}
