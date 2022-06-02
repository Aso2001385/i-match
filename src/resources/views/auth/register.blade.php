@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('新規登録') }}</div>

                <div class="card-body mt-3 m-5">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3 m-5">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('ニックネーム') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 m-5">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('メールアドレス') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 m-5">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('パスワード') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 m-5">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('確認パスワード') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div id="loginButton-container" style="float:right;margin-right:25%;">
                            <button type="submit" class="btn btn-primary" style="width:6rem;height:2.5rem;">
                                {{ __('新規登録') }}
                            </button>
                        </div>
                        <div id="signupUrl-container" style="margin-left:35%;">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('ログイン') }}</a>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
