@extends('layouts.app')
@section('title', 'Password')
@section('content')

<section class="bg-body-tertiary">
    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm py-3 px-4">
                        <div class="text-center py-2 mb-3">
                            <p class="mb-0 text-uppercase fw-bold text-secondary">
                                Смена пароля
                            </p>
                        </div>
                        <form class="row gy-3" action="{{url('password')}}" method="post">
                            @csrf
                            <div class="col-12">
                                <label for="emailInp" class="form-label">Email</label>
                                <input type="email" class="form-control" id="emailInp" name="email" value="{{old('email')}}">
                                @error('email')<small class="text-danger">{{$message}}</small>@enderror
                            </div>
                            <div class="col-12">
                                <label for="passInp" class="form-label">Новый пароль</label>
                                <input type="password" class="form-control" id="passInp" name="password">
                                @error('password')<small class="text-danger">{{$message}}</small>@enderror
                            </div>
                            <div class="col-12">
                                <label for="passwordConfirmation" class="form-label">Повтор нового пароля</label>
                                <input type="password" class="form-control" id="passwordConfirmation" name="password_confirmation">
                                @error('password')<small class="text-danger">{{$message}}</small>@enderror
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100" type="submit">Сменить</button>
                            </div>
                        </form>
                        <!-- <div class="mt-3 text-center">
                            <p class="mb-0">
                                I dont't have an account?
                                <a class="fw-medium" href="{{url('register')}}">
                                    Register
                                </a>
                            </p>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection