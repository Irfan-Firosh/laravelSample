<x-admin>
    @section('items')
    <li>
        <a href="/admin" class="waves-effect"><i class="md md-home"></i><span> Dashboard </span></a>
    </li>
    <li>
        <a href="/admin/organizations" class="waves-effect active"><i class="md md-event"></i><span> Organizations </span></a>
    </li>
    <li>
        <a href="/admin/users" class="waves-effect"><i class="ion-android-contact"></i><span> Contacts </span></a>
    </li>
    @endsection 
    
    @section('body')
    <div class="row">
        <div class="col-sm-12">
            <h2 class="pull-left page-title"> Create Organization </h2>
            <ol class="breadcrumb pull-right">
                <li><a href="#">Ping</a></li>
                <li class="text-muted">Organizations</li>
                <li class="active">Create</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header"><h3 class="card-title">Create An Organization</h3></div>
                    <form class="form-horizontal" action="./create" method="POST"> 
                        @csrf     
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col mx-1">
                                    <label for="name">Name:</label>
                                    <input type="text" name="name" class="form-control" placeholder="" value="{{old('name')}}">
                                </div>
                                <div class="col">
                                    <label for="name">Email:</label>
                                    <input type="text" name="email" class="form-control" placeholder="" value="{{old('email')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col mx-1">
                                    <label for="phone">Phone:</label>
                                    <input type="text" name="phone" class="form-control" placeholder="" value="{{old('phone')}}">
                                </div>
                                <div class="col">
                                    <label for="address">Address:</label>
                                    <input type="text" name="address" class="form-control" placeholder="" value="{{old('address')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col mx-1">
                                    <label for="city">City:</label>
                                    <input type="text" name="city" class="form-control" placeholder="" value="{{old('city')}}">
                                </div>
                                <div class="col">
                                    <label for="province">Province/State:</label>
                                    <input type="text" name="province" class="form-control" placeholder="" value="{{old('province')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col mx-1">
                                    <label for="country">Country:</label>
                                    <input type="text" name="country" class="form-control" placeholder="" value="{{old('country')}}">
                                </div>
                                <div class="col">
                                    <label for="code">Postal Code:</label>
                                    <input type="text" name="code" class="form-control" placeholder="" value="{{old('code')}}">
                                </div>
                            </div>
                        </div>
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <script>
                                    $(document).ready(function() {
                                        setTimeout(function() {
                                        $(".alert").alert('close');
                                        }, 4000);
                                    });
                                </script>
                                <div class="alert alert-danger mb-2 mx-4 text-center" role="alert">
                                    {{$error}}
                                </div>
                            @endforeach
                        @endif
                        <div class="card-footer py-4">
                            <div class="d-grid gap-2 mx-5 text-white">
                                <button class="btn btn-primary py-0" type="submit"><h4 class="text-white">Create</h4></button>
                            </div>
                        </div>                            
                    </form>
            </div>
        </div>
    </div>
    @endsection

</x-admin>