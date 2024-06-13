<x-admin>
    @section('items')
    <li>
        <a href="/admin" class="waves-effect"><i class="md md-home"></i><span> Dashboard </span></a>
    </li>
    <li>
        <a href="/admin/organizations" class="waves-effect"><i class="md md-event"></i><span> Organizations </span></a>
    </li>
    <li>
        <a href="/admin/users" class="waves-effect active"><i class="ion-android-contact"></i><span> Contacts </span></a>
    </li>
    @endsection
    <style>
        .a-hov:hover {
            color: rgb(17, 17, 211);
            background: rgb(184, 179, 179); 
        }

        .a-hov {
            border-radius: 1rem;
        }
    </style>
    @section('body')
        <div class="container">
            <div class="cotainer py-5">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col col-lg-5 col-md-4 col-xl-6">
                        <div class="card" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">
                                <h3 class="mb-5">Register</h3>
                                <form action="/admin/users/update/{{$id}}" method="POST">
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
        </div>  
    @endsection
</x-admin>