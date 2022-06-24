<php use Illuminate\Support\Facades\Auth; ?>
<!doctype html>
 <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
    
     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">
     
<title>{{ config('app.name', 'Vue Laravel SPA') }}</title>
 
     <!-- Styles -->
     <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
     <!-- 追加した -->
 </head>
 <body>
    <div id="app">
        <div>
        @if (1 == 1)
            <div>
                <log-component></log-component>
                <logspace-component></logspace-component>
                <menubar-component></menubar-component>
                <account-component></account-component>
                <router-view></router-view>
            </div>
        @else
            <div>
                <router-view name="account"></router-view>
                <!-- <login-component></login-component> -->
            </div>
        @endif
        </div>
    </div>
    <!-- Scripts -->
  <script src="{{ mix('/js/app.js') }}" defer></script>
 </body>
</html>