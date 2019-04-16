@extends("main")
@section("title")
        <title>Read Post</title>
@endsection

@section("content")

<!--This stylesheet should be moved to the head of the document -->

<div class="container">
    <div style="margin:30px"></div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
<div class="col-sm-offset-3 col-sm-6 col-md-offset-3 col-md-6 col-lg-offset-3 col-lg-6">
    <!--             recuperer l'image du profile -->
    @if($user->image!=null)
    <img src="{{asset('img/'.$user->image)}}" width='400' height="300" class="space-down">
    <br>
    @else
    <img src="{{asset('img/crow clown.jpg')}}" width='400' height="300" class="space-down profile">
    @endif
</div>                  
        <div class="centered-text col-sm-offset-3 col-sm-6 col-md-offset-3 col-md-6 col-lg-offset-3 col-lg-6 space-up">
            <div itemscope="" itemtype="http://schema.org/Person">
                <h2> <span itemprop="name">{{Auth::user()->name}}</span></h2>
                @if(Auth::user()->location!=null)
                <p itemprop="jobLocation">{{Auth::user()->location}}</p>
                @else
                <p itemprop="jobLocation">Your Location</p>
                @endif
                @if(Auth::user()->company!=null)
                <p><span itemprop="company">{{Auth::user()->company}}</span></p>
                @else
                <p><span itemprop="company">Company</span></p>
                @endif
                <p>
                    <i class="fa fa-map-marker"></i> 
                    @if(Auth::user()->city==null)
                    <span itemprop="address">Your City, Your State</span>
                    @else
                    <span itemprop="address">{{Auth::user()->city}},{{Auth::user()->state}}</span>
                    @endif
                </p>
                <p itemprop="email"> <i class="fa fa-envelope"> </i> <a href="mailto:{{Auth::user()->email}}">{{Auth::user()->email}}</a> </p>
            <a href="{{route('profile.edit')}}" class="btn btn-info">Edit</a>
            </div>
        </div>
    </div>
</div>
            <div class="col-lg-12 centered-text">
                Your Short Bio goes here.
            </div>
        </div>
    </div>
<div class="panel-footer">
    <div class="row">
        <div id="social-links" class=" col-lg-12">
            <div class="row">
                <div class="col-xs-6 col-sm-3 col-md-2 col-lg-3 social-btn-holder">
                <a title="google" class="btn btn-social btn-block btn-google" target="_BLANK" href="http://plus.google.com/">
                        <i class="fa fa-google"></i> +You
                    </a>
                </div>
                <div class="col-xs-6 col-sm-3 col-md-2 col-lg-3 social-btn-holder">
                    <a title="twitter" class="btn btn-social btn-block btn-twitter" target="_BLANK" href="http://twitter.com/yourid">
                        <i class="fa fa-twitter"></i> /yourid
                    </a>
                </div>
                <div class="col-xs-6 col-sm-3 col-md-2 col-lg-3 social-btn-holder">
                    <a title="github" class="btn btn-social btn-block btn-github" target="_BLANK" href="http://github.com/yourid">
                        <i class="fa fa-github"></i> /yourid
                    </a>
                </div>
                <div class="col-xs-6 col-sm-3 col-md-2 col-lg-3 social-btn-holder">
                    <a title="stackoverflow" class="btn btn-social btn-block btn-stackoverflow" target="_BLANK" href="http://stackoverflow.com/users/youruserid/yourid">
                        <i class="fa fa-stack-overflow"></i> /yourid
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>

@endsection