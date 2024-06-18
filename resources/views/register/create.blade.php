<x-layout>
    <div class="cotainer py-5">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-8 col-lg-5 col-md-8 col-xl-4">
                <div class="card" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <h3 class="mb-5">Register</h3>
                        <form action="{{route('register.store')}}" method="POST">
                            @csrf
                            <div class="form-floating mb-4">
                                <input type="text" name="email" class="form-control px-3 form-control-lg" placeholder="" value="{{old('email')}}">
                                <label for="email" class="form-label">Email</label>
                                @error('email')
                                <span class="text-red d-flex justify-content-start" style="color: red">
                                    {{$message}}
                                </span>
                                @enderror
                            </div>
                            <div class="form-floating mb-4">
                                <input type="text" name="username" class="form-control px-3 form-control-lg" placeholder="" value="{{old('username')}}">
                                <label for="username" class="form-label">Name</label>
                                @error('username')
                                <span class="text-red d-flex justify-content-start" style="color: red">
                                    @php
                                        $split = explode(" ", $message);
                                        foreach ($split as $x => $y) {
                                            if ($y == 'username') {
                                                $split[$x] = 'name';
                                            }
                                        }
                                        $str = implode(" ", $split);
                                        echo $str;
                                    @endphp
                                </span>
                                @enderror
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" name="password" class="form-control px-3 form-control-lg" placeholder=""  value="{{old('password')}}">
                                <label for="password" class="form-label">Enter Password</label>
                                @error('password')
                                    <div class="text-start">
                                        <span class="text-red d-flex justify-content-start" style="color: red">
                                            {{$message}}
                                        </span>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" name="password_confirmation" class="form-control px-3 form-control-lg" placeholder="" value="{{old('password_confirmation')}}">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                @error('password_confirmation')
                                <div class="text-start">
                                    <span class="text-red d-flex justify-content-start" style="color: red">
                                        The passwords do not match
                                    </span>
                                </div>
                                @enderror
                            </div>
                            <div class="form-check d-flex justify-content-start mb-4">
                                <input type="checkbox" class="form-check-input me-3" name="frem" value="false">
                                <label for="frem" class="form-label"> Remember me</label>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg d-block w-100 mb-4">Sign Up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function dip() {
            setTimeout(function () {$("#dip-item").fadeOut('fast');}, 1500);
        });
    </script>
    @if (session()->has('success'))
        <div class="container-fluid w-25 h-10 text-center text-white position-fixed bottom-0 end-0 text-sm rounded-xl mt-3" id="dip-item">
            <div class="alert" style="background-color: #0d6efd"> 
                {{session('success')}}
            </div>
        </div>
    @endif
</x-layout>