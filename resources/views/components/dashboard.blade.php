<x-base>
 
        {{-- <div class="">
            @if (Route::has('login'))
                <div class="">
                    @auth
                        <a href="{{ url('/home') }}" class="">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="">Log in</a>
    
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div> --}}
    
        {{-- <div>
            @php
                echo auth()->user();
                echo auth()->user()->isAdmin();
            @endphp
        </div> --}}
    
        <div class="d-flex" id="wrapper">
            @include('../partials._sidebar')
            <div id="page-content-wrapper">
                @include('../partials._topnav')
                <div class="container-fluid px-4">
                {{ $slot }}
                </div>
            </div>
        </div>


</x-base>




