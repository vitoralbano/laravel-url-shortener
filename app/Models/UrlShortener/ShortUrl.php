<?php

namespace App\Models\UrlShortener;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortUrl extends Model
{
    use HasFactory;

    protected $fillable = [
        'active',
        'url',
    ];

    public $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function getCodeAttribute()
    {
        if(empty($this->id)) {
            return null;
        } else {
            return str_replace("=", "", base64_encode("{$this->user->id}:{$this->this->id}"));
        }
    }
}
