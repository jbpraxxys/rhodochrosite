<?php

namespace App\Models\Articles;

use Carbon\Carbon;
use App\Traits\PrettyLog;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory, SoftDeletes, Searchable, LogsActivity, PrettyLog;

    protected $fillable = [
        'slug',
        'title',
        'author',
        'article_type',
        'banner_image_path',
        'content',
        'publish_date',
        'is_highlight',

        'meta_title',
        'meta_description',
        'meta_keyword',
        'meta_image',
    ];

    protected $appends = [
        'formatted_created_at',
    ];

    protected $cast = [
        'is_highlight' => 'boolean'
    ];

    /*
    |--------------------------------------------------------------------------
    | ATTRIBUTES
    |--------------------------------------------------------------------------
     */

    public function getFormattedCreatedAtAttribute()
    {
        return Carbon::parse($this->created_at)->format('M d, Y, (H:i:s)');
    }

    /*
    |--------------------------------------------------------------------------
    | SEARCHABLE ARRAY
    |--------------------------------------------------------------------------
     */

    public function toSearchableArray()
    {
        $array = [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
        ];

        return $array;
    }
}
