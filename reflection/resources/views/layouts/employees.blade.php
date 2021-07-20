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
                        <a href="./Name"><h2 class="comp-text pad-left">{{$employees[1]['company']}}</h2></a>
                        <a href="./employees"><h2 class="comp-text pad-left">Employees</h2></a>
                    </div>
                    <button class="employee-btn">Add new employee</button>
                </div>
                <table class="comp-table-cont">
                    <tr>
                        <th>FirstName</th>
                        <th>LastName</th>
                        <th>Email:</th>
                        <th>phone</th>
                        <th>UpdatedAt</th>
                    </tr>
                    @foreach($employees as $employee)
                    <tr class="clean">
                        <td class="cell-data width">{{$employee['firstName']}}</td>
                        <td class="cell-data width">{{$employee['lastName']}}</td>
                        <td class="cell-data width">{{$employee['email']}}</td>
                        <td class="cell-data width">{{$employee['phone']}}</td>
                        <td class="cell-data width">{{$employee['updated_at']}}</td>
                        <td class="button-table"><button class="table-btn edit"><i class="far fa-edit"></i></button><a href="{{url('delete/'.$employee['id']) }}" class="table-btn delete"><i class="fas fa-trash"></i></a></td>
                    </tr>
                    @endforeach
                </table>
            </div> 
            <div class="paginate-links">
                {{ $employees->links() }}
            </div>
        </div>
    </div>
</x-app-layout>