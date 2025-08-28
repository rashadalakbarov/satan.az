<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RuleCompany extends Model
{
    protected $fillable = ['title', 'parent_id', 'activate'];

    public function children() {
        return $this->hasMany(RuleCompany::class, 'parent_id');
    }

    public function getActivateTextAttribute() {
        switch ($this->activate) {
            case 'active':
                return 'Aktiv';
            default:
                return 'İmtina edilmiş';
        }
    }
}
