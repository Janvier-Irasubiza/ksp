<x-app-layout>
        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">

                        @if(session('sent'))
                            <div class="py-2 px-3 bg-green-200 text-green-900 mb-4 rounded-md" style="background: #1affa3">
                                {{ session('sent') }}
                            </div>
                        @endif

                        @if(session('error_sending'))
                            <div class="py-2 px-3 bg-green-200 text-green-900 mb-4 rounded-md color-white" style="background: #ff4d4d">
                                {{ session('error_sending') }}
                            </div>
                        @endif

                        @if($app->unavailable == 'yes')
                            <div class="mb-4 flex justify-end items-center gap-2">
                                <span class="f-16 px-3 py-2 badge badge-secondary">
                                    Contacted, but was not awailable
                                </span>
                            </div>
                        @endif

                        <div class="mb-4 flex justify-between items-center gap-2">
                            <div>
                                <h1>{{ $app->names }}</h1>
                                <h2 class="mt-1">{{ $app->phone }}</h2>
                                <h2 class="mt-1">{{ $app->email }}</h2>
                            </div>
                            
                                <div class="flex items-center gap-3">
                                    <span class="f-16 px-3 py-2 badge 
                                        {{ $app->status == 'Pending' ? 'badge-warning' : 
                                            ($app->status == 'Denied' ? 'badge-danger' : 'badge-success') }}">
                                        {{ $app->status }}
                                    </span>

                                    @if(!Auth::user()->type == 'AGT' && $app->status != 'Approved')

                                    <a href="{{ route('mytalent.approve-app', ['app'=> $app->app_id]) }}" class="btn btn-primary f-14 fw">APPROVE APPLICATION</a>
                                    <button class="btn btn-danger f-14 fw" data-bs-toggle="modal" data-bs-target="#denyApplicationModal" id="denyApplicationButton">DENY APPLICATION</button>
                                    @endif

                                </div>                            
                        </div>

                        @if($app->note != "")
                            <div class="py-2 px-3 alert alert-danger mt-3 mb-4 rounded-md">
                                Reason for denial: {{ $app->note }}
                            </div>
                        @endif

                        <div class="flex-section gap-5">

                            
                            <div class="w-full">

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
                            
                                <form method="POST" action="{{ route('mytalent.update', ['id'=>$app->app_id ]) }}" class="w-full mb-4" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                    <div class="mt-4">

                                        @if(Auth::user() && Auth::user()->type == 'AGT')
                                            <x-text-input id="promo_code" class="block mt-1 w-full" type="hidden" name="promo_code" :value="Auth::user()->promo_code" required autocomplete="promo_code"/>
                                            <x-input-error :messages="$errors->get('promo_code')" class="mt-2" />
                                        @endif

                                        <x-text-input id="app" class="block mt-1 w-full" type="hidden" name="app" :value="$app->app_id" required autocomplete="app"/>

                                        <!-- Name -->
                                        <div>
                                            <x-input-label for="name" class="f-14" :value="__('Full name')" />
                                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="names" :value="$app->names" required autofocus autocomplete="name" placeholder="Amazina yombi" />
                                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                        </div>

                                        <!-- Email Address -->
                                        <div class="mt-6">
                                            <x-input-label for="email" :value="__('Email')" />
                                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$app->email" required autocomplete="email" placeholder="Email" />
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>

                                        <!-- phone number -->
                                        <div class="mt-6">
                                            <x-input-label for="phone" :value="__('Phone number')" />
                                            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="$app->phone" required autocomplete="phone"  placeholder="Phone number"/>
                                            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                                        </div>

                                        <div class="mt-6">
                                            <x-input-label for="phone" :value="__('Date of birth')" />
                                            <small>Igihe wavukiye</small>
                                            <x-text-input id="birthdate" class="block mt-1 w-full" type="date" name="birthdate" :value="$app->birthdate" required autocomplete="birthdate"  placeholder="Date of birth"/>
                                            <x-input-error :messages="$errors->get('birthdate')" class="mt-2" />
                                        </div>

                                        <div class="mt-6">
                                            <x-input-label for="phone" :value="__('District')" />
                                            <x-text-input id="district" class="block mt-1 w-full" type="text" name="district" :value="$app->district" required autocomplete="district"  placeholder="District"/>
                                            <x-input-error :messages="$errors->get('district')" class="mt-2" />
                                        </div>

                                        <div class="mt-6">
                                            <x-input-label for="talent_class" :value="__('Talent Class')" />
                                            <select name="talent_class" id="talent_class" class="w-full">
                                                <option value="Solo" {{ $app->talent_class == 'Solo' ? 'selected' : '' }}>Solo</option>
                                                <option value="Group" {{ $app->talent_class == 'Group' ? 'selected' : '' }}>Group</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('talent_class')" class="mt-2" />
                                        </div>

                                        <div class="mt-6">
                                            <x-input-label for="talent_category" :value="__('Talent Category')" />
                                            <small>Contestant may choose one of segment with in the following categories</small>
                                            <select name="talent_category" id="talent_category" class="w-full">
                                                <option value="Cinematography (Filmmaking, Animation and Photography)" {{ $app->talent_category == 'Cinematography (Filmmaking, Animation and Photography)' ? 'selected' : '' }}>Cinematography (Filmmaking, Animation and Photography)</option>
                                                <option value="Film acting and Drama (Film acting, Comedy)" {{ $app->talent_category == 'Film acting and Drama (Film acting, Comedy)' ? 'selected' : '' }}>Film acting and Drama (Film acting, Comedy)</option>
                                                <option value="Music (Composing, Instruments, Singing, Dancing)" {{ $app->talent_category == 'Music (Composing, Instruments, Singing, Dancing)' ? 'selected' : '' }}>Music (Composing, Instruments, Singing, Dancing)</option>
                                                <option value="Graphic Design (Illustrators)" {{ $app->talent_category == 'Graphic Design (Illustrators)' ? 'selected' : '' }}>Graphic Design (Illustrators)</option>
                                                <option value="Journalism (TV and Radio news presentation, Audio Visual Advertising)" {{ $app->talent_category == 'Journalism (TV and Radio news presentation, Audio Visual Advertising)' ? 'selected' : '' }}>Journalism (TV and Radio news presentation, Audio Visual Advertising)</option>
                                                <option value="Creative Art (Painting, Poetry, Craft)" {{ $app->talent_category == 'Creative Art (Painting, Poetry, Craft)' ? 'selected' : '' }}>Creative Art (Painting, Poetry, Craft)</option>
                                                <option value="Yoga" {{ $app->talent_category == 'Yoga' ? 'selected' : '' }}>Yoga</option>
                                                <option value="Other Talent" {{ $app->talent_category == 'Other Talent' ? 'selected' : '' }}>Other Talent</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('talent_category')" class="mt-2" />
                                        </div>

                                        <div class="mt-6">
                                            <x-input-label for="other_talent" :value="__('Any other talent category not mentioned Above')" />
                                            <x-text-input id="other_talent" class="block mt-1 w-full" type="text" name="other" :value="$app->other_talent" autocomplete="other_talent"  placeholder="Other talent"/>
                                            <x-input-error :messages="$errors->get('other')" class="mt-2" />
                                        </div>

                                        <div class="mt-6">
                                            <x-input-label for="location" :value="__('Location')" />
                                            <small>Where will you perform?</small>
                                            <select name="location" id="location" class="w-full">
                                                <option value="Eastern province" {{ $app->location == 'Eastern province' ? 'selected' : '' }}>Eastern province</option>
                                                <option value="Western province" {{ $app->location == 'Western province' ? 'selected' : '' }}>Western province</option>
                                                <option value="Northern Province" {{ $app->location == 'Northern Province' ? 'selected' : '' }}>Northern Province</option>
                                                <option value="Southern Province" {{ $app->location == 'Southern Province' ? 'selected' : '' }}>Southern Province</option>
                                                <option value="Kigali city" {{ $app->location == 'Kigali city' ? 'selected' : '' }}>Kigali city</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('location')" class="mt-2" />
                                        </div>


                                        <div class="mt-6">
                                            <x-input-label for="phone" :value="__(' Describe your chosen category')" />
                                            <x-text-input id="category_desc" class="block mt-1 w-full" type="text" name="category_desc" :value="$app->category_desc " required autocomplete="category_desc"  placeholder="Category description"/>
                                            <x-input-error :messages="$errors->get('category_desc')" class="mt-2" />
                                        </div>

                                        <div class="flex items-center justify-between mt-6">
                                            <x-primary-button class="">
                                                {{ __('Save changes') }}
                                            </x-primary-button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                                <div class="w-full">
                                    <h1>Docs</h1>
                                    <div class="mt-4">
                                        <h2>Group app sheet</h2>
                                        <div class="p-2 border rounded mt-2">
                                            <div class="file">
                                                <a href="{{ asset($app->group_app_sheet) }}" class="f-20">{{ $group_app_sheet }}</a>
                                            </div>
                                            <!-- <div class="flex justify-between px-2 mt-1">
                                                <a href="" class="replace">Replace</a>
                                                <a href="" class="del">Delete</a>
                                            </div> -->
                                        </div>    
                                    </div>

                                    <div class="mt-4">
                                        <h2>Receipt</h2>
                                        <div class="p-2 border rounded mt-2">
                                            <div class="file">
                                                <a href="{{ asset($app->receipt) }}" class="f-20">{{ $receipt }}</a>
                                            </div>
                                            <!-- <div class="flex justify-between px-2 mt-1">
                                                <a href="" class="replace">Replace</a>
                                                <a href="" class="del">Delete</a>
                                            </div> -->
                                        </div>    
                                    </div>
                            </div>

                        </div>

                        @if(!Auth::user()->type == 'AGT' && $app->status != 'Approved')
                            <div class="mt-8 flex justify-end gap-3">
                                <a href="{{ route('unreachable', ['app'=> $app->app_id]) }}" class="btn btn-info">Mark unrechable</a>
                                <!-- <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteApplication" id="deleteApplicationButton">Delete Application</button> -->
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="custom-modal" id="denyApplicationModal">
            <div class="custom-modal-dialog">
                <div class="custom-modal-content">
                    <div class="custom-modal-header mb-3">
                        <h5 class="custom-modal-title mb-3">Deny Application</h5>
                        <button type="button" class="custom-close" id="closeModal">&times;</button>
                    </div>
                    <div class="custom-modal-body">
                        Are you sure you want to deny this application?
                    </div>
                    <form action="{{ route('mytalent.deny', ['app'=>$app->app_id]) }}" method="post" class="mt-3">
                        @csrf
                        @method('put')
                        <div class="">
                            <x-input-label for="phone" :value="__('Reason of denial')" />
                            <textarea id="request" class="block mt-1 w-full border-gray rounded" name="reason" required placeholder="Enter Reason of denial">{{ old('reason') }}</textarea>
                            <x-input-error :messages="$errors->get('reason')" class="mt-2" />
                        </div>
                        <div class="custom-modal-footer">
                            <button type="button" class="custom-btn custom-btn-secondary" id="cancelDeny">Close</button>
                            <button type="submit" class="custom-btn custom-btn-danger">Deny</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="custom-modal" id="deleteApplication">
            <div class="custom-modal-dialog">
                <div class="custom-modal-content">
                    <div class="custom-modal-header mb-3">
                        <h5 class="custom-modal-title mb-3">Delete Application</h5>
                        <button type="button" class="custom-close" id="closeModal">&times;</button>
                    </div>
                    <div class="custom-modal-body">
                        <p>Are you sure you want to delete this application?</p> 
                        <p class="mt-4">Note that this action is ireversible</p> 
                    </div>
                    <form action="{{ route('mytalent.delete', ['app'=>$app->id]) }}" class="mt-3" method="post">
                        @csrf
                        @method('delete')
                        <div class="custom-modal-footer">
                            <button type="button" class="custom-btn custom-btn-secondary" id="cancelDelete">Close</button>
                            <button type="submit" class="custom-btn custom-btn-danger">Yes, Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>