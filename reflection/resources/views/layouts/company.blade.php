
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
                    <div class="tab-flex">
                        <a href="./Name"><h2 class="comp-text pad-left">{{$companies['Name']}}</h2></a>
                        <a href="./employees"><h2 class="comp-text pad-left">Employees</h2></a>
                    </div>    
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
                        <td class="cell-data center width">{{$companies['id']}}</td>
                        <td class="cell-data center width">{{$companies['Name']}}</td>
                        <td class="cell-data center width">{{$companies['email']}}</td>
                        <td class="cell-data center width"><img src="/storage/{{$companies['logo']}}"></td>
                        <td class="cell-data center width">{{$companies['website']}}</td>
                        <td class="button-table"><button class="table-btn edit"><i class="far fa-edit"></i></button> <a onclick="return myFunction();" href="{{url('delete/'.$companies['id']) }}" class="table-btn delete"><i class="fas fa-trash"></i></a></td>
                    </tr>
                </table>
            </div> 
        </div>
    </div>
</x-app-layout>