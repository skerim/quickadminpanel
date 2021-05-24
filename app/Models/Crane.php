<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Crane extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'cranes';

    public static $searchable = [
        'sn',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'type_id',
        'sn',
        'producer_id',
        'year',
        'max_load',
        'udt',
        'enova',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function craneRentals()
    {
        return $this->belongsToMany(Rental::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function producer()
    {
        return $this->belongsTo(Producer::class, 'producer_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
