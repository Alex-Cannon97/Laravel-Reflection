<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flexy-boy p-6 bg-white border-b border-gray-200">
                    <h2 class="comp-text">Companies:</h2>
                    <button class="add-new-btn">Add new business</button>
                </div>
                <table class="comp-table-cont">
                    <tr>
                        <th>ID</th>
                        <th>Company Name</th>
                        <th>Email:</th>
                        <th>Logo</th>
                        <th>Website</th>
                    </tr>
                    @foreach($companies as $company)
                    <tr class="clean">
                        <td class="cell-data">{{$company['id']}}</td>
                        <td class="cell-data">{{$company['Name']}}</td>
                        <td class="cell-data">{{$company['email']}}</td>
                        <td class="cell-data">{{$company['logo']}}</td>
                        <td class="cell-data">{{$company['website']}}</td>
                        <td class="button-table"><a href="/companies/{{$company['id'] }}/Name" class="table-btn read"><i class="far fa-eye"></i></a> <button class="table-btn edit"><i class="far fa-edit"></i></button> <button class="table-btn delete"><i class="fas fa-trash"></i></button></td>
                    </tr>
                    @endforeach
                </table>
            </div> 
            <div class="paginate-links">
                {{ $companies->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
