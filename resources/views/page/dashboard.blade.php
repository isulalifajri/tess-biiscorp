@extends('layout.main')

@push('css')

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    
@endpush

@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
  </div>

  
  <span>Mini Case PT Griya Nadi <b>(bisscorp.com)</b></span>

  @php
        $hour = date("G");
        if ((int)$hour >= 0 && (int)$hour <= 10) {
            $greet = "Selamat Pagi";
        } else if ((int)$hour >= 11 && (int)$hour <= 14) {
            $greet = "Selamat Siang";
        } else if ((int)$hour >= 15 && (int)$hour <= 17) {
            $greet = "Selamat Sore";
        } else if ((int)$hour >= 18 && (int)$hour <= 23) {
            $greet = "Selamat Malam";
        } else {
            $greet = "Welcome,";
        }
    @endphp
        <h5>Halo, {{ $greet }}... </h5>

       


        
        @endsection
       