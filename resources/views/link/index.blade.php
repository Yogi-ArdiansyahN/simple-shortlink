@php
    $linkKosong = sizeof($listLink) < 1;
@endphp

@extends('layout.main')
@section('content')

    <div class="mx-auto col-md-8">
        <div class="d-flex justify-content-between align-items-center my-3">
            <span class="fw-bold">
                <h1>{{ $title }}</h1>
            </span>
            <span>
                <a href="/link/create" class="btn btn-success btn-sm">+ Shortlink baru</a>

            </span>
        </div>

        <div class="card">
            <table class="table table-hover table-borderless">
                <thead class="table-secondary">
                    <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>Short link</th>
                        <th>Link original</th>
                        <th class="text-center">Opsi</th>
                    </tr>
                </thead>

                <tbody>
                    @if ($linkKosong)
                        <tr>
                            <td colspan="5" class="text-center text-muted">Belum ada link</td>
                        </tr>
                    @else
                        @foreach ($listLink as $link)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $link->id }}</td>
                                <td>{{ $link->short }}</td>
                                <td>{{ $link->original }}</td>
                                <td class="text-center">

                                    {{-- go to link --}}
                                    <a href="/{{ $link->short }}" class="btn btn-sm btn-success">
                                        Go
                                    </a>

                                    {{-- lihat detail --}}
                                    <a href="link/{{ $link->id }}" class="btn btn-sm btn-primary">
                                        <i class="bi bi-eye-fill"></i>

                                    </a>

                                    {{-- edit --}}
                                    <a href="/link/edit/{{ $link->id }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil-fill"></i>
                                    </a>

                                    {{-- hapus --}}
                                    <button class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>

                                </td>
                            </tr>
                        @endforeach
                    @endif

                    <tr>
                        <td colspan="5">
                            <a href="/link/create" class="btn btn-success btn-sm d-block">+ Shortlink baru</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


@endsection