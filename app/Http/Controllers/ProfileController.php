<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
class ProfileController extends Controller
{
    public function index()
    {
        return $request->user();
    }
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request)
    {
        $user = User::with(["address", "bankAccounts", "documents"])
            ->where("id", $request->user()->id)
            ->first();

        return view("profile.profile", compact("user"));
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        // Update user fields
        $user->fill($request->validated());

        if ($user->isDirty("email")) {
            $user->email_verified_at = null;
        }

        $user->save();

        if ($user->address) {
            $user->address->update([
                "address_line" => $request->address_line,
            ]);
        } else {
            $user->address()->create([
                "address_line" => $request->address_line,
            ]);
        }

        return redirect("profile")->with(
            "profile-status",
            "Your profile detail updated successfully!"
        );
    }

    public function bank_update(Request $request)
    {
        $user = $request->user();
        if ($user->bankAccounts) {
            $user->bankAccounts->update([
                "account_holder_name" => $request->account_holder_name,
                "bank_name" => $request->bank_name,
                "account_number" => $request->account_number,
                "ifsc_code" => $request->ifsc_code,
                "account_type" => $request->account_type,
                "branch_name" => $request->branch_name,
            ]);
        } else {
            $user->bankAccounts()->create([
                "account_holder_name" => $request->account_holder_name,
                "bank_name" => $request->bank_name,
                "account_number" => $request->account_number,
                "ifsc_code" => $request->ifsc_code,
                "account_type" => $request->account_type,
                "branch_name" => $request->branch_name,
            ]);
        }
        return redirect("profile")->with(
            "bank-status",
            "Your bank details updated successfully!"
        );
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag("userDeletion", [
            "password" => ["required", "current_password"],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to("/");
    }

    public function profile_documents(Request $request)
    {
        $validated = $request->validate([
            "aadhaar_front" => "nullable|image|mimes:jpeg,png,jpg|max:2048",
            "aadhaar_back" => "nullable|image|mimes:jpeg,png,jpg|max:2048",
            "pan_card" => "nullable|image|mimes:jpeg,png,jpg|max:2048",
        ]);

        $user = $request->user();

        $this->handleDocumentUpload($request, $user, "aadhaar_front");
        $this->handleDocumentUpload($request, $user, "aadhaar_back");
        $this->handleDocumentUpload($request, $user, "pan_card");

        return back()->with("success", "Documents uploaded");
    }

    protected function handleDocumentUpload($request, $user, $field)
    {
        if (!$request->hasFile($field)) {
            return;
        }

        $file = $request->file($field);

        $filename =
            \Str::slug(
                pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)
            ) .
            "_" .
            time() .
            "." .
            $file->extension();

        $path = "user_documents/" . $user->id;

        $file->storeAs($path, $filename, "public");

        // update or create by document_type
        $user->documents()->updateOrCreate(
            ["document_type" => $field],
            [
                "file_path" => $filename,
                "verification_status" => "pending",
            ]
        );
    }

    public function my_teams(Request $request)
    {
        $users = $request->user()->children()
                ->when($request->search, function ($q, $s) {
                    $q->where(function ($query) use ($s) {
                        $query
                            ->where("username", "like", "%{$s}%")
                            ->orWhere("name", "like", "%{$s}%");
                    });
                })->latest()->paginate(15)->withQueryString();
        return view("profile.my-teams", compact("users"));
    }
}
