<x-admin>
    @section('items')
    <li>
        <a href="{{route('admin-dash')}}" class="waves-effect"><i class="md md-home"></i><span> Dashboard </span></a>
    </li>
    <li>
        <a href="{{route('admin.orgs')}}" class="waves-effect"><i class="md md-event"></i><span> Organizations </span></a>
    </li>
    <li>
        <a href="{{route('admin.users')}}" class="waves-effect"><i class="ion-android-contact"></i><span> Users </span></a>
    </li>
    <li>
        <a href="{{route('admin.contacts')}}" class="waves-effect active"><i class="fa fa-phone"></i><span> Contacts </span></a>
    </li>
    @endsection
    @section('body')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header"><h3 class="card-title">View {{$contact->first_name}}</h3></div>
                    <form class="form-horizontal fs-6" action="{{route('admin.contacts.update', $contact->id)}}" method="POST"> 
                        @csrf     
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col mx-1">
                                    <label for="first_name">First Name:</label>
                                    <input type="text" name="first_name" class="form-control" placeholder="" value="{{$contact->first_name}}" readonly>
                                </div>
                                <div class="col">
                                    <label for="last_name">Last Name:</label>
                                    <input type="text" name="last_name" class="form-control" placeholder="" value="{{$contact->last_name}}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col mx-1">
                                    <label for="organization">Organization:</label>
                                    <input type="text" name="organization" class="form-control" placeholder="" value="{{$contact->organization}}" readonly>
                                </div>
                                <div class="col">
                                    <label for="email">Email:</label>
                                    <input type="text" name="email" class="form-control" placeholder="" value="{{$contact->email}}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col mx-1">
                                    <label for="phone">Phone:</label>
                                    <input type="text" name="phone" class="form-control" placeholder="" value="{{$contact->phone}}" readonly>
                                </div>
                                <div class="col">
                                    <label for="address">Address:</label>
                                    <input type="text" name="address" class="form-control" placeholder="" value="{{$contact->address}}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col mx-1">
                                    <label for="city">City:</label>
                                    <input type="text" name="city" class="form-control" placeholder="" value="{{$contact->city}}" readonly>
                                </div>
                                <div class="col">
                                    <label for="province">Provcine/State:</label>
                                    <input type="text" name="province" class="form-control" placeholder="" value="{{$contact->province}}" readonly>
                                </div>
                            </div>
                        </div>                         
                    </form>
            </div>
        </div>
    </div>
    @endsection
</x-admin>