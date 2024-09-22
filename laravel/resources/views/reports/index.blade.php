@extends('master.kerangka')

@section('content')
<h2 class="text-center mb-4">List of Users</h2>
<div class="container my-5 shadow-lg p-4 bg-white rounded">

    <div class="table-responsive">
        <table class="table table-hover table-bordered text-center table-striped align-middle">
            <thead class="table-light">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <span class="badge bg-primary">
                                {{ $user->role_id == 2 ? 'User Biasa' : '' }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <!-- Menampilkan link pagination -->
        {{ $users->links('vendor.pagination.bootstrap-5') }}
    </ul>
</nav>

@endsection
