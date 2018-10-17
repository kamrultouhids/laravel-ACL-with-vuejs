@extends('layouts.master')
@section('title','Dashboard')
@section('content')
        <!--Main content-->
<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">
      <div class="content-header-left col-md-6 col-12 mb-2">
        <div class="row breadcrumbs-top">
          <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html"><strong>Dashboard</strong></a>
              </li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="content-body">
      <!-- Stats -->
      <div class="row">
        <div class="col-xl-3 col-lg-6 col-12">
          <div class="card">
            <div class="card-content">
              <div class="media align-items-stretch">
                <div class="p-2 text-center bg-primary bg-darken-2">
                  <i class="icon-camera font-large-2 white"></i>
                </div>
                <div class="p-2 bg-gradient-x-primary white media-body">
                  <h5>Products</h5>
                  <h5 class="text-bold-400 mb-0"><i class="ft-plus"></i> 28</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-12">
          <div class="card">
            <div class="card-content">
              <div class="media align-items-stretch">
                <div class="p-2 text-center bg-danger bg-darken-2">
                  <i class="icon-user font-large-2 white"></i>
                </div>
                <div class="p-2 bg-gradient-x-danger white media-body">
                  <h5>New Users</h5>
                  <h5 class="text-bold-400 mb-0"><i class="ft-arrow-up"></i>1,238</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-12">
          <div class="card">
            <div class="card-content">
              <div class="media align-items-stretch">
                <div class="p-2 text-center bg-warning bg-darken-2">
                  <i class="icon-basket-loaded font-large-2 white"></i>
                </div>
                <div class="p-2 bg-gradient-x-warning white media-body">
                  <h5>New Orders</h5>
                  <h5 class="text-bold-400 mb-0"><i class="ft-arrow-down"></i> 4,658</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-12">
          <div class="card">
            <div class="card-content">
              <div class="media align-items-stretch">
                <div class="p-2 text-center bg-success bg-darken-2">
                  <i class="icon-wallet font-large-2 white"></i>
                </div>
                <div class="p-2 bg-gradient-x-success white media-body">
                  <h5>Total Profit</h5>
                  <h5 class="text-bold-400 mb-0"><i class="ft-arrow-up"></i> 5.6 M</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop