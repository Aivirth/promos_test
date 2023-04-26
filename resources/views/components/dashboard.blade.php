<x-base>
    <div class="d-flex" id="wrapper">
        @include('../partials._sidebar')
        <div id="page-content-wrapper">
            @include('../partials._topnav')
            <div class="container-fluid px-4">
                {{ $slot }}
            </div>
        </div>
    </div>

    <script>
        const wrapper = document.getElementById("wrapper");
        const toggleButton = document.getElementById("menu-toggle");

        if(wrapper && toggleButton){
            toggleButton.onclick = function () {
                wrapper.classList.toggle("toggled");
            };
        }
    </script>

</x-base>
