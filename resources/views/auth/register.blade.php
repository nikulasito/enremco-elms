<x-register-layout>

            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf
              <div class="form-row row gy-3 overflow-hidden">

                <div class="form-group col-md-6">
                  <div class="form-floating mb-3">
                    <x-text-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    <x-input-label for="name" :value="__('Name')" />
                  </div>
                </div>

                <div class="form-group col-md-6">
                  <div class="form-floating mb-3">
                    <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    <x-input-label for="email" :value="__('Email')" />
                  </div>
                </div>

                <div class="form-group col-md-6">
                    <div class="form-floating mb-3">
                         <x-text-input id="position" class="form-control" type="text" name="position" :value="old('position')" required autofocus autocomplete="position" />
                         <x-input-error :messages="$errors->get('position')" class="mt-2" />
                         <x-input-label for="position" :value="__('Position')" />
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <div class="form-floating mb-3">
                        <x-text-input id="office" class="form-control" type="text" name="office" :value="old('office')" required autocomplete="office" />
                        <x-input-error :messages="$errors->get('office')" class="mt-2" />
                        <x-input-label for="office" :value="__('Office')" />
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <div class="form-floating mb-3">
                        <x-text-input id="address" class="form-control" type="text" name="address" :value="old('address')" required autocomplete="address" />
                        <x-input-error :messages="$errors->get('address')" class="mt-2" />
                        <x-input-label for="address" :value="__('Address')" />
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <div class="form-floating mb-3">
                        <x-text-input id="religion" class="form-control" type="text" name="religion" :value="old('religion')" required autocomplete="religion" />
                        <x-input-error :messages="$errors->get('religion')" class="mt-2" />
                        <x-input-label for="religion" :value="__('Religion')" />
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <div class="form-floating mb-3">
                        <select id="sex" name="sex" class="form-control" required>
                        <option value="" disabled selected>Select Sex</option>
                            <option value="Male" {{ old('sex') == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ old('sex') == 'Female' ? 'selected' : '' }}>Female</option>
                            <option value="Other" {{ old('sex') == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                        <x-input-error :messages="$errors->get('sex')" class="mt-2" />
                        <x-input-label for="sex" :value="__('Sex')" />
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <div class="form-floating mb-3">
                    <select id="marital_status" name="marital_status" class="form-control" required>
                        <option value="" disabled selected>Select Marital Status</option>
                        <option value="Single" {{ old('marital_status') == 'Single' ? 'selected' : '' }}>Single</option>
                        <option value="Married" {{ old('marital_status') == 'Married' ? 'selected' : '' }}>Married</option>
                        <option value="Divorced" {{ old('marital_status') == 'Divorced' ? 'selected' : '' }}>Divorced</option>
                        <option value="Widowed" {{ old('marital_status') == 'Widowed' ? 'selected' : '' }}>Widowed</option>
                    </select>
                    <x-input-error :messages="$errors->get('marital_status')" class="mt-2" />
                    <x-input-label for="marital_status" :value="__('Marital Status')" />
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <div class="form-floating mb-3">
                        <x-text-input id="annual_income" class="form-control" type="text" name="annual_income" :value="old('annual_income')" required autocomplete="annual_income" />
                        <x-input-error :messages="$errors->get('annual_income')" class="mt-2" />
                        <x-input-label for="annual_income" :value="__('Annual Income')" />
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <div class="form-floating mb-3">
                        <x-text-input id="beneficiaries" class="form-control" type="text" name="beneficiaries" :value="old('beneficiaries')" required autocomplete="beneficiaries" />
                        <x-input-error :messages="$errors->get('beneficiaries')" class="mt-2" />
                        <x-input-label for="beneficiaries" :value="__('Beneficiary/ies')" />
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <div class="form-floating mb-3">
                        <x-text-input id="birthdate" class="form-control" type="date" name="birthdate" :value="old('birthdate')" required autocomplete="birthdate" />
                        <x-input-error :messages="$errors->get('birthdate')" class="mt-2" />
                        <x-input-label for="birthdate" :value="__('Birthdate')" />
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <div class="form-floating mb-3">
                        <x-text-input id="education" class="form-control" type="text" name="education" :value="old('education')" required autocomplete="education" />
                        <x-input-error :messages="$errors->get('education')" class="mt-2" />
                        <x-input-label for="education" :value="__('Educational Attainment')" />
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <div class="form-floating mb-3">
                        <x-text-input id="employee_ID" class="form-control" type="text" name="employee_ID" :value="old('employee_ID')" required autocomplete="employee_ID" />
                        <x-input-error :messages="$errors->get('employee_ID')" class="mt-2" />
                        <x-input-label for="employee_ID" :value="__('Employee ID')" />
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <div class="form-floating mb-3">
                        <x-text-input id="contact_no" class="form-control" type="text" name="contact_no" :value="old('contact_no')" required autocomplete="contact_no" />
                        <x-input-error :messages="$errors->get('contact_no')" class="mt-2" />
                        <x-input-label for="contact_no" :value="__('Contact No.')" />
                    </div>
                </div>

                <hr/>

                <div class="col-12">
                    <h3>Contribution Details</h3>
                </div>
                <div class="form-group col-md-6">
                    <div class="form-floating mb-3">
                        <x-text-input id="shares" class="form-control" type="text" name="shares" :value="old('shares')" required autocomplete="shares" />
                        <x-input-error :messages="$errors->get('shares')" class="mt-2" />
                        <x-input-label for="shares" :value="__('Shares')" />
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <div class="form-floating mb-3">
                        <x-text-input id="savings" class="form-control" type="text" name="savings" :value="old('savings')" required autocomplete="savings" />
                        <x-input-error :messages="$errors->get('savings')" class="mt-2" />
                        <x-input-label for="savings" :value="__('Savings')" />
                    </div>
                </div>

                <hr/>

                <div class="col-12">
                    <h3>Account</h3>
                </div>

                <div class="form-group col-md-6">
                    <div class="form-floating mb-3">
                        <x-text-input id="username" class="form-control" type="text" name="username" :value="old('username')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('username')" class="mt-2" />
                        <x-input-label for="username" :value="__('Username')" />
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <div class="form-floating mb-3">

                    </div>
                </div>
                <div class="form-group col-md-6">
                    <div class="form-floating mb-3">
                        <x-text-input id="password" class="form-control"
                                        type="password"
                                        name="password"
                                        required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        <x-input-label for="password" :value="__('Password')" />
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <div class="form-floating mb-3">
                        <x-text-input id="password_confirmation" class="form-control"
                               type="password"
                                name="password_confirmation" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    </div>
                </div>

                <!---Terms and Conditions-->
                <!-- <div class="col-12">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" name="iAgree" id="iAgree" required>
                    <label class="form-check-label text-secondary" for="iAgree">
                      I agree to the <a href="#!" class="link-primary text-decoration-none">terms and conditions</a>
                    </label>
                  </div>
                </div> -->

                        <!-- Photo Upload -->
                <div class="form-group col-md-6">
                    <div class="form-floating mb-3">
                        <input id="photo" class="form-control" type="file" name="photo" accept="image/png, image/gif, image/jpeg" required>
                        <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                        <x-input-label for="photo" :value="__('Photo')" />
                    </div>
                </div>

                <div class="col-12">
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">
                        {{ __('Register') }}
                        </button>
                    </div>
                    </div>

              </div>
            </form>

            <div class="row">
              <div class="col-12">
                <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-end mt-4">
                  <p class="m-0 text-secondary text-center">Already have an account? <a href="{{ route('login') }}" class="link-primary text-decoration-none">Sign in</a></p>
                </div>
              </div>
            </div>

</x-register-layout>
