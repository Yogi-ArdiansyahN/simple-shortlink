@extends('layout.main')

@section('content')
    <div class="card mx-auto col-4">
        <div class="card-header">
            List link
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>Short Link</th>
                        <th>Link original</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>#</td>
                        <td>ID</td>
                        <td>Short Link</td>
                        <td>Link original</td>
                    </tr>
                </tbody>
            </table>
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
