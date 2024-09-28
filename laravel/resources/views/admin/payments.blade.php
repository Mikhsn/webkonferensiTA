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
    <h3 class="mb-0 text-center">Payment List</h3>
    <div class="container mt-5">
            @if ($payments->isEmpty())
                <div class="alert alert-warning text-center">Tidak ada data pengguna.</div>
            @else
                <!-- Form Pencarian -->
                <div class="mb-3">
                    <form action="{{ url()->current() }}" method="GET" class="d-flex">
                        <input type="text" name="search" class="form-control me-2" placeholder="Search User..."
                            value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </form>
                </div>
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Manage Payments</h5>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-striped table-bordered table-responsive-md">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" class="text-center">No</th>
                                <th scope="col" class="text-center">User</th>
                                <th scope="col" class="text-center">Payment Type</th>
                                <th scope="col" class="text-center">Amount</th>
                                <th scope="col" class="text-center">Status</th>
                                @if ($payments->contains('transaction_status', 'pending'))
                                    <th scope="col" class="text-center">Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $index => $payment)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration + ($payments->currentPage() - 1) * $payments->perPage() }}</td>
                                    <td>{{ $payment->user->name }}</td>
                                    <td class="text-center">{{ $payment->payment_type }}</td>
                                    <td class="text-center">{{ number_format($payment->amount, 2) }}</td>
                                    <td class="text-center">
                                        <span
                                            class="badge
                                    @if ($payment->transaction_status == 'pending') badge-warning bg-warning
                                    @elseif($payment->transaction_status == 'approved') badge-success bg-success
                                    @elseif($payment->transaction_status == 'rejected') badge-danger bg-danger @endif">
                                            {{ ucfirst($payment->transaction_status) }}
                                        </span>
                                    </td>
                                    @if ($payment->transaction_status == 'pending')
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Approve or Reject">
                                                <form action="{{ route('payments.approve', $payment->id) }}" method="POST"
                                                    class="mr-1">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-success btn-sm">
                                                        <i class="fas fa-check-circle"></i> Approve
                                                    </button>
                                                </form>
                                                <form action="{{ route('payments.reject', $payment->id) }}" method="POST">
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
                            {{ $payments->links('vendor.pagination.bootstrap-5') }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    @endif
    @endsection
