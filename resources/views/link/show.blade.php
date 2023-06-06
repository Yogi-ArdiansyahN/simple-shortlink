@extends('layout.main')
@section('content')
<div class="mx-auto col-md-12">
    <div class="d-flex justify-content-between align-items-center my-3">
        <span class="fw-bold">
            <h1>{{ $title }}</h1>
        </span>

        <span class="fw-bold">
            @include('component.backButton')
        </span>
    </div>

    <div class="card">
        <table class="table table-hover table-borderless">
            <thead class="table-secondary">
                <tr>
                    <th>ID</th>
                    <th>Short link</th>
                    <th>Passenger</th>
                    <th>Link original</th>
                    <th>Link Created At</th>
                    <th>Link Updated At</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>{{ $link->id }}</td>
                    <td>{{ $link->short }}</td>
                    <td></td>
                    <td>{{ $link->original }}</td>
                    <td>{{ $link->created_at }}</td>
                    <td>{{ $link->updated_at }}</td>


                    <!-- <tr>
                    <td colspan="5">
                        <a href="/link/create" class="btn btn-success btn-sm d-block">+ Shortlink baru</a>
                    </td>
                </tr> -->
            </tbody>
        </table>
    </div>
</div>


@endsection