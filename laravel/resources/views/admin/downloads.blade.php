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
    <h2 class="mb-4 text-center">Users Who Have Downloaded the Certificate</h2>
    <div class="container mt-5 shadow-lg p-4 bg-white rounded">
        <div class="table-responsive">
            @if ($transactions->isEmpty())
                <div class="alert alert-warning text-center" role="alert">
                    No users have downloaded the certificate yet !
                </div>
            @else
                <table class="table table-striped table-hover table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">User Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Conference</th>
                            <th class="text-center">Certificate Downloaded</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $index => $transaction)
                            <tr>
                                <td class="text-center">{{ $loop->iteration + ($transactions->currentPage() - 1) * $transactions->perPage() }}
                                </td>
                                <td>{{ $transaction->user->name }}</td>
                                <td>{{ $transaction->user->email }}</td>
                                <td>{{ $transaction->conference->title }}</td>
                                <td class="text-center">
                                    @if ($transaction->certificate_downloaded)
                                        <span class="badge badge-success bg-success">Done</span>
                                    @else
                                        <span class="badge badge-secondary bg-danger">Not Yet</span>
                                    @endif
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $transactions->links() }}
            @endif
        </div>
    </div>
@endsection
