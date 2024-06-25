<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Names</th>
                                            <th>Phone number</th>
                                            <th>Email</th>
                                            <th>ID/Passport</th>
                                            <th>Type</th>
                                            <th>Registered on</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Names</th>
                                            <th>Phone number</th>
                                            <th>Email</th>
                                            <th>ID/Passport</th>
                                            <th>Type</th>
                                            <th>Registered on</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>attendee.names</td>
                                            <td>attendee.phone</td>
                                            <td>attendee.email</td>
                                            <td>attendee.identity</td>
                                            <td>attendee.attendee_type</td>
                                            <td>attendee.registered_on</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
