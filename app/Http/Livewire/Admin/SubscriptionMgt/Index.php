<?php

namespace App\Http\Livewire\Admin\SubscriptionMgt;

use Livewire\Component;
use App\Models\Subscription;
use App\Models\User;
use Carbon\Carbon;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



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
        require base_path("vendor/autoload.php");

        $mail = new PHPMailer(true);
        try {
            //Server settings
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'smtp.office365.com';             //  smtp host
        $mail->SMTPAuth = true;
        $mail->Username = 'bright.tembo@auditconsult.mw';   //  sender username
        $mail->Password = 'Bmtechs_123';       // sender password
        $mail->SMTPSecure = 'tls';                  // encryption - ssl/tls
        $mail->Port = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        $mail->setFrom('bright.tembo@auditconsult.mw', 'NPL');
        // $mail->addAddress($receivers, 'Reciever');     //Add a recipient
        // $mail->addAddress($receivers);


         $mail->addAddress($userEmail, 'Reciever');
                                                                    //Name is optional
        $mail->addReplyTo('bright.tembo@auditconsult.mw', 'Information');



            
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'News Subscription Activation';
            $mail->Body    = "Hi '.$userName.',<br><br>  Your News subscription has been activated and please note the subscription will expire in '.$numberOfDays.' Days <br><br><br>Log in to National Publicate news portal <a href='http://127.0.0.1:8000/mysubscriptions'>here</a><br><br>Kind regards,<br>
            NPL";
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';


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
