@extends('layouts.app')

@section('stylesheets')
<script src="/texteditor/jquery.js"></script>


<link href="/texteditor/css/froala_editor.min.css" rel="stylesheet" type="text/css">
<script src="/texteditor/js/froala_editor.min.js"></script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            @include('admin.partials._sidemenu')
        </div>

        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Edit Blog Article</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.blog.update', $post->id) }}" enctype="multipart/form-data">
                        @csrf
                        <label>Title:</label>
                        <input class="form-control" name="title" value="{{ $post->title }}" placeholder="Enter the article title..." required>

                        <br>

                        <label>Upload You Want To Change The Image:</label>
                        <img src="{{ url('/') }}/public/blog/{{ $post->image }}" style="height: 120px;">
                        <input type="file" class="form-control" name="image" placeholder="Article Image...">

                        <br>
                        <label>Article:</label>
                        <textarea id="texteditor" class="form-control" name="body" placeholder="Enter the article...." required>
                            {{ $post->body }}
                        </textarea>

                        <br>
                        <button type="submit" class="btn btn-success btn-block"><i class="fa fa-plus"></i> Update Article</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="/texteditor/js/plugins/font_size.min.js"></script>
<script type="text/javascript" src="/texteditor/js/plugins/font_family.min.js"></script>
<script>
(function () {
      new FroalaEditor("#texteditor")
    })()
</script>
@endsection