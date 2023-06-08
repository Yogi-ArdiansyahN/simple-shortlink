@extends('layout.main')
@section('content')
    <div style="min-height:100vh; display:flex; align-items:center; justify-content:center;">
        @include('component.resultNotification')

        <div class="card" style="width:380px; height:550px; padding:20px;">
            <div class="card-body">
                <h1 class="card-title text-center pb-3">Registrasi</h1>
                <form action="/daftar" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputName">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Validasi Password</label>
                        <input type="password" name="password1" class="form-control" id="exampleInputPassword1">
                    </div>
                    <button type="submit" class="btn btn-primary">Daftar</button>
                    <p class="mt-4 text-sm text-center">
                        Sudah Punya Akun?
                        <a href="/login" class="text-primary text-gradient font-weight-bold">Login</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
@endsection
