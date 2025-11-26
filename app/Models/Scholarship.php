<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scholarship extends My_Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'sub_title',
        'video_link',
        'overview',
        'des_point1',
        'des_point2',
        'des_point3',
        'des_point4',
        'des_point5',
        'paragraph_1',
        'paragraph_2',
        'fees',
        'certificate',
        'language',
        'application_open',
        'application_close',
        'thumbnail',
        'apply_link',
        'is_visible',
    ];
    
    protected $appends = [
        'thumbnail_path',
    ];
    
    public function getThumbnailPathAttribute() {
        $thumbnail_path = default_img();
        if(!empty($this->thumbnail)){
            if (!file_exists(asset_url('storage/'.$this->thumbnail))){
                $thumbnail_path = asset_url('storage/'.$this->thumbnail);
            }
        }

        return $thumbnail_path;
    }


}
