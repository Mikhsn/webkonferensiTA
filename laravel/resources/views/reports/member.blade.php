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
<h2 class="text-center mb-4">List of Members</h2>
<div class="container my-5  my-5 shadow-lg p-4 bg-white rounded">

    <div class="table-responsive">
        <table class="table table-hover table-bordered text-center">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                </tr>
            </thead>
            <tbody>
                @foreach($members as $index => $member)
                    <tr>
                        <td>{{ $loop->iteration + ($members->currentPage() - 1) * $members->perPage() }}</td>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->email }}</td>
                        <td>
                            <span class="badge bg-success">
                                {{ $member->role_id == 3 ? 'Member' : '' }}
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
        {{ $members->links('vendor.pagination.bootstrap-5') }}
    </ul>
</nav>

@endsection
