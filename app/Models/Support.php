<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Support extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'supports';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'crane_id',
        'budowa',
        'region',
        'kontrahent_id',
        'transport_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function crane()
    {
        return $this->belongsTo(Crane::class, 'crane_id');
    }

    public function kontrahent()
    {
        return $this->belongsTo(Customer::class, 'kontrahent_id');
    }

    public function transport()
    {
        return $this->belongsTo(Transport::class, 'transport_id');
    }
}
