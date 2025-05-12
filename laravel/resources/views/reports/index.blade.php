@extends('master.kerangka')

@section('content')
<style>
    .container {
        transition: all 0.3s ease;
    }

    .container:hover {
        transform: translateY(-5px);
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
    }
</style>
<h2 class="text-center mb-4">List of Users</h2>
<div class="container my-5 shadow-lg p-4 bg-white rounded">

    <div class="table-responsive">
        <table class="table table-hover table-bordered text-center table-striped align-middle">
            <thead class="table-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $index => $user)
                    <tr>
                        <td>{{ $loop->iteration + ($users->currentPage() - 1) * $users->perPage() }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <span class="badge bg-primary">
                                {{ $user->role_id == 2 ? 'User' : '' }}
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
