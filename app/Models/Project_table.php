<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project_table extends Model
{
    protected $fillable = [
        'title',
        'start_date',
        'end_date',
        'phase',
        'description',
    ];
    public $table = 'projects';
    public $primaryKey = 'pid';
    public $incrementing = true;
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User_table::class, 'uid');
    }
}
