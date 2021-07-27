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
                            <a href="/companies/{{$employee->foreign_id}}/employees"><i class="fas fa-arrow-circle-left back-icon"></i></a>
                            <a><h2 class="comp-text pad-left">{{$employee->firstName}} {{$employee->lastName}}</h2></a>
                        </div>
                        <button onclick="return modalShow2()" class="update">Update Employee</button>
                    </div>
                </div>
                <div class="information-content">
                    <div class="info-sections">
                        <h2 class="title">Company Information</h2>
                        <div>
                            <p class="acc-info">ID: {{$employee->company->id}}</p>
                            <p class="acc-info">Company Name: {{$employee->company->Name}}</p>
                            <p class="acc-info">Company Email: {{$employee->company->email}}</p>
                            <p class="acc-info">Logo: <img src="/storage/images/{{$employee->company->logo}}"></p>
                            <p class="overflow acc-info">Company Website: {{$employee->company->website}}</p>
                        </div>
                    </div>
                    <div class="info-sections">
                        <h2 class="title">Employee Information</h2>
                        <div>
                            <p class="acc-info">First Name: {{$employee->firstName}}</p>
                            <p class="acc-info">Last Name: {{$employee->lastName}}</p>
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
                    <div onclick="return modalClose2();" class="close-header"><span class="close">X</span></div>
                </div>
                <div class="modal-form">
                    <form method="POST" class="add-company-form" action="/employees/{{$employee->id}}/update" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <label for="firstName" class="modal-lable">First Name: <span class="required">*</span></label>
                        <input value="{{ $employee->firstName }}" class="First-Name" type="text" name="firstName" required="required">
                        <label for="lastName" class="modal-lable">Last Name: <span class="required">*</span></label>
                        <input value="{{ $employee->lastName }}" class="Last-Name" type="text" name="lastName" required="required">
                        <label for="email" class="modal-lable">Employee Email: <span class="required">*</span></label>
                        <input value="{{ $employee->email }}" class="Employee-Email" type="text" name="email" required="required">
                        <label for="phone" class="modal-lable">Employee Phone: <span class="required">*</span></label>
                        <input value="{{ $employee->phone }}" class="Employee-Phone" type="text" name="phone" required="required">
                        <button type="submit" class="add-new-company">Update Employee</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>