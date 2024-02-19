@extends('layout.app')
@section('title','Aylık Gelir Takip')
@section('content')

<div class="text-center"><span class="badge bg-danger mb-4">Aylara Göre Gelir</span></div>


@php
    $monthNames = [
        "1" => "Ocak",
        "2" => "Şubat",
        "3" => "Mart",
        "4" => "Nisan",
        "5" => "Mayıs",
        "6" => "Haziran",
        "7" => "Temmuz",
        "8" => "Ağustos",
        "9" => "Eylül",
        "10" => "Ekim",
        "11" => "Kasım",
        "12" => "Aralık"
    ];
    @endphp

<div class="row">
@foreach ($monthlyRevenue as $revenue)
    <div class="col-xl-3">
    <div class="card">
            @php
                $year = $revenue->year;
                $month = $revenue->month;
                $amount = $revenue->revenue;
            @endphp
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-5">
                                <img src="assets/images/logo/bey.jpg" width="100px" height="100px" alt="">
                                </div>
                                <div class="col-md-7">
                                    <div class="badge bg-light-danger text-center mb-2">{{$year}} </div>
                                    <h5 class="text-dark font-semibold"><b>{{ $monthNames[$month] ?? $month }}</b></h5>
                                    <h6 class="font-extrabold mb-0 text-success">{{ $amount }} ₺</h6>
                               
                                   
                                </div>
                            </div>
                        </div>
                    </div>
    </div>
    @endforeach
    
</div>


@endsection