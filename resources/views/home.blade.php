@extends('layouts.header')

@section('content')

@section('content')
@if(session()->has('status'))
<div class="alert alert-success alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    {{session()->get('status')}}
</div>
@endif
@include('error')
<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                    <div class="col-lg-4">
                        <div class="ibox ">
                            <div class="ibox-title">
                                {{-- <div class="ibox-tools">
                                    <span class="label label-success float-right">Monthly</span>
                                </div> --}}
                                <h5> Ordinances</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">{{$data['total_ordinance']}}</h1>
                                <div class="stat-percent font-bold text-success"><i class="fa fa-balance-scale fa-lg"></i></div>
                                <small>Total Ordinances</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="ibox ">
                            <div class="ibox-title">
                                {{-- <div class="ibox-tools">
                                    <span class="label label-success float-right">Monthly</span>
                                </div> --}}
                                <h5> Legalizations</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">{{ $data['total_legalization']}}</h1>
                                <div class="stat-percent font-bold text-success"><i class="fa fa-legal fa-lg"></i></div>
                                <small>Total Legalizations</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="ibox ">
                            <div class="ibox-title">
                                {{-- <div class="ibox-tools">
                                    <span class="label label-success float-right">Monthly</span>
                                </div> --}}
                                <h5> Motorized</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">{{$data['total_motorized']}}</h1>
                                <div class="stat-percent font-bold text-success"> <i class="fa fa-motorcycle fa-lg"></i></div>
                                <small>Total Motorized</small>
                            </div>
                        </div>
                    </div>
                    
            </div>

            <div class="row">
                    <div class="col-lg-6">
                        <div class="ibox">
                            <div class="ibox-title">
                                Ordinances by status
                            </div>
                            <div class="ibox-content">  
                                <canvas id="ordinances" height="358" width="768" class="chartjs-render-monitor" style="display: block; width: 768px; height: 358px;"></canvas>
                                {{-- <canvas id="ordinances" width="400" height="400"></canvas> --}}
                            </div>
                        </div>
                        
                    </div>


                    <div class="col-lg-6">
                        <div class="ibox">
                            <div class="ibox-title">
                                Legalizations by status
                            </div>
                            <div class="ibox-content">  
                                <canvas id="legalizations" height="358" width="768" class="chartjs-render-monitor" style="display: block; width: 768px; height: 358px;"></canvas>
                                {{-- <canvas id="ordinances" width="400" height="400"></canvas> --}}
                            </div>
                        </div>
                        
                    </div>
            </div>
</div>




@endsection


@section('js-custom')
<script src="{{ asset('bootstrap/js/plugins/chartJs/Chart.min.js') }}"></script>
    <script type="text/javascript">
        
        $(function () {

        
               var ordinanceData = {
                    labels: ["Implemented","Not Implemented"],
                    datasets: [{
                        data: [{{$data['imp_ordinances']}},{{$data['not_imp_ordinances']}}],
                        backgroundColor: ["#a3e1d4","#dedede"]
                    }]
                } ;

                var ordinanceOption = {
                    responsive: true
                };

                var ordinanceID = document.getElementById("ordinances").getContext("2d");
                new Chart(ordinanceID, {type: 'doughnut', data: ordinanceData, options:ordinanceOption});



                 var legalizationData = {
                    labels: ["Implemented","Not Implemented"],
                    datasets: [{
                        data: [{{$data['imp_legalizations']}},{{$data['not_imp_legalizations']}}],
                        backgroundColor: ["#a3e1d4","#dedede"]
                    }]
                } ;

                var legalizationOption = {
                    responsive: true
                };

                var legalizationID = document.getElementById("legalizations").getContext("2d");
                new Chart(legalizationID, {type: 'doughnut', data: legalizationData, options:legalizationOption});



            });
    </script>
@endsection



