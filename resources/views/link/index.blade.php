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

        <div id="alertCopy" class="d-none alert alert-success justify-content-between w-100 mx-auto" role="alert">
            <span>Shortlink berhasil dicopy</span>
            <button type="button" class="btn-close" id="btnCloseCopyAlert" aria-label="Close"></button>
        </div>

        <div class="card p-3">
            <div class="rounded overflow-hidden">
                <table class="table table-borderless table-striped">
                    <thead class="table-secondary">
                        <tr>
                            <th class="text-center">#</th>
                            <th>Short link</th>
                            <th class="text-center">Opsi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if ($linkKosong)
                            <tr>
                                <td colspan="5" class="text-center text-muted">
                                    <small>You belum punya link mz</small>
                                </td>
                            </tr>
                        @else
                            @foreach ($listLink as $link)
                                <tr>
                                    <th class="text-center">{{ $loop->iteration }}</th>
                                    <td>{{ $link->short }}</td>
                                    <td class="text-center">

                                        {{-- go to link --}}
                                        <a href="/to/{{ $link->short }}" class="btn btn-sm btn-success">
                                            Go
                                        </a>

                                        {{-- copy ke clipboard --}}
                                        <button class="btn btn-sm btn-dark btnCopy" data-shortlink="{{ $link->short }}">
                                            <i class="bi bi-clipboard-fill"></i>
                                        </button>

                                        {{-- lihat detail --}}
                                        <a href="/link/{{ $link->id }}" class="btn btn-sm btn-primary">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>

                                        {{-- edit --}}
                                        <a href="/link/edit/{{ $link->id }}" class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>

                                        {{-- hapus --}}
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#modalDeleteLink-{{ $link->id }}">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                        @include('link.modalDelete')

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
    </div>

    <script>
        $(document).ready(function() {
            const baseUrl = "{!! $baseUrl !!}"
            const btnCopy = $(".btnCopy")
            const alertCopy = $("#alertCopy")
            const btnCloseAlertCopy = $("#btnCloseCopyAlert")

            alertCopy.hide();

            $(btnCloseAlertCopy).click(function() {
                alertCopy.removeClass('d-flex')
                alertCopy.addClass('d-none')
            })

            $(btnCopy).click(function() {
                let shortLink = $(this).data('shortlink');
                shortLink = `${baseUrl}/to/${shortLink}`
                navigator.clipboard.writeText(shortLink);
                // alert('Shortlink berhasil di copy!')

                alertCopy.removeClass('d-none')
                alertCopy.addClass('d-flex')

                $(alertCopy).show();

            })

        })
    </script>

@endsection
