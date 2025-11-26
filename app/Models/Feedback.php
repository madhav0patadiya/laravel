<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends My_Model
{
    use HasFactory;
    protected $table = 'feedbacks';

    protected $fillable = [
        'feed1_img',
        'feed1_name',
        'feed1_subtitle',
        'feed1_description',
        'feed2_img',
        'feed2_name',
        'feed2_subtitle',
        'feed2_description',
        'feed3_img',
        'feed3_name',
        'feed3_subtitle',
        'feed3_description',
        'feed4_img',
        'feed4_name',
        'feed4_subtitle',
        'feed4_description',
        'video1_img',
        'video1_link',
        'video2_img',
        'video2_link',
    ];
    
    protected $appends = [
        'feed1_img_path',
        'feed2_img_path',
        'feed3_img_path',
        'feed4_img_path',
        'video1_img_path',
        'video2_img_path',
    ];
    
    public function getFeed1ImgPathAttribute() {
        $feed1_img_path = default_img();
        if(!empty($this->feed1_img)){
            if (!file_exists(asset_url('storage/'.$this->feed1_img))){
                $feed1_img_path = asset_url('storage/'.$this->feed1_img);
            }
        }
        return $feed1_img_path;
    }
    
    public function getFeed2ImgPathAttribute() {
        $feed2_img_path = default_img();
        if(!empty($this->feed2_img)){
            if (!file_exists(asset_url('storage/'.$this->feed2_img))){
                $feed2_img_path = asset_url('storage/'.$this->feed2_img);
            }
        }
        return $feed2_img_path;
    }

    public function getFeed3ImgPathAttribute() {
        $feed3_img_path = default_img();
        if(!empty($this->feed3_img)){
            if (!file_exists(asset_url('storage/'.$this->feed3_img))){
                $feed3_img_path = asset_url('storage/'.$this->feed3_img);
            }
        }
        return $feed3_img_path;
    }

    public function getFeed4ImgPathAttribute() {
        $feed4_img_path = default_img();
        if(!empty($this->feed4_img)){
            if (!file_exists(asset_url('storage/'.$this->feed4_img))){
                $feed4_img_path = asset_url('storage/'.$this->feed4_img);
            }
        }
        return $feed4_img_path;
    }

    public function getVideo1ImgPathAttribute() {
        $video1_img_path = default_img();
        if(!empty($this->video1_img)){
            if (!file_exists(asset_url('storage/'.$this->video1_img))){
                $video1_img_path = asset_url('storage/'.$this->video1_img);
            }
        }
        return $video1_img_path;
    }

    public function getVideo2ImgPathAttribute() {
        $video2_img_path = default_img();
        if(!empty($this->video2_img)){
            if (!file_exists(asset_url('storage/'.$this->video2_img))){
                $video2_img_path = asset_url('storage/'.$this->video2_img);
            }
        }
        return $video2_img_path;
    }


}
