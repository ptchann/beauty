<div class="col-md-3">
                            <div class="sidebar">
                                <div class="author widget">
                                    <h4><span>About me</span><i class="afterh4"></i></h4>
                                    <div class="a-img">
                                        <img src="{{url('frontend')}}/images/05_Blog_Sidebar02/About/2.jpg" alt="" class="img-responsive">
                                    </div>
                                    <div class="excerpt">
                                        <span>H E Y T   H E R E.</span>
                                        <br />
                                        From fun makeup tutorials, fashion advice, to more personal stories such as my infertility journey! Hope we can become friends!
                                    </div>
                                </div>
                                <div class="srch widget">
                                    <h4><span>Search</span><i class="afterh4"></i></h4>
                                    <form class="form-horizontal clearfix" action="{{url('blog')}}" method="get">
                                        <div class="form-group clearfix">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="search" placeholder="Search">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="cat widget">
                                    <h4><span>Categories</span><i class="afterh4"></i></h4>
                                    <ul>
                                        @foreach($listCategory as $key=>$value)
                                        <li><a href="{{url('')}}/category/{{$value->id}}">{{$value->title}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>