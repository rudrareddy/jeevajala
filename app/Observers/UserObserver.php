<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Str;
class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function creating(User $user): void
    {
         // Generate UUID if not set
        if (empty($user->uuid)) {
            $user->uuid = (string) Str::uuid();
        }

        // Generate Referral Code if not set
        if (empty($user->referral_code)) {
            $user->referral_code = $this->generateReferralCode();
        }

    }

    /**
     * Handle the User "created" event
     */
    public function created(User $user): void
    {
       
        if (empty($user->username)) {
             \Log::info('created fired', ['id' => $user->id]);
            // $user->id is available now
            $user->updateQuietly([
                'username' => $this->generateUsernameCode($user)
            ]);
        }
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        //
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }

    /**
     * Generate unique referral code
     */
    private function generateReferralCode(): string
    {
        do {
            $code = strtoupper(Str::random(8));
        } while (User::where('referral_code', $code)->exists());

        return $code;
    }

    /**
     *  Generate unique username code
     */
    public function generateUsernameCode($user): string
    {
        // Generate random 4 digit number
        $randomNumber = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);

        // Final format: JLV + user_id + 4 digit random
        return "JLV" . $user->id . $randomNumber;
       
    } 
}
