@extends('layout.app')
@section('title','Ürün Filtrele')
@section('content')

<nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('index')}}">Ana Sayfa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Ürün Filtele</li>
                    </ol>
                </nav>

<div class="card">
    
    <div class="card-body">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#satis">
                                            <i class="bi bi-filter me-2"></i>Ürün Filterele
                                        </button>

                                        <div class="modal fade text-left" id="satis" tabindex="-1" role="dialog"
                                            aria-labelledby="myModalLabel160" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-primary">
                                                        <h5 class="modal-title white" id="myModalLabel160">Ürün Filtrele
                                                        </h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                    <form action="{{route('product_filter_add')}}" method="POST">
                                                    @csrf
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="basicInput">Ürün Seç </label>
                                                                <select class="form-select" name="product_id">
                                                                    <option selected>Ürün Seç...</option>
                                                                    @foreach($product as $items)
                                                                    <option value="{{$items->id}}">{{$items->name}}</option>
                                                                    @endforeach
                                                                   
                                                                </select>
                                                            </div>
                                                           
                                                            
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light-secondary"
                                                                data-bs-dismiss="modal">
                                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Kapat</span>
                                                            </button>
                                                            <button type="submit" class="btn btn-primary ml-1"
                                                                >
                                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Filtrele</span>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
    </div>
</div>          

<div class="card">
    @if($sales->count()>0)
    <div class="card-header">
        <h4> <b>Ürünün Toplam Hasılatı :</b> <span class="badge bg-success">{{$sum_hasılat}} ₺ </span>
    </div></h4> 
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
                                   @foreach($sales as $items)
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
    @endif
    @if($sales->count()==0)
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-xl-4"></div>
                <div class="col-xl-4"><img src="assets/images/search.png" width="400px" height="250px"></div>
                <div class="col-xl-4"></div>
            </div>
            <h5 class="text-warning text-center">Butonu Kullanarak Filtreleme Yapınız!</h5>
            
        </div>
    </div>
    @endif()
</div>


@endsection