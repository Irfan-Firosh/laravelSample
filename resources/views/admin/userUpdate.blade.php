<x-admin>
    @section('items')
    <li>
        <a href="{{route('admin-dash')}}" class="waves-effect"><i class="md md-home"></i><span> Dashboard </span></a>
    </li>
    <li>
        <a href="{{route('admin.orgs')}}" class="waves-effect"><i class="md md-event"></i><span> Organizations </span></a>
    </li>
    <li>
        <a href="{{route('admin.users')}}" class="waves-effect active"><i class="ion-android-contact"></i><span> Contacts </span></a>
    </li>
    @endsection
    @section('body')
    <div class="row">
        <div class="col-sm-12">
            <h2 class="pull-left page-title"> Edit {{strtoupper($user->name)}} </h2>
            <ol class="breadcrumb pull-right">
                <li><a href="#">Ping</a></li>
                <li class="text-muted">Contacts</li>
                <li class="active">Edit</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header"><h3 class="card-title">Update User</h3></div>
                    <form class="form-horizontal" action="{{route('admin.updatePost', $user->id)}}" method="POST"> 
                        @csrf     
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col mx-1">
                                    <label for="name">Name:</label>
                                    <input type="text" name="name" class="form-control" placeholder="" value="{{$user->name}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col">
                                    <label for="name">Email:</label>
                                    <input type="text" name="email" class="form-control" placeholder="" value="{{$user->email}}">
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
                                <button class="btn btn-primary py-0" type="submit"><h4 class="text-white">Update</h4></button>
                            </div>
                        </div>                            
                    </form>
            </div>
        </div>
    </div>
    @endsection
</x-admin>