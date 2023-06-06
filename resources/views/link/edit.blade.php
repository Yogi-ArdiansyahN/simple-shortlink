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

     <div class="card border-0" style="width:380px; height:400px; padding:20px;">
         <form action="/{{$link->id}}" method="put">
             @csrf
             <div class="mb-3">
                 <label for="" class="form-label">Link Original</label>
                 <input value="{{ $link->original }}" type="text" name="original" class="form-control" id="" aria-describedby="">
             </div>
             <div class="mb-3">
                 <label for="" class="form-label">Shorted Link</label>
                 <input value="{{ $link->short }}" type="text" name="short" class="form-control" id="">
                 <small class="text-muted" id="resultLink"></small>
             </div>
             <button type="submit" class="btn btn-primary">Edit</button>

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