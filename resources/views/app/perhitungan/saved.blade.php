@extends('app.layouts.app')
@section('title','Home')

@section('search_term',$search)

@section('content')
<div class="container mb-5" style="margin-top:5rem;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Daftar Perhitungan yang disimpan</div>
                    <div class="card-body">
                        @if($search)
                            <span class="d-flex justify-content-center">Hasil pencarian untuk {{$search}} :</span>
                            <hr/>
                        @endif
                        <div class="list-group">
                            @foreach ($perhitungans as $perhitungan)
                            <a href="{{route('perhitungan.show',$perhitungan->id)}}" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                      <h5 class="mb-2 h5">{{$perhitungan->name}}</h5>
                                    <small>{{$perhitungan->created_at->diffForHumans()}}</small>
                                    </div>
                                    <p class="mb-2">Kriteria : {{implode(', ',$perhitungan->getKriterias())}}</p>
                                    <small>{{$perhitungan->description}}</small>
                                  </a>
                            @endforeach        
                        </div>

                        <div class="d-flex justify-content-center mt-5">
                            {{$perhitungans->appends($_GET)->render()}}
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            
        </div>
    </div>
</div>
@endsection

@push('script-bawah')

@endpush