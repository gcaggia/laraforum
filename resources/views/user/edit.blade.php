@extends('layouts.app')

<!-- content of the page -->
@section('content')
    <section class="title-page">
        <div class="container">
            <h1>Edit Profile</h1>
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
                    <strong>You cannot edit your profil : </strong>
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
                    {{ $errors->has('firstname') ? 'has-error' : ''}} ">
                    <label for="user-firstname">firstname</label>
                    <input id="user-firstname" type="text" class="form-control" 
                        placeholder="firstname" name="firstname"
                        value="{{ $user->firstname }}">
                </div>
                <div class="form-group 
                    {{ $errors->has('lastname') ? 'has-error' : ''}} ">
                    <label for="user-lastname">lastname</label>
                    <input id="user-lastname" type="text" class="form-control" 
                        placeholder="lastname" name="lastname"
                        value="{{ $user->lastname }}">
                </div>
                <div class="form-group 
                    {{ $errors->has('username') ? 'has-error' : ''}} ">
                    <label for="user-username">username</label>
                    <input id="user-username" type="text" class="form-control" 
                        placeholder="username" name="username"
                        value="{{ $user->username }}">
                </div>
                <div class="form-group 
                    {{ $errors->has('email') ? 'has-error' : ''}} ">
                    <label for="user-email">email</label>
                    <input id="user-email" type="text" class="form-control" 
                        placeholder="email" name="email"
                        value="{{ $user->email }}">
                </div>
                <div class="form-group 
                    {{ $errors->has('country') ? 'has-error' : ''}} ">
                    <label for="user-country">country</label>
                    <input id="user-country" type="text" class="form-control" 
                        placeholder="country" name="country"
                        value="{{ $user->country }}">
                </div>
                <div class="form-group 
                    {{ $errors->has('skills') ? 'has-error' : ''}} ">
                    <label for="user-skills">skills</label>
                    <textarea class="form-control" name="skills" id="user-skills" 
                        placeholder="First post for this Topic" 
                        cols="30" rows="10" >{{ $user->skills }}</textarea>
                </div>
                <div class="form-group 
                    {{ $errors->has('biography') ? 'has-error' : ''}} ">
                    <label for="user-biography">biography</label>
                    <textarea class="form-control" name="biography" id="user-biography" 
                        placeholder="First post for this Topic" 
                        cols="30" rows="10" >{{ $user->biography }}</textarea>
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-info">Update your profile</button>
                </div>
            </form>
        </div>

    </section>
@endsection

@section('script')
@endsection