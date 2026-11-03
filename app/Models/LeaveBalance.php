<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LeaveBalance extends Model
{
    use HasFactory;

    public $timestamps = false;

    // @dbml-sync:table-property

    // @enddbml-sync:table-property

    // @dbml-sync:fillable
    protected $fillable = [
        'employee_id',
        'request_type_id',
        'year',
        'quota_days',
        'used_days',
        'version',
    ];
    // @enddbml-sync:fillable

    // @dbml-sync:casts
    protected function casts(): array
    {
        return [
            'year' => 'integer',
            'quota_days' => 'integer',
            'used_days' => 'integer',
            'version' => 'integer',
        ];
    }
    // @enddbml-sync:casts

    // @dbml-sync:relations
    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }

    public function requestType(): BelongsTo
    {
        return $this->belongsTo(RequestType::class, 'request_type_id', 'id');
    }
    // @enddbml-sync:relations
}
