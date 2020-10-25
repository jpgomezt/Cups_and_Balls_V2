<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Magician extends Model {
    protected $fillable = [
        'name', 'image_url', 'user_id',
    ];

    public function getId() {
        return $this->attributes['id'];
    }

    public function setId($id) {
        $this->attributes['id'] = $id;
    }

    public function getName() {
        return $this->attributes['name'];
    }

    public function setName($name) {
        $this->attributes['name'] = $name;
    }

    public function getImage() {
        return $this->attributes['image_url'];
    }

    public function setImage($image_url) {
        $this->attributes['image_url'] = $image_url;
    }

    public function getUserID() {
        return $this->attributes['user_id'];
    }

    public function setUserID($user_id) {
        $this->attributes['user_id']->$user_id;
    }

    public static function isEmpty() {
        $count = DB::table('magicians')->count();
        if($count == 0) {
            return true;
        }
        return false;

    }
}
