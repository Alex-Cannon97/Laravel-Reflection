<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employee Overview') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="inner-cont p-6 bg-white border-b border-gray-200">
                    <div class="tab-flexy">
                        <div class="name-tabs">
                            <a href="/companies/{{$employee->company_id}}/employees"><i class="fas fa-arrow-circle-left back-icon"></i></a>
                            <a><h2 class="comp-text pad-left">{{$employee->first_name}} {{$employee->last_name}}</h2></a>
                        </div>
                        <button onclick="return UpdateCompanyorEmployeeModal()" class="update">Update Employee</button>
                    </div>
                </div>
                <div class="information-content">
                    <div class="info-sections">
                        <h2 class="title">Company Information</h2>
                        <div>
                            <p class="acc-info">ID: {{$employee->company->id}}</p>
                            <p class="acc-info">Company name: {{$employee->company->name}}</p>
                            <p class="acc-info">Company Email: {{$employee->company->email}}</p>
                            <p class="acc-info">Logo: <img src="/storage/images/{{$employee->company->logo}}"></p>
                            <p class="overflow acc-info">Company Website: {{$employee->company->website}}</p>
                        </div>
                    </div>
                    <div class="info-sections">
                        <h2 class="title">Employee Information</h2>
                        <div>
                            <p class="acc-info">First name: {{$employee->first_name}}</p>
                            <p class="acc-info">Last name: {{$employee->last_name}}</p>
                            <p class="acc-info">Personal Email: {{$employee->email}}</p>
                            <p class="acc-info">Personal Phone: {{$employee->phone}}</p>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        <div class="grey-background2 no-display ">
            <div class="modal2 no-display">
                <div class="modal-header">
                    <div class="main-header"><x-application-logo class="block h-20 w-20 fill-current text-gray-600" /><h3 class="move">Update Employee Details:</h3></div>
                    <div onclick="return UpdateCompanyorEmployeeModalClose();" class="close-header"><span class="close">X</span></div>
                </div>
                <div class="modal-form">
                    <form method="POST" class="add-company-form" action="/employees/{{$employee->id}}/update" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <label for="firstName" class="modal-lable">First name: <span class="required">*</span></label>
                        <input value="{{ $employee->first_name }}" class="First-name" type="text" name="first_name" required="required">
                        <label for="lastName" class="modal-lable">Last name: <span class="required">*</span></label>
                        <input value="{{ $employee->last_name }}" class="Last-name" type="text" name="last_name" required="required">
                        <label for="email" class="modal-lable">Employee Email: <span class="required">*</span></label>
                        <input value="{{ $employee->email }}" class="Employee-Email" type="text" name="email" required="required">
                        <label for="phone" class="modal-lable">Employee Phone: <span class="required">*</span></label>
                        <input value="{{ $employee->phone }}" class="Employee-Phone" type="text" name="phone" required="required">
                        <button type="submit" class="add-new-company">Update Employee</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="grey-background3 no-display">
            <div class="error-modal no-display">
                <h2>ERROR!</h2>
                <p>Employee already exists!<br> Please check the information entered.</p>
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