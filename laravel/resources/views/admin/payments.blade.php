@extends('master.kerangka')
@section('content')
<h3 class="mb-0 text-center">Payment List</h3>
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Manage Payments</h5>
        </div>
        <div class="card-body">
            <table class="table table-hover table-striped table-bordered table-responsive-md">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">User</th>
                        <th scope="col">Payment Type</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Status</th>
                        @if($payments->contains('transaction_status', 'pending'))
                            <th scope="col">Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($payments as $payment)
                        <tr>
                            <td>{{ $payment->id }}</td>
                            <td>{{ $payment->user->name }}</td>
                            <td>{{ $payment->payment_type }}</td>
                            <td>{{ number_format($payment->amount, 2) }}</td>
                            <td>
                                <span class="badge
                                    @if($payment->transaction_status == 'pending') badge-warning bg-warning
                                    @elseif($payment->transaction_status == 'approved') badge-success bg-success
                                    @elseif($payment->transaction_status == 'rejected') badge-danger bg-danger
                                    @endif">
                                    {{ ucfirst($payment->transaction_status) }}
                                </span>
                            </td>
                            @if ($payment->transaction_status == 'pending')
                                <td>
                                    <div class="btn-group" role="group" aria-label="Approve or Reject">
                                        <form action="{{ route('payments.approve', $payment->id) }}" method="POST" class="mr-1">
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
@endsection
