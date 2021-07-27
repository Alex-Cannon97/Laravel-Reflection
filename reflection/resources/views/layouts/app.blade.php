<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Company management</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <script src="https://kit.fontawesome.com/be4ae0c476.js" crossorigin="anonymous"></script>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script>
            function myFunction(){
                if(!confirm("Are you sure you want to delete this company?"))
                event.preventDefault();
            }
        </script>
        <script>
           function employeeDelete(){
               if(!confirm("Are you sure you want to delete this employee?"))
               event.preventDefault();
                    }
        </script>
        <script>
           function modalShow(){
               const greyOverlay = document.querySelector(".grey-background")
               const Modal = document.querySelector(".modal")

               greyOverlay.classList.remove('no-display')
               Modal.classList.remove('no-display')
                    }
        </script>
          <script>
           function modalShow2(){
               const greyOverlay = document.querySelector(".grey-background2")
               const Modal = document.querySelector(".modal2")

               greyOverlay.classList.remove('no-display')
               Modal.classList.remove('no-display')
                    }
        </script>
        <script>
           function modalClose(){
               const greyOverlay = document.querySelector(".grey-background")
               const Modal = document.querySelector(".modal")

               greyOverlay.classList.add('no-display')
               Modal.classList.add('no-display')
                    }
        </script>
          <script>
           function modalClose2(){
               const greyOverlay = document.querySelector(".grey-background2")
               const Modal = document.querySelector(".modal2")

               greyOverlay.classList.add('no-display')
               Modal.classList.add('no-display')
                    }
        </script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
