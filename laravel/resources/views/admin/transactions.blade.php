@extends('master.kerangka')
@section('content')
<style>
    .card {
        transition: all 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
    }
</style>
<h3 class="mb-0 text-center">Transaction List</h3>
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Manage Transactions</h5>
        </div>
        <div class="card-body">
            <table class="table table-hover table-striped table-bordered table-responsive-md">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="text-center">No</th>
                        <th scope="col" class="text-center">User</th>
                        <th scope="col" class="text-center">Conference</th>
                        <th scope="col" class="text-center">Status</th>
                        @if($transactions->contains('status', 'pending'))
                            <th scope="col" class="text-center">Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $index => $transaction)
                        <tr>
                            <td class="text-center">{{ $loop->iteration + ($transactions->currentPage() - 1) * $transactions->perPage() }}</td>
                            <td>{{ $transaction->user->name }}</td>
                            <td>{{ $transaction->conference->title }}</td>
                            <td>
                                <span class="badge
                                    @if($transaction->status == 'pending') badge-warning bg-warning
                                    @elseif($transaction->status == 'approved') badge-success bg-success
                                    @elseif($transaction->status == 'rejected') badge-danger bg-danger
                                    @endif">
                                    {{ ucfirst($transaction->status) }}
                                </span>
                            </td>
                            @if ($transaction->status == 'pending')
                                <td>
                                    <div class="btn-group" role="group" aria-label="Approve or Reject">
                                        <form action="{{ route('admin.approved', $transaction->id) }}" method="POST" class="mr-1">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <i class="fas fa-check-circle"></i> Approve
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.rejected', $transaction->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-times-circle"></i> Reject
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <!-- Menampilkan link pagination -->
                    {{ $transactions->links('vendor.pagination.bootstrap-5') }}
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection
