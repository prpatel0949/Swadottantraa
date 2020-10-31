<table id="client-tbl" class="table table-striped table-hover">
    <thead>
        <tr class="font_big">
            <th>Sr No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $key => $user)
            <tr>
                <td>{{ $users->firstItem() + $key }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->mobile }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $users->links() }}