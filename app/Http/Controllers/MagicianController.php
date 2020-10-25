<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Magician;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;


class MagicianController extends Controller
{

    public function guessView()
    {
        $empty = Magician::isEmpty();
        if ($empty == true) {
            return \view('home.guess', compact('empty'));
        } else {
            $failure = 0;
            $magician = Magician::inRandomOrder()->first();
            $name = $magician->getName();
            $img_url = $magician->getImage();
            $user_id = $magician->getUserID();
            $user_name = User::find($user_id)->name;
            return \view('home.guess', compact('empty', 'name', 'img_url', 'failure', 'user_name'));
        }
    }

    public function checkGuess(Request $request)
    {
        if (strlen($request['guess']) < 1) {
            $failure = "Remeber to enter your guess";
        } else {
            if (strtolower($request['guess']) == strtolower($request['magician'])) {
                return redirect('game');
            } else {
                $failure = "Incorrect guess. Try again";
            }
        }
        $empty = Magician::isEmpty();
        $magician = Magician::inRandomOrder()->first();
        $name = $magician->getName();
        $img_url = $magician->getImage();
        $user_id = $magician->getUserID();
        $user_name = User::find($user_id)->name;
        return \view('home.guess', compact('empty', 'name', 'img_url', 'failure', 'user_name'));
    }

    public function store(Request $request) {
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $validated = $request->validate([
                    'name' => 'required',
                    'image' => 'mimes:jpeg,png|max:1014',
                ]);
                $extension = $request->image->extension();
                $request->image->storeAs('/public/uploads', $validated['name'] . "." . $extension);
                $url = $request->image->storeAs('images', $validated['name'] . "." . $extension, 'public_uploads');
                $user_id = Auth::user()->id;
                $file = Magician::create([
                    'name' => $validated['name'],
                    'image_url' => "uploads/$url",
                    'user_id' => $user_id,
                ]);
                Session::flash('success', "Success!");
                return redirect('guess');
            }
        }
        abort(500, 'Could not upload image :(');
    }

    public function upload()
    {
        return \view('home.upload_form');
    }
}
