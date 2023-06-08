@php
    $shortLink = "$baseUrl/to/$link->short";
@endphp

@extends('layout.main')
@section('content')
    <div class="mx-auto col-8">
        <div class="d-flex justify-content-between align-items-center my-3">
            <span class="fw-bold">
                <h1>{{ $title }}</h1>
            </span>

            <div>
                <button class="btn btn-sm btn-danger">Hapus</button>
                <a href="/link/edit/{{ $link->id }}" class="btn btn-sm btn-warning">Edit</a>
                @include('component.backButton')
            </div>
        </div>

        <div class="card p-3 d-flex flex-row">
            <div id="detailList" class="col-md-10">
                <div class="d-flex justify-content-between p-3">
                    <span class="fw-bold col-md-2">ID</span>
                    <span>{{ $link->id }}</span>
                </div>


                <div class="d-flex justify-content-between p-3">
                    <span class="fw-bold col-md-2">Shortlink</span>
                    <span>{{ $shortLink }}</span>
                </div>

                <div class="d-flex justify-content-between p-3">
                    <span class="fw-bold col-md-2">Original link</span>
                    <span>{{ $link->original }}</span>
                </div>

                <div class="d-flex justify-content-between p-3">
                    <span class="fw-bold col-md-2">Created at</span>
                    <span>{{ $link->created_at }}</span>
                </div>

                <div class="d-flex justify-content-between p-3">
                    <span class="fw-bold col-md-2">Updated at</span>
                    <span>{{ $link->updated_at }}</span>
                </div>
            </div>

            <div id="visitCount" class="d-flex flex-column justify-content-start align-items-center w-100">
                <span>Visitor</span>
                {{-- <span class="display-1">[$link->visit]</span> --}}
                <div class="h-100 d-flex justify-content-center align-items-center">
                    <span>[$link->visit]</span>
                </div>
            </div>
        </div>
    </div>

    <style>
        #detailList {
            border-radius: .5em;
            overflow: hidden;
        }

        #detailList> :nth-child(odd) {
            background-color: rgb(224, 224, 224);
        }
    </style>
@endsection
