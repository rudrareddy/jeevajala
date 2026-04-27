<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CreditRequest;
use App\Models\Transaction;
use App\Models\User;
class DashboardController extends Controller
{
     public function index(){ 

         $stats = [
                'pending_requests' => CreditRequest::where('status', 'pending')->count(),
                'pending_amount' => CreditRequest::where('status', 'pending')->sum('amount'),
                'approved_today' => CreditRequest::where('status', 'approved')
                    ->whereDate('processed_at', today())
                    ->count(),
                'approved_amount_today' => CreditRequest::where('status', 'approved')
                    ->whereDate('processed_at', today())
                    ->sum('amount'),
                'total_approved' => CreditRequest::where('status', 'approved')->count(),
                'total_rejected' => CreditRequest::where('status', 'rejected')->count(),
                'total_credited_amount' => Transaction::sum('amount')
            ];
           //return $stats; 
        return view('admin.dashboard',compact('stats'));
    }

    public function transactions(Request $request){
        $transactions = Transaction::with('user')->latest()->paginate(20);
        return view('admin.transactions',compact('transactions'));
    }

    public function customers(Request $request){
        $users = User::with('parent')
                ->when($request->search, function ($q, $search) {
                    $q->where(function ($query) use ($search) {
                        $query->where('username', 'like', "%{$search}%")
                              ->orWhere('email', 'like', "%{$search}%")
                              ->orWhere('name', 'like', "%{$search}%")
                              ->orWhere('phone', 'like', "%{$search}%");
                    });
                })
                ->latest()
                ->paginate(15)
                ->withQueryString();
        return view('admin.users',compact('users'));
    }

    public function customer_detail(Request $request,$user_id){
       $user = User::with(['documents','bankAccounts','address','wallet'])->withCount('children')->where('id',$user_id)->first();
       if($user){
           return view('admin.customer_detail',compact('user'));
       }else{
         return redirect('admin/customers')->with('error','Customer not found!');
       }
    }

    public function referralsList(Request $request,$user_id){
        
        $user = User::findOrFail($user_id);

        $childrens = $user->children()
            ->when($request->search, fn ($q, $s) =>
                $q->where('username', 'like', "%{$s}%")
            )
            ->latest()
            ->paginate(15)
            ->withQueryString();
            
        return view('admin.childrens',compact('user','childrens'));           
    }

    
}
