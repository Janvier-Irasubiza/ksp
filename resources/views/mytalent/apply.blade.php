@section('title', 'MY TALENT REGISTRATION')

<x-apply-layout>
<div class="flex-section gap-5">
    <div class="about w-full">
        <h1>MY TALENT REGISTRATION FORM</h1>

        <p class="mt-2"> KSP Rwanda is proud to present "My Talent," an exciting talent competition designed to showcase the skills and passion of the youth in various creative fields. We believe in nurturing and empowering young talent, providing them with a platform to express themselves and pursue their dreams. This competition aims to bring together talented individuals from different departments, including</p>

        <ol class="mt-2 indented-list">
            <li>Cinematography</li>
            <li>Film acting and Drama</li>
            <li>Music</li>
            <li>Graphic Design</li>
            <li>Journalism</li>
            <li>Creative Art </li>
            <li>Yoga</li>
            <li>Other Talent</li>
        </ol>

        <p class="mt-3 fw"> allowing them to compete and learn from each other.</p><br/>
        <p class="mt-3 fw"> Objectives:</p>

        <ul class="indented-list">
            <li> <i class="fa-solid fa-circle f-6"></i> &nbsp; Identify and promote talented individuals in various creative fields.</li>
            <li> <i class="fa-solid fa-circle f-6"></i> &nbsp; Provide a platform for aspiring artists to showcase their skills and gain recognition.</li>
            <li> <i class="fa-solid fa-circle f-6"></i> &nbsp; Foster collaboration and networking among participants.</li>
            <li> <i class="fa-solid fa-circle f-6"></i> &nbsp; Encourage innovation, creativity, and personal growth among youth.</li>
            <li> <i class="fa-solid fa-circle f-6"></i> &nbsp; Offer educational and mentorship opportunities to participants through workshops and masterclasses.</li>    
        </ul>

        <p class="mt-3">-Registrations will be open from 15th June 2024 - 30th August 2024</p>
        <p class="">-Registration received after</p>
        <p class="mt-4">30th August 2024 will be disqualified</p>
        <p class="mt-4">Registration's Fees:</p>
        <p class="">-Solo performance registration 10,000 (frw)</p>
        <p class="">-Group performance registration 25,000 (frw)</p>
        <p class="mt-4">Solo participants are allowed to fill a single Entry form and choose more than one talent category</p>
        <p class="">Group participants are required to fill separate registration form per act.</p>
        <p class="mt-4">Group  participants  are  required  to  fill  individual  application  for  each participants  of  the  group  and  submit  it  all  together,  along  with Group application coversheet filled by the Group leader</p>
        <p class="mt-4">Non-refundable registration fees are required to the audition for the competition to be submitted along with entry registration form.</p>
        <p class="mt-4">Payment of the fees does not mean that solo/group will be selected for the competition. Fees will not be returned to the applicants not chosen.</p>
        <p class="mt-4">If a contestant should decide to drop out of the My Talent Competition, any entry fee paid will not be refunded</p>
        <p class="mt-4 underline">Time allotted.</p>
        <p class="">Minimum 3  minutes and Maximum of 5 minutes is allotted for any act /performance (during auditions as well as if  chosen to perform during Talent competition).</p>
        <p class="mt-4 underline">Contestants may enter in any one of the following categories:</p>
        <p>Contestant may choose one of segment with in the following categories</p>

        <ol class="mt-2 indented-list">
            <li>Cinematography (Filmmaking, Animation and Photography)</li>
            <li>Film acting and Drama (Film acting, Comedy)</li>
            <li>Music (Composing, Instruments, Singing, Dancing)</li>
            <li>Graphic Design (Illustrators)</li>
            <li>Journalism (TV and Radio news presentation, Audio Visual Advertising)</li>
            <li>Creative Art (Painting, Poetry, Craft)</li>
        </ol>

        <p class="mt-4 underline fw">WINNERS WILL BE REWORDED</p>
        <ol>
            <li class="fw">Solo=== Up to 500,000 (FRW)</li>
            <li class="fw">Group== up to 700,000 (FRW)</li>
            <li class="fw">Both will win for Scholarships</li>
            <li class="fw">Both will win for Production Support and Promotion</li>
        </ol>
    </div>
    <form method="POST" action="{{ route('submit-app') }}" class="w-full" enctype="multipart/form-data">
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
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Amazina yombi" />
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

            <div class="mt-6">
                <x-input-label for="phone" :value="__('Date of birth')" />
                <small>Igihe wavukiye</small>
                <x-text-input id="birthdate" class="block mt-1 w-full" type="date" name="birthdate" :value="old('birthdate')" required autocomplete="birthdate"  placeholder="Date of birth"/>
                <x-input-error :messages="$errors->get('birthdate')" class="mt-2" />
            </div>

            <div class="mt-6">
                <x-input-label for="phone" :value="__('District')" />
                <small>Akarere uri gukoreramo application</small>
                <x-text-input id="district" class="block mt-1 w-full" type="text" name="district" :value="old('district')" required autocomplete="district"  placeholder="District"/>
                <x-input-error :messages="$errors->get('district')" class="mt-2" />
            </div>

            <div class="mt-6">
                <x-input-label for="phone" :value="__('Talent Class')" />
                <!-- <small>Akarere uri gukoreramo application</small> -->
                 <select name="talent_class" id="">
                    <option value="Solo">Solo</option>
                    <option value="Group">Group</option>
                 </select>
                <x-input-error :messages="$errors->get('talent_class')" class="mt-2" />
            </div>

            <div class="mt-6">
                <x-input-label for="talent category" :value="__('Talent Category')" />
                <small>Contestant may choose one of segment with in the following categories</small>
                <select name="talent_category" id="">
                    <option value="Cinematography (Filmmaking, Animation and Photography)">Cinematography (Filmmaking, Animation and Photography)</option>
                    <option value="Film acting and Drama (Film acting, Comedy)">Film acting and Drama (Film acting, Comedy)</option>
                    <option value="Music (Composing, Instruments, Singing, Dancing)">Music (Composing, Instruments, Singing, Dancing)</option>
                    <option value="Graphic Design ( Illustrators)">Graphic Design (Illustrators)</option>
                    <option value="Journalism (TV and Radio news presentation, Audio Visual Advertising)">Journalism (TV and Radio news presentation, Audio Visual Advertising)</option>
                    <option value="Creative Art (Painting, Poetry, Craft)">Creative Art (Painting, Poetry, Craft)</option>
                    <option value="Yoga">Yoga</option>
                    <option value="Other Talent">Other Talent</option>
                </select>
                <x-input-error :messages="$errors->get('talent_category')" class="mt-2" />
            </div>

            <div class="mt-6">
                <x-input-label for="other_talent" :value="__('Any other talent category not mentioned Above')" />
                <x-text-input id="other_talent" class="block mt-1 w-full" type="text" name="other_talent" :value="old('other_talent')" required autocomplete="other_talent"  placeholder="Other talent"/>
                <x-input-error :messages="$errors->get('other_talent')" class="mt-2" />
            </div>
            <div class="mt-6">
                <x-input-label for="location" :value="__('Location')" />
                <small>Where will you perform?</small>
                <select name="location" id="">
                    <option value="Eastern province">Eastern province</option>
                    <option value="Western province">Western province</option>
                    <option value="Northern Province">Northern Province</option>
                    <option value="Southern Province">Southern Province</option>
                    <option value="Kigali city">Kigali city</option>
                </select>
                <x-input-error :messages="$errors->get('location')" class="mt-2" />
            </div>

            <div class="mt-6">
                <x-input-label for="group" :value="__('Group Application')" />
                <small>If is group application, 
                Group application should make group coversheet filled by the Group leader.Group leader may full fill the all names of group members and their duties. Allowed to be filled is PDF,EXCEL or DOCX</small>
                <x-text-input id="group_app" class="block mt-2 w-full" type="file" name="group_app" :value="old('group_app')" required autocomplete="group_app" />
                <x-input-error :messages="$errors->get('group_app')" class="mt-2" />
            </div>


            <div class="mt-6">
                <x-input-label for="phone" :value="__(' Describe your chosen category')" />
                <small>In not more than 500 words</small>
                <x-text-input id="category_desc" class="block mt-1 w-full" type="text" name="category_desc" :value="old('category_desc')" required autocomplete="category_desc"  placeholder="Category description"/>
                <x-input-error :messages="$errors->get('category_desc')" class="mt-2" />
            </div>
            
            
            <!-- Receipt -->
            <div class="mt-6">
                <x-input-label for="receipt" :value="__('Registration fees receipt')" />
                <ul class="indented-list">
                    <li> <i class="fa-solid fa-circle f-6"></i> &nbsp; Receipt is screenshot paid on momo pay code *182*8*1*024666# US KSPRWA.</li>
                    <li> <i class="fa-solid fa-circle f-6"></i> &nbsp; For the solo applicant will pay 10,000frw for the registration and group is 25000frw for the registration.</li>
                    <li> <i class="fa-solid fa-circle f-6"></i> &nbsp; Screenshot paid must have the ID TXT number.</li>
                </ul>
                <x-text-input id="receipt" class="block mt-3 w-full" type="file" name="receipt" :value="old('receipt')" required autocomplete="receipt" />
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
