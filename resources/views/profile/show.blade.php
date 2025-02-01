<!-- resources/views/profile/show.blade.php -->

<x-app-layout>

<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Member Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white">

            <div class="profile-container">
                <div class="row">
                    <div class="profile-left col-md-auto">
                        <div class="profile-photo">
                        <img src="{{ asset('storage/' . $user->photo) }}" alt="User Photo">
                        </div>
                        <!-- Edit Button -->
                        <div class="flex items-center gap-4 profile-button">
                            <a href="{{ route('profile.edit') }}" class="inline-flex items-center px-4 py-2 
                            bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white 
                            uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none 
                            focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Edit Profile
                            </a>
                        </div>
                            <!-- Edit Button -->
                            <!-- <div class="flex items-center gap-4">
                            <a href="{{ route('profile.update') }}" class="inline-flex items-center px-4 py-2 
                            bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white 
                            uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none 
                            focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Change Password
                            </a>
                        </div> -->
                    </div>
                <div class="profile-right col-5">
                    <div class="personal-data">
                        <h4>Personal Data</h4>
                        <ul>
                            <li><strong>Name:</strong> {{ $user->name }}</li>
                            <li><strong>Email:</strong> {{ $user->email }}</li>
                            <li><strong>Position:</strong> {{ $user->position }}</li>
                            <li><strong>Address:</strong> {{ $user->address }}</li>
                            <li><strong>Sex:</strong> {{ $user->sex }}</li>
                            <li><strong>Religion:</strong> {{ $user->religion }}</li>
                            <li><strong>Marital Status:</strong> {{ $user->marital_status }}</li>
                            <li><strong>Office:</strong> {{ $user->office }}</li>
                            <li><strong>Contact No.:</strong> {{ $user->contact_no }}</li>
                            <li><strong>Annual Income:</strong> {{ $user->annual_income }}</li>
                            <li><strong>Beneficiary/ies:</strong> {{ $user->beneficiaries }}</li>
                            <li><strong>Birthdate:</strong> {{ $user->birthdate }}</li>
                            <li><strong>Educational Attainment:</strong> {{ $user->education }}</li>
                            <li><strong>Empoyee ID:</strong> {{ $user->employee_ID }}</li>
                            <li><strong>Membership Date:</strong> {{ $user->membership_date }}</li>
                            <li><strong>Username:</strong> {{ $user->username }}</li>
                            <li><strong>Status:</strong>
                            <span class="font-semibold {{ auth()->user()->status === 'Active' ? 'text-green-500' : 'text-red-500' }}">
                                {{ auth()->user()->status }}
                            </span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="contribution-details col">
                    <h4>Contribution Details</h4>
                        <ul>
                            <li><strong>Shares:</strong> {{ $user->shares }}</li>
                            <li><strong>Savings:</strong> {{ $user->savings }}</li>
                        </ul>
                </div>
            </div>
            </div>
            </div>
        </div>
    </div>
</x-app-layout>
