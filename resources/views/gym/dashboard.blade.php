@extends('partial.master-gym')

@section('judul','Dashboard')

@section('content')
<main class="main-content position-relative border-radius-lg">
    @include('partial.sidebar-gym')

    @include('partial.navbar-gym')
    <div class="container-fluid py-4">
        <div class="row">
            <!-- berulang -->
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4 py-1">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">
                                        Today's Money
                                    </p>
                                    <h5 class="font-weight-bolder">
                                        $53,000
                                    </h5>
                                    <p class="mb-0">
                                        <span class="text-success text-sm font-weight-bolder">+55%</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->

        </div>



    </div>
</main>
@endsection