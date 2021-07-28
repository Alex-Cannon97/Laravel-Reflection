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
                    <button onclick="return modalShow();" class="add-new-btn">Add new business</button>
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
                        <td class="cell-data text-center">{{$company['id']}}</td>
                        <td class="cell-data text-center">{{$company['Name']}}</td>
                        <td class="cell-data">{{$company['email']}}</td>
                        <td class="cell-data text-center">@if ($company['logo'] != "")
                            1
                            @else
                            0
                        @endif    
                        </td>
                        <td class="cell-data">{{$company['website']}}</td>
                        <td class="button-table"><a href="/companies/{{$company['id'] }}/Name" class="table-btn read"><i class="far fa-eye"></i></a>  <a onclick="return myFunction();" href="{{url('delete/'.$company['id']) }}" class="table-btn delete"><i class="fas fa-trash"></i></a></td>
                    </tr>
                    @endforeach
                </table>
            </div> 
            <div class="paginate-links">
                {{ $companies->links() }}
            </div>
        </div>
        <div class="grey-background no-display">
            <div class="modal no-display">
                <div class="modal-header">
                    <div class="main-header"><x-application-logo class="block h-20 w-20 fill-current text-gray-600" /><h3 class="move">Add Company Details:</h3></div>
                    <div onclick="return modalClose();" class="close-header"><span class="close">X</span></div>
                </div>
                <div class="modal-form">
                    <form method="POST" class="add-company-form" action="companies/store" enctype="multipart/form-data">
                        @csrf
                        <label for="company-name" class="modal-lable">Company Name: <span class="required">*</span></label>
                        <input class="company-name" type="text" name="company-name" required="required">
                        <label for="company-email" class="modal-lable">Company Email: <span class="required">*</span></label>
                        <input class="company-email" type="text" name="company-email" required="required">
                        <label for="company-logo" class="modal-lable">Company Logo: <span class="required">*</span></label>
                        <input class="company-logo" type="file" name="company-logo" required="required">
                        <label for="company-website" class="modal-lable">Company Website: <span class="required">*</span></label>
                        <input class="company-website" type="text" name="company-website" required="required">
                        <button type="submit" class="add-new-company">Add New Company</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="grey-background3 no-display">
            <div class="error-modal no-display">
                <h2>ERROR!</h2>
                <p>Company already exists!<br> Please check the information entered.</p>
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
