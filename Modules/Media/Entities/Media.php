<?php

namespace Modules\Media\Entities;

use App\Http\Helpers\Elequent\MethodsHelpers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Media extends Model
{
    use HasFactory;
    protected $table = 'medias';

    protected $fillable = [];

    protected static function newFactory()
    {
        return \Modules\Media\Database\factories\MediaFactory::new();
    }

    public function getUrlAttribute()
    {
        if ($this->attributes['url'] != null) {
            return env('IMAGE_URL') . $this->attributes['url'];
        } else {
            return $this->attributes['url'];
        }
    }

    //  scope //
    public function scopeGroup($query, $record, $group)
    {
        MethodsHelpers::group($query, $record, $group);
    }
}
