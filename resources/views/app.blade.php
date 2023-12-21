<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%2210 0 100 100%22><text y=%22.90em%22 font-size=%2290%22>🍟</text></svg>">   
    <script>
      window.Laravel = {
          csrfToken: '{{ csrf_token() }}',
          app_key : '{{ env("APP_KEY") }}'
        }
                
      @auth
        let user = {{ Js::from(auth()->user()) }};
        let token = {{ Js::from(session('token')) }};
        window.Auth = {
          user,token
        }
      @endauth
  </script>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    {{-- <link rel="stylesheet" href="/build/assets/app-3c9ed82b.css "> --}}
    {{-- <link rel="stylesheet" href="/build/assets/app-8f296642.css"> --}}
    {{-- <script src="/build/assets/app-910843ea.js" type="module"></script> --}}
    @inertiaHead
  </head>
  <body class="bg-gray-100">
    @inertia
  </body>
</html>