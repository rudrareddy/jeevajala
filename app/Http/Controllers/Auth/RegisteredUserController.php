<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\RoleUser;
use App\Models\Wallet;
use App\Models\CreditRequest;
use App\Models\ReferralBonus;
use App\Models\Commission;
use Illuminate\Support\Str;
class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'phone'=>['required','phone:IN'],
            'username' => ['nullable', 'exists:users,username'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $username = null;
        $referrerId = null;
        if ($request->filled('username')) {
            $username = User::where('username', $request->username)->first();
            if ($username) {
                $referrerId = $username->id;
            }
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone'=>$request->phone,
            'parent_id' => $username ? $username->id : null,
        ]);

        // Create wallet for user
            Wallet::create([
                'user_id' => $user->id,
                'balance' => 0.00,
                'total_credited' => 0.00
            ]);

        // 2. Attach the Role (Laratrust magic)
        RoleUser::create(['user_id'=>$user->id,'role_id'=>2]); // You can use the ID or the name 'customer'

        event(new Registered($user));

        // If user was referred, create referral bonus
            if ($referrerId) {
                $referralBonusAmount = Commission::where('category','referral_bonus')->first();
                
                 // Create credit request for referrer
                $referralRequestId = 'CR' . date('Ymd') . strtoupper(Str::random(6));
                // Create referral bonus record
                $referralBonus = ReferralBonus::create([
                    'referrer_id' => $referrerId,
                    'referred_id' => $user->id,
                    'bonus_amount' => $referralBonusAmount->amount,
                    'status' => 'pending',
                    'request_id'=>$referralRequestId,
                ]);

                CreditRequest::create([
                    'request_id' => $referralRequestId,
                    'user_id' => $referrerId,
                    'request_type' => 'referral_bonus',
                    'amount' => $referralBonusAmount->amount,
                    'reason' => 'Referral bonus for ' . $user->username . ', ' . $user->name,
                    'reference_id' => $referralBonus->id,
                    'status' => 'pending'
                ]);
            }
        // 4. Redirect to Welcome with the user data (NO Auth::login here)
        return redirect()->route('welcome.success')->with('new_user', $user);

       // Auth::login($user);

        //return redirect(RouteServiceProvider::HOME);
    }
}
