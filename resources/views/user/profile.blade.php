@extends('layouts.app')

<!-- content of the page -->
@section('content')
<div class="container">
    <div class="profile">
        <div class="main-profile text-center">
            <img src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcRbezqZpEuwGSvitKy3wrwnth5kysKdRqBW54cAszm_wiutku3R" name="aboutme" width="140" height="140" border="0" class="img-circle">
            <h3 class="media-heading">Joe Sixpack <small> USA</small></h3>
            <span><strong>Skills: </strong></span>
            <span class="label label-warning">HTML5/CSS</span>
            <span class="label label-info">Adobe CS 5.5</span>
            <span class="label label-info">Microsoft Office</span>
            <span class="label label-success">Windows XP, Vista, 7</span>
        </div>
        <hr>
        <p class="text-left"><strong>Bio: </strong><br> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sem dui, tempor sit amet commodo a, vulputate vel tellus.</p>
        <br>
    </div>
    <hr>
    <div class="topic-created">
        <h2>Topics created</h2>
    </div>

    <div class="last-message">
        <h2>Last messages</h2>
    </div>
</div>
@endsection

