@php
    $shortLink = "$baseUrl/to/$link->short";
@endphp

@extends('layout.main')
@section('content')
    <div class="mx-auto col-md-8">

        {{-- header --}}
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

        <div class="d-flex">
            {{-- detail link --}}
            <div class="card p-3 d-flex flex-row col-10">
                <div id="detailList" class="col">
                    <div class="d-flex justify-content-between p-3">
                        <span class="fw-bold col-md-2">ID</span>
                        <span class="flex-fill col">{{ $link->id }}</span>
                    </div>

                    <div class="d-flex justify-content-between p-3">
                        <span class="fw-bold col-md-2">Shortlink</span>
                        <span class="flex-fill">{{ $shortLink }}</span>
                    </div>

                    <div class="d-flex justify-content-between p-3">
                        <span class="fw-bold col-md-2">Original link</span>
                        <span class="flex-fill">{{ $link->original }}</span>
                    </div>

                    <div class="d-flex justify-content-between p-3">
                        <span class="fw-bold col-md-2">Created at</span>
                        <span class="flex-fill">{{ $link->created_at }}</span>
                    </div>

                    <div class="d-flex justify-content-between p-3">
                        <span class="fw-bold col-md-2">Updated at</span>
                        <span class="flex-fill">{{ $link->updated_at }}</span>
                    </div>
                </div>
            </div>

            {{-- visitor count --}}
            <div class="col ps-3">
                <div class="col card p-3 d-flex flex-column align-items-center justify-content start">
                    <span class="text-muted">Visitor</span>
                    <span class="">400</span>
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
