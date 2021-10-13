<?php

namespace App\Models;

use App\Scopes\ScopePerson;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    public function getData()
    {
        return $this->id . ': ' . $this->name . ' (' . $this->age . ')';
    }

    public function scopeNameEqual($query, $str)
    {
        return $query->where('name', $str);
    }

    public function scopeAgeGreaterThan($query, $int)
    {
        return $query->where('age', '>=', $int);
    }
    public function scopeAgeLessThan($query, $int)
    {
        return $query->where('age', '<=', $int);
    }

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new ScopePerson);
    }
}
