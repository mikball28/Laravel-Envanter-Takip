@extends('layout.app')
@section('title','Ana Sayfa')
@section('content')

<section class="row">
        <div class="col-12 col-lg-8">
            <div class="row">
                <div class="col-6 col-lg-4 col-md-6">
                    <a href="{{route('product')}}">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
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
                    </a>
                </div>
                
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon yellow">
                                        <i class="iconly-boldBookmark"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Toplam Gelir</h6>  
                                    <h6 class="font-extrabold mb-0 text-success">{{$total_hasılat}} ₺</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-lg-4 col-md-6">
                    <a href="{{route('last_month')}}">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon yellow">
                                            <i class="iconly-boldBookmark"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Önceki Ay Gelir </h6>
                                        <h6 class="font-extrabold mb-0 text-success">{{$last_ay}} ₺</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Ürünler</h4>
                        </div>
                        <div class="card-body">
                        <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Ürün Adı</th>
                                        <th>Ürün Toplam Adet</th>
                                        <th>Ürün Kalan Adet</th>
                                        <th>Ürün Birim Fiyat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($product as $items)
                                    <tr>
                                        <td class="text-bold-500">{{$items->name}}</td>
                                        <td class="text-bold-500"><b>{{$items->toplam_quantity}}</b></td>
                                        <td class="text-bold-500">@if($items->quantity>0) <span class="badge bg-warning">{{$items->quantity}}</span> @endif
                                                                 @if($items->quantity<=0)<span class="badge bg-danger"> Ürün Stok Tükendi!!</span> @endif
                                        </td>
                                        <td class="text-success">{{$items->price}} ₺</td>
                                    </tr>
                                    @endforeach
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="card">
                    <div class="card-header ">
                                 <h4>
                                    <div class="stats-icon purple">
                                        <div class="text-light">
                                            <a href="#">
                                                <svg class="bi text-light" width="1em" height="1em" fill="currentColor">
                                                    <use
                                                        xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#bookmark-dash" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>Son Notlar
                                </h4>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-4 text-dark">
                                <b>Başlık</b>
                            </div>
                            <div class="col-8 text-dark">
                                <b>Not</b>
                            </div>
                        </div>
                        @foreach($note as $items)
                        <div class="row">
                            
                            <div class="col-4 mt-2">
                                <div class="nav flex-column nav-pills" id="{{$items->id}}a" role="tablist"
                                    aria-orientation="vertical">
                                    <a class="nav-link active bg-warning" id="{{$items->id}}a" data-bs-toggle="pill"
                                        href="#{{$items->id}}a" role="tab" aria-controls="{{$items->id}}a"
                                        aria-selected="true">{{$items->title}}</a>
                                </div>
                            </div>
                            <div class="col-8 mt-2  ">
                                <div class="tab-content" id="{{$items->id}}">
                                    <div class="tab-pane fade show active" id="{{$items->id}}a" role="tabpanel"
                                        aria-labelledby="{{$items->id}}a">
                                        {{$items->notes}}
                                    </div>
                                    
                                </div>
                            </div>
                            
                        </div>
                        @endforeach
                    </div>
                </div>
        </div>
        <div class="col-12 col-lg-4">
            <div class="card bg-warning">
                <div class="card-body py-4 px-4">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-xl">
                            <img src="assets/images/logo/bgrc.png" alt="Face 1">
                        </div>
                        <div class="ms-3 name">
                            <h6 class="font-bold ">BEY GARAJ</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Ürün Stok</h4>
                </div>
                <div class="card-body px-0 py-1">
                        <table class="table table-borderless">
                        @foreach($product as $items)
                            <tr>
                                <td class="col-3">{{$items->name}} </td>  
                                <td class="col-8">
                                    
                                    <div class="progress progress-warning">
                                        
                                        <div class="progress-bar" role="progressbar" style="width: {{ number_format(($items->quantity / $items->toplam_quantity) * 100, 2) }}%"
                                            aria-valuenow="0" aria-valuemin="0" aria-valuemax="{{$items->total_quantity}}">
                                        </div>
                                    </div>
                                </td>
                                <td class="col-1 text-center">{{$items->quantity}}</td>
                            </tr>
                            
                            @endforeach
                           
                        </table>
                    </div>
            </div>
        </div>

       

    </section>




@endsection