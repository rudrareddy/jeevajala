<?php

namespace App\Http\Controllers\Admin\CreditRequest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Wallet;
use App\Models\CreditRequest;
use App\Models\Transaction;
use App\Models\ReferralBonus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class CreditRequestController extends Controller
{
    public function pendingCreditRequests(Request $request){
        $creditRequests =CreditRequest::with('user')
                            ->where('status', 'pending')
                            ->when($request->search, function ($q, $search) {
                                $q->where(function ($query) use ($search) {
                                    $query->where('request_id', 'like', "%{$search}%")
                                          ->orWhereHas('user', function ($userQuery) use ($search) {
                                              $userQuery->where('username', 'like', "%{$search}%");
                                          });
                                });
                            })
                            ->latest()
                            ->paginate(20)
                            ->withQueryString();
        return view('admin.credit_requests.pending_requests',compact('creditRequests'));
        
    }

    public function approve(Request $request, $requestId)
    {
        DB::beginTransaction();

        try {
            $request->validate([
                'admin_notes' => 'nullable|string|max:500'
            ]);

            $adminId = Auth::user()->user_id;

            // Get credit request
            $creditRequest = CreditRequest::where('request_id', $requestId)
                ->where('status', 'pending')
                ->first();
                //return $creditRequest;

            if (!$creditRequest) {
                
                return redirect('admin/pending-credit-requests')->with('error','Credit request not found or already processed');
            }

            // Get user wallet
            $wallet = Wallet::where('user_id', $creditRequest->user_id)->first();

            if (!$wallet) {
                DB::rollBack();
                return redirect('admin/pending-credit-requests')->with('error','User wallet not found!');
            }
            
            $amount = $creditRequest->amount;
            $oldBalance = $wallet->balance;
            $newBalance = $oldBalance + $amount;
            // return $oldBalance;
            // Update wallet
            $wallet->update([
                'balance' => $newBalance,
                'total_credited' => $wallet->total_credited + $amount
            ]);

            // Generate unique transaction ID
            $transactionId = 'TXN' . date('Ymd') . strtoupper(Str::random(6));
            //return $transactionId;

            // Create transaction record
            Transaction::create([
                'transaction_id' => $transactionId,
                'user_id' => $creditRequest->user_id,
                'type' => 'credit',
                'category' => $creditRequest->request_type,
                'amount' => $amount,
                'balance_after' => $newBalance,
                'description' => $creditRequest->reason,
                'reference_id' => $requestId
            ]);

            // Update credit request
            $creditRequest->update([
                'status' => 'approved',
                'admin_id' => $adminId,
                'admin_notes' => $request->admin_notes ?? 'Approved',
                'processed_at' => now()
            ]);

            // If referral bonus, update referral_bonuses table
            if ($creditRequest->request_type === 'referral_bonus' && $creditRequest->request_id) {
                ReferralBonus::where('request_id', $creditRequest->request_id)
                    ->update([
                        'status' => 'credited',
                        'credited_at' => now()
                    ]);
            }

            DB::commit();

            
            return redirect('admin/pending-credit-requests')->with('success','Credit request approved and amount credited successfully');

        } catch (\Exception $e) {
            return redirect('admin/pending-credit-requests');
        }
    }


    public function reject(Request $request, $requestId)
    {
        try {
            $request->validate([
                'admin_notes' => 'required|string|max:500'
            ]);

            $adminId = Auth::user()->user_id;

            // Get credit request
            $creditRequest = CreditRequest::where('request_id', $requestId)
                ->where('status', 'pending')
                ->first();

            if (!$creditRequest) {
                return redirect('admin/pending-credit-requests')->with('error','Credit request not found or already processed');
            }

            // Update credit request
            $creditRequest->update([
                'status' => 'rejected',
                'admin_id' => $adminId,
                'admin_notes' => $request->admin_notes ?? 'Approved',
                'processed_at' => now()
            ]);

            return redirect('admin/pending-credit-requests')->with('success','Credit request rejected successfully');

        } catch (\Exception $e) {
            return redirect('admin/pending-credit-requests')->with('error','failed to reject the credit requests');
        }
    }

    //approved creditRequests
    public function approvedCreditRequests(Request $request){
        $creditRequests = $requests = CreditRequest::with('user')
                            ->where('status', 'approved')
                            ->when($request->search, function ($q, $search) {
                                $q->where(function ($query) use ($search) {
                                    $query->where('request_id', 'like', "%{$search}%")
                                          ->orWhereHas('user', function ($userQuery) use ($search) {
                                              $userQuery->where('username', 'like', "%{$search}%");
                                          });
                                });
                            })
                            ->latest()
                            ->paginate(20)
                            ->withQueryString();
        return view('admin.credit_requests.approved_requests',compact('creditRequests'));
        
    }
    //rejected creditRequests
    public function rejectedCreditRequests(Request $request){
        $creditRequests = $requests = CreditRequest::with('user')
                            ->where('status', 'rejected')
                            ->when($request->search, function ($q, $search) {
                                $q->where(function ($query) use ($search) {
                                    $query->where('request_id', 'like', "%{$search}%")
                                          ->orWhereHas('user', function ($userQuery) use ($search) {
                                              $userQuery->where('username', 'like', "%{$search}%");
                                          });
                                });
                            })
                            ->latest()
                            ->paginate(20)
                            ->withQueryString();
        return view('admin.credit_requests.rejected_requests',compact('creditRequests'));
        
    }

}
