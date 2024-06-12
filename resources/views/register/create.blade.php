<x-layout>
    <div class="cotainer py-5">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-8 col-lg-5 col-md-8 col-xl-4">
                <div class="card" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <h3 class="mb-5">Register</h3>
                        <form action="/register" method="POST">
                            @csrf
                            <div class="form-floating mb-4">
                                <input type="text" name="email" class="form-control px-3 form-control-lg" placeholder="" value="{{old('email')}}">
                                <label for="email" class="form-label">Email</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="text" name="username" class="form-control px-3 form-control-lg" placeholder="" value="{{old('username')}}">
                                <label for="username" class="form-label">Name</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" name="password" class="form-control px-3 form-control-lg" placeholder=""  value="{{old('password')}}">
                                <label for="password" class="form-label">Enter Password</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" name="password_confirmation" class="form-control px-3 form-control-lg" placeholder="" value="{{old('password_confirmation')}}">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                            </div>
                            <div class="form-check d-flex justify-content-start mb-4">
                                <input type="checkbox" class="form-check-input me-3" name="frem" value="false">
                                <label for="frem" class="form-label"> Remember me</label>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg d-block w-100 mb-4">Sign Up</button>
                        </form>
                        @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                @if ($error == 'The password and password confirmation must match.')
                                    <div class="alert alert-danger mb-2" role="alert">
                                        The passwords do not match
                                    </div>
                                    @continue
                                @endif
                                <div class="alert alert-danger mb-2" role="alert">
                                    {{$error}}
                                </div>
                                @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>