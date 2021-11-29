<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Infrastructure extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const TYPE_SELECT = [
        'kindergarten' => 'Детский сад',
        'school'       => 'Школа',
        'fitness'      => 'Фитнес клуб',
    ];

    public $table = 'infrastructures';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'type',
        'address',
        'distance',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
