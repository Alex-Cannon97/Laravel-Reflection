
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Company Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="inner-cont p-6 bg-white border-b border-gray-200">
                    <a href="companies/{companies:id}"><h2 class="comp-text pad-left">{{$companies['Name']}}</h2></a>
                    <a href="{{$companies['Name']}}/employees"><h2 class="comp-text pad-left">Employees</h2></a>
                </div>
                <table class="comp-table-cont">
                    <tr>
                        <th>ID</th>
                        <th>Company Name</th>
                        <th>Email:</th>
                        <th>Logo</th>
                        <th>Website</th>
                    </tr>
                    <tr class="clean">
                        <td class="cell-data center">{{$companies['id']}}</td>
                        <td class="cell-data center">{{$companies['Name']}}</td>
                        <td class="cell-data center">{{$companies['email']}}</td>
                        <td class="cell-data center">{{$companies['logo']}}</td>
                        <td class="cell-data center">{{$companies['website']}}</td>
                    </tr>
                </table>
            </div> 
        </div>
    </div>
</x-app-layout>