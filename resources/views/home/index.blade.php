@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('style/indexStyle.css') }}">
    <link rel="stylesheet" href="{{ asset('style/navBar.css') }}">
    <title>Cups and Balls</title>
    <h1>
        The Cups & Balls Game
    </h1>
    <p>
        Welcome to the <a class="link" href="https://en.wikipedia.org/wiki/Cups_and_balls"> Cups and Balls Game</a>

        The idea of the game is for you to guess in wich cup is the ball hidden, but first you will need to log in.
        After you log in, you will have to guess the name of a famous magician which picture is going to be shown to
        you. You may also add a magician and a picture for other people to guess. After your guess is right, you may
        continue to the cups and balls game.
        <strong>GOOD LUCK!</strong>
    </p>
    @auth
        <form action="{{ url('guess') }}">
            <input type="submit" value="Play!">
        </form>
    @endauth
    @guest
        <p>Please log in or register before playing</p>
    @endguest
@endsection
