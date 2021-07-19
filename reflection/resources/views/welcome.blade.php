<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Company management</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="/style.css">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>
            <div class="header">
                <h1>Company Managment Board</h1>
                <button class="log-out">Log Out</button>
            </div>
            <div class="container">
                <div class="title">
                    <h2>Company Table:</h2>
                    <button class="add-new">Add New Entry</button>
                </div>
                <div class="table"></div>
            </div>
    </body>
</html>
