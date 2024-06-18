<x-admin>
    @section('items')
    <li>
        <a href="{{route('admin-dash')}}" class="waves-effect"><i class="md md-home"></i><span> Dashboard </span></a>
    </li>
    <li>
        <a href="{{route('admin.orgs')}}" class="waves-effect active"><i class="md md-event"></i><span> Organizations </span></a>
    </li>
    <li>
        <a href="{{route('admin.users')}}" class="waves-effect"><i class="ion-android-contact"></i><span> Users </span></a>
    </li>
    <li>
        <a href="{{route('admin.contacts')}}" class="waves-effect"><i class="fa fa-phone"></i><span> Contacts </span></a>
    </li>
    @endsection
    @php
            session_start();
            $_SESSION['index'] = 1;
    @endphp
    @section('body')
    <div class="row">
        <div class="col-sm-12">
            <h2 class="pull-left page-title"> Edit Organization</h2>
            <ol class="breadcrumb pull-right">
                <li><a href="../">Organizations</a></li>
                <li class="text-muted">{{$org->name}}</li>
                <li class="active">Edit</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header"><h3 class="card-title">Update {{$org->name}}</h3></div>
                    <form class="form-horizontal" action="{{route('org.update', $org->id)}}" method="POST"> 
                        @csrf     
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col mx-1">
                                    <label for="name">Name:</label>
                                    <input type="text" name="name" class="form-control" placeholder="" value="{{$org->name}}">
                                </div>
                                <div class="col">
                                    <label for="name">Email:</label>
                                    <input type="text" name="email" class="form-control" placeholder="" value="{{$org->email}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col mx-1">
                                    <label for="phone">Phone:</label>
                                    <input type="text" name="phone" class="form-control" placeholder="" value="{{$org->phone}}">
                                </div>
                                <div class="col">
                                    <label for="address">Address:</label>
                                    <input type="text" name="address" class="form-control" placeholder="" value="{{$org->address}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col mx-1">
                                    <label for="city">City:</label>
                                    <input type="text" name="city" class="form-control" placeholder="" value="{{$org->city}}">
                                </div>
                                <div class="col">
                                    <label for="province">Province/State:</label>
                                    <input type="text" name="province" class="form-control" placeholder="" value="{{$org->province}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col mx-1">
                                    <label for="country">Country:</label>
                                    <input type="text" name="country" class="form-control" placeholder="" value="{{$org->country}}">
                                </div>
                                <div class="col">
                                    <label for="code">Postal Code:</label>
                                    <input type="text" name="code" class="form-control" placeholder="" value="{{$org->code}}">
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
                            <div class="d-grid col-6 gap-2 mx-auto text-white">
                                <button class="btn btn-primary py-0" type="submit"><h4 class="text-white">Save</h4></button>
                            </div>
                        </div>                            
                    </form>
            </div>
        </div>
    </div>
    <div class="my-3 d-flex justify-content-end">
        <a href="{{route('admin.contacts.create')}}"><button class="btn btn-lg btn-primary text-white px-5">Create Contact</button></a>
      </div>
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Organization</th>
            <th scope="col-1"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
            <tr>
                <th scope="row">{{$_SESSION['index']++}}</th>
                <td class="h6 mt-1">{{$contact->first_name}}</td>
                <td class="h6 mt-1">{{$contact->last_name}}</td>
                <td class="h6">{{$contact->email}}</td>
                <td class="h6 mt-1">{{$contact->organization}}</td>
                <td>
                  <div class="d-flex">
                    <a href="{{route('admin.contacts.update', $contact->id)}}" class="edit nav-link text-white mx-2 small-col" style="background-color: rgb(21, 21, 248); border-radius:0.5rem"><i class="fa fa-edit edit"></i></a>
                    <a href="{{route('admin.conacts.destroy', $contact->id)}}" class="del nav-link text-white mx-2 small-col" style="background-color: rgb(205, 64, 64); border-radius:0.5rem"><i class="fa fa-trash-o del"></i></a>
                  </div>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
    @endsection

</x-admin>