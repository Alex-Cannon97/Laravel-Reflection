<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employee Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="inner-cont p-6 bg-white border-b border-gray-200">
                    <div class="tab-flex">
                    <div>
                        <a href="/"><i class="fas fa-arrow-circle-left back-icon"></i></a>
                        </div>
                        <div>
                            <a href="./Details"><h2 class="comp-text pad-left">{{$company->Name}}</h2></a>
                        </div>
                        <div>
                            <a href="./employees" class="@if(strpos(url()->current(), '/employees') != '' && strpos(url()->current(), '/Details') == '')currentlyActive @endif"><h2 class="comp-text pad-left">Employees</h2></a>
                        </div>
                    </div>
                    <button onclick="return AddNewCompanyorEmployeeModal();" class="employee-btn">Add new employee</button>
                </div>
                <table class="comp-table-cont">
                    <tr>
                        <th>FirstName</th>
                        <th>LastName</th>
                        <th>Email</th>
                        <th>phone</th>
                        <th>UpdatedAt</th>
                        <th></th>
                    </tr>
                    @foreach($employees as $employee)
                    <tr class="clean">
                        <td class="cell-data width">{{$employee['first_name']}}</td>
                        <td class="cell-data width">{{$employee['last_name']}}</td>
                        <td class="cell-data width">{{$employee['email']}}</td>
                        <td class="cell-data width">{{$employee['phone']}}</td>
                        <td class="cell-data width">{{$employee['updated_at']}}</td>
                        <td class="button-table"><a href="/employees/{{$employee['id'] }}" class="table-btn read"><i class="far fa-eye"></i></a><a onclick="return employeeDelete();" href="{{url('deletes/'.$employee['id']) }}" class="table-btn delete"><i class="fas fa-trash"></i></a></td>
                    </tr>
                    @endforeach
                </table>
            </div> 
            <div class="paginate-links">
                {{ $employees->links() }}
            </div>
        </div>
        <div class="grey-background no-display ">
            <div class="modal no-display">
                <div class="modal-header">
                    <div class="main-header"><x-application-logo class="block h-20 w-20 fill-current text-gray-600" /><h3 class="move">Add Employee Details:</h3></div>
                    <div onclick="return AddNewCompanyorEmployeeModalClose();" class="close-header"><span class="close">X</span></div>
                </div>
                <div class="modal-form">
                    <form method="POST" class="add-company-form" action="store">
                        @csrf
                        <label for="First-Name" class="modal-lable">First Name: <span class="required">*</span></label>
                        <input id="First-Name" class="First-Name" type="text" name="first_name" required="required">
                        <label for="Last-Name" class="modal-lable">Last Name: <span class="required">*</span></label>
                        <input class="Last-Name" type="text" name="last_name" required="required">
                        <label for="Employee-Email" class="modal-lable">Employee Email: <span class="required">*</span></label>
                        <input class="Employee-Email" type="text" name="email" required="required">
                        <label for="Employee-Phone" class="modal-lable">Employee Phone: <span class="required">*</span></label>
                        <input class="Employee-Phone" type="text" name="phone" required="required">
                        <button type="submit" class="add-new-company">Add New Employee</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="grey-background3 no-display">
            <div class="error-modal no-display">
                <h2>ERROR!</h2>
                @if($errors->any())
                @foreach($errors->all() as $error)
                <p>{{$error}}</p>
                @endforeach
                @endif
                <button onclick="return errormodalClose()">Okay</button>
            </div>
        </div>
    </div>
    @if($errors->any())
<script>
function errormodalShow(){
               const greyOverlay = document.querySelector(".grey-background3")
               const Modal = document.querySelector(".error-modal")

               greyOverlay.classList.remove('no-display')
               Modal.classList.remove('no-display')
                    }
                    errormodalShow();
</script>
@endif
</x-app-layout>