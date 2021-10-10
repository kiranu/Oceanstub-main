@extends('home.layouts.home_master')

@section('content')
        <div class="featurePage">
            <div class="row1 clearfix">
                <div class="boxedCol clearfix" style="margin-left: 50px; margin-right: 50px;">
                    <h3>Features</h3>
                        @foreach ($features as $feature)
                        <div class="col-md-6">

                        <h3 style="color: #F89421;">{{$feature->tittle}}</h3>
                        <div class="imgContainer clearfix">
                            {!!$feature->desc!!}
                     </div>
                    </div>

                        @endforeach



                </div>
            </div>
        </div>
      @endsection
