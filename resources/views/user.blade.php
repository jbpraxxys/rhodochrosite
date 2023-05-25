<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scrollbar-style overflow-x-hidden">
    <head>
        <meta name="base" content="{{ url('/') }}">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <meta property="og:type" content="website">
        <meta name="twitter:card" content="summary"></meta>

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/user.css') }}">

        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/favicon/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/favicon/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/favicon/favicon-16x16.png') }}">
        <meta name="msapplication-TileColor" content="#010066">
        <meta name="theme-color" content="#010066">

        <!-- Scripts -->
        @routes
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        @inertia

        <!-- Facebook/Messenger Chat Code Snippet --> 

        @if(config('app.facebook_chat'))

        <div id="fb-root"></div>


        <div id="fb-customer-chat" class="fb-customerchat">

        </div>

        <script>

        var chatbox = document.getElementById('fb-customer-chat');

        chatbox.setAttribute("page_id", "{{ $api_keys->content['facebook_facebook_page_id'] }}");

        chatbox.setAttribute("attribution", "biz_inbox");

        </script>

        <script>

        window.fbAsyncInit = function() {
            FB.init({
            xfbml: true,
            version : 'v13.0'
            });

        };


        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];

            if (d.getElementById(id)) return;

            js = d.createElement(s); js.id = id;

            js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';

            fjs.parentNode.insertBefore(js, fjs);

        }(document, 'script', 'facebook-jssdk'));

        </script>
        @endif
        <!-- End of Facebook Chat Code Snippet --> 

        <!-- Google Analytics Code Snippet --> 
        @if(config('app.google_analytics'))
        <!-- Google Tag Manager -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ $api_keys->content['googleanalytics_googleanalytics'] }}"></script>
        <script>

            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', '{{ $api_keys->content['googleanalytics_googleanalytics'] }}');
            
        </script>
        <!-- End Google Tag Manager -->
        @endif
        <!-- End of Google Analytics Code Snippet --> 


        <!-- Tawk.to Code Snippet --> 
        @if(config('app.tawkto'))
        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
            var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
            (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/{{ $api_keys->content['tawkto_tawkto_link'] }}/default';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
            })();
        </script>
        <!--End of Tawk.to Script-->
        @endif
        <!-- End of Tawk.to Code Snippet --> 

        @env ('local')
            <script src="http://localhost:3000/browser-sync/browser-sync-client.js"></script>
        @endenv

        <script src='https://www.google.com/recaptcha/api.js' async defer></script>
    </body>
</html>
