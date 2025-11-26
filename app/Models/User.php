<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends My_Model {
    use HasFactory;
    protected $fillable = ['firstname','lastname','avatar','phone','email','password','remember_token','referral_code', 'first_attempt', 'allow_login'];

    protected $appends = [
        'avatar_path',
        'fullname'
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

    public function getFullnameAttribute() {
        if ($this->firstname !='' && $this->firstname != '') {
            return $this->firstname.' '.$this->lastname;
        } else {
            return $this->email;
        }
        return '';
    }

    public function scopeSearch($query, $term) {
        if (!empty($term)) {
            $query->where('firstname', 'like', '%' . $term . '%')
                  ->orWhere('email', 'like', '%' . $term . '%');
        }
        return $query;
    }

    public function referredStudents() {
        return $this->hasMany(Student::class, 'agent_code', 'referral_code');
    }

}
