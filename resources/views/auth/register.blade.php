@extends('layouts.auth')
@section('title')
    {{__('Login Admin Panel')}}
@endsection
@section('content')





    <form method="POST" action="{{ route('register') }}">
        @csrf
        <span class="login100-form-title p-b-43">
        {{__('Register ')}}
    </span>

        @if (session('error'))
           <div style="text-align: center;"> <div class="alert alert-danger" id="flash-message">
                {{ session('error') }}
            </div>
           </div>
        @endif

        @if (session('success'))
            <div style="text-align: center;"> <div class="alert alert-danger" id="flash-message">
                    {{ session('success') }}
                </div>
            </div>
        @endif


        <style>
            #flash-message {
                animation: fadeOut 5s forwards;
            }

            @keyframes fadeOut {
                to {
                    opacity: 0;
                    visibility: hidden;
                }
            }

        </style>

        <div class="wrap-input100 validate-input @if($errors->has('nationalId')) error-validation @endif">
            <input class="input100" type="text" name="ref" id="ref"  required>
            <span class="focus-input100"></span>
            <span class="label-input100">{{__('National ID')}}</span>
        </div>

        <div class="wrap-input100 validate-input @if($errors->has('email')) error-validation @endif">
            <input class="input100" type="email" name="email" id="email" value="{{old('email')}}" required>
            <span class="focus-input100"></span>
            <span class="label-input100">{{__('Email')}}</span>
        </div>


        <div class="wrap-input100 validate-input @if($errors->has('password')) error-validation @endif">
            <input class="input100" type="password" name="password" id="password" required>
            <span class="focus-input100"></span>
            <span class="label-input100">{{__('Password')}}</span>
        </div>

        <div class="flex-sb-m w-full p-t-3 p-b-32">
            <div class="contact100-form-checkbox">
                <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember">
                <label class="label-checkbox100" for="ckb1">
                    {{__('Remember Me')}}
                </label>
            </div>

            <div>
                <a href="" class="txt1">
                    {{__('Forgot Password?')}}
                </a>

                <a href="/login" class="txt1">
                    {{__('Login')}}
                </a>
            </div>
        </div>


        <div class="container-login100-form-btn">
            <button class="login100-form-btn" type="submit">
                {{__('Login')}}
            </button>
        </div>


    </form>

    <span class="login100-form-title p-b-30 p-t-30">
    <a href="{{url('/')}}">
        <h5 class="d-inline">
{{--            <i class="fas fa-user-injured"></i>--}}
            {{--            {{__('Login Patient')}}--}}
        </h5>
    </a>
</span>

@endsection

@section('scripts')
@endsection
