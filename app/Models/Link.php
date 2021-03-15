<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Link extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'links';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'link',
        'category_id',
        'display_order',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function pages()
    {
        return $this->belongsToMany(Page::class);
    }

    public function news()
    {
        return $this->belongsToMany(News::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
