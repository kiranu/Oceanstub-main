                        @php
                            $i=1;
                        @endphp
                        @foreach ($categorys as $category)
                            <li class="category-{{$i}} col-sm-4" data-category=""> <img src="{{url('uploads/Admin/Category/'.$category->category_image)}}" alt="" width="440" height="310"> <a href="{{route('category', ['id'=>$category->id])}}"><span>{{$category->category_name}}</span></a></li>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                   <div class="custompagination">
                {!! $categorys->links() !!}
                </div>

                     
                         {{-- <div class="new-item-pagination custom_page">
                      

                        <nav aria-label="Page navigation" class="pull-left events-page-no" style="    margin-left: 40%;">
                            <div class="pagination-wrapper pagination-wrapper-news">
                               <ul class="pagination ">
                                    <li>
                                        <span aria-current="page" class="page-numbers current">1</span>
                                    </li>
                                    <li>
                                        <a class="page-numbers" href="">2</a>
                                    </li>
                                    <li>
                                        <a class="page-numbers" href="">3</a>
                                    </li>
                                    <li>
                                        <span class="page-numbers dots">…</span>
                                    </li>
                                    <li><a class="page-numbers" href="">6</a>
                                    </li>

                                     </ul>    
                            </div>

                        </nav> 

                        </div> --}}
