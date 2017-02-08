@extends('layouts.app')

<!-- content of the page -->
@section('content')
<div class="container profile-page">
    <div class="profile">
        <div class="main-profile text-center">
            <img src="{{ $user->profil_image }}" name="aboutme" width="140" height="140" border="0" class="img-circle">
            <h3 class="media-heading">{{ $user->name }}<small> - {{ $user->country }}</small></h3>
            <span><strong>Skills: </strong></span>
            @foreach (explode('|', $user->skills) as $Skill)
                <span class="label {{boostrapColorLabel($Skill)}}">{{ $Skill }}</span>
            @endforeach
            <div class="nbmessages"> <strong>Number of messages: </strong>{{ $user->posts->count()}}</div>
        </div>
        <div class="pull-right"><a href="{{ url()->current() . '/edit' }}" class="btn btn-primary">Edit Profile</a></div>
        <hr>
        <p class="text-left"><strong>Bio: </strong><br> {{ $user->biography }}</p>
        <br>
    </div>
    <hr>
    <div class="topic-created">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>Topics created</strong>
                    </div>
                    <div class="panel-body">
                        <table id="table-new-topics" class="table table-striped custab">
                            <thead>
                              <tr>
                                <th>Date</th>
                                <th>Category</th>
                                <th>Title</th>
                                <th>Link</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($user->topics as $topic)
                                    <tr>
                                        <td> 
                                            {{ 
                                                (new Carbon\Carbon($topic->created_at))
                                                     ->toFormattedDateString()
                                            }}
                                        </td>
                                        <td>{{ $topic->category->title}}</td>
                                        <td>{{ $topic->title}}</td>
                                        <td>
                                            <a href="/{{ $topic->category->slug 
                                                . '/' . $topic->topic_slug }}" 
                                                class="btn btn-primary btn-xs">Visit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div> <!-- End Panel-body -->
                </div>
            </div>

        </div> <!-- End Row -->
    </div>
    <hr>
    <div class="last-message">
        
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>Last messages</strong>
                    </div>
                    <div class="panel-body">
                        <table id="table-last-messages" class="table table-striped custab">
                            <thead>
                              <tr>
                                <th>Date</th>
                                <th>Topic</th>
                                <th>Category</th>
                                <th>Link to the topic</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($user->posts as $post)
                                    <tr>
                                        <td>
                                            {{ 
                                                (new Carbon\Carbon($post->created_at))
                                                     ->toFormattedDateString()
                                            }}
                                        </td>
                                        <td>{{ $post->topic->title }}</td>
                                        <td>{{ $post->topic->category->title }}</td>
                                        <td><a href="/{{ $post->topic->category->slug 
                                                . '/' . $post->topic->topic_slug }}" 
                                                class="btn btn-primary btn-xs">Visit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> <!-- End Panel-body -->
                </div>
            </div>

        </div> <!-- End Row -->

    </div>
</div>
@endsection

@section('script')

    <!-- For datatable   -->
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js">
    </script>

    <!-- For datatable   -->
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js">
    </script>

    <script type="text/javascript" src="{!! asset('js/profile.js') !!}"></script>

@endsection
