<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BpjsMembership extends Model
{
    use HasFactory;

    public $timestamps = false;

    // @dbml-sync:table-property

    // @enddbml-sync:table-property

    // @dbml-sync:fillable
    protected $fillable = [
        'employee_id',
        'bpjs_type',
        'membership_number',
        'registered_date',
        'status',
        'end_date',
        'archived_at',
    ];
    // @enddbml-sync:fillable

    // @dbml-sync:casts
    protected function casts(): array
    {
        return [
            'registered_date' => 'date',
            'end_date' => 'date',
            'archived_at' => 'datetime',
        ];
    }
    // @enddbml-sync:casts

    // @dbml-sync:relations
    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }
    // @enddbml-sync:relations
}
