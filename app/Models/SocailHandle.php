<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocailHandle extends My_Model
{
    use HasFactory;
    protected $table    = 'social_handles';
    protected $fillable = [
        'student_notice',
        'facebook',
        'instagram',
        'twitter',
        'whatsapp',
        'phone',
        'address',
        'email',
        'map',
        'sec1_img',
        'sec1_subtitle',
        'sec1_heading',
        'sec1_para1',
        'sec1_para2',
        'sec2_subtitle',
        'sec2_heading',
        'sec2_para1',
        'sec2_para2',
    ];

    protected $appends = [
        'image_path',
    ];
    
    public function getImagePathAttribute() {
        $img_path = default_img();
        if(!empty($this->sec1_img)){
            if (!file_exists(asset_url('storage/'.$this->sec1_img))){
                $img_path = asset_url('storage/'.$this->sec1_img);
            }
        }

        return $img_path;
    }


}
