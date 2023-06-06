@extends('layout.main')

@section('content')
    <div class="card mx-auto col-4">
        <div class="card-header">
            Buat shorlink baru
        </div>
        <div class="card-body">
            <form action="/link" method="post">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Link original</label>
                    <input name="original" type="text" class="form-control" placeholder="www.link-panjang-pisan.com"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Shortlink custom</label>
                    <input id="inputShort" name="short" type="text" class="form-control" placeholder="linkmzzz"
                        required>
                    <small class="text-muted" id="resultLink"></small>
                </div>

                <input type="submit" class="btn btn-primary" value="Simpan">
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            const baseUrl = "{!! $baseUrl !!}/"
            console.log(baseUrl)

            const inputShort = $("#inputShort")
            const resultShort = $("#resultLink")
            resultShort.text(baseUrl)

            function handleShortChange(evt) {
                const shortLink = $(this).val()
                resultShort.text(`${baseUrl}${shortLink}`)

            }

            inputShort.change(handleShortChange)
            inputShort.keyup(handleShortChange)
        })
    </script>
@endsection
