<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

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
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed|min:8',
            'position' => 'required|string|max:255',
            'office' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'religion' => 'required|string|max:255',
            'sex' => 'required|in:Male,Female,Other',
            'marital_status' => 'required|in:Single,Married,Divorced,Widowed',
            'annual_income' => 'required|numeric|min:0',
            'contact_no' => 'required|numeric|min:11',
            'beneficiaries' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'education' => 'required|string|max:255',
            'employee_ID' => 'required|string|max:255',
            'shares' => 'required|numeric|min:0',
            'savings' => 'required|numeric|min:0',
            'username' => 'required|string|max:255',
            'photo' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048', // Validate photo
        ]);

        // Handle the file upload
        $photoPath = null; // Default to null if no photo is uploaded
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public'); // Save in storage/app/public/photos
        }


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'position' => $request->position,
            'office' => $request->office,
            'address' => $request->address,
            'religion' => $request->religion,
            'sex' => $request->sex,
            'marital_status' => $request->marital_status,
            'annual_income' => $request->annual_income,
            'contact_no' => $request->contact_no,
            'beneficiaries' => $request->beneficiaries,
            'birthdate' => $request->birthdate,
            'education' => $request->education,
            'employee_ID' => $request->employee_ID,
            'shares' => $request->shares,
            'savings' => $request->savings,
            'username' => $request->username,
            'photo' => $photoPath,
        ]);

    // Create the Member
    $user->photo = $photoPath; // Save the photo path
    $user->save();

        event(new Registered($user));

        Auth::login($user);

        // return redirect()->route('dashboard');
        
        // Redirect to preview page with the user's details
        //return redirect()->route('user.preview', ['id' => $user->id]);
        //return redirect()->route('login')->with('info', 'Your registration is pending approval.');
        return redirect()->route('verification.notice');
    }

    public function preview($id): View
    {
        $user = User::findOrFail($id);

        return view('auth.preview', compact('user'));
    }
}
