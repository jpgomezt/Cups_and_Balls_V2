@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('style/loginStyle.css') }}">
    <link rel="stylesheet" href="{{ asset('style/navBar.css') }}">
    <div class="container-fluid">
        <div>
            <h2>Upload Magician</h2>
        </div>
        <div>
            <form method="POST" action="{{ url('check-upload') }}" enctype="multipart/form-data">
                @csrf
                <div>
                    <input type="text" id="name" placeholder="Enter Magician Name" name="name">
                </div>
                <div>
                    <label for="image">Choose Image</label>
                    <input id="image" type="file" name="image">
                </div>
                <button type="submit" class="buttons">Upload</button>
            </form>
            <form action="{{ url('guess') }}">
                <input class="buttons" type="submit" value="Cancel">
            </form>
        </div>
    </div>
@endsection
