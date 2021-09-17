
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
                        <div>
                        <a href="/"><i class="fas fa-arrow-circle-left back-icon"></i></a>
                        </div>
                        <div>
                            <a href="./Details" class="@if(strpos(url()->current(), '/Details') != '' && strpos(url()->current(), '/employees') == '')currentlyActive @endif"><h2 class="comp-text pad-left">{{$companies['name']}}</h2></a>
                        </div>
                        <div>
                            <a href="./employees"><h2 class="comp-text pad-left">Employees</h2></a>
                        </div>
                    </div>    
                </div>
                <table class="comp-table-cont">
                    <tr>
                        <th>ID</th>
                        <th>Company name</th>
                        <th>Email</th>
                        <th>Logo</th>
                        <th>Website</th>
                        <th></th>
                    </tr>
                    <tr class="clean">
                        <td class="cell-data center width">{{$companies['id']}}</td>
                        <td class="cell-data center width">{{$companies['name']}}</td>
                        <td class="cell-data center width">{{$companies['email']}}</td>
                        <td class="cell-data center width"><img src="/storage/images/{{$companies['logo']}}"></td>
                        <td class="cell-data center width">{{$companies['website']}}</td>
                        <td class="button-table"><button onclick="return UpdateCompanyorEmployeeModal()" class="table-btn edit"><i class="far fa-edit"></i></button> <a onclick="return myFunction();" href="{{url('delete/'.$companies['id']) }}" class="table-btn delete"><i class="fas fa-trash"></i></a></td>
                    </tr>
                </table>
            </div> 
        </div>
        <div class="grey-background2 no-display">
            <div class="modal2 no-display">
                <div class="modal-header">
                    <div class="main-header"><x-application-logo class="block h-20 w-20 fill-current text-gray-600" /><h3 class="move">Update Company Details:</h3></div>
                    <div onclick="return UpdateCompanyorEmployeeModalClose();" class="close-header"><span class="close">X</span></div>
                </div>
                <div class="modal-form">
                    <form method="POST" class="add-company-form" action="/companies/{{$companies->id}}/update" enctype="multipart/form-data">
                        @csrf
                        <label for="name" class="modal-lable">Company name: <span class="required">*</span></label>
                        <input class="company-name" type="text" name="name" required="required">
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