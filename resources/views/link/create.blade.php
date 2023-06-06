@extends('main')

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
                    <input name="original" type="text" class="form-control" placeholder="www.link-panjang-pisan.com">
                </div>

                <div class="mb-3">
                    <label class="form-label">Shortlink custom</label>
                    <input id="inputShort" name="short" type="text" class="form-control" placeholder="linkmzzz">
                    <small class="text-muted" id="contoh"></small>
                </div>

                <input type="submit" class="btn btn-primary" value="Simpan">
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            alert('hey')
        })

        function handleShortChange(evt) {

        }

        inputShort.keyup()
    </script>
@endsection
