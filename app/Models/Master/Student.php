<?php

namespace App\Models\Master;

use App\Models\Kelas;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';
    protected $primaryKey = 'id';
    protected $incremenenting = true;

    public function getClass(): HasOne
    {
        return $this->hasOne(Kelas::class, 'id', 'class_id');
    }
}
