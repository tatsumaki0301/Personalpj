<head>
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>


<x-guest-layout>
        <div class="nav_area">
            <nav class="nav" id="nav">
                <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/register">Registrastion</a>
                    </li>
                <li><a href="/login">Login</a></li>
                </ul>
            </nav>
            <div class="nav_title">
                <div class="menu" id="menu">
                <span class="menu_line--top"></span>
                <span class="menu_line--middle"></span>
                <span class="menu_line--bottom"></span>
                </div>
                <h1 class="title_item">Rese</h1>
            </div>
        </div>

    <x-auth-card>
        <x-slot name="logo">
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="person/dashboard">
            @csrf

            <div class="login-text-area">
                Login(店舗代表者)
            </div>

            <!-- Email Address -->
            <div style="display: flex;">
                <img src="{{asset('img/mail.png')}}" 
                style="width: 50px; margin: 30 -20 0 10;">

                <x-label for="email" :value="__('email')" style="margin: 40 0 0 20;  border-bottom: 0.5px solid; width: 60px;" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus style="border: none; border-bottom: 0.5px solid; border-radius: 0; margin-top: 20px; margin-right: 20px;" />
            </div>

            <!-- Password -->
            <div class="mt-4" style="display: flex;">

                <img src="{{asset('img/key2.png')}}" 
                style="width: 40px; margin: 30 -15 0 15;">

                <x-label for="password" :value="__('Password')" style="margin: 40 0 0 20;  border-bottom: 0.5px solid; width: 100px;"  />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" style="border: none; border-bottom: 0.5px solid; border-radius: 0; margin-top: 20px; margin-right: 20px;" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                @endif
                <x-button class="ml-3" style="background-color: blue; margin-right: 20px; font-size: 16px;" >
                    {{ __('ログイン') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
    <script src="{{ mix('js/main.js') }}"></script>
</x-guest-layout>
