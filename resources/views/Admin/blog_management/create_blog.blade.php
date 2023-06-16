@extends('Admin.layout.layout')

@section('title', 'Create Blog')


@section('current_page_css')

@endsection


@section('current_page_js')
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
$(document).ready(function() {
      $('.ckeditor').ckeditor();
  });
  </script>

@endsection


@section('content')
<!-- page content -->
<div class="right_col" role="main">
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Create Blog</h3>
    </div>

    <!-- <div class="title_right">
      <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for...">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div> -->
  </div>
  <div class="clearfix"></div>
  <div class="row">
  @if(Session::has('failed'))
    <div class="alert alert-danger alert-block">

        <button type="button" class="close" data-dismiss="alert">×</button>

        <strong>{{ Session::get('failed')}}</strong>

    </div>
    @endif
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br />
          <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="{{ route('create.blog.post')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Description">Blog Title<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="blog_title" name="blog_title"  class="form-control col-md-7 col-xs-12">
                @if($errors->has('blog_title'))

              <span class="text-danger">{{ $errors->first('blog_title')}}</span>

              @endif
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Description">Blog Image<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="file" id="blog_image" name="blog_image"  class="form-control col-md-7 col-xs-12">
                @if($errors->has('blog_image'))
              <span class="text-danger">{{ $errors->first('blog_image')}}</span>
              @endif
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Description">Blog Thumb Image<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="file" id="blog_thumb_image" name="blog_thumb_image"  class="form-control col-md-7 col-xs-12">
                @if($errors->has('blog_thumb_image'))
              <span class="text-danger">{{ $errors->first('blog_thumb_image')}}</span>
              @endif
              </div>
            </div>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Blog Status</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <select name="blog_status" id="blog_status"  class="form-control">
                    <option value="1" >Active</option>
                    <option value="0" >Inactive</option>
                  </select>
                  @if($errors->has('blog_status'))
                  <span class="text-danger">{{ $errors->first('blog_status')}}</span>
                  @endif
              </div>
            </div>
            <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Blog description</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea id="blog_content" name="blog_content" rows="4" cols="50" class="form-control col-md-7 col-xs-12 ckeditor">
                 </textarea>
                    @if($errors->has('blog_content'))
                    <span class="text-danger">{{ $errors->first('blog_content')}}</span>
                    @endif
                </div>
              </div>                        
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">        
                <button type="submit" class="btn btn-dark">Submit</button>
                <input type="button"   class="btn btn-dark" value="Go Back" onClick="history.go(-1);"  />
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>
</div>
<!-- /page content -->
@endsection