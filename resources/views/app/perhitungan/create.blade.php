@extends('app.layouts.app')
@section('title','Buat Perhitungan baru')


@section('content')
<form action="/perhitungan/store" method="POST" id="store-perhitungan" enctype="multipart/form-data">
<div class="container mb-5" style="margin-top:5em !important;">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header aqua-gradient white-text py-4">
                    <strong>Buat Perhitungan Baru</strong>                 
                </h5>
                <div class="card-body px-lg-5 pt-2" id="project-body">
                        <div class="md-form">     
                            <input id="project-name" type="text" name="name" class="form-control" value="" required>
                            <label for="#project-name">Judul perhitungan</label>
                            
                        </div>
                        <div class="md-form">     
                            <input id="project-description" name="description" class="form-control" type="text" required/>
                            <label for="#project-description">Deskripsi perhitungan</label>
                        </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mt-2">
        <div class="card">
            <h5 class="card-header info-color white-text d-flex justify-content-between align-items-center py-4">
                
                        <strong>1. Criteria</strong>
                                <button type="button" class="btn btn-outline-white btn-sm" data-toggle="collapse" data-target="#criteria-body" aria-expanded="true" aria-controls="collapseOne">
                                    <i class="fa fa-eye"></i>
                                </button>
           
                
            </h5>
            <div class="card-body px-lg-5 pt-0 collapse show" id="criteria-body">
                <div class="md-form">
                    <div class="row">
                        <div class="col-10">
                            <input type="text" name="criterias[]" placeholder="Masukan criteria" class="criteria form-control" value="" required>
                            <span class="d-block">
                                <select name="types[]" class="browser-default criteria-type custom-select small" required>
                                    <option value="0" selected>Qualitative</option>
                                    <option value="1">Quantitative</option>
                                </select>
                            </span>
                            
                        </div>
                        
                        <span class="col-2">
                            <button class="btn btn-primary btn-sm" onclick="addNewCriteriaInput()" type="button">
                                <i class="fa fa-plus"></i>
                            </button>
                        </span>
                        </div>
                    </div>
                <div id="criteria-form-container">
                    
                        </div>

                    
                    
           </div>
            
        </div>
        </div>

        <div class="col-md-6 mt-2">
            <div class="card">
                <h5 class="card-header default-color white-text d-flex justify-content-between align-items-center py-4">
                    <strong>2. Candidates / Alternatives</strong>
                    <div>
                        
                        <button type="button" class="btn btn-outline-white btn-sm" data-toggle="collapse" data-target="#alternatives-matrix-body" aria-expanded="true" aria-controls="collapseOne">
                            <i class="fa fa-eye"></i>
                        </button>
                        
                    </div>
                </h5>
                <div class="card-body px-lg-5 pt-0 mt-2 collapse show" id="alternatives-matrix-body">
                    <div class="md-form">

                        <div class="row">
                            
                                <div class="col-10">
                                        <input type="text" name="alternatives[]" placeholder="Masukan Alternative" class="alternative-input form-control" required>
                                        
                                        
                                    </div>
                                    
                                    <span class="col-2">
                                        <button type="button" class="btn btn-primary btn-sm" onclick="addNewAlternativeInput()">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </span>
                               

                        </div>
                        
                        
                    </div>
                    <div id="alternative-form-container">

                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 mt-2">
            <div class="card">
                <h5 class="card-header primary-color white-text d-flex justify-content-between align-items-center py-4">
                    <strong>3. Relative Interest Matrix</strong>
                    <div>
                            <button type="button" class="btn btn-outline-warning btn-sm pull-right" onclick="generateInterestRelativeMatrix();">Generate Matrix</button> 
                        <button type="button" class="btn btn-outline-white btn-sm" data-toggle="collapse" data-target="#interest-matrix-body" aria-expanded="true" aria-controls="collapseOne">
                            <i class="fa fa-eye"></i>
                        </button>
                        
                    </div>
                </h5>
                <div class="card-body px-lg-5 pt-0 mt-2 collapse show" id="interest-matrix-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="black white-text">
                                <tr id="table-matrix-interest-atas">
                                    
                                </tr>
                            </thead>
                            <tbody id="table-matrix-interest-bawah">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 mt-2">
                <div class="card">
                    <h5 class="card-header purple-gradient white-text d-flex justify-content-between align-items-center py-4">
                        <strong>4. Matrix PairWise</strong>
                        <div>
                            
                            <button type="button" class="btn btn-outline-white btn-sm" data-toggle="collapse" data-target="#pairwise-body" aria-expanded="true" aria-controls="collapseOne">
                                <i class="fa fa-eye"></i>
                            </button>
                            <button type="button" class="btn btn-outline-white btn-sm pull-right" onclick="generatePairWiseMatrix();">Generate Matrix</button> 
                            
                        </div>
                    </h5>
                    <div class="card-body px-lg-5 pt-0 mt-2 collapse show" id="pairwise-body">
                        
                    </div>
                </div>
            </div>
        

        <div class="col-md-12 mt-2">
                <div class="card">
                    <h5 class="card-header peach-gradient white-text d-flex justify-content-between align-items-center py-4">
                        <strong>5. Simpan</strong>
                        <div>
                            
                            <button type="button" class="btn btn-outline-white btn-sm" data-toggle="collapse" data-target="#result-body" aria-expanded="true" aria-controls="collapseOne">
                                <i class="fa fa-eye"></i>
                            </button>
                            <button class="btn btn-outline-white btn-sm pull-right" type="submit">Simpan</button> 
                            
                        </div>
                    </h5>
                    <div class="card-body px-lg-5 pt-0 mt-2 collapse show" id="result-body">
                        
                    </div>
                </div>
            </div>
        </div>

</div>
</form>

@endsection

@push('script-bawah')
<script src="{{asset('assets/js/ahp.js')}}"></script>
    <script>
        

        // Material Select Initialization
$(document).ready(function() {

    $('#store-perhitungan').on('submit',function(ev){
        ev.preventDefault();
        var url = $(this).attr('action');
        var formData = new FormData(this);
        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            enctype: 'multipart/form-data',
            dataType: "html",
            processData: false,
            contentType: false,
            success: function (response) {
                $("#result-body").html(response);
            }
        });
    });
});
    </script>
@endpush