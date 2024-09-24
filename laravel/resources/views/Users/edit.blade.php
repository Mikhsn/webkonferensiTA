@extends('master.kerangka')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Edit Pengguna</h2>

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ $user->name }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Pengguna</button>
    </form>
</div>
@endsection
