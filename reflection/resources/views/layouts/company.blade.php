
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
                        <td class="cell-data center width"><img src="/storage/images/{{$companies['logo']}}"></td>
                        <td class="cell-data center width">{{$companies['website']}}</td>
                        <td class="button-table"><button onclick="return modalShow2()" class="table-btn edit"><i class="far fa-edit"></i></button> <a onclick="return myFunction();" href="{{url('delete/'.$companies['id']) }}" class="table-btn delete"><i class="fas fa-trash"></i></a></td>
                    </tr>
                </table>
            </div> 
        </div>
        <div class="grey-background2 no-display">
            <div class="modal2 no-display">
                <div class="modal-header">
                    <div class="main-header"><x-application-logo class="block h-20 w-20 fill-current text-gray-600" /><h3 class="move">Update Company Details:</h3></div>
                    <div onclick="return modalClose2();" class="close-header"><span class="close">X</span></div>
                </div>
                <div class="modal-form">
                    <form method="POST" class="add-company-form" action="/companies/{{$companies->id}}/update" enctype="multipart/form-data">
                        @csrf
                        <label for="Name" class="modal-lable">Company Name: <span class="required">*</span></label>
                        <input class="company-name" type="text" name="Name" required="required">
                        <label for="email" class="modal-lable">Company Email: <span class="required">*</span></label>
                        <input class="company-email" type="text" name="email" required="required">
                        <label for="logo" class="modal-lable">Company Logo: </label>
                        <input class="company-logo" type="file" name="logo">
                        <label for="website" class="modal-lable">Company Website: <span class="required">*</span></label>
                        <input class="company-website" type="text" name="website" required="required">
                        <button type="submit" class="add-new-company">Update Company</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>