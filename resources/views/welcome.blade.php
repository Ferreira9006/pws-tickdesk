<!DOCTYPE html>
<html lang="en" class="">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard - Admin One Tailwind CSS Admin Dashboard</title>

  <!-- Tailwind is included -->
  <link rel="stylesheet" href="{{ asset('css/main.css?v=1652870200386') }}">

  <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png"/>
  <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png"/>
  <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png"/>
  <link rel="mask-icon" href="safari-pinned-tab.svg" color="#00b4b6"/>

  <meta name="description" content="Admin One - free Tailwind dashboard">

  <meta property="og:url" content="https://justboil.github.io/admin-one-tailwind/">
  <meta property="og:site_name" content="JustBoil.me">
  <meta property="og:title" content="Admin One HTML">
  <meta property="og:description" content="Admin One - free Tailwind dashboard">
  <meta property="og:image" content="https://justboil.me/images/one-tailwind/repository-preview-hi-res.png">
  <meta property="og:image:type" content="image/png">
  <meta property="og:image:width" content="1920">
  <meta property="og:image:height" content="960">

  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:title" content="Admin One HTML">
  <meta property="twitter:description" content="Admin One - free Tailwind dashboard">
  <meta property="twitter:image:src" content="https://justboil.me/images/one-tailwind/repository-preview-hi-res.png">
  <meta property="twitter:image:width" content="1920">
  <meta property="twitter:image:height" content="960">

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-130795909-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-130795909-1');
  </script>

</head>
    <body style="padding: 5% 20% 0 20%;">
        <section class="is-title-bar">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
              <ul></ul>
              @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-4">
                    @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="crmb-4 button blue">Logout</button>
                    </form>
                       
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
                    <a href="{{ route('ticket.list') }}" class="crmb-4 button blue">
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
