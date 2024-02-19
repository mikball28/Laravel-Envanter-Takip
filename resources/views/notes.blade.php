@extends('layout.app')
@section('title','Notlar')
@section('content')

<nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('index')}}">Ana Sayfa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Notlar</li>
                    </ol>
                </nav>


                <div class="card">
<div class="card-body">
            <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                            data-bs-target="#satis">
                                            <i class="bi bi-journal-plus me-2"></i> Not Ekle
                                        </button>

                                        <div class="modal fade text-left" id="satis" tabindex="-1" role="dialog"
                                            aria-labelledby="myModalLabel160" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-info">
                                                        <h5 class="modal-title white" id="myModalLabel160">Ürün Filtrele
                                                        </h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                    <form action="{{route('notes')}}" method="POST">
                                                    @csrf
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="basicInput">Başlık </label>
                                                                <input type="text" class="form-control" name="title" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="basicInput">Not</label>
                                                                <textarea class="form-control" name="notes" rows="5"></textarea>
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light-secondary"
                                                                data-bs-dismiss="modal">
                                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Kapat</span>
                                                            </button>
                                                            <button type="submit" class="btn btn-info ml-1"
                                                                >
                                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Notu Ekle</span>
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
                                        <th>ID</th>
                                        <th>Başlık</th>
                                        <th>Not</th>
                                        <th>Tarih</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($note as $items)
                                    <tr>
                                        <td class="text-bold-500">{{$items->id}}</td>
                                        <td>{{$items->title}}</td>
                                        <td class="text-bold-500">{{$items->notes}} </td>
                                        <td>{{$items->created_at}}</td>
                                        
                                    </tr>
                                    @endforeach
                                   
                                </tbody>
                            </table>
    </div>
</div>

@endsection