@extends('admin.layouts.app')
@section('headsection')
  <link rel="stylesheet" href="{{ asset('admin/bower_components/select2/dist/css/select2.min.css') }}">
@endsection
@section('main-content')
  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Text Editors
        <small>Advanced form element</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Editors</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- /.box -->

          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Titles</h3>
            </div>
          @include('includes.message')
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ route('post.store') }}" method="post">
            {{ csrf_field() }}
              <div class="box-body">
                <div class="col-lg-6">
                <div class="form-group">
                  <label for="title">PostTitle</label>
                  <input type="text" class="form-control" id="title"  name="title" placeholder="Title">
                </div>

                <div class="form-group">
                  <label for="subtitle">Post Sub Title</label>
                  <input type="text" class="form-control" id="subtitle"  name="subtitle" placeholder="Sub Title">
                </div>
                <div class="form-group">
                  <label for="slug">Slug</label>
                  <input type="text" class="form-control" id="slug"  name="slug" placeholder="slug">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <div class="pull-right">
                  <label for="image">File input</label>
                  <input type="file" name="image" id="image">
                </div>
                <div class="checkbox pull-left">
                  <label>
                    <input type="checkbox" name="status" value="1">Publish
                  </label>
                </div>
                </div>
                <br>
                <br>
                <div class="form-group">
                <label>Select Tags</label>
                <select class="form-control select2 select2-hidden-accessible" multiple="" name="tags[]" data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true">
                  @foreach ($tags as $tag)
                      <option value="{{$tag->id}}"
                        @foreach ($post->tags as $posttag)
                          @if ($posttag->id == $tag->id)
                            selected
                          @endif
                        @endforeach
                         >{{$tag->name}}</option>
                  @endforeach
                </select>
                </div>
                <div class="form-group">
                <label>Select Category</label>
                <select class="form-control select2 select2-hidden-accessible" multiple="" name="categories[]" data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true">
@foreach ($categories as $category)
    <option value="{{$category->id}}"
      @foreach ($post->categories as $postcategory)
        @if ($postcategory->id == $category->id)
          selected
        @endif
      @endforeach
       >{{$category->name}}</option>
@endforeach


                </select>
                </div>

              </div>
            </div>
              <!-- /.box-body -->
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Write post body here
                    <small>Simple and fast</small>
                  </h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button type="button" class="btn btn-default btn-sm"  data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                      <i class="fa fa-minus"></i></button>
                    {{-- <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip"
                            title="Remove">
                      <i class="fa fa-times"></i></button> --}}
                  </div>
                  <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">
                    <textarea  name="body"id="editor1"
                              style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
              </div>

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a type="button" href="{{route('post.index')}}" class="btn btn-warning">Back</a>
              </div>
            </form>
          </div>



        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
@endsection
@section('footersection')
  <script src="{{asset('admin/bower_components/ckeditor/ckeditor.js')}}"></script>
  <script>
    $(function () {
      // Replace the <textarea id="editor1"> with a CKEditor
      // instance, using default configuration.
      CKEDITOR.replace('editor1')
      //bootstrap WYSIHTML5 - text editor
      $('.textarea').wysihtml5()
    })
  </script>
<script src="{{asset('admin/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script>
$(document).ready(function(){
 $(".select2").select2();
});
</script>
@endsection
