@if (session()->has('warnings'))
    @unless(count(session('warnings')) == 0)
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <div>
            @foreach (session('warnings') as $warning)
                <p class="mb-1">{{ $warning }}</p>
            @endforeach
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endunless
@endif
