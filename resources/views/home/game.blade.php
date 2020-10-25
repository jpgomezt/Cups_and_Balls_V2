@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('style/gameStyle.css') }}">
    <link rel="stylesheet" href="{{ asset('style/navBar.css') }}">
    <title>Cups and Balls, The Game</title>

    <form method="POST" class="container2" action="{{ url('result') }}">
        @csrf
        <input id="box1" type="image" name="cup1" src="{{ url('images/cup.png') }}" alt="CUP 1">
        <input id="box1" type="image" name="cup2" src="{{ url('images/cup.png') }}" alt="CUP 2">
        <input id="box2" type="image" name="cup3" src="{{ url('images/cup.png') }}" alt="CUP 3">
    </form>
    <p>
        @if ($cup == 0)
            Please select a cup(click over a cup).
        @else
            <img src="{{ url('images/ball.png') }}" alt="right" style="margin-left:{{ $imgPosition }}" />
            <p>
                {{ Auth::user()->name }} chose Cup {{ $cup }} and the ball is in Cup {{ $ball }}. The result is
                {{ Auth::user()->name }} {{ $result }}
                Chose another cup to play again, or you go back to the main page or Logout.
            </p>
        @endif
    </p>
@endsection
