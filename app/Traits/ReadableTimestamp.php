<?php

namespace App\Traits;

use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait ReadableTimestamp
{
    private function generateDate($value)
    {
        return Carbon::parse($value)->timezone(config('app.timezone'))->format('F d, Y - H:i:s');
    }

    public function createdAt(): Attribute
    {
        if (Schema::hasColumn(self::getTable(), 'created_at')) {
            return Attribute::get(fn($value) => $this->generateDate($value));
        } else {
            return Attribute::get(fn() => null);
        }
    }

    public function updatedAt(): Attribute
    {
        if (Schema::hasColumn(self::getTable(), 'updated_at')) {
            return Attribute::get(fn($value) => $this->generateDate($value));
        } else {
            return Attribute::get(fn() => null);
        }
    }

    public function deletedAt(): Attribute
    {
        if (Schema::hasColumn(self::getTable(), 'deleted_at')) {
            return Attribute::get(fn($value) => $this->generateDate($value));
        } else {
            return Attribute::get(fn() => null);
        }
    }
}
