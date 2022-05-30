<?php

declare(strict_types=1);

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait HasUuid
{
    /**
     * @return string
     */
    public function getKeyType(): string
    {
        return 'string';
    }

    /**
     * @return bool
     */
    public function getIncrementing(): bool
    {
        return false;
    }

    /**
     * @return void
     */
    protected static function bootHasUuid(): void
    {
        static::creating(static function (Model $model) {
            if (empty($model->getKey())) {
                $model->setAttribute($model->getKeyName(), Str::orderedUuid()->toString());
            }
        });
    }
}
