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
</x-admin>