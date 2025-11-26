<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends My_Model
{
    use HasFactory;
    protected $fillable = ['firstname', 'lastname', 'avatar', 'citizenship', 'phone', 'address', 'country_id', 'course', 'program_level_id', 'email', 'password', 'remember_token', 'agent_code', 'first_attempt', 'allow_login'];
    
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

    public function country() {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function program() {
        return $this->belongsTo(ProgramLevel::class, 'program_level_id');
    }

    public function agent() {
        return $this->belongsTo(User::class, 'agent_code', 'referral_code');
    }

    public function student_document() {
        return $this->hasMany(StudentDocument::class);
    }


}
