@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $title }}</div>
                <div class="panel-body">

                    @if(session()->has('msj_success'))
                        <div class="alert alert-success first-capitalize">
                            {{ session('msj_success') }}
                        </div>
                    @elseif(session()->has('msj_info'))
                        <div class="alert alert-info first-capitalize">
                            {{ session('msj_info') }}
                        </div>
                    @elseif(session()->has('msj_warning'))
                        <div class="alert alert-info first-capitalize">
                            {{ session('msj_warning') }}
                        </div>
                    @elseif(session()->has('msj_danger'))
                        <div class="alert alert-danger first-capitalize">
                            {{ session('msj_danger') }}
                        </div>
                    @endif
                    <form class="form-horizontal" method="POST" action="{{ route($action) }}">
                        {{ csrf_field() }}


                        <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label"> Titulo </label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="@if (!$titlevalue == ''){{$titlevalue}}@else{{old('title')}}@endif" autofocus>

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('bio') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Bio</label>

                            <div class="col-md-6">
                                <input id="bio" type="text" class="form-control" name="bio" value="@if ($biovalue != ''){{ $biovalue }}@else{{old('bio')}}@endif">

                                @if ($errors->has('bio'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bio') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    {{$button}}
                                </button>
                                <a href="{{route('all-profiles')}}">Look al profiles</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
