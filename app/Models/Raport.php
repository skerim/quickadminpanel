<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Raport extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'raports';

    public static $searchable = [
        'data',
        'gps_city',
        'gps_ulica',
    ];

    protected $dates = [
        'data',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'crane_sn_id',
        'data',
        'start',
        'stop',
        'work',
        'engine',
        'gps_kraj',
        'gps_woj',
        'gps_city',
        'gps_ulica',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function crane_sn()
    {
        return $this->belongsTo(Crane::class, 'crane_sn_id');
    }

    public function getDataAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDataAttribute($value)
    {
        $this->attributes['data'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
