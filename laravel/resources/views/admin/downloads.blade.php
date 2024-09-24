@extends('master.kerangka')

@section('content')
<div class="container mt-5">
    <h2>User yang Telah Mengunduh Sertifikat</h2>

    @if($transactions->isEmpty())
        <div class="alert alert-warning text-center" role="alert">
            Belum ada user yang telah mengunduh sertifikat !
        </div>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama User</th>
                    <th>Email</th>
                    <th>Conference</th>
                    <th>Sertifikat Diunduh</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $index => $transaction)
                    <tr>
                        <td>{{ $loop->iteration + ($transactions->currentPage() - 1) * $transactions->perPage() }}</td>
                        <td>{{ $transaction->user->name }}</td>
                        <td>{{ $transaction->user->email }}</td>
                        <td>{{ $transaction->conference->title }}</td>
                        <td>
                            @if($transaction->certificate_downloaded)
                                <span class="badge badge-success bg-success">Sudah</span>
                            @else
                                <span class="badge badge-secondary bg-danger">Belum</span>
                            @endif
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $transactions->links() }}
    @endif
</div>
@endsection
