<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends My_Model
{
    use HasFactory;
    protected $table    = 'about_us';
    protected $fillable = [
        'name',
        'title',
        'image',
    ];
    
    protected $appends = [
        'image_path',
    ];
    
    public function getImagePathAttribute() {
        $image_path = default_img();
        if(!empty($this->image)) {
            if (!file_exists(asset_url('storage/'.$this->image))){
                $image_path = asset_url('storage/'.$this->image);
            }
        }
        return $image_path;
    }


}
