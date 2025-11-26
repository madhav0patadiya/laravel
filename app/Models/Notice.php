<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends My_Model
{
    use HasFactory;
    protected $fillable = [
        'banner',
        'description',
    ];
    
    protected $appends = [
        'banner_path',
    ];
    
    public function getBannerPathAttribute() {
        $banner_path = default_img();
        if(!empty($this->banner)){
            if (!file_exists(asset_url('storage/'.$this->banner))){
                $banner_path = asset_url('storage/'.$this->banner);
            }
        }

        return $banner_path;
    }


}
