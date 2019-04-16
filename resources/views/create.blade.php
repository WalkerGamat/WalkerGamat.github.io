@extends("main")

@section("title")
        <title>Read Post</title>
@endsection

<?php //verification en utilisant JS ?>

@section('style')
                <link rel="stylesheet" href="/css/parsley.css">
                <link rel="stylesheet" href="/css/select2.min.css">
                <link rel="stylesheet" href="/css/fastselect.css">
@endsection

@section("content")

<section id="contact" class="content-section text-center">
        <div class="contact-section">
            <div class="container">
              <h1>New Post</h1>
              <div class="row">
                <div class="col-md-12 col-md-offset-4">
                  <form class="form-horizontal" method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
        <!--concernant Form helper on rajoute l'option 'files'=>'true' -->
                  {{csrf_field()}}
                    <div class="form-group">
                      <label for="exampleInputName2">Titre</label>
                      <input type="text" class="form-control" id="exampleInputName2" name="title">
                    </div>
                    <div class="form-group ">
                      <div class="row">
                        <div class="col-md-10">
                          <label for="slug">Slug</label>
                          <input type='text' class="form-control" name="slug"></input>
                        </div>
                        <div class="col-md-2">
                          <label for="category_id">category</label>
                          <select name="category_id" class="form-class">
                            <!--le nom doit etre le meme que le nom de la column de la table -->
                            @foreach( $categories as $category)
                            <option class="form-control" value="{{$category->id}}">{{ $category->name_category }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <!--select tag -->
                      <label for="tag">Tag</label>
                      <select name="tag[]" class="form-control js-select2-tag" multiple="multiple" >
                        <!--le nom doit etre le meme que le nom de la column de la table -->
                        @foreach( $tags as $tag)
                        <option class="form-control" value="{{$tag->id}}">{{ $tag->name_tag }}</option>
                        @endforeach
                      </select>
                    </div>
                   <div class="form-group ">
                      <label for="exampleInputText">Your Post</label>
                     <textarea  class="form-control" name="description"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail2">Figures</label><br>
                      <input type="file" name='image' >
                    </div>
                      <button type="submit" class="btn btn-success">Post</button>
                    </form>
                  <hr>
                </div>
              </div>
            </div>
        </div>
</section>

@endsection

<?php //verification en utilisant JS ?>
@section('script')

<script type="text/javascript" src="/js/parsley.min.js">
</script>

<script type="text/javascript" src="{{ asset('js/select2.full.min.js') }}">
      $(".js-select2-tag").select2()({
    tags: true,
    tokenSeparators: [',', ' ']
});
</script>

<script type="text/javascript" src="/js/select2.min.js"></script>

<script src="{{ asset('js/fastselect.js')}}">
$('.js-select2-tag').fastselect();
</script>


@endsection
