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
    @section('body')
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col-1"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td class="h6 mt-1">{{$user->name}}</td>
                <td class="h6">{{$user->email}}</td>
                <td>
                  <div class="d-flex">
                    <a href="./users/update/{{$user->id}}" class="edit nav-link text-muted small-col"><i class="fa fa-edit edit"></i></a>
                    <a href="./users/delete/{{$user->id}}" class="del nav-link text-muted small-col"><i class="fa fa-trash-o del"></i></a>
                  </div>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
      @section('pagination')
      <div class="d-flex">
        {{$users->links()}}
      </div>
      @endsection
    @endsection
</x-admin>