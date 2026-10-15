<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RankHistory extends Model
{
    use HasFactory;

    // @dbml-sync:table-property
    
    // @enddbml-sync:table-property

    // @dbml-sync:fillable
    protected $fillable = [
        'employee_id',
		'rank_name',
		'credit_points',
		'is_accelerated',
		'status',
		'submitted_at',
		'approver_id',
		'decided_at',
		'effective_date',
		'sk_number',
		'sk_date',
		'decision_note',
		'rank_grade',
		'functional_position'
    ];
    // @enddbml-sync:fillable

    // @dbml-sync:casts
    protected $casts = [
        'credit_points' => 'float',
		'is_accelerated' => 'boolean',
		'submitted_at' => 'datetime',
		'decided_at' => 'datetime',
		'effective_date' => 'date',
		'sk_date' => 'date'
    ];
    // @enddbml-sync:casts

    // @dbml-sync:relations
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }

    public function approver() // dari employee ke approver
   
    {
        return $this->belongsTo(Employee::class, 'approver_id', 'id');
    }

    public $timestamps = false;

    // @enddbml-sync:relations
}