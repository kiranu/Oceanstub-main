@extends('layouts.seller_app')
@section('title','OCEANSTUB')
@section('top_scripts')
@endsection @section('style')
@endsection
@section('content')
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
<!-- Navbar -->
@include('layouts.seller_navbar')
<!-- /.navbar -->
<!-- Main Sidebar Container -->
@include('layouts.seller_sidebar')
<!-- /Main Sidebar Container -->
<div class="content-wrapper">
<div class="card card-info">
    <div class="card-header" style="background-color: #007bff;">
        <h3 class="card-title">Plan & Features Settings</h3>
    </div>
</div>
<style>
    hr {
        border-top-color: gray;
    }
</style>
<div class="row">
    <div class="col-12 col-sm-12">
        <div class="card card-gray-dark card-tabs">
            <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="false">Plan and Upgrades</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">
                            Add-on Features and Fees
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Auto Payment Method</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tabs-one-settings-tabcustom" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Account Cancellation</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="tab-content" id="custom-tabs-one-tabContent">
            @include('seller.accounts&settings.plans.plan_and_upgrades')
             @include('seller.accounts&settings.plans.features_and_fees') 
             @include('seller.accounts&settings.plans.auto_payment_method')
            @include('seller.accounts&settings.plans.account_cancellation')
        </div>
    </div>
</div>
</div>
@include('layouts.seller_footer')
</div>
@endsection
@section('bottom_scripts')
<script>
function ChangePlan() {
$("#planChangeDiv").fadeIn();
}
</script>
@endsection