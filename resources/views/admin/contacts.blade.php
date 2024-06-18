<x-admin>
    <x-admin>
        <style>
            .small-col {
                width: 1px; /* Adjust the width as needed */
            }
    
            .edit:hover {
              color: rgb(49, 95, 224);
            }
    
            .del:hover {
              olor: rgba(255, 47, 0, 0.868);
            }
    
        </style>
        @php
            session_start();
            $_SESSION['index'] = 1;
        @endphp
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
              <h2 class="pull-left page-title"> Contacts</h2>
              <ol class="breadcrumb pull-right">
                  <li><a href="{{route('admin-dash')}}">Ping</a></li>
                  <li class="active">Contacts</li>
              </ol>
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
          @if (session()->has('success'))
            <script>
              $(document).ready(function dip() {
                  setTimeout(function () {$("#dip-item").fadeOut('fast');}, 1500);
              });
          </script>
            <div class="container-fluid w-25 fs-6 h-10 text-center text-white position-fixed bottom-1 end-0 text-sm rounded-xl mt-3" id="dip-item">
                <div class="alert" style="background-color: #0d6efd"> 
                    {{session('success')}}
                </div>
            </div>
          @endif
          @section('pagination')
          <div class="d-flex">
            {{$contacts->links()}}
          </div>
          @endsection
        @endsection
    </x-admin>
</x-admin>