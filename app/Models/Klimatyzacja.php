<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Klimatyzacja extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'klimatyzacjas';

    protected $dates = [
        'data_montazu',
        'data_konserwacji',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'crane_id',
        'model',
        'data_montazu',
        'data_konserwacji',
        'comments',
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

    public function getDataMontazuAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDataMontazuAttribute($value)
    {
        $this->attributes['data_montazu'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDataKonserwacjiAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDataKonserwacjiAttribute($value)
    {
        $this->attributes['data_konserwacji'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
