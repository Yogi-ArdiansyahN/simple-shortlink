@extends('layout.main')

@section('content')
    <div class="mx-auto col-md-8">
        <div class="d-flex justify-content-between align-items-center my-3">
            <span class="fw-bold">
                <h1>{{ $title }}</h1>
            </span>

            <span class="fw-bold">
                @include('component.backButton')
            </span>

        </div>

        <div class="card mx-auto p-3">
            <form action="/link/{{ $link->id }}" method="post">
                @method('put')
                @csrf


                <div class="mb-3">
                    <label class="form-label">Link original</label>
                    <input name="original" type="text" class="form-control" value="{{ $link->original }}"
                        placeholder="https://www.link-panjang-pisan.com/embel-embel-nu-matak-wegah-ngetik-manual/dlsb"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Shortlink custom</label>
                    <input id="inputShort" name="short" type="text" class="form-control" placeholder="linkmzzz"
                        value="{{ $link->short }}" required>
                    <small class="text-muted" id="resultLink"></small>
                </div>

                <input type="submit" class="btn btn-primary" value="Simpan">
            </form>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            const baseUrl = "{!! $baseUrl !!}/to/"
            const inputShort = $("#inputShort")
            const resultShort = $("#resultLink")
            resultShort.text(`${baseUrl}{!! $link->short !!}`)

            function handleShortChange(evt) {
                const shortLink = $(this).val()
                resultShort.text(`${baseUrl}${shortLink}`)

            }

            inputShort.change(handleShortChange)
            inputShort.keyup(handleShortChange)
        })
    </script>
@endsection
