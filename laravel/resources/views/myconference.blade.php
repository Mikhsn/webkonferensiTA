@extends('master.user')
@section('main')
<div class="container mt-5">
    @if($transactions->isEmpty())
        <div class="alert alert-warning text-center" role="alert">
            Anda belum membeli conference, silahkan beli conference terlebih dahulu!
        </div>
    @else
        @foreach ($transactions as $transaction)
            @if($transaction->status == 'pending')
                <div class="alert alert-info text-center" role="alert">
                    Tunggu approved dari administrator sebelum mengakses conference!
                </div>
            @else
            <div class="card mb-4 shadow-sm">
                <div class="card-body d-flex">
                    <img src="{{ asset('/storage/conference/' . $transaction->conference->image) }}"
                         alt="{{ $transaction->conference->title }}"
                         class="img-thumbnail"
                         style="width: 150px; height: auto; margin-right: 20px;">

                    <div>
                        <h3 class="card-title">{{ $transaction->conference->title }}</h3>
                        <p class="card-text">Countdown: <span id="countdown-{{ $transaction->id }}" class="font-weight-bold text-primary"></span></p>
                        <div id="certificate-{{ $transaction->id }}" style="display:none;">
                            <a href="{{ route('download.certificate', $transaction->id) }}" class="btn btn-success mt-3">Download Certificate</a>
                        </div>
                    </div>
                </div>
            </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        // Mengambil date dari conference
                        let endTime = new Date("{{ $transaction->conference->date }}").getTime();
                        let countdownElement = document.getElementById("countdown-{{ $transaction->id }}");
                        let certificateElement = document.getElementById("certificate-{{ $transaction->id }}");

                        let x = setInterval(function() {
                            let now = new Date().getTime();
                            let distance = endTime - now;

                            let days = Math.floor(distance / (1000 * 60 * 60 * 24));
                            let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                            let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                            let seconds = Math.floor((distance % (1000 * 60)) / 1000);

                            countdownElement.innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s ";

                            if (distance < 0) {
                                clearInterval(x);
                                countdownElement.innerHTML = "EXPIRED";
                                certificateElement.style.display = "block";
                            }
                        }, 1000);
                    });
                </script>
            @endif
        @endforeach
    @endif
</div>
@endsection
