<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Stripe\Stripe;
use Stripe\Charge;
use App\Models\Balance;
use App\Models\Transaction;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function payPage($id, Request $request)
    {
        $method = $request->isMethod('post');
        $user = User::find($id);
        switch($method){
            case true:
                //Amount
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
                    return redirect()->route('pay_page')->with('error', $e->getMessage());
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

                // Stripe charge was successfull, continue by redirecting to a page with a thank you message
                return redirect()->route('pay_success');
            default:
                return view('payments.pay_page', compact('user'));
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
