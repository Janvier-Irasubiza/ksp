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

                        @if(isset($app->unavailable) && $app->unavailable == 'yes')
                            <div class="mb-4 flex justify-end items-center gap-2">
                                <span class="f-16 px-3 py-2 badge badge-secondary">
                                    Contacted, but was not awailable
                                </span>
                            </div>
                        @endif

                        <div class="mb-4 flex justify-between items-center gap-2">
                            <div>
                                <h1>{{ $app->names }}</h1>
                                <h2 class="mt-1">Phone: {{ $app->phone }}</h2>
                                <h2 class="mt-1">Email: {{ $app->email }}</h2>
                            </div>
                            
                                <div class="flex items-center gap-3">
                                    <span class="f-16 px-3 py-2 badge 
                                        {{ $app->status == 'Pending' ? 'badge-warning' : 
                                            ($app->status == 'Denied' ? 'badge-danger' : 'badge-success') }}">
                                        {{ $app->status }}
                                    </span>

                                    @if(!Auth::user()->type == 'AGT' && $app->status != 'Approved')

                                    <a href="{{ route('edu.approve-app', ['app'=> $app->app_id]) }}" class="btn btn-primary f-14 fw">APPROVE APPLICATION</a>
                                    @endif

                                    @if(!Auth::user()->type == 'AGT' && $app->status != 'Approved' && $app->status != 'Denied')
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
                            
                                <form method="POST" action="{{ route('edu.update', ['id'=>$app->app_id ]) }}" class="w-full mb-4" enctype="multipart/form-data">
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
                                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="names" :value="$app->names" required autocomplete="name" placeholder="Amazina yombi" />
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

                                        <!-- Course -->
                                        <div class="mt-6">
                                            <x-input-label for="course" :value="__('Select One Course')" />
                                            <small>Hitamo isomo rimwe wifuza kwiga</small>
                                            <select class="block mt-1 w-full border rounded" name="course">
                                                <option value="MULTIMEDIA" {{ $app->course == 'MULTIMEDIA' ? 'selected' : '' }}>MULTIMEDIA</option>
                                                <option value="HOSPITALITY" {{ $app->course == 'HOSPITALITY' ? 'selected' : '' }}>HOSPITALITY</option>
                                                <option value="FILMMAKING AND VIDEO PRODUCTION" {{ $app->course == 'FILMMAKING AND VIDEO PRODUCTION' ? 'selected' : '' }}>FILMMAKING AND VIDEO PRODUCTION</option>
                                                <option value="PHOTOGRAPHY AND GRAPHIC DESIGN" {{ $app->course == 'PHOTOGRAPHY AND GRAPHIC DESIGN' ? 'selected' : '' }}>PHOTOGRAPHY AND GRAPHIC DESIGN</option>
                                                <option value="JOURNALISM AND COMMUNUCATION" {{ $app->course == 'JOURNALISM AND COMMUNUCATION' ? 'selected' : '' }}>JOURNALISM AND COMMUNUCATION</option>
                                                <option value="MUSIC" {{ $app->course == 'MUSIC' ? 'selected' : '' }}>MUSIC</option>
                                                <option value="COMPUTER" {{ $app->course == 'COMPUTER' ? 'selected' : '' }}>COMPUTER</option>
                                                <option value="ENGLISH" {{ $app->course == 'ENGLISH' ? 'selected' : '' }}>ENGLISH</option>
                                                <option value="FRENCH" {{ $app->course == 'FRENCH' ? 'selected' : '' }}>FRENCH</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('course')" class="mt-2" />
                                        </div>

                                        <!-- Education level -->
                                        <div class="mt-6">
                                            <x-input-label for="edu_level" :value="__('Level Of Education')" />
                                            <small>Ikiciro cy'amashuri</small>
                                            <select class="block mt-1 w-full border rounded" name="edu_level" required>
                                                <option value="Primary Level" {{ $app->edu_level == 'Primary Level' ? 'selected' : '' }}>Primary Level</option>
                                                <option value="Ordinary Level (O'Level)" {{ $app->edu_level == "Ordinary Level (O'Level)" ? 'selected' : '' }}>Ordinary Level (O'Level)</option>
                                                <option value="Advanced Level (A'Level)" {{ $app->edu_level == "Advanced Level (A'Level)" ? 'selected' : '' }}>Advanced Level (A'Level)</option>
                                                <option value="University" {{ $app->edu_level == 'University' ? 'selected' : '' }}>University</option>
                                                <option value="Other Certificate" {{ $app->edu_level == 'Other Certificate' ? 'selected' : '' }}>Other Certificate</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('edu_level')" class="mt-2" />
                                        </div>

                                        <!-- Confirm -->
                                        <div class="mt-6">
                                            <x-input-label for="confirm" :value="__('Is it you first time to apply at KSP RWANDA?')" />
                                            <small>Ni inshuro y'ambere usabye kwiga muri KSP RWANDA?</small>
                                            <select class="block mt-1 w-full border rounded" name="confirm" required>
                                                <option value="Yes" {{ $app->first_time == 'Yes' ? 'selected' : '' }}>Yes</option>
                                                <option value="No" {{ $app->first_time == 'No' ? 'selected' : '' }}>No</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('confirm')" class="mt-2" />
                                        </div>

                                        <!-- Place -->
                                        <div class="mt-6">
                                            <x-input-label for="place" :value="__('Which Place will you get a course?')" />
                                            <small>Urifuza kwigira he?</small>
                                            <select class="block mt-1 w-full border rounded" name="place" required>
                                                <option value="Kigali City (Centre Saint Paul)" {{ $app->place == 'Kigali City (Centre Saint Paul)' ? 'selected' : '' }}>Kigali City (Centre Saint Paul)</option>
                                                <option value="Kayonza District (Kayonza Youth Friendly Center)" {{ $app->place == 'Kayonza District (Kayonza Youth Friendly Center)' ? 'selected' : '' }}>Kayonza District (Kayonza Youth Friendly Center)</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('place')" class="mt-2" />
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
                                        <h2>Academioc docs</h2>
                                        <div class="p-2 border rounded mt-2">
                                            <div class="file">
                                                <a href="{{ asset($app->certificate) }}" class="f-20">{{ $ac_docs }}</a>
                                            </div>
                                            <!-- <div class="flex justify-between px-2 mt-1">
                                                <a href="" class="replace">Replace</a>
                                                <a href="" class="del">Delete</a>
                                            </div> -->
                                        </div>    
                                    </div>

                                    <div class="mt-4">
                                        <h2>Application Letter</h2>
                                        <div class="p-2 border rounded mt-2">
                                            <div class="file">
                                                <a href="{{ asset($app->app_letter) }}" class="f-20">{{ $app_letter }}</a>
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

                                    @if($agent)
                                    <div class="mgn ">
                                        <h2 class="mb-2">Agent</h2>
                                        <a href="{{ route('agent.info', ['agt'=>$app->promo_code]) }}" class="">
                                            <div class="border rounded p-3 d-flex justify-between items-center">
                                                <div class="">
                                                {{ $agent-> name }}  <br>
                                                <p class="text-muted mb-0">Email: {{ $agent->email }} </p>
                                                <p class="text-muted mb-0">Phone: {{ $agent->phone }}</p>
                                                </div>
                                                <div class="">
                                                <p class="text-muted mb-0 mt-3">Promo code: {{ $agent->promo_code }}</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    @endif
                            </div>

                        </div>

                        @if(!Auth::user()->type == 'AGT' && $app->status != 'Approved' && $app->unavailable != 'yes')
                            <div class="mt-8 flex justify-end gap-3">
                                <a href="{{ route('edu.unreachable', ['app'=> $app->app_id]) }}" class="btn btn-info">Mark unrechable</a>
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
                    <form action="{{ route('edu.deny', ['app'=>$app->app_id]) }}" method="post" class="mt-3">
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