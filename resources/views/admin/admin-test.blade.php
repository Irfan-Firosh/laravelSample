<x-admin>
    @section('items')
        <li>
            <a href="/admin" class="waves-effect"><i class="md md-home"></i><span> Dashboard </span></a>
        </li>
        <li>
            <a href="/admin/organizations" class="waves-effect"><i class="md md-event"></i><span> Organizations </span></a>
        </li>
        <li>
            <a href="/admin/users" class="waves-effect"><i class="ion-android-contact"></i><span> Contacts </span></a>
        </li>
    @endsection
    @section('body')
    <div class="row">
        <div class="col-sm-12">
            <h2 class="pull-left page-title"> Welcome ! </h2>
            <ol class="breadcrumb pull-right">
                <li><a href="#">Ping</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a href="admin/organizations">
                <div class="mini-stat clearfix bx-shadow bg-white">
                    <span class="mini-stat-icon bg-info"><i class="fa fa-building"></i></span>
                    <div class="mini-stat-info text-right text-dark">
                        <span class="counter text-dark">{{$orgs}}</span>
                        Total Organizations
                    </div>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="/admin/users">
                <div class="mini-stat clearfix bx-shadow bg-white">
                    <span class="mini-stat-icon bg-warning"><i class="fa fa-users"></i></span>
                    <div class="mini-stat-info text-right text-dark">
                        <span class="counter text-dark">{{$users}}</span>
                        Total Users
                    </div>
                </div>
            </a>
        </div>
    </div> <!-- End row-->


</div> <!-- container -->
           
</div> <!-- content -->
    @endsection
</x-admin>