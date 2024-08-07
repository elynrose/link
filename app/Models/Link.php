<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Link extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'links';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const TYPE_RADIO = [
        'qr_code'      => 'QR Code',
        'social_links' => 'Social Links',
        'page'         => 'Page',
        'short_url'    => 'Short URL',
    ];

    protected $fillable = [
        'destination',
        'title',
        'add_utm',
        'type',
        'domains_id',
        'custom_name',
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function domains()
    {
        return $this->belongsTo(Domain::class, 'domains_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
