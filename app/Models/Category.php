<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Category extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'categories';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'description',
        'color_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function categoryLinks()
    {
        return $this->hasMany(Link::class, 'category_id', 'id');
    }

    public function categoryNews()
    {
        return $this->hasMany(News::class, 'category_id', 'id');
    }

    public function categoryFiles()
    {
        return $this->hasMany(File::class, 'category_id', 'id');
    }

    public function color()
    {
        return $this->belongsTo(Color::class, 'color_id');
    }
}
