<?php

namespace App\Models\Modular;

use App\Traits\PrettyLog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;
use Spatie\Activitylog\Traits\LogsActivity;

class ChildPage extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Searchable;
    use LogsActivity;
    use PrettyLog;

    protected $fillable = [
        'sub_page_id',
        'order',
        'slug',
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


    /*
    |--------------------------------------------------------------------------
    | @RELATIONSHIPS
    |--------------------------------------------------------------------------
    */

    public function sub_page()
    {
        return $this->belongsTo(SubPage::class);
    }

    public function frames()
    {
        return $this->hasMany(Frame::class);
    }
}
