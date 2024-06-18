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
            <a href="{{route('admin.users')}}" class="waves-effect active"><i class="ion-android-contact"></i><span> Users </span></a>
        </li>
        <li>
          <a href="{{route('admin.contacts')}}" class="waves-effect"><i class="fa fa-phone"></i><span> Contacts </span></a>
      </li>
    @endsection
    @section('body')
    <div class="row">
      <div class="col-sm-12">
          <h2 class="pull-left page-title"> Users</h2>
          <ol class="breadcrumb pull-right">
              <li><a href="{{route('admin-dash')}}">Ping</a></li>
              <li class="active">Users</li>
          </ol>
      </div>
  </div>
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col-1"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <th scope="row">{{$_SESSION['index']++}}</th>
                <td class="h6 mt-1">{{$user->name}}</td>
                <td class="h6">{{$user->email}}</td>
                <td>
                  <div class="d-flex">
                    <a href="{{route('admin.updateCreate', $user->id)}}" class="edit nav-link text-white mx-2 small-col" style="background-color: rgb(21, 21, 248); border-radius:0.5rem"><i class="fa fa-edit edit"></i></a>
                    <a href="{{route('admin.destroy', $user->id)}}" class="del nav-link text-white mx-2 small-col" style="background-color: rgb(205, 64, 64); border-radius:0.5rem"><i class="fa fa-trash-o del"></i></a>
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
        <div class="container-fluid w-25 h-10 text-center text-white position-fixed bottom-0 end-0 text-sm rounded-xl mt-3" id="dip-item">
            <div class="alert" style="background-color: #0d6efd"> 
                {{session('success')}}
            </div>
        </div>
      @endif
      @section('pagination')
      <div class="d-flex">
        {{$users->links()}}
      </div>
      @endsection
    @endsection
</x-admin>