<form method="POST" action="{{ route('mytalent-submit-app') }}" class="w-full" enctype="multipart/form-data">
        <div class="flex justify-content-between align-items-center">
            <div><h1>REGISTER HERE</h1></div>
            <div><a href="" class="f-12 fw underline about-btn">ABOUT IT</a></div>
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
                <small>Akarere utuyemo</small>
                <select name="district" id="district" class="w-full" required>
                    <option value="">------------</option>
                    @foreach ($provinces as $province => $districts)
                        <optgroup label="{{ $province }}">
                            @foreach ($districts as $district)
                                <option value="{{ $district }}" {{ old('district') == $district ? 'selected' : '' }}>{{ $district }}</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('district')" class="mt-2" />
            </div>

            <div class="mt-6">
                <x-input-label for="talent_class" :value="__('Talent Class')" />
                <select name="talent_class" id="talent_class" class="w-full">
                    <option value="Solo" {{ old('talent_class') == 'Solo' ? 'selected' : '' }}>Solo</option>
                    <option value="Group" {{ old('talent_class') == 'Group' ? 'selected' : '' }}>Group</option>
                </select>
                <x-input-error :messages="$errors->get('talent_class')" class="mt-2" />
            </div>

            <div class="mt-6">
                <x-input-label for="talent_category" :value="__('Talent Category')" />
                <small>Contestant may choose one of segment with in the following categories</small>
                <select name="talent_category" id="talent_category" class="w-full">
                    <option value="Cinematography (Filmmaking, Animation and Photography)" {{ old('talent_category') == 'Cinematography (Filmmaking, Animation and Photography)' ? 'selected' : '' }}>Cinematography (Filmmaking, Animation and Photography)</option>
                    <option value="Film acting and Drama (Film acting, Comedy)" {{ old('talent_category') == 'Film acting and Drama (Film acting, Comedy)' ? 'selected' : '' }}>Film acting and Drama (Film acting, Comedy)</option>
                    <option value="Music (Composing, Instruments, Singing, Dancing)" {{ old('talent_category') == 'Music (Composing, Instruments, Singing, Dancing)' ? 'selected' : '' }}>Music (Composing, Instruments, Singing, Dancing)</option>
                    <option value="Graphic Design (Illustrators)" {{ old('talent_category') == 'Graphic Design (Illustrators)' ? 'selected' : '' }}>Graphic Design (Illustrators)</option>
                    <option value="Journalism (TV and Radio news presentation, Audio Visual Advertising)" {{ old('talent_category') == 'Journalism (TV and Radio news presentation, Audio Visual Advertising)' ? 'selected' : '' }}>Journalism (TV and Radio news presentation, Audio Visual Advertising)</option>
                    <option value="Creative Art (Painting, Poetry, Craft)" {{ old('talent_category') == 'Creative Art (Painting, Poetry, Craft)' ? 'selected' : '' }}>Creative Art (Painting, Poetry, Craft)</option>
                    <option value="Yoga" {{ old('talent_category') == 'Yoga' ? 'selected' : '' }}>Yoga</option>
                    <option value="Other Talent" {{ old('talent_category') == 'Other Talent' ? 'selected' : '' }}>Other Talent</option>
                </select>
                <x-input-error :messages="$errors->get('talent_category')" class="mt-2" />
            </div>

            <div class="mt-6">
                <x-input-label for="other_talent" :value="__('Any other talent category not mentioned Above')" />
                <x-text-input id="other_talent" class="block mt-1 w-full" type="text" name="other_talent" :value="old('other_talent')" autocomplete="other_talent"  placeholder="Other talent"/>
                <x-input-error :messages="$errors->get('other_talent')" class="mt-2" />
            </div>

            <div class="mt-6">
                <x-input-label for="location" :value="__('Location')" />
                <small>Where will you perform?</small>
                <select name="location" id="location" class="w-full">
                    <option value="">------------</option>
                    @foreach ($locations as $province => $districts)
                        <optgroup label="{{ $province }}">
                            @foreach ($districts as $district)
                                <option value="{{ $district }}" {{ old('location') == $district ? 'selected' : '' }}>
                                    {{ $district }}
                                </option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>

                <x-input-error :messages="$errors->get('location')" class="mt-2" />
            </div>

            <div class="mt-6">
                <x-input-label for="group" :value="__('Group Application')" />
                <small>If is group application, 
                Group application should make group coversheet filled by the Group leader.Group leader may full fill the all names of group members and their duties. Allowed to be filled is PDF,EXCEL or DOCX</small>
                <x-text-input id="group_app" class="block mt-2 w-full" type="file" name="group_app" :value="old('group_app')" autocomplete="group_app" />
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
                <input id="receipt" class="block mt-3 w-full" type="file" name="receipt" :value="old('receipt')" required accept=".pdf,.jpeg,.png,.jpg" />
                <x-input-error :messages="$errors->get('receipt')" class="mt-2" />
            </div>

            <div class="flex items-center justify-between mt-6">
                <x-primary-button class="">
                    {{ __('Submit application') }}
                </x-primary-button>
            </div>
        </div>
    </form>
