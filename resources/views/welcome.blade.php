<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('css/main.css?v=1652870200386') }}">
    </head>
    <body style="padding-left: 0;">
        <section class="is-title-bar">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
              <ul></ul>
              @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-4">
                    @auth
                    <a href="{{ url('/dashboard') }}" class="crmb-4 button blue">
                        Dashboard
                    </a>
                       
                    @else
                    &nbsp;<span style="color:white;"> | </span> &nbsp;
                    <a href="{{ route('login') }}" class="crmb-4 button blue">
                        Log in
                    </a>

                        @if (Route::has('register'))
                        &nbsp;<span style="color:white;"> | </span> &nbsp;
                        <a href="{{ route('register') }}" class="crmb-4 button blue">
                            Register
                        </a>
                        @endif
                    @endauth
                    &nbsp;<span style="color:white;"> | </span> &nbsp;
                    <a href="{{ route('ticket.create') }}" class="crmb-4 button blue">
                        Criar novo Ticket
                    </a>
                    &nbsp;<span style="color:white;"> | </span> &nbsp;
                    <a href="" class="crmb-4 button blue">
                        Os meus tickets
                    </a>
                </nav>
            @endif
            </div>
          </section>

        <section class="section main-section">
            @yield('content')
        </section>

        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif
    </body>
</html>
