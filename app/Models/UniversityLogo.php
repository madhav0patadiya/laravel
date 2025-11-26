<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniversityLogo extends My_Model
{
    use HasFactory;
    protected $fillable = [
        'logo',
    ];
    
    protected $appends = [
        'uni_logo_path',
    ];
    
    public function getUniLogoPathAttribute() {
        $uni_logo_path = default_img();
        if(!empty($this->logo)){
            if (!file_exists(asset_url('storage/'.$this->logo))){
                $uni_logo_path = asset_url('storage/'.$this->logo);
            }
        }

        return $uni_logo_path;
    }


}
