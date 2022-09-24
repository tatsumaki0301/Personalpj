<style>
    .nav_area{
        margin-bottom: -100px;
        display: flex;
        background-color: whitesmoke;
        padding: 80px 0 0 150px;
    }
    .nav{
        position: absolute;
        height: 100vh;
        width: 100%;
        left: -100%;
        background: WhiteSmoke;
        transition: .7s;
        text-align: center;
    }
    .nav ul{
        padding-top: 80px;
    }
    .nav ul li{
        list-style-type: none;
        margin-top: 50px;
        font-size: 25px;
        font-weight: bold;
        font-family: serif;
        color: blue;

    }
    .menu{
        display: inline-block;
        width: 36px;
        height: 32px;
        cursor: pointer;
        position: relative;
        left: 20px;
        top: 30px;
        background-color: blue;
        border-radius: 5px;
    }
    .menu_line--top,
    .menu_line--middle,
    .menu_line--bottom {
        display: inline-block;
        width: 100%;
        height: 2px;
        background-color: white;
        position: absolute;
        transition: 0.5s;
    }
    .menu_line--top{
        top: 8px;
        width: 30%;
        right: 15px;
        height: 0.5px;
    }
    .menu_line--middle{
        top: 16px;
        width: 50%;
        right: 8px;
        height: 1px;
    }
    .menu_line--bottom{
        bottom: 8px;
        height: 1px;
        width: 15%;
        right: 18px;
    }
    .menu.open span:nth-of-type(1){
    top: 14px;
    width: 100%;
    left: 0px;
    transform: rotate(45deg);
    }
    .menu.open span:nth-of-type(2){
    opacity: 0;
    }
    .menu.open span:nth-of-type(3){
    top: 14px;
    width: 100%;
    left: 0px;
    transform: rotate(-45deg);
    }
    .in{
    transform: translateX(100%);
    }
    .nav_title{
    display: flex;
    }
    .title_item{
    margin: 25px 0 0 30px;
    font-family: serif;
    color: blue;
    font-size: 30px;
    font-weight: bold;
    }
    .login-text-area{
        background-color: blue;
        color: white;
        padding: 30px 15px;
        margin-bottom: 10px;
    }
</style>

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
                <x-label for="name" :value="__('お名前'.  'Username')" style="margin: 40 0 0 20;  border-bottom: 0.5px solid; width: 150px;"/>

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus style="border: none; border-bottom: 0.5px solid; border-radius: 0; margin-top: 20px; margin-right: 20px;" />
            </div>

            <!-- Email Address -->
            <div class="mt-4" style="display: flex;">
                <x-label for="email" :value="__('メールアドレス'.  'Email')" style="margin: 40 0 0 20;  border-bottom: 0.5px solid; width: 150px;" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required style="border: none; border-bottom: 0.5px solid; border-radius: 0; margin-top: 20px; margin-right: 20px;" />
            </div>

            <!-- Password -->
            <div class="mt-4" style="display: flex;">
                <x-label for="password" :value="__('パスワード'.  'Password')" style="margin: 40 0 0 20;  border-bottom: 0.5px solid; width: 150px;" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" style="border: none; border-bottom: 0.5px solid; border-radius: 0; margin-top: 20px; margin-right: 20px;" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4" style="display: flex;">
                <x-label for="password_confirmation" :value="__('確認用パスワード'.  'Confirm Password')" style="margin: 40 0 0 20;  border-bottom: 0.5px solid; width: 150px;" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required style="border: none; border-bottom: 0.5px solid; border-radius: 0; margin-top: 20px; margin-right: 20px;" />
            </div>

            <div class="flex items-center justify-end mt-4">

                <x-button class="ml-4" style="background-color: blue; margin-right: 20px;padding: 10px 20px;" >
                    {{ __('登録') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
    <script src="{{ mix('js/main.js') }}"></script>
</x-guest-layout>
