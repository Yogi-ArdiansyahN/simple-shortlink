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

            <span>
                @include('component.backButton')
            </span>
        </div>

        <div class="card p-3 d-flex flex-row">
            <div id="detailList" class="col-md-8">
                <div class="d-flex justify-content-between px-3">
                    <span class="fw-bold">ID</span>
                    <span>{{ $link->id }}</span>
                </div>


                <div class="d-flex justify-content-between px-3">
                    <span class="fw-bold">Shortlink</span>
                    <span>{{ $shortLink }}</span>
                </div>

                <div class="d-flex justify-content-between px-3">
                    <span class="fw-bold">Original link</span>
                    <span>{{ $link->original }}</span>
                </div>

                <div class="d-flex justify-content-between px-3">
                    <span class="fw-bold">Created at</span>
                    <span>{{ $link->created_at }}</span>
                </div>

                <div class="d-flex justify-content-between px-3">
                    <span class="fw-bold">Updated at</span>
                    <span>{{ $link->updated_at }}</span>
                </div>
            </div>

            <div id="visitCount" class="d-flex flex-column justify-content-center align-items-center  w-100">
                <span>Visitor</span>
                {{-- <span class="display-1">[$link->visit]</span> --}}
                <span>[$link->visit]</span>
            </div>
        </div>
    </div>

    <style>
        #detailList> :nth-child(odd) {
            background-color: rgb(224, 224, 224);
        }
    </style>
@endsection
