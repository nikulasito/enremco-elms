<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{

    public function show()
    {
        $user = auth()->user();
        return view('profile.show', compact('user'));
    }
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = auth()->user(); // Get the authenticated user
        return view('profile.edit', compact('user'));
    }

    public function changepassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);
    
        $user = Auth::user();
    
        // Verify the current password
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'The provided password does not match your current password.']);
        }
    
        // Update the password
        $user->update([
            'password' => Hash::make($request->password),
        ]);
    
        return back()->with('status', 'password-updated');
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = auth()->user();

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . auth()->id(),
            'password' => 'nullable|string|confirmed|min:8',
            'position' => 'nullable|string|max:255',
            'office' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'religion' => 'nullable|string|max:255',
            'sex' => 'nullable|in:Male,Female,Other',
            'marital_status' => 'nullable|in:Single,Married,Divorced,Widowed',
            'annual_income' => 'nullable|numeric|min:0',
            'contact_no' => 'nullable|numeric|min:11',
            'beneficiaries' => 'nullable|string|max:255',
            'birthdate' => 'nullable|date',
            'education' => 'nullable|string|max:255',
            'employee_ID' => 'nullable|string|max:255',
            'shares' => 'nullable|numeric|min:0',
            'savings' => 'nullable|numeric|min:0',
            'username' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048', // Validate photo
            // Add validation rules for other fields
        ]);

    // Handle the file upload
    if ($request->hasFile('photo')) {
        // Delete the old photo if it exists
        if ($user->photo && \Storage::exists($user->photo)) {
            \Storage::delete($user->photo);
        }

        // Store the new photo
        $photoPath = $request->file('photo')->store('photos', 'public');
        $user->photo = $photoPath;
    }
    
       // Update user fields
        $user->update($validatedData);
    
        return redirect()->route('profile')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $user = Auth::user();

        // Optionally validate the request (e.g., confirm password)
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        // Delete the authenticated user
        $user->delete();

        // Log the user out
        Auth::logout();

        // Redirect to the homepage or login page
        return redirect('/')->with('success', 'Your account has been deleted.');
    }
}
