<section class="profile-cont">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('PUT') <!-- Change to match your route definition -->

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Profile Picture -->
        <div>
            <x-input-label for="photo" :value="__('Profile Picture')" />
            <div class="mt-2 flex items-center">
                @if ($user->photo)
                    <img src="{{ asset('storage/' . $user->photo) }}" alt="Profile Photo" class="w-16 h-16 rounded-full object-cover">
                @else
                    <span class="w-16 h-16 rounded-full bg-gray-300 flex items-center justify-center text-gray-500">
                        <i class="fas fa-user"></i>
                    </span>
                @endif
                <input id="photo" name="photo" type="file" accept="image/png, image/gif, image/jpeg" class="form-control mt-1 ms-4" />
            </div>
            <x-input-error class="mt-2" :messages="$errors->get('photo')" />
        </div>

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- Address -->
        <div>
            <x-input-label for="position" :value="__('Position')" />
            <x-text-input id="position" class="form-control" type="text" name="position" :value="old('position', $user->position)" autofocus autocomplete="position" />
            <x-input-error :messages="$errors->get('position')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="office" :value="__('Office')" />
            <x-text-input id="office" class="form-control" type="text" name="office" :value="old('office', $user->office)" autocomplete="office" />
            <x-input-error :messages="$errors->get('office')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="address" :value="__('Address')" />
            <x-text-input id="address" class="form-control" type="text" name="address" :value="old('address', $user->address)" autocomplete="address" />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="religion" :value="__('Religion')" />
            <x-text-input id="religion" class="form-control" type="text" name="religion" :value="old('religion', $user->religion)" autocomplete="religion" />
            <x-input-error :messages="$errors->get('religion')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="sex" :value="__('Sex')" />
            <select id="sex" name="sex" class="form-control">
                <option value="" disabled selected>Select Sex</option>
                <option value="Male" {{ old('sex') == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ old('sex') == 'Female' ? 'selected' : '' }}>Female</option>
                <option value="Other" {{ old('sex') == 'Other' ? 'selected' : '' }}>Other</option>
            </select>
            <x-input-error :messages="$errors->get('sex')" class="mt-2" />

        </div>

        <div>
            <x-input-label for="marital_status" :value="__('Marital Status')" />
            <select id="marital_status" name="marital_status" class="form-control">
                <option value="" disabled selected>Select Marital Status</option>
                <option value="Single" {{ old('marital_status') == 'Single' ? 'selected' : '' }}>Single</option>
                <option value="Married" {{ old('marital_status') == 'Married' ? 'selected' : '' }}>Married</option>
                <option value="Divorced" {{ old('marital_status') == 'Divorced' ? 'selected' : '' }}>Divorced</option>
                <option value="Widowed" {{ old('marital_status') == 'Widowed' ? 'selected' : '' }}>Widowed</option>
            </select>
            <x-input-error :messages="$errors->get('marital_status')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="annual_income" :value="__('Annual Income')" />
            <x-text-input id="annual_income" class="form-control" type="text" name="annual_income" :value="old('annual_income', $user->annual_income)" autocomplete="annual_income" />
            <x-input-error :messages="$errors->get('annual_income')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="beneficiaries" :value="__('Beneficiary/ies')" />
            <x-text-input id="beneficiaries" class="form-control" type="text" name="beneficiaries" :value="old('beneficiaries', $user->beneficiaries)" autocomplete="beneficiaries" />
            <x-input-error :messages="$errors->get('beneficiaries')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="birthdate" :value="__('Birthdate')" />
            <x-text-input id="birthdate" class="form-control" type="date" name="birthdate" :value="old('birthdate', $user->birthdate)" autocomplete="birthdate" />
            <x-input-error :messages="$errors->get('birthdate')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="education" :value="__('Educational Attainment')" />
            <x-text-input id="education" class="form-control" type="text" name="education" :value="old('education', $user->education)" autocomplete="education" />
            <x-input-error :messages="$errors->get('education')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="employee_ID" :value="__('Employee ID')" />
            <x-text-input id="employee_ID" class="form-control" type="text" name="employee_ID" :value="old('employee_ID', $user->employee_ID)" autocomplete="employee_ID" />
            <x-input-error :messages="$errors->get('employee_ID')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="contact_no" :value="__('Contact No.')" />
            <x-text-input id="contact_no" class="form-control" type="text" name="contact_no" :value="old('contact_no', $user->contact_no)" autocomplete="contact_no" />
            <x-input-error :messages="$errors->get('contact_no')" class="mt-2" />
        </div>

        <!-- Save Button -->
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
