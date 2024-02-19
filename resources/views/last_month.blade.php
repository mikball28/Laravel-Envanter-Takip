@extends('layout.app')

@section('title','Önceki Ay')
@section('content')


    @php
    $monthNames = [
        "January" => "Ocak",
        "February" => "Şubat",
        "March" => "Mart",
        "April" => "Nisan",
        "May" => "Mayıs",
        "June" => "Haziran",
        "July" => "Temmuz",
        "August" => "Ağustos",
        "September" => "Eylül",
        "October" => "Ekim",
        "November" => "Kasım",
        "December" => "Aralık"
    ];
    @endphp

<div class="text-center mb-5 mt-0"><span class="badge bg-warning">{{ $monthNames[$month] ?? $month }}</span></div>

<div class="row">
    <div class="col-xl-4">
    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon ">
                                        <i class="iconly-boldBookmark"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Toplam Ürün</h6>
                                    <h6 class="font-extrabold mb-0">{{$total_product}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
    </div>
    <div class="col-xl-4">
    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon ">
                                        <i class="iconly-boldBookmark"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold"><b>{{ $monthNames[$month] ?? $month }}</b> Ayı Toplam Gelir</h6>
                                    <h6 class="font-extrabold mb-0 text-success">{{$last_month}} ₺</h6>
                                </div>
                            </div>
                        </div>
                    </div>
    </div>
    <div class="col-xl-4">
    <div class="card">
                        <div class="card-body px-3 py-4-5"><i class="bi bi-exclamation-triangle text-warning"></i>
                            Raporlama <b class="text-warning">{{$startDate->formatLocalized('%d.%m.%Y')}}</b> - 
                            <b class="text-warning">{{$endDate->formatLocalized('%d.%m.%Y')}}</b> tarihleri arasındaki verileri göstermektedir.
                        </div>
                    </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
    <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Ürün Adı</th>
                                        <th>Satış Miktarı</th>
                                        <th>Ürün Toplam Miktar</th>
                                        <th>Ürün Kalan Miktar</th>
                                        <th>Ürün Hasılat</th>
                                        <th>Tarih</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach($last_month_filter as $items)
                                    <tr>
                                    <td class="text-bold-500"><b>{{$items->product->name}}</b></td>
                                        <td>{{$items->satis_miktari}}</td>
                                        <td><b>{{$items->product->toplam_quantity}}</b></td>
                                        <td class="text-bold-500 text-warning">@if($items->kalan_miktar>0) {{$items->kalan_miktar}} @endif 
                                                                                @if($items->kalan_miktar<=0) <span class="badge bg-danger">Ürün Stok Tükendi!!</span> @endif 
                                        </td>
                                        <td class="text-success">{{$items->hasılat}} ₺</td>
                                        <td>{{$items->created_at}}</td>
                                       
                                    </tr>
                                    @endforeach
                                   
                                   
                                </tbody>
                            </table>

    </div>
</div>

@endsection