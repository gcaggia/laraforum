@extends('layouts.app')

<!-- content of the page -->
@section('content')
    <section class="title-page">
        <div class="container">
            {!! Breadcrumbs::render('categoryNewTopic', $category) !!}
            <h1>{{ $category->title }} - New Topic</h1>
        </div>
    </section>
    <hr>
    <section class="new-post">
        <div class="container">
            @if (count($errors))
                <div class="alert alert-danger alert-dismissible" 
                     id="error_post" role="alert">
                    <button type="button" class="close" 
                            data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>You cannot create this new topic : </strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{url()->current()}}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group 
                    {{ $errors->has('title') ? 'has-error' : 'has-success'}} ">
                    <label for="post-title">Title</label>
                    <input id="post-title" type="text" class="form-control" 
                        placeholder="Title of the Topic" name="title"
                        value="{{ old('title') }}">
                </div>
                <div class="form-group 
                    {{ $errors->has('title') ? 'has-error' : 'has-success'}} ">
                    <label for="post-slug">Slug</label>
                    <input id="post-slug" type="text" class="form-control" 
                        placeholder="Slug of the Topic" name="slug" disabled
                        value="{{ old('title') ? 
                              str_slug(old('title')) : '' }}">
                </div>
                <div class="form-group 
                    {{ $errors->has('content') ? 'has-error' : 'has-success'}} ">
                    <label for="post-content">Content</label>
                    <textarea class="form-control" name="content" id="post-content" 
                        placeholder="First post for this Topic" 
                        cols="30" rows="10" >{{ old('content') }}</textarea>
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-info">New topic</button>
                    <button type="reset" class="btn btn-danger">Cancel</button>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('script')
    <script type="text/javascript" src="{!! asset('js/new-topic.js') !!}"></script>
@endsection
