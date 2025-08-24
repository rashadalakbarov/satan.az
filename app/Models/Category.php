<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title', 'image', 'parent_id', 'activate', 'seflink'];

    public function parent() {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children() {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function options() {
        return $this->hasMany(Option::class);
    }

    public function getActivateTextAttribute() {
        switch ($this->activate) {
            case '1':
                return 'Aktiv';
            default:
                return 'İmtina edilmiş';
        }
    }
}
