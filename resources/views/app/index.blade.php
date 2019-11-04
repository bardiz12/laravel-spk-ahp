@extends('app.layouts.app')
@section('title','Home')


@section('content')
<div class="container mb-5" >
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron" style="background-image: url(https://mdbootstrap.com/img/Photos/Others/gradient1.jpg);">
                    <div class="text-white text-center px-2 my-5">
                        <div>
                            <h2 class="card-title h1-responsive pt-3 mb-5 font-bold"><strong>Analytical Hierarchy Process</strong></h2>
                            <a class="btn btn-outline-white btn-md" href="#team-container"><i class="fa fa-rocket"></i> Our Team</a>
                            <a class="btn btn-outline-white btn-md" href="#about-container"><i class="fa fa-info"></i> About this Project</a><br/>

                        <a class="btn btn-primary btn-lg" href="{{route('perhitungan.buat')}}"><i class="fa fa-calculator"></i> Buat Perhitungan</a>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="row">
            <div class="col-md-6">
                    <div class="jumbotron animate-all aqua-gradient" id="team-container">
                            <div class="text-white text-left px-4 my-1">
                                <div>
                                <h2 class="card-title h1-responsive pt-1 mb-5 font-bold text-center "><strong><i class="fa fa-rocket"></i> OUR TEAM</strong></h2>
                                <div id="team" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                          <div class="carousel-item active" data-color="blue-gradient">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12 text-center">
                                                        <img src="https://avatars1.githubusercontent.com/u/25524265" class="rounded-circle" alt="" style="width:50%;">
                                                        <br>
                                                        Moch Bardizba Z.<br/>
                                                        4611416038
                                                        <br>
                                                        <small>Manusia</small>
                                                    </div>
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#team" role="button" data-slide="prev">
                                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                          <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#team" role="button" data-slide="next">
                                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                          <span class="sr-only">Next</span>
                                        </a>
                                      </div>
                                </div>
                            </div>
                        </div>
            </div>
            <div class="col-md-6">
                <div class="jumbotron purple-gradient" id="about-container">
                        <div class="text-white px-4 my-1">
                                <h2 class="card-title h1-responsive pt-1 mb-5 font-bold text-center"><strong>ABOUT <i class="fa fa-info"></i></strong></h2>
                                <div class="text-right">
                                    <strong>{{env('APP_NAME')}}</strong> adalah sebuah aplikasi sistem penghitungan salah satu metode <i>Decision Support System</i>, yaitu <i>Analytical Hierarcy Process</i>
                                    <br>
                                </div>
                                <div class="text-center small mt-5">
                                    This Project is created using :  <br>
                                    <div class="row">
                                        <span class="col-6">
                                            <a href="https://github.com/laravel/laravel" class="text-white"><i class="fa fa-github"></i><br> Laravel/Laravel</a>
                                        </span>
                                        <span class="col-6">
                                            <a href="https://github.com/bardiz12/AHPDss" class="text-white"><i class="fa fa-github"></i> <br>bardiz12/AHPDss</a>
                                        </span>
                                        <span class="col-6">
                                            <a href="https://github.com/mdbootstrap/bootstrap-material-design" class="text-white"><i class="fa fa-github"></i> <br/>bootstrap-material-design</a>
                                        </span>
                                        <span class="col-6">
                                            <a href="https://github.com/jquery/jquery" class="text-white"><i class="fa fa-github"></i><br> jquery/jquery</a>
                                        </span>
                                        
                                    </div>
                                     
                                     

                                     
                                     
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
<script>
    var color = ['purple-gradient', 'peach-gradient' ,'blue-gradient', 'aqua-gradient'];
    var choosen =null;
    $(document).ready(function () {
        $('#team').carousel({
            interval: 2000
        })
        $('#team').on('slide.bs.carousel', function (e) {
            $("#team-container").removeClass('purple-gradient peach-gradient blue-gradient aqua-gradient').addClass($(e.relatedTarget).data('color'))
        })
    })
</script>
@endpush