<head>
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
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

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="login-text-area">
                Registration
            </div>

            <!-- Name -->
            <div style="display: flex;">

                <img src="{{asset('img/jinbutu.png')}}" 
                style="width: 70px; height: 70px; margin: 30 -30 -20 0;">

                <x-label for="name" :value="__('お名前'.  'Username')" style="margin: 40 0 0 20;  border-bottom: 0.5px solid; width: 150px;"/>

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus style="border: none; border-bottom: 0.5px solid; border-radius: 0; margin-top: 20px; margin-right: 20px;" />
            </div>

            <!-- Email Address -->
            <div class="mt-4" style="display: flex;">

                <img src="{{asset('img/mail.png')}}" 
                style="width: 50px; margin: 40 -20 0 10;">

                <x-label for="email" :value="__('メールアドレス'.  'Email')" style="margin: 40 0 0 20;  border-bottom: 0.5px solid; width: 150px;" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required style="border: none; border-bottom: 0.5px solid; border-radius: 0; margin-top: 20px; margin-right: 20px;" />
            </div>

            <!-- Password -->
            <div class="mt-4" style="display: flex;">

                <img src="{{asset('img/key2.png')}}" 
                style="width: 40px; margin: 40 -15 0 15;">

                <x-label for="password" :value="__('パスワード'.  'Password')" style="margin: 40 0 0 20;  border-bottom: 0.5px solid; width: 150px;" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" style="border: none; border-bottom: 0.5px solid; border-radius: 0; margin-top: 20px; margin-right: 20px;" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4" style="display: flex;">

                <img src="{{asset('img/key2.png')}}" 
                style="width: 40px; height: 40px; margin: 50 -15 0 15;">

                <x-label for="password_confirmation" :value="__('確認用パスワード'.  'Confirm Password')" style="margin: 40 0 0 20;  border-bottom: 0.5px solid; width: 150px;" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required style="border: none; border-bottom: 0.5px solid; border-radius: 0; margin-top: 20px; margin-right: 20px;" />
            </div>

            <div class="flex items-center justify-end mt-4">

                <x-button class="ml-4" style="background-color: blue; margin-right: 20px;padding: 10px 20px; font-size: 16px;" >
                    {{ __('登録') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
    <script src="{{ mix('js/main.js') }}"></script>
</x-guest-layout>
