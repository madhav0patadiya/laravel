<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentDocument extends My_Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'document',
    ];
    
    protected $appends = [
        'doc_path',
    ];

    public function student(){
        return $this->belongsTo(Student::class);
    }
    
    public function getDocPathAttribute() {
        $doc_path = default_img();
        if(!empty($this->document)){
            if (!file_exists(asset_url('storage/'.$this->document))){
                $doc_path = asset_url('storage/'.$this->document);
            }
        }

        return $doc_path;
    }


}
