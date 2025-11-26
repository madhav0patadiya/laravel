<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends My_Model {
    use HasFactory;

    protected $table = 'company';
    protected $fillable = ['name','logo','address','city','zipcode','country','allow_login'];

    protected $appends = [
        'logo_path',
    ];

    public function scopeSearch($query, $term) {
        if (!empty($term)) {
            $query->where('name', 'like', '%' . $term . '%')
                  ->orWhere('address', 'like', '%' . $term . '%')
                  ->orWhere('city', 'like', '%' . $term . '%')
                  ->orWhere('zipcode', 'like', '%' . $term . '%')
                  ->orWhere('country', 'like', '%' . $term . '%');
        }
        return $query;
    }

    public function getLogoPathAttribute()
    {
        $image_path = '';
        if(!empty($this->logo)){
            if (!file_exists(asset_url('storage/'.$this->logo))){
                $image_path = asset_url('storage/'.$this->logo);
            } else {
                $image_path = asset_url('images/user.png');
            }
        }

        if(empty($this->logo)){
            $image_path = asset_url('images/company.jpg');
        }

        if(!isset($this->logo) && empty($this->logo)){
            $image_path = asset_url('images/company.jpg');
        }

        return $image_path;
    }
}
