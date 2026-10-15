<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory;

    // @dbml-sync:table-property
    
    // @enddbml-sync:table-property

    // @dbml-sync:fillable
    protected $fillable = [
        'actor_id',
		'action',
		'entity_type',
		'entity_id',
		'old_status',
		'new_status',
		'reason',
		'details',
		'ip_address'
    ];
    // @enddbml-sync:fillable

    // @dbml-sync:casts
    protected $casts = [
        'created_at' => 'datetime'
    ];
    // @enddbml-sync:casts

    // @dbml-sync:relations
    public function user()
    {
        return $this->belongsTo(User::class, 'actor_id', 'id');
    }

    public $timestamps = false;

    // @enddbml-sync:relations
}