@if (session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <div>
            {{ session('message') }}
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session()->has('fatal'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <div>
            {{ session('fatal') }}
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif