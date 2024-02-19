@extends('layout.app')
@section('title','Ürünler')
@section('content')

<nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('index')}}">Ana Sayfa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Ürünler</li>
                    </ol>
                </nav>

<div class="card mt-2">
    <div class="card-body">
    <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                            data-bs-target="#primary">
                                            <i class="bi bi-plus-circle-fill me-1"></i>Ürün Ekle
                                        </button>

                                        <!--primary theme Modal -->
                                        <div class="modal fade text-left" id="primary" tabindex="-1" role="dialog"
                                            aria-labelledby="myModalLabel160" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-secondary">
                                                        <h5 class="modal-title white" id="myModalLabel160">Ürün Ekle
                                                        </h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                    <form action="{{route('product')}}" method="POST">
                                                    @csrf
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="basicInput">Ürün Adı </label>
                                                                <input type="text" class="form-control" name="name" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="basicInput">Ürün Fiyat</label>
                                                                <input type="number" class="form-control" name="price" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="basicInput">Ürün Adet</label>
                                                                <input type="number" class="form-control" name="quantity" >
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light-secondary"
                                                                data-bs-dismiss="modal">
                                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Kapat</span>
                                                            </button>
                                                            <button type="submit" class="btn btn-secondary ml-1"
                                                                >
                                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Ekle</span>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                                        <th>Ürün Adet</th>
                                        <th>Ürün Fiyat</th>
                                        <th>Tarih</th>
                                        <th>Aksiyonlar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($product as $items)
                                    <tr>
                                        <td class="text-bold-500">{{$items->name}}</td>
                                        <td>{{$items->toplam_quantity}}</td>
                                        <td class="text-bold-500">{{$items->price}} ₺</td>
                                        <td>{{$items->created_at}}</td>
                                        <td>
                                            
                                        </td>
                                    </tr>
                                    @endforeach
                                   
                                </tbody>
                            </table>
                                <div class="row text-center mt-3">
                                <div class="col-xl-5 "></div>
                                <div class="col-xl-7 pagination-warning"> {{$product->links()}}</div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>





@endsection