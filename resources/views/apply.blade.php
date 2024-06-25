<x-apply-layout>
<div class="flex-section gap-5">
    <div class="about w-full">
        <h1>NKUNGANIRE BURUSE KSP RWANDA APPLICATION FORM 2024</h1>
        <h2 class="underline mt-3">READ CAREFULLY ABOUT OUR NKUNGANIRE SCHOLARSHIP PROGRAM</h2>

        <p class="mt-2"> KSP Rwanda is a renowned production company with a part of training center. We are located in Kigali city centre saint paul and Kayonza District at KYFC, unique in our dedication to high quality capacity development for social transformation into future great competitors on the market.</p>


        <p class="mt-3 fw">Nkunganire Buruse provide 70% of KSP RWANDA's school fees after being admitted. A student only Pays 30% of School fees only in the following departments</p>

        <ul class="mt-2">
            <li>&nbsp;  > TOURISM AND HOSPITALITY</li>
            <li>&nbsp;  > MULTIMEDIA</li>
            <li>&nbsp;  > FILMMAKING AND VIDEO PRODUCTION</li>
            <li>&nbsp;  > PHOTOGRAPHY AND GRAPHIC DESIGN</li>
            <li>&nbsp;  > JOURNALISM AND COMMUNICATION</li>
            <li>&nbsp;  > LIVE STREAMING</li>
            <li>&nbsp;  > CCTV CAMERA INSTALLATION </li>
            <li>&nbsp;  > COMPUTER</li>
            <li>&nbsp;  > MUSIC</li>
            <li>&nbsp;  > ENGLISH</li>
        </ul>

        <p class="mt-3 fw">N.B:</p>
        <ol>
            <li> &nbsp; 1. Applicants from Kayonza District will only pay 20% of school fees and will be &nbsp; &nbsp; &nbsp; &nbsp;  trained at Kayonza Youth Friendly Center.</li>
            <li> &nbsp; 2. An applicant should fill well this form with it's rules and Regulations</li>
        </ol>

        <p class="mt-3 fw">Apply now to study in our 2024-2025 programs</p>

        <p class="mt-3">
            <strong>KSP RWANDA is located in Kigali City Centre Saint Paul near Saint Famille</strong>
            <a href="">Email: ksprwanda@gmail.com</a><br>
            web: <a href="www.ksp.com">www.ksp.com</a><br>
            tel: <a href="+250785478665">0785478665</a><br>
        </p>
    </div>
    <form method="POST" action="" class="w-full">
        <div class="flex justify-content-between align-items-center">
            <div><h1>APPLY</h1></div>
            <div><a href="" class="f-12 fw underline about-btn">ABOUT APPLICATION</a></div>
        </div>
            @csrf
        <div class="mt-4">
        
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

            <!-- Email Address -->
            <div class="mt-6">
                <x-input-label for="phone" :value="__('Phone number')" />
                <small>Nimero ya telephone</small>
                <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autocomplete="phone"  placeholder="Phone number"/>
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-6">
                <x-input-label for="course" :value="__('Select One Course')" />
                <small>Hitamo isomo rimwe wifuza kwiga</small>
                <select class="block mt-1 w-full border rounded" name="course" value="{{ old('course') }}">
                    <option value="MULTIMEDIA">MULTIMEDIA</option>
                    <option value="HOSPITALITY">HOSPITALITY</option>
                    <option value="FILMMAKING AND VIDEO PRODUCTION">FILMMAKING AND VIDEO PRODUCTION</option>
                    <option value="PHOTOGRAPHY AND GRAPHIC DESIGN">PHOTOGRAPHY AND GRAPHIC DESIGN</option>
                    <option value="JOURNALISM AND COMMUNUCATION">JOURNALISM AND COMMUNUCATION</option>
                    <option value="MUSIC">MUSIC</option>
                    <option value="COMPUTER">COMPUTER</option>
                    <option value="ENGLISH">ENGLISH</option>
                    <option value="FRENCH">FRENCH</option>
                </select>
                <x-input-error :messages="$errors->get('course')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-6">
                <x-input-label for="edu_level" :value="__('Level Of Education')" />
                <small>Ikiciro cy'amashuri</small>
                <select class="block mt-1 w-full border rounded" name="edu_level" value="{{ old('edu_level') }}">
                    <option value="Primary Level">Primary Level</option>
                    <option value="Ordinary Level (O'Level)">Ordinary Level (O'Level)</option>
                    <option value="Advanced Level (A'Level)">Advanced Level (A'Level)</option>
                    <option value="University">University</option>
                    <option value="Other Certificate">Other Certificate</option>
                </select>
                <x-input-error :messages="$errors->get('edu_level')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-6">
                <div class="flex justify-content-between align-items-center">
                <x-input-label for="ap_letter" :value="__('Scholarship application Letter')" />
                <a href="{{ asset('files/application_sample.pdf') }}" target="self" class="f-12 fw underline">View sample</a>
                </div>
                <small>Shyiramo Ibaruwa wanditse hano</small>
                <x-text-input id="ap_letter" class="block mt-1 w-full" type="file" name="ap_letter" :value="old('ap_letter')" required autocomplete="ap_letter" />
                <x-input-error :messages="$errors->get('ap_letter')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-6">
                <x-input-label for="certificate" :value="__('Supporting Educational Document i.e Diploma/Degree/Result Slip or Certificate (allowed to upload more than 1)')" />
                <small>Shyiramo Impamyabumenyi cyangwa Impamyabushobozi</small>
                <x-text-input id="certificate" class="block mt-1 w-full" type="file" name="certificate" :value="old('certificate')" required autocomplete="certificate" />
                <x-input-error :messages="$errors->get('certificate')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-6">
                <x-input-label for="confirm" :value="__('Is it you first time to apply at KSP RWANDA?')" />
                <small>Ni inshuro y'ambere usabye kwiga muri KSP RWANDA?</small>
                <select class="block mt-1 w-full border rounded" name="confirm" value="{{ old('confirm') }}">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
                <x-input-error :messages="$errors->get('confirm')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-6">
                <x-input-label for="place" :value="__('Which Place will you get a course?')" />
                <small>Urifuza kwigira he?</small>
                <select class="block mt-1 w-full border rounded" name="place" value="{{ old('place') }}">
                    <option value="Kigali City (Centre Saint Paul)">Kigali City (Centre Saint Paul)</option>
                    <option value="Kayonza District (Kayonza Youth Friendly Center)">Kayonza District (Kayonza Youth Friendly Center)</option>
                </select>
                <x-input-error :messages="$errors->get('place')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-6">
                <x-input-label for="receipt" :value="__('Receipt of 2000FRW for application')" />
                <small>
                paid at: <br>
                &nbsp; - MOMO code: *182*8*1*024666# US KSPRWA Ltd <br>
                &nbsp; - GT Bank account:211243635151180 (ksp ltd)<br>
               <strong> NB: Allowed to be filled is Image(jpg)</strong>
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

<div id="aboutModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h1>NKUNGANIRE BURUSE KSP RWANDA APPLICATION FORM 2024</h1>
        <h2 class="underline mt-3">READ CAREFULLY ABOUT OUR NKUNGANIRE SCHOLARSHIP PROGRAM</h2>

        <p class="mt-2"> KSP Rwanda is a renowned production company with a part of training center. We are located in Kigali city centre saint paul and Kayonza District at KYFC, unique in our dedication to high quality capacity development for social transformation into future great competitors on the market.</p>


        <p class="mt-3 fw">Nkunganire Buruse provide 70% of KSP RWANDA's school fees after being admitted. A student only Pays 30% of School fees only in the following departments</p>

        <ul class="mt-2">
            <li>&nbsp;  > TOURISM AND HOSPITALITY</li>
            <li>&nbsp;  > MULTIMEDIA</li>
            <li>&nbsp;  > FILMMAKING AND VIDEO PRODUCTION</li>
            <li>&nbsp;  > PHOTOGRAPHY AND GRAPHIC DESIGN</li>
            <li>&nbsp;  > JOURNALISM AND COMMUNICATION</li>
            <li>&nbsp;  > LIVE STREAMING</li>
            <li>&nbsp;  > CCTV CAMERA INSTALLATION </li>
            <li>&nbsp;  > COMPUTER</li>
            <li>&nbsp;  > MUSIC</li>
            <li>&nbsp;  > ENGLISH</li>
        </ul>

        <p class="mt-3 fw">N.B:</p>
        <ol>
            <li> &nbsp; 1. Applicants from Kayonza District will only pay 20% of school fees and will be &nbsp; &nbsp; &nbsp; &nbsp;  trained at Kayonza Youth Friendly Center.</li>
            <li> &nbsp; 2. An applicant should fill well this form with it's rules and Regulations</li>
        </ol>

        <p class="mt-3 fw">Apply now to study in our 2024-2025 programs</p>

        <p class="mt-3">
            <strong>KSP RWANDA is located in Kigali City Centre Saint Paul near Saint Famille</strong>
            <a href="">Email: ksprwanda@gmail.com</a><br>
            web: <a href="www.ksp.com">www.ksp.com</a><br>
            tel: <a href="+250785478665">0785478665</a><br>
        </p>
    </div>
</div>

</x-apply-layout>
