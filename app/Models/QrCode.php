<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QrCode extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'qr_codes';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const STYLE_SELECT = [
        'dot'    => 'Dot',
        'square' => 'Square',
        'round'  => 'Round',
    ];

    protected $fillable = [
        'color',
        'size',
        'bg_color',
        'style',
        'link_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function link()
    {
        return $this->belongsTo(Link::class, 'link_id');
    }
}
