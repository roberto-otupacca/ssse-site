<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{session('settings')->where('name', 'darkmode')->firstWhere('val')->val}}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>404</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/hoverlink.css') }}">
        
        <link rel="stylesheet" href="{{ asset('css/all.css') }}" />
                
        <link href="https://fonts.googleapis.com/css2?family=Hind:wght@400;600;700&display=swap" rel="stylesheet">

    </head>
    <body class="min-h-screen flex flex-col font-sans">
      <main class="flex items-center justify-center h-screen bg-sssebackground dark:bg-sssebackground-dark">
        <div class="p-4 space-y-4">
          <div class="flex flex-col items-start space-y-3 md:flex-row sm:space-y-0 md:items-center sm:space-x-3">
            <p class="font-semibold text-red-500 text-9xl dark:text-red-600 pb-2">404</p>
            <div class="space-y-2">
              <h1 id="pageTitle" class="flex items-center space-x-2 text-red-600">
                <i class="fas fa-exclamation-triangle fa-lg"></i>
                <span class="text-2xl font-medium text-gray-600 dark:text-gray-800">
                  Pagina non valida.
                </span>
              </h1>
              <p class="text-lg font-normal text-gray-600 dark:text-gray-200">
                La pagina che hai cercato non esiste o è stata eliminata.
              </p>
              <p class="text-lg font-normal text-gray-600 dark:text-gray-200 group-link-underline">
                Vai alla
                <a href="{{url('/')}}" class="text-blue-600 font-semibold pb-1 dark:text-white link-underline-white">pagina principale della SSSE (Scuola specializzata superiore di economia)</a> 
              </p>
            </div>
          </div>
        </div>
      </main>
  </body>
</html>