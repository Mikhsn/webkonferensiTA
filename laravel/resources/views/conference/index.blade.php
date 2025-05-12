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
    <div class="container mb-4">
        <h2 class="text-center mb-4">List Of Conferences</h2>
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        @if (session()->has('success'))
                            <div class="alert alert-secondary" role="alert" id="alertMessage">
                                {{ session('success') }}
                            </div>
                        @elseif (session()->has('failed'))
                            <div class="alert alert-danger" role="alert" id="alertMessage">
                                {{ session('failed') }}
                            </div>
                        @endif


                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <a href="/conferences/tambah" class="btn btn-md btn-primary">ADD CONFERENCE</a>
                        </div>
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">NO</th>
                                    <th scope="col" class="text-center">IMAGE</th>
                                    <th scope="col" class="text-center">TITLE</th>
                                    <th scope="col" class="text-center">DESCRIPTION</th>
                                    <th scope="col" class="text-center">DATE</th>
                                    <th scope="col" class="text-center">LOCATION</th>
                                    <th scope="col" class="text-center">PRICE</th>
                                    <th scope="col" class="text-center">MEMBER DISCOUNT</th>
                                    <th scope="col" class="text-center">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($conferences as $index => $conference)
                                    <tr>
                                        <td class="text-center">
                                            {{ $loop->iteration + ($conferences->currentPage() - 1) * $conferences->perPage() }}
                                        </td>
                                        <td class="text-center">
                                            <img src="{{ Storage::url('public/conference/') . $conference->image }}"
                                                class="img-fluid rounded" style="width: 120px">
                                        </td>
                                        <td>{{ $conference->title }}</td>
                                        <td>{!! Str::limit($conference->description, 100) !!}</td>
                                        <td>{{ $conference->date }}</td>
                                        <td>{{ $conference->location }}</td>
                                        <td class="text-center">Rp{{ number_format($conference->price, 2, ',', '.') }}</td>
                                        <td class="text-center">{{ number_format($conference->discount, 0, ',', '.') }}%
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('conferences.edit', $conference->id) }}"
                                                class="btn btn-sm btn-warning">UPDATE</a>
                                            <form onsubmit="return confirm('Are you sure you want to delete this conference ?');"
                                                action="{{ route('conferences.destroy', $conference->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <br>
                                                <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
                                            </form>

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">
                                            <div class="alert alert-danger">
                                                Conference data is not yet available.
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <!-- Menampilkan link pagination -->
                        {{ $conferences->links('vendor.pagination.bootstrap-5') }}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var alertMessage = document.getElementById('alertMessage');
            if (alertMessage) {
                setTimeout(function() {
                    alertMessage.style.display = 'none';
                }, 3000);
            }
        });
    </script>
@endsection
