<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Wallet;
use App\Models\CreditRequest;
use App\Models\Transaction;
use App\Models\ReferralBonus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CreditRequestController extends Controller
{
    /**
     * Get user's credit requests
     * GET /api/credit-requests
     */
    public function index(Request $request)
    {
            $user = $request->user();
            
            $creditRequests = CreditRequest::where('user_id', $user->id)
                ->orderBy('created_at', 'desc')
                ->get();
            $stats = CreditRequest::where('user_id', $user->id)
                    ->selectRaw('status, COUNT(*) as total_count, SUM(amount) as total_amount')
                    ->groupBy('status')
                    ->get()
                    ->keyBy('status');

            // Safe fallback values
            $pending   = $stats['pending']  ?? null;
            $approved  = $stats['approved'] ?? null;
            $rejected  = $stats['rejected'] ?? null;
            $totalRequests = CreditRequest::where('user_id', $user->id)->count();
            //return $pending;
            return view('profile.credit_request',compact('creditRequests','pending','approved','rejected','stats','totalRequests'));     
    }

    //users transaction list

     public function transactions(Request $request){
        $userId = Auth::user()->id;
        $wallet = Wallet::where('user_id', $userId)->first();
        $transactions = $query = Transaction::where('user_id', $userId)->orderBy('created_at', 'desc')->paginate(20);
        //return $wallet;
        return view('profile.transactions',compact('transactions','wallet'));
     }
}