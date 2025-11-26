<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramLevel extends My_Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function students() {
        return $this->hasMany(Student::class, 'program_level_id');
    }
}
