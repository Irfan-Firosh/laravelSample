<x-admin>
    @section('items')
    <li>
        <a href="{{route('admin-dash')}}" class="waves-effect"><i class="md md-home"></i><span> Dashboard </span></a>
    </li>
    <li>
        <a href="{{route('admin.orgs')}}" class="waves-effect"><i class="md md-event"></i><span> Organizations </span></a>
    </li>
    <li>
        <a href="{{route('admin.users')}}" class="waves-effect active"><i class="ion-android-contact"></i><span> Users </span></a>
    </li>
    <li>
        <a href="{{route('admin.contacts')}}" class="waves-effect"><i class="fa fa-phone"></i><span> Contacts </span></a>
    </li>
    @endsection
    @section('body')
    <div class="row">
        <div class="col-sm-12">
            <h2 class="pull-left page-title"> Update User </h2>
            <ol class="breadcrumb pull-right">
                <li><a href="../">Users</a></li>
                <li class="text-muted">{{$user->name}}</li>
                <li class="active">Update</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 mx-auto">
            <div class="card">
                <div class="card-header"><h3 class="card-title">Update {{$user->name}}</h3></div>
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
                        <div class="card-footer py-4 text-center">
                            <div class="row">
                                <div class="d-grid me-5 ml-5 m-auto text-white col-6">
                                    <button class="btn btn-primary py-0" type="submit"><h4 class="text-white">Save</h4></button>
                                </div>
                            </div>
                        </div>                            
                    </form>
            </div>
        </div>
    </div>
    @endsection
</x-admin>