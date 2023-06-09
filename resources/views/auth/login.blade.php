@extends('layout.main')

@section('content')
    <div class="d-flex flex-column justify-content-center align-items-center" style="min-height:100vh;">

        @include('component.resultNotification')
        <div class="card col-4 p-5">
            <div class="card-body">
                <h1 class="card-title text-center pb-3">Login</h1>
                <form action="/login" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="test@example.com"
                            id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" value="password"
                            id="exampleInputPassword1">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                    <p class="mt-4 text-sm text-center">
                        Belum Punya Akun?
                        <a href="/daftar" class="text-primary text-gradient font-weight-bold">Registrasi</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
@endsection
