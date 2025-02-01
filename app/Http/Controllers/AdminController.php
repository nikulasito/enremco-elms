<?php

// app/Http/Controllers/AdminController.php

namespace App\Http\Controllers;

use App\Http\Middleware\AdminMiddleware;
use Illuminate\Http\Request; 
use Carbon\Carbon;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

use App\Models\User; // Correctly import the User model

class AdminController extends Controller
{

        // Dashboard Method
        public function dashboard()
        {
            $newMembersCount = User::where('status', 'Awaiting Approval')->count();
            $totalMembers = User::count();
            $maleMembers = User::where('sex', 'Male')->count();
            $femaleMembers = User::where('sex', 'Female')->count();
            $activeMembers = User::where('status', 'Active')->count();
            $inactiveMembers = User::where('status', 'Inactive')->count();
        
            // Pass all the required data to the dashboard view
            return view('admin.dashboard', compact(
                'newMembersCount',
                'totalMembers',
                'maleMembers',
                'femaleMembers',
                'activeMembers',
                'inactiveMembers'
            ));
        
        
        
        }
        //end dashboard method



        public function index()
        {
            return view('admin.dashboard'); // Ensure the 'admin/dashboard.blade.php' file exists
        }

        // View Members Method
        public function viewMembers()
        {
            $members = User::where('is_admin', 0) // Only non-admin users
            ->whereIn('status', ['Inactive', 'Active']) // Include both Approved and Inactive members
            ->get();
            // $members = User::select('id', 'name', 'email', 'status', 'date_approved', 'date_inactive', 'date_reactive')->get();
            return view('admin.members', compact('members')); // Ensure 'admin/members.blade.php' exists

            $links = [
                ['url' => route('admin.dashboard'), 'label' => 'Dashboard'],
                ['url' => route('admin.members'), 'label' => 'Members'],
                ['url' => '', 'label' => 'View Members']
            ];
        
            return view('admin.members', compact('members', 'links'));


        }


        public function approveMember($id)
        {
            $member = User::findOrFail($id);


            // Update member status and date_approved
            $member->status = 'Active';
            $member->date_approved = Carbon::now(); // Set the current timestamp
            $member->email_verification_token = Str::random(64); // Generate a token
            $member->save();
        
            // Send email with verification link
            // $verificationUrl = route('email.verify', ['token' => $member->email_verification_token]);
        
            // Mail::send('emails.verify', ['url' => $verificationUrl], function ($message) use ($member) {
            //     $message->to($member->email)
            //         ->subject('Verify Your Account');
            // });
        
            return redirect()->route('admin.new-members')->with('success', 'Member approved and verification email sent.');
        }
    
        public function newMembers()
        {
            // Fetch members with status "Awaiting Approval"
            $newMembers = User::where('status', 'Awaiting Approval')->get();

            return view('admin.new-members', compact('newMembers'));
        }

        public function editMember($id)
        {
            $member = User::findOrFail($id);
            return view('admin.partials.edit-member', compact('member')); // Return the update form partial view
        }
        
        public function updateMember(Request $request, $id)
        {
            $request->validate([
                'shares' => 'required|numeric|min:0',
                'savings' => 'required|numeric|min:0',
                'membership_date' => 'required|date',
                'status' => 'required|in:Active,Inactive',
            ]);
        
            $member = User::findOrFail($id);
            
            $member->shares = $request->input('shares');
            $member->savings = $request->input('savings');
            $member->membership_date = $request->input('membership_date');
            $member->status = $request->input('status');
            $member->save();
        
            // return redirect()->route('admin.members')->with('success', 'Member contributions updated successfully.');
            return redirect()->route('admin.members')->with('success', 'Member contributions for ' . $member->name . ' updated successfully.');
        }

        public function deleteMember($id)
        {
            // Find the member by ID
            $member = User::findOrFail($id);
    
            // Optionally, delete the profile photo
            if ($member->photo && \Storage::exists('public/' . $member->photo)) {
                \Storage::delete('public/' . $member->photo);
            }
    
            // Delete the member
            $member->delete();
    
            // Redirect back with success message
            return redirect()->route('admin.members')->with('success', 'Member deleted successfully.');
        }

        public function inactivateMember($id)
        {
            // Find the member by ID
            $member = User::findOrFail($id);
        
            // Update the status to "Inactive"
            $member->status = 'Inactive';
            $member->date_inactive = now();
            $member->save();
        
            // Redirect back with a success message
            return redirect()->route('admin.members')->with('success', $member->name . ' has been marked as Inactive.');
        }
    
        public function markAsActive($id)
        {
            $member = User::findOrFail($id);
            $member->status = 'Active';
            $member->date_reactive = now(); // Assuming you want to set the date of reactivation
            $member->save();
        
            return redirect()->route('admin.members')->with('success', 'Member marked as active.');
        }

}
