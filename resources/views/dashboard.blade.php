@extends('layouts.backend.index')

@section('title')
    Dashboard | Somalia
@endsection


@section('after_next')
    Dashboard | Somalia Sky
@endsection


@section('content')
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color: #016764">
                <div class="inner">
                    <h3>{{ $totalAds }}</h3>

                    <p>All Ads</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{ route('ads.index') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <!-- ./col -->
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color: #016764">
                <div class="inner">
                    <h3>{{ $adsDaily }}</h3>

                    <p>Number Of Ads Daily</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{ route('adsnotactive.index') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color: #016764">
                <div class="inner">
                    <h3>{{ $adsMonthly }}<sup style="font-size: 20px"></h3>

                    <p>Number Of Ads Monthly</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{ route('ads.index') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <!-- /.row -->
    <div id="app">
        {!! $chart->container() !!}
    </div>
    <script src="https://unpkg.com/vue"></script>
    <script>
        var app = new Vue({
            el: '#app',
        });
    </script>
    <script src=https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js charset=utf-8></script>
    {!! $chart->script() !!}
@endsection
