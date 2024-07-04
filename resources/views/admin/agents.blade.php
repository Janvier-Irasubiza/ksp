<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Agents') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="table-responsive">
                        <div class="d-flex justify-content-between align-items-center">
                        <form action="{{ route('agents') }}" method="GET">
                            <x-text-input type="text" name="key" placeholder="Search..." value="{{ request('key') }}"/>
                            <button type="submit" class="btn btn-primary">Search</button>
                        </form>

                        <div>
                            <a href="{{ route('add-agent') }}" class="btn btn-primary">New agent</a>
                        </div>
                        </div>
                        <table class="table align-middle mb-0 bg-white mt-4" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Promo code</th>
                                    <th>Names</th>
                                    <th>Phone number</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                <th>Promo code</th>
                                    <th>Names</th>
                                    <th>Phone number</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($agents as $agent)
                                <tr>
                                    <td>{{ $agent->promo_code }}</td>
                                    <td>{{ $agent->name }}</td>
                                    <td>{{ $agent->phone }}</td>
                                    <td>{{ $agent->email }}</td>
                                    <td>{{ $agent->address }}</td>
                                    <td><a href="">View Details</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $agents->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
