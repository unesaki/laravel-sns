@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        {!! Form::open(['route' => 'timeline', 'method' => 'POST']) !!}
            {{ csrf_field() }}
            <div class="row mb-4">
                @guest
                    <div class="mx-auto">
                        <a class="btn btn-primary" style="margin-right: 10px;" href="{{ route('login') }}">ログインしてツイートする</a>
                        <a class="btn btn-primary" href="{{ route('register') }}">新規登録してツイートする</a>
                    </div>
                @else
                    {{ Form::text('tweet', null, ['class' => 'form-control col-9 mr-auto']) }}
                    {{ Form::submit('ツイート', ['class' => 'btn btn-primary col-3 mt-2']) }}
                @endguest
            </div>
            @if ($errors->has('tweet'))
                <p class="alert alert-danger">{{ $errors->first('tweet') }}</p>
            @endif
        {!! Form::close() !!}

        @foreach ($tweets as $tweet)
            <div class="mb-1">
                <strong>{{ $tweet->name }}</strong> {{ $tweet->created_at }}
            </div>
            <div class="pl-3">
                <div style="font-size: 16px;">{{ $tweet->tweet }}</div>
                <form action="{{ route('timeline.delete', ['id' => $tweet->id]) }}" method="post" style="float: right;">
                @csrf
                <button class="btn btn-primary" style="margin-top: -30px; font-size: 14px; padding: 3px 8px;">削除</button>
              </form>
              <div style="clear: both; margin-bottom: -10px;"></div>
            </div>
            <hr>
        @endforeach
    </div>
@endsection