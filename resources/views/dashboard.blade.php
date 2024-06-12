<x-dblayout>
    <script>
        $(document).ready(function dip() {
            setTimeout(function () {$("#dip-item").fadeOut('fast');}, 1500);
        });
    </script>
    {{session('rem')}}
    @if (session()->has('success'))
        <div class="container-fluid w-25 h-10 text-center text-white position-fixed bottom-0 end-0 text-sm rounded-xl mt-3" id="dip-item">
            <div class="alert" style="background-color: #0d6efd"> 
                {{session('success')}}
            </div>
        </div>
    @endif

</x-dblayout>