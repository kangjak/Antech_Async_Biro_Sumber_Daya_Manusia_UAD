<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkSchedule extends Model
{
    use HasFactory;

    // @dbml-sync:table-property
    
    // @enddbml-sync:table-property

    // @dbml-sync:fillable
    protected $fillable = [
        'name',
		'unit_id',
		'category',
		'valid_from',
		'valid_until',
		'is_published',
		'published_at',
		'created_by',
		'first_day',
		'last_day',
		'start_time',
		'end_time'
    ];
    // @enddbml-sync:fillable

    // @dbml-sync:casts
    protected $casts = [
        'valid_from' => 'date',
		'valid_until' => 'date',
		'is_published' => 'boolean',
		'published_at' => 'datetime',
		'start_time' => 'datetime',
		'end_time' => 'datetime'
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

    // @enddbml-sync:relations
}