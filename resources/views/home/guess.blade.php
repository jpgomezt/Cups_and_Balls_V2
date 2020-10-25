@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('style/loginStyle.css') }}">
    <link rel="stylesheet" href="{{ asset('style/navBar.css') }}">
    <title>Guess The Magician</title>
    @if ($empty)
        <p>
            There are no Magicians in the Database.
            Add a Magician so you can play!
        </p>
    @else
        @if ($failure !== 0)
            <p id="error">
                {{ $failure }}.
            </p>
        @endif
        <div>
            <p>
                For playing cups and balls, write the name of the magician that appears belows.
                You wont be able to play the game until your guess is right.
            </p>
            <img src="{{ $img_url }}" alt="right" />
            <p>
                Image added by {{ $user_name }}.
            </p>
            <form method="POST" action="{{ url('chek-magician') }}">
                @csrf
                <label for="guess">Your guess here &rarr;</label>
                <input type="text" name="guess" id="guess"><br />
                <input class="buttons" type="submit" value="Guess">
                <input type="hidden" name="magician" value="{{ $name }}">
            </form>
        </div>
    @endif
    <form action="{{ url('magician-upload') }}">
        <input class="buttons" type="submit" value="Add Magician!">
    </form>
@endsection
