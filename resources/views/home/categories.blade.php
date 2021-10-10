@extends('home.layouts.home_master')

@section('content')
            <div class="SignUpmodule">
                <div class="modulebody ui-widget-content1 ui-corner-bottom">
                    <h3 style="margin-left: 4%;     font-size: 20px;margin-top: 6%;">
                        <svg class="upcomingevents" xmlns="http://www.w3.org/2000/svg" width="5" height="16" viewBox="0 0 6 20" fill="none">
                            <rect width="6" height="23" fill="#FF6600"/>
                        </svg>
                        {{$tittle}}
                    </h3>
                </div>
            </div>
        </div>
        <div class="xop-section">
        <ul class="xop-grid">
        @foreach ($subcategorys as $subcategory)
            @php
                $url=url('uploads/Admin/Category/'.$subcategory->category_image);
            @endphp
            <li>
                <div class="xop-box xop-img-1" style="background: url({{$url}})">
                    <a href={{route('sub_category',['name'=>$subcategory->category_name,'id'=>$subcategory->id ])}}>
                    </a>
                </div>
                <div class="commonStyles__VerticalFlexBox-sc-133848s-2 commonStyles__CardTextBox-sc-133848s-12 gyGThn" style="float: left;margin-top: 3%;">
                    <div class="style__StyledText-sc-7o7nez-0 kEJnGr"><a href="{{route('sub_category', ['id'=>$subcategory->id])}}">{{$subcategory->category_name}}</a></div>
                </div>
            </li>
        @endforeach

        </ul>
        </div>
     @endsection
