<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Models\Withdrawals;
use Illuminate\Http\Request;

class WithdrawalsController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function withdrawal(Request $request)
    {
        $method = $request->isMethod('post');
        $completed = Withdrawals::where('user_id', Auth::user()->id)
                                ->where('processed', 1)
                                ->paginate(10);
        $uncompleted = Withdrawals::where('user_id', Auth::user()->id)
                                    ->where('processed', 0)
                                    ->paginate(10);

        switch($method) {
            case true:
                $request->validate([
                    'amount'    => 'required',
                ]);
                Withdrawals::ceate([
                    'user_id'   => Auth::user()->id,
                    'amount'    => $request->amount,
                ]);

                return redirect()->back();
            default:
                return view('withdrawals.withdraw', compact('completed', 'uncompleted'));
        }
    }

    public function adminWithdrawals()
    {
        if (Auth::user()->admin == 0) {
            return redirect()->back();
        }

        $completed = Withdrawals::where('processed', 1)
                                ->paginate(10);

        $uncompleted = Withdrawals::where('processed', 0)
                                    ->paginate(10);

        return view('withdrawals.admin', compact('completed', 'uncompleted'));
    }

    public function complete($id)
    {
        if (Auth::user()->admin == 0)
        {
            return redirect()->back();
        }

        $withdraw = withdrawals::find($id);

        $withdraw->processed = 1;
        $withdraw->save();

        return redirect()->back();
    }
}
