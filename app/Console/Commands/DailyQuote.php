<?php
namespace App\Console\Commands;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Models\User;
use App\Models\Subscription;
use Illuminate\Support\Carbon;
use Stripe\Stripe;
class DailyQuote extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'quote:daily';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Respectively send an exclusive quote to everyone daily via email.';
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $subscriptions = Subscription::where('status', 'active')->get();

	    foreach($subscriptions as $subscription) {
		$user = User::find($subscription->user_id);
		$now = Carbon::now();
        $rec_amount = $subscription->recurring_amount;
            // dd($now->greaterThan($subscription->ends_at));
		if($now->greaterThan($subscription->ends_at)) {
		\Stripe\Stripe::setApiKey(config('services.stripe.secret'));

            	$customer = \Stripe\Customer::retrieve($subscription->stripe_id);
                // dd($customer);

            	$data = \Stripe\Charge::create ([
                "amount" => $rec_amount,
                "currency" => "usd",
                "customer" => $customer->id,
                "description" => "Payment from Soccer",
            ]);

            $subscription->paid_amount += $rec_amount;
            if($subscription->stripe_plan == 1) {
                $subscription->ends_at = Carbon::now()->addMonth();
            } elseif($subscription->stripe_plan == 3) {
                $subscription->ends_at = Carbon::now()->addMonths(3);
            } elseif($subscription->stripe_plan == 6) {
                $subscription->ends_at = Carbon::now()->addMonths(6);
            } else {
                $subscription->ends_at = Carbon::now()->addYear();
            }

            if($subscription->one_payment_of == $subscription->paid_amount) {
                $subscription->recurring_amount = 0;
                $subscription->status = 'payment_done';
            }

            $subscription->save();

		    Mail::raw("Your subscription has been renewed. Your new payment of $data->amount has been made.", function ($mail) use ($user) {
		        $mail->from('digamber@positronx.com');
		        $mail->to($user->email)
		            ->subject('Subscription Renewed!');
		    });


		  }
       }
   }

}
