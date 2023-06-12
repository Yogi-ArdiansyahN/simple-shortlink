@php
    $sessionMessages = [
        [
            'name' => 'success',
            'color' => 'success',
        ],
        [
            'name' => 'error',
            'color' => 'danger',
        ],
        [
            'name' => 'warning',
            'color' => 'warning',
        ],
    ];
@endphp

<div class="my-3">
    @foreach ($sessionMessages as $sm)
        @if (session()->has($sm['name']))
            <div class="alert alert-{{ $sm['color'] }} d-flex justify-content-between w-100 mx-auto" role="alert">
                <span>{{ session($sm['name']) }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    @endforeach


</div>


{{--
<div class="my-3">
    @if (session()->has('success'))
        <div class="col-8 mx-auto">
            <div class="alert alert-success d-flex justify-content-between" role="alert">
                <span>{{ session('success') }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

            </div>
        </div>
    @elseif(session()->has('error'))
        <div class="col-8 mx-auto">

            <div class="alert alert-danger d-flex justify-content-between" role="alert">
                <span>{{ session('error') }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

            </div>
        </div>
    @elseif(session()->has('warning'))
        <div class="col-8 mx-auto">

            <div class="alert alert-danger d-flex justify-content-between" role="alert">
                <span>{{ session('warning') }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

            </div>
        </div>
    @endif

</div> --}}
