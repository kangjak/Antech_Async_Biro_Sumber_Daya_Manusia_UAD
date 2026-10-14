<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestType extends Model
{
    use HasFactory;

    // @dbml-sync:table-property
    protected $table = 'request_type';
    // @enddbml-sync:table-property

    // @dbml-sync:fillable
    protected $fillable = [
        'kind',
		'code',
		'name',
		'applies_to',
		'annual_quota',
		'requires_doctorate',
		'period_type',
		'description',
		'is_active'
    ];
    // @enddbml-sync:fillable

    // @dbml-sync:casts
    protected $casts = [
        'requires_doctorate' => 'boolean',
		'is_active' => 'boolean'
    ];
    // @enddbml-sync:casts

    // @dbml-sync:relations
    public function leaveBalances()
    {
        return $this->hasMany(LeaveBalance::class, 'request_type_id', 'id');
    }

    public function employeeRequests()
    {
        return $this->hasMany(EmployeeRequest::class, 'request_type_id', 'id');
    }

    // @enddbml-sync:relations
}