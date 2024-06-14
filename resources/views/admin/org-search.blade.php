<x-admin>
    @section('items')
    <li>
        <a href="{{route('admin-dash')}}" class="waves-effect"><i class="md md-home"></i><span> Dashboard </span></a>
    </li>
    <li>
        <a href="{{route('admin.orgs')}}" class="waves-effec activet"><i class="md md-event"></i><span> Organizations </span></a>
    </li>
    <li>
        <a href="{{route('admin.users')}}" class="waves-effect"><i class="ion-android-contact"></i><span> Contacts </span></a>
    </li>
    @endsection
    @section('body')
    <div class="row">
        <div class="col-sm-12">
            <h2 class="pull-left page-title"> Organizations </h2>
            <ol class="breadcrumb pull-right">
                <li><a href="#">Ping</a></li>
                <li class="active">Organizations</li>
            </ol>
        </div>
    </div>
    <div>
        <div class="card bg-light">
            <div class="card-body px-2 py-2">
            
                <div class="row mt-2">
                    <div class="col-sm-4 text-center text-muted">
                        <form class="form-group" action="/admin/organizations/search" method="POST">
                            @csrf
                            <div class="form-outline d-flex">
                                <input type="text" class="form-control" name="search" placeholder="Search" value="{{$search}}">
                                <button type="submit" class="btn btn-primary px-4">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-2 text-center">
                        @if ($errors->any())
                            <script>
                                $(document).ready(function() {
                                    setTimeout(function() {
                                        $(".alert").fadeOut();
                                    }, 1500);
                                });

                            </script>
                                @foreach ($errors->all() as $error)
                                <div class="alert alert-danger mb-2" role="alert">
                                    {{$error}}
                                </div>
                                @endforeach
                        @endif
                    </div>
                    <div class="col-sm-3 text-center">
                    </div>
                    <div class="col-sm-3 text-center">
                       <a href="{{route('org.create')}}"><button class="btn btn-primary text-white px-4">Create Organization</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">City</th>
            <th scope="col">Phone</th>
            <th scope="col-1"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($orgs as $org)
            <tr>
                <th scope="row">{{$org->id}}</th>
                <td class="h6 mt-1">{{$org->name}}</td>
                <td class="h6">{{$org->city}}</td>
                <td class="h6">{{$org->phone}}</td>
                <td>
                  <div class="d-flex">
                    <a href="{{route('org.edit', $org->id)}}" class="edit nav-link text-muted small-col"><i class="fa fa-edit edit"></i></a>
                    <a href="{{route('org.destroy', $org->id)}}" class="del nav-link text-muted small-col"><i class="fa fa-trash-o del"></i></a>
                  </div>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    @endsection
</x-admin>