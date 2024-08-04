<x-app-layout>
    <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="table-responsive flex justify-center">
                            <div class="w-90 py-6 bg-white shadow-md overflow-hidden sm:rounded-lg">
                                
                                @if(session('status'))
                                    <div class="py-2 px-3 bg-green-200 text-green-900 mb-4 rounded-md" style="background: #1affa3">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                @if(session('error'))
                                    <div class="py-2 px-3 bg-green-200 text-green-900 mb-4 rounded-md color-white" style="background: #ff4d4d">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                <div class="flex-section gap-5">
                                    <form method="POST" action="{{ route('submit-app') }}" class="w-full" enctype="multipart/form-data">
                                        <div class="flex justify-content-between align-items-center">
                                            <div><h1>APPLY</h1></div>
                                            <div><a href="" class="f-12 fw underline about-btn">ABOUT APPLICATION</a></div>
                                        </div>
                                            @csrf
                                        <div class="mt-4">

                                            @if(Auth::user() && Auth::user()->type == 'AGT')
                                                <x-text-input id="promo_code" class="block mt-1 w-full" type="hidden" name="promo_code" :value="Auth::user()->promo_code" required autocomplete="promo_code"/>
                                                <x-input-error :messages="$errors->get('promo_code')" class="mt-2" />
                                            @endif
                                        
                                            <!-- Name -->
                                            <div>
                                                <x-input-label for="name" class="f-14" :value="__('Full name')" />
                                                <small>Amazina yombi y'usaba kwiga</small>
                                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Amazina yombi y'usaba kwiga" />
                                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                            </div>

                                            <!-- Email Address -->
                                            <div class="mt-6">
                                                <x-input-label for="email" :value="__('Email')" />
                                                <small>Email yawe</small>
                                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" placeholder="Email" />
                                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                            </div>

                                            <!-- phone number -->
                                            <div class="mt-6">
                                                <x-input-label for="phone" :value="__('Phone number')" />
                                                <small>Nimero ya telephone</small>
                                                <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autocomplete="phone"  placeholder="Phone number"/>
                                                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                                            </div>

                                            <!-- Course -->
                                            <div class="mt-6">
                                                <x-input-label for="course" :value="__('Select One Course')" />
                                                <small>Hitamo isomo rimwe wifuza kwiga</small>
                                                <select class="block mt-1 w-full border rounded" name="course">
                                                    <option value="MULTIMEDIA" {{ old('course') == 'MULTIMEDIA' ? 'selected' : '' }}>MULTIMEDIA</option>
                                                    <option value="HOSPITALITY" {{ old('course') == 'HOSPITALITY' ? 'selected' : '' }}>HOSPITALITY</option>
                                                    <option value="FILMMAKING AND VIDEO PRODUCTION" {{ old('course') == 'FILMMAKING AND VIDEO PRODUCTION' ? 'selected' : '' }}>FILMMAKING AND VIDEO PRODUCTION</option>
                                                    <option value="PHOTOGRAPHY AND GRAPHIC DESIGN" {{ old('course') == 'PHOTOGRAPHY AND GRAPHIC DESIGN' ? 'selected' : '' }}>PHOTOGRAPHY AND GRAPHIC DESIGN</option>
                                                    <option value="JOURNALISM AND COMMUNUCATION" {{ old('course') == 'JOURNALISM AND COMMUNUCATION' ? 'selected' : '' }}>JOURNALISM AND COMMUNUCATION</option>
                                                    <option value="MUSIC" {{ old('course') == 'MUSIC' ? 'selected' : '' }}>MUSIC</option>
                                                    <option value="COMPUTER" {{ old('course') == 'COMPUTER' ? 'selected' : '' }}>COMPUTER</option>
                                                    <option value="ENGLISH" {{ old('course') == 'ENGLISH' ? 'selected' : '' }}>ENGLISH</option>
                                                    <option value="FRENCH" {{ old('course') == 'FRENCH' ? 'selected' : '' }}>FRENCH</option>
                                                </select>
                                                <x-input-error :messages="$errors->get('course')" class="mt-2" />
                                            </div>

                                            <!-- Education level -->
                                            <div class="mt-6">
                                                <x-input-label for="edu_level" :value="__('Level Of Education')" />
                                                <small>Ikiciro cy'amashuri</small>
                                                <select class="block mt-1 w-full border rounded" name="edu_level" required>
                                                    <option value="Primary Level" {{ old('edu_level') == 'Primary Level' ? 'selected' : '' }}>Primary Level</option>
                                                    <option value="Ordinary Level (O'Level)" {{ old('edu_level') == "Ordinary Level (O'Level)" ? 'selected' : '' }}>Ordinary Level (O'Level)</option>
                                                    <option value="Advanced Level (A'Level)" {{ old('edu_level') == "Advanced Level (A'Level)" ? 'selected' : '' }}>Advanced Level (A'Level)</option>
                                                    <option value="University" {{ old('edu_level') == 'University' ? 'selected' : '' }}>University</option>
                                                    <option value="Other Certificate" {{ old('edu_level') == 'Other Certificate' ? 'selected' : '' }}>Other Certificate</option>
                                                </select>
                                                <x-input-error :messages="$errors->get('edu_level')" class="mt-2" />
                                            </div>

                                            <!-- Application letter -->
                                            <div class="mt-6">
                                                <div class="flex justify-content-between align-items-center">
                                                <x-input-label for="ap_letter" :value="__('Scholarship application Letter')" />
                                                <a href="{{ asset('files/application_sample.pdf') }}" target="self" class="f-12 fw underline">View sample</a>
                                                </div>
                                                <small>Shyiramo Ibaruwa wanditse hano</small>
                                                <x-text-input id="ap_letter" class="block mt-1 w-full" type="file" name="ap_letter" :value="old('ap_letter')" required autocomplete="ap_letter" />
                                                <x-input-error :messages="$errors->get('ap_letter')" class="mt-2" />
                                            </div>

                                            <!-- Certificate/Degree -->
                                            <div class="mt-6">
                                                <x-input-label for="certificate" :value="__('Supporting Educational Document i.e Diploma/Degree/Result Slip or Certificate (allowed to upload more than 1)')" />
                                                <small>Shyiramo Impamyabumenyi cyangwa Impamyabushobozi</small>
                                                <x-text-input id="certificate" class="block mt-1 w-full" type="file" name="certificate" :value="old('certificate')" required autocomplete="certificate" />
                                                <x-input-error :messages="$errors->get('certificate')" class="mt-2" />
                                            </div>

                                            <!-- Confirm -->
                                            <div class="mt-6">
                                                <x-input-label for="confirm" :value="__('Is it you first time to apply at KSP RWANDA?')" />
                                                <small>Ni inshuro y'ambere usabye kwiga muri KSP RWANDA?</small>
                                                <select class="block mt-1 w-full border rounded" name="confirm" required>
                                                    <option value="Yes" {{ old('confirm') == 'Yes' ? 'selected' : '' }}>Yes</option>
                                                    <option value="No" {{ old('confirm') == 'No' ? 'selected' : '' }}>No</option>
                                                </select>
                                                <x-input-error :messages="$errors->get('confirm')" class="mt-2" />
                                            </div>

                                            <!-- Place -->
                                            <div class="mt-6">
                                                <x-input-label for="place" :value="__('Which Place will you get a course?')" />
                                                <small>Urifuza kwigira he?</small>
                                                <select class="block mt-1 w-full border rounded" name="place" required>
                                                    <option value="Kigali City (Centre Saint Paul)" {{ old('place') == 'Kigali City (Centre Saint Paul)' ? 'selected' : '' }}>Kigali City (Centre Saint Paul)</option>
                                                    <option value="Kayonza District (Kayonza Youth Friendly Center)" {{ old('place') == 'Kayonza District (Kayonza Youth Friendly Center)' ? 'selected' : '' }}>Kayonza District (Kayonza Youth Friendly Center)</option>
                                                </select>
                                                <x-input-error :messages="$errors->get('place')" class="mt-2" />
                                            </div>

                                            <!-- Receipt -->
                                            <div class="mt-6">
                                                <x-input-label for="receipt" :value="__('Receipt of 2,000RWF for application')" />
                                                <small>
                                                    paid at: <br>
                                                    &nbsp; - MOMO code: *182*8*1*024666# US KSPRWA Ltd <br>
                                                    &nbsp; - GT Bank account:211243635151180 (ksp ltd)<br>
                                                    <strong> NB: Allowed to be filled is Image(jpg)</strong>
                                                    <p class="mt-2">Upload only Screenshot proving your application payment and contact reception for check up on your reference number. if more than one person are using the same number to pay, it is not allowed to send application fees collectively. you must send the fees one by one               </p>
                                                </small>
                                                <x-text-input id="receipt" class="block mt-1 w-full" type="file" name="receipt" :value="old('receipt')" required autocomplete="receipt" />
                                                <x-input-error :messages="$errors->get('receipt')" class="mt-2" />
                                            </div>

                                            <div class="flex items-center justify-between mt-6">
                                                <x-primary-button class="">
                                                    {{ __('Submit application') }}
                                                </x-primary-button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</x-app-layout>