@extends('layout.app')
@section('title','Satış')
@section('content')

<nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('index')}}">Ana Sayfa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Satış</li>
                    </ol>
                </nav>

<div class="card">
    <div class="card-body">
            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#satis">
                                            <i class="bi bi-file-earmark-minus-fill me-2"></i>Satış Yap
                                        </button>

                                        <div class="modal fade text-left" id="satis" tabindex="-1" role="dialog"
                                            aria-labelledby="myModalLabel160" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-danger">
                                                        <h5 class="modal-title white" id="myModalLabel160">Satış
                                                        </h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                    <form action="{{route('sales')}}" method="POST">
                                                    @csrf
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="basicInput">Ürün Seç </label>
                                                                <select class="form-select" name="product_id">
                                                                    <option selected>Ürün Seç...</option>
                                                                    @foreach($product as $items)
                                                                    <option value="{{$items->id}}"><b class="text-warning">{{$items->name}}</b> (Kalan Adet : {{$items->quantity}} )</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="basicInput">Satılan Adet</label>
                                                                <input type="number" class="form-control" name="satis_miktari" >
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light-secondary"
                                                                data-bs-dismiss="modal">
                                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Kapat</span>
                                                            </button>
                                                            <button type="submit" class="btn btn-danger ml-1"
                                                                >
                                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Satış</span>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
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
                                    @foreach($sales as $items)
                                    <tr>
                                        <td class="text-bold-500">{{$items->product->name}}</td>
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