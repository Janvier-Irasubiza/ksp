    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Applications') }}
            </h2>
        </x-slot>

        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="table-responsive">
                        <form action="{{ route('dashboard') }}" method="GET">
                            <x-text-input type="text" name="key" placeholder="Search..."/>
                            <button type="submit" class="btn btn-primary">Search</button>
                        </form>
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
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            {{ $apps->links() }} 
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </x-app-layout>
