<?php

namespace App\Models\Modular;

use App\Traits\PrettyLog;
use App\Traits\ReadableTimestamp;
use Laravel\Scout\Searchable;
use App\Traits\RendersSelect;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;

class ParentPage extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Searchable;
    use RendersSelect;
    use LogsActivity;
    use PrettyLog;
    use ReadableTimestamp;

    private const SELECT_COLUMN = "title";
    
    protected $fillable = [
        'slug',
        'order',
        'title',
        'image',
        'header',
        'subtitle',
        'description',

        // seo meta data
        'meta_title',
        'meta_description',
        'meta_image',
    ];

    protected $appends = [
        'formatted_image',
    ];

    /*
    |--------------------------------------------------------------------------
    | @GETTERS
    |--------------------------------------------------------------------------
    */

    public function getFormattedImageAttribute()
    {
        return Storage::url($this->image);
    }

    /*
    |--------------------------------------------------------------------------
    | @RELATIONSHIPS
    |--------------------------------------------------------------------------
    */

    public function sub_pages()
    {
        return $this->hasMany(SubPage::class)->orderBy('order', 'ASC');
    }

    public function frames()
    {
        return $this->hasMany(Frame::class, 'parent_page_id')->orderBy('order', 'ASC');
    }

    /*
    |--------------------------------------------------------------------------
    | SEARCH
    |--------------------------------------------------------------------------
    */
    public function toSearchableArray()
    {
        $array = [
            'id' => (int) $this->id,
            'title' => $this->title,
        ];

        return $array;
    }
}