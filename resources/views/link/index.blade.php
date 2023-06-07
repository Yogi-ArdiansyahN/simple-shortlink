@php
	$linkKosong = sizeof($listLink) < 1; 
@endphp 

@extends('layout.main') @section('content') <div class="mx-auto col-md-8">
    <div class="d-flex justify-content-between align-items-center my-3">
        <span class="fw-bold">
            <h1>{{ $title }}</h1>
        </span>
        <span>
            <a href="/link/create" class="btn btn-success btn-sm">+ Shortlink baru</a>

        </span>
    </div>

    @if (session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @elseif(session()->has('error'))
    <div class="alert alert-danger " role="alert">
        {{ session('error') }}
    </div>
    @endif

        <div class="card">
            <table class="table table-hover table-borderless">
                <thead class="table-secondary">
                    <tr>
                        <th>#</th>
                        {{-- <th>ID</th> --}}
                        <th>Short link</th>
                        {{-- <th>Link original</th> --}}
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
                                <td>{{ $loop->iteration }}</td>
                                {{-- <td>{{ $link->id }}</td> --}}
                                <td>{{ $link->short }}</td>
                                {{-- <td>{{ $link->original }}</td> --}}
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
									<form action="link/delete/{{ $link->id }}" method="post" class="d-inline">
										@csrf
										<button class="btn btn-sm btn-danger" type="submit">
											<i class="bi bi-trash-fill"></i>
										</button>
									</form>

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

    <script>
        $(document).ready(function() {
            const baseUrl = "{!! $baseUrl !!}"
            const btnCopy = $(".btnCopy")

            $(btnCopy).click(function() {
                let shortLink = $(this).data('shortlink');
                shortLink = `${baseUrl}/to/${shortLink}`
                navigator.clipboard.writeText(shortLink);
                alert('Shortlink berhasil di copy!')
            })

        })
    </script>


    @endsection