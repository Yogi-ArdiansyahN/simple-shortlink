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
    @endif

</div>
