    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __(Auth::user()->type == "AGT" ? 'My Applications' : 'Applications') }}
            </h2>
        </x-slot>

        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="table-responsive">

                        @if(Auth::user()->type == 'AGT')

                        <div class="card mb-4">
                            <div class="card-header-tab card-header py-3 d-flex items-center">
                                <div class="card-header-title font-size-lg font-weight-normal col-lg-7">
                                    {{ Auth::user() -> name }}  <br>
                                    <p class="text-muted mb-0">{{ Auth::user() -> email }} </p>
                                    <p class="text-muted mb-0">{{ Auth::user() -> phone }}</p>
                                    <p class="text-muted mb-0 mt-3">Promo code: {{ Auth::user() -> promo_code }}</p>

                                    </div>
                                    <div class="btn-actions-pane-right d-flex flex-row-reverse text-capitalize col-lg-5">

                                    <div class="widget-chart-content ml-2 px-3">
                                        <div class="widget-subheading">Balance <small>(RWF)</small></div>

                                        <div class="widget-numbers text-success mt-1 f2"><span style="font-weight: 600">{{ number_format($balance) }}</span></div>
                                    </div>

                                    <div class="icon-wrapper d-flex align-items-center justify-content-center">
                                        <div class="icon-wrapper-bg opacity-9 rounded-circle" style="background: #80ffaa; padding: 15px 17px">
                                            <i  class="fa-solid fa-wallet" style="font-size: 25px"></i>
                                        </div>
                                    </div>

                                </div>                    
                            </div>
                        </div>

                        <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">

                            <!-- Primary Navigation Menu -->
                            <div class="">
                                <div class="flex justify-between h-16 border-b mb-4">
                                    <div class="flex p-0">

                                        <!-- Navigation Links -->
                                        <div class="space-x-8 sm:-my-px ms-4 sm:flex">
                                            <x-nav-link :href="route('edu-apps')" :active="request()->routeIs('edu-apps') || request()->routeIs('dashboard')">
                                                {{ __('Educational Apps' . '  (' . number_format(count($apps)) . ')') }}
                                            </x-nav-link>

                                            <x-nav-link :href="route('mytalent')" :active="request()->routeIs('mytalent')">
                                                {{ __('My Talent Apps' . '  (' . number_format($myTalentApps) . ')') }}
                                            </x-nav-link>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </nav>

                        @else

                        <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">

                                <!-- Primary Navigation Menu -->
                                <div class="">
                                    <div class="flex justify-between h-16 border-b mb-4">
                                        <div class="flex p-0">

                                            <!-- Navigation Links -->
                                            <div class="space-x-8 sm:-my-px ms-4 sm:flex">
                                                <x-nav-link :href="route('admin.edu-apps')" :active="request()->routeIs('admin.edu-apps') || request()->routeIs('dashboard')">
                                                    {{ __('Educational Apps' . '  (' . number_format(count($apps)) . ')') }}
                                                </x-nav-link>

                                                <x-nav-link :href="route('admin.mytalent')" :active="request()->routeIs('admin.mytalent')">
                                                    {{ __('My Talent Apps' . '  (' . number_format($myTalentApps) . ')') }}
                                                </x-nav-link>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </nav>

                        @endif

                        <div class="d-flex justify-content-between align-items-center">
                        @if(count($apps) > 0)
                            <form action="{{ route('agents') }}" method="GET">
                                <x-text-input type="text" name="key" placeholder="Search..." value="{{ request('key') }}"/>
                                <button type="submit" class="btn btn-primary">Search</button>
                            </form>
                        @endif
                        <div>

                        @if(!Auth::user()->type == 'AGT')
                            <a href="{{ route('apply') }}" class="btn btn-primary">New Application</a>
                        @else
                            <!-- <a href="{{ route('mytalent-apply') }}" class="btn btn-primary">New application</a> -->
                        @endif

                        </div>
                        </div>
                            @if(count($apps) > 0)
                            <table class="table align-middle mb-0 bg-white mt-4" id="" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Names</th>
                                        <th>Phone number</th>
                                        <th>Email</th>
                                        <th>Course</th>
                                        <th>Education Level</th>
                                        <th>Application Letter</th>
                                        <th>Certificate</th>
                                        <th>Receipt</th>
                                        <th>Applied on</th>
                                        <th>Agent</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                    <th>Names</th>
                                        <th>Phone number</th>
                                        <th>Email</th>
                                        <th>Course</th>
                                        <th>Education Level</th>
                                        <th>Application Letter</th>
                                        <th>Certificate</th>
                                        <th>Receipt</th>
                                        <th>Applied on</th>
                                        <th>Agent</th>
                                        <th>Status</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($apps as $app)
                                    <tr>
                                        <td>{{ $app->names }}</td>
                                        <td>{{ $app->email }}</td>
                                        <td>{{ $app->phone }}</td>
                                        <td>{{ $app->course }}</td>
                                        <td>{{ $app->edu_level }}</td>
                                        <td><a href="{{ asset($app->app_letter) }}">View App letter</a></td>
                                        <td><a href="{{ asset($app->certificate) }}">View Certificate</a></td>
                                        <td><a href="{{ asset($app->receipt) }}">View Receipt</a></td>
                                        <td>{{ $app->created_at }}</td>
                                        <td>
                                        <a href="{{$app->promo_code != '' ? route('agent.info', ['agt'=>$app->promo_code]) : '#' }}" class="">
                                            {{ $app->promo_code != "" ? $app->promo_code : 'N/A' }}
                                        </a>
                                        </td>
                                        <td>
                                        <span class="px-2 py-1 badge 
                                            {{ $app->status == 'Pending' ? 'badge-warning' : 
                                                ($app->status == 'Denied' ? 'badge-danger' : 'badge-success') }}">
                                            {{ $app->status }}
                                        </span> <br>

                                            @if($app->unavailable == 'yes')
                                                <span class="px-2 py-1 badge badge-secondary">
                                                    Was not awailable
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            {{ $apps->links() }} 

                            @else
                                <div class="mt-3">
                                    You have no applications yet. 
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </x-app-layout>
