<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends My_Model {
    use HasFactory;
    protected $fillable = ['firstname','lastname','phone','avatar','email','password','remember_token','allow_login'];

    protected $appends = [
        'avatar_path',
    ];

    public function getAvatarPathAttribute() {
        $image_path = default_img();
        if(!empty($this->avatar)){
            if (!file_exists(asset_url('storage/'.$this->avatar))){
                $image_path = asset_url('storage/'.$this->avatar);
            }
        }

        return $image_path;
    }
}
