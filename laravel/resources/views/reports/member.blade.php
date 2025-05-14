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

        .btn-cetak {
            background-color: #4e73df;
            border: none;
            color: white;
            padding: 10px 18px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }

        .btn-cetak:hover {
            background-color: #2e59d9;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            text-decoration: none;
            color: white;
        }

        .btn-wrapper {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 15px;
        }
    </style>
    <h2 class="text-center mb-4">List of Members</h2>
    <div class="container my-5  my-5 shadow-lg p-4 bg-white rounded">
        <div class="btn-wrapper">
            <a href="/member/cetak" class="btn-cetak" target="_blank">
                <i class="bi bi-printer-fill"></i> Print
            </a>
        </div>
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
                    @foreach ($members as $index => $member)
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
