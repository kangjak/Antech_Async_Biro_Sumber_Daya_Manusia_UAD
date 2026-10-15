<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;

    // @dbml-sync:table-property
    
    // @enddbml-sync:table-property

    // @dbml-sync:fillable
    protected $fillable = [
        'unit_id',
		'title',
		'category',
		'description',
		'min_qualification',
		'quota',
		'open_date',
		'close_date',
		'status',
		'created_by'
    ];
    // @enddbml-sync:fillable

    // @dbml-sync:casts
    protected $casts = [
        'open_date' => 'date',
		'close_date' => 'date'
    ];
    // @enddbml-sync:casts

    // @dbml-sync:relations
    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function applications()
    {
        return $this->hasMany(Application::class, 'vacancy_id', 'id');
    }

    public $timestamps = false;

    // @enddbml-sync:relations
}