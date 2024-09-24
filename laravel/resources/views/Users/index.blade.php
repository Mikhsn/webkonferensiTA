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
<h2 class="mb-4 text-center">List Users</h2>

@if($users->isEmpty())
<div class="alert alert-warning text-center">Tidak ada data pengguna.</div>
@else
<!-- Form Pencarian -->
<div class="mb-3">
    <form action="{{ url()->current() }}" method="GET" class="d-flex">
        <input type="text" name="search" class="form-control me-2" placeholder="Search User..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary">Cari</button>
    </form>
</div>
<div class="container mt-5 shadow-lg p-4 bg-white rounded">

        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Registration Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $index => $user)
                        <tr>
                            <td>{{ $loop->iteration + ($users->currentPage() - 1) * $users->perPage() }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if($user->role_id == 1)
                                    <span class="badge bg-primary">Admin</span>
                                @elseif($user->role_id == 2)
                                    <span class="badge bg-secondary">User Biasa</span>
                                @elseif($user->role_id == 3)
                                    <span class="badge bg-success">Member</span>
                                @endif
                            </td>
                            <td>{{ $user->created_at->format('d M Y') }}</td>
                            <td>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?');">Hapus</button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row mt-4">
            <div class="col text-center">
                {{ $users->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
    @endif
</div>
@endsection
