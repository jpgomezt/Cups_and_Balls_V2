<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller {

    public function enterGame() {
        $cup = 0;
        return \view('home.game', compact('cup'));
    }

    public function game(Request $request) {
        $cup = 0;
        if (isset($request['cup1_x'])) {
            $cup = 1;
        } elseif (isset($request['cup2_x'])) {
            $cup = 2;
        } elseif (isset($request['cup3_x'])) {
            $cup = 3;
        }

        $ball = rand(1, 3);
        if ($ball == 1) {
            $imgPosition = "211px";
        } elseif ($ball == 2) {
            $imgPosition = "611px";
        } else {
            $imgPosition = "1011px";
        }
        $result = $this->check($ball, $cup);
        return \view('home.game', compact('cup', 'ball', 'imgPosition', 'result'));
    }

    public function check($item1, $item2) {
        if ($item1 == $item2) {
            return "Win";
        } else {
            return "Lose";
        }
    }
}
