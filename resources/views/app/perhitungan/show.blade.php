@extends('app.layouts.app')
@section('title','Buat Perhitungan baru')


@section('content')
<form action="/perhitungan/ahp/hitung" method="POST" id="store-perhitungan" enctype="multipart/form-data">
<div class="container mb-5" style="margin-top:5em !important;">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header aqua-gradient white-text py-4">
                    <strong>Perhitungan AHP</strong>                 
                </h5>
                <div class="card-body px-lg-5 pt-2" id="project-body">
                        <div class="md-form">     
                        <input id="project-name" type="text" class="form-control" value="{{$perhitungan->name}}" disabled>
                            <label for="#project-name">Judul perhitungan</label>
                            
                        </div>
                        <div class="md-form">     
                        <input id="project-description"  class="form-control" type="text" value="{{$perhitungan->description}}" disabled/>
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
                @foreach ($perhitungan->getJsonData()['criterias'] as $i => $criteria)
                <div class="md-form">
                        <div class="row">
                            <div class="col-10">
                            <input type="text" name="criterias[]" placeholder="Masukan criteria" class="form-control criteria" value="{{$criteria}}" required>
                                <span class="d-block">
                                    <select name="types[]" class="browser-default custom-select criteria-type small" required>
                                        <option value="0"{{$perhitungan->getJsonData()['types'][$i] == 0 ? 'selected':''}}>Qualitative</option>
                                        <option value="1" {{$perhitungan->getJsonData()['types'][$i] == 1 ? 'selected':''}}>Quantitative</option>
                                    </select>
                                </span>
                            </div>
                            <span class="col-1">
                                @if($i == 0)
                                <button class="btn btn-primary btn-sm" onclick="addNewCriteriaInput()" type="button">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                @else
                                <button type="button" class="btn btn-danger btn-sm" onclick="return deleteCriteriaInput(this);">
                                    <i class="fa fa-trash"></i>
                                </button>
                                @endif
                            </span>
                        </div>
                    </div>
                @endforeach
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
                    @foreach ($perhitungan->getJsonData()['alternatives'] as $i => $alternative)
                    <div class="md-form">

                            <div class="row">
                                
                                    <div class="col-10">
                                    <input type="text" name="alternatives[]" placeholder="Masukan Alternative" class="alternative-input form-control" value="{{$alternative}}" required>
                                            
                                            
                                        </div>
                                        
                                        <span class="col-2">
                                            @if($i == 0)
                                            <button type="button" class="btn btn-primary btn-sm" onclick="addNewAlternativeInput()">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            @else
                                            <button type="button" class="btn btn-danger btn-sm" onclick="return deleteCriteriaInput(this);">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            @endif
                                        </span>
                                   
    
                            </div>
                            
                            
                        </div>
                    @endforeach
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
                        <strong>5. Result</strong>
                        <div>
                            
                            <button type="button" class="btn btn-outline-white btn-sm" data-toggle="collapse" data-target="#result-body" aria-expanded="true" aria-controls="collapseOne">
                                <i class="fa fa-eye"></i>
                            </button>
                            <button type="button" class="btn btn-outline-white btn-sm" data-toggle="collapse" data-target="#coretan-body" aria-expanded="true" aria-controls="collapseOne">
                                    <i class="fa fa-calculator"></i>
                                </button>
                            <button class="btn btn-outline-white btn-sm pull-right" type="submit">GET RESULT</button> 
                            
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
        $.each($(".fa-eye"), function (i, el) { 
            console.log($(el).parent().data('target'));
         if($(el).parent().data('target') != '#result-body'){
             $(el).parent().click();
             console.log($(el).parent());
         }
    });
            $('input').on('focus', function (e) {
                $(this)
                    .one('mouseup', function () {
                        $(this).select();
                        return false;
                    })
                    .select();
            });
        
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
        var perhitunganData = JSON.parse('{!!$perhitungan->data!!}');
        console.log(perhitunganData);
        generateInterestRelativeMatrix();
        generatePairWiseMatrix();
        //Load Interest Matrix Value;
        for (let i = 0; i < perhitunganData.baris.length; i++) {
            for (let j = 0; j < perhitunganData.baris[i].length; j++) {
                $("#table-input-"+ i +"-" +j ).val(perhitunganData.baris[i][j]);
            }
        }
        let isQuanti = false;
        for (let i = 0; i < perhitunganData.pairwise.length; i++) {
            const pairwise = perhitunganData.pairwise[i];
            isQuanti = (perhitunganData.types[i] == 1);
            for (let j = 0; j < pairwise.length; j++) {
                if(isQuanti){
                    $("#table-quantitative-"+i+"-"+j).val(pairwise[j]);
                }else{
                    for (let k = 0; k < pairwise[j].length; k++) {
                        $("#table-"+i+"-input-"+j+"-"+k).val(pairwise[j][k]);
                    }
                }
            }
        }
        
        $('#store-perhitungan').submit();
    });
    </script>
@endpush