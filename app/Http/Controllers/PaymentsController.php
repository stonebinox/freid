<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Stripe\Stripe;
use Stripe\Charge;
use App\Models\Balance;
use App\Models\Transaction;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Mail\PaymentEmail;

class PaymentsController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function payPage($id, $c_id, Request $request)
    {
        $method = $request->isMethod('post');
        $user = User::find($id);
        switch($method)
        {
            case true:
                $amount = $request->amount * 100;
                
                Stripe::setApiKey(env('STRIPE_SECRET'));
                try {
                    Charge::create(array(
                        "amount"        => $amount,
                        "currency"      => "usd",
                        "source"        => $request->stripeToken,
                        "description"   => "Payment for {{ $user->name }}",
                    ));
                }   catch (\Exception $e) {
                    return redirect()->route('pay_page', ['id' => $user->id, 'c_id' => $c_id])->with('error', $e->getMessage());
                }

                Transaction::create([
                    'user_id'       => Auth::user()->id,
                    'expert_id'     => $user->id,
                    'amount'        => $request->amount,
                    'trf_id'        => uniqid(),
                ]);
                
                $balance = Balance::where('user_id', $id)->first();
                $balance->balance += $request->amount;
                $balance->save();

                $notification = Notification::create([
                    'sender_id'             => Auth::user()->id,
                    'receiver_id'           => $user->id,
                    'amount'                => $request->amount,
                    'conversation_id'       => $c_id,
                    'read'                  => 0,
                ]);

                
                $data = ['notification' => $notification];
                \Mail::to($notification->receiver->email)->send(new NewMessageEmail($data));

                // Stripe charge was successfull, continue by redirecting to a page with a thank you message
                return redirect()->route('create_review', ['id' => $user->id]);
            default:
                return view('payments.pay_page', compact('user', 'c_id'));
        }        
    }

    public function paySuccess()
    {
        return view('payments.pay_success');
    }

    public function paymentHistory()
    {
        $payout = Transaction::where('user_id', Auth::user()->id)
                            ->leftJoin('users', 'transactions.expert_id', '=', 'users.id')
                            ->paginate(10);
        $payin = Transaction::where('expert_id', Auth::user()->id)
                            ->leftJoin('users', 'transactions.user_id', '=', 'users.id')
                            ->paginate(10);
        return view('payments.history', compact('payout', 'payin'));
    }
}
