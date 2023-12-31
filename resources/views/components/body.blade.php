<body class="font-sans antialiased bg-dots-darker bg-center bg-slate-300">
    <div class="relative sm:flex sm:justify-center sm:items-center selection:bg-red-500 selection:text-white">
            
        @if (Route::has('login'))
            <div class="sm:sticky sm:top-0 sm:right-0 p-6 w-full text-right bg-white shadow">
                <a class="float-left top-5 left-5" href="{{ route('home') }}"><x-application-logo></x-application-logo></a>
                @auth
                    <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>

    {{$slot}}

</body>
