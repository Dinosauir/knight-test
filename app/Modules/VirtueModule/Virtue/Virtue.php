<?php

namespace App\Modules\VirtueModule\Virtue;

use App\Modules\VirtueModule\Virtue\Traits\HasRelations;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property-read int $id
 * @property int $value
 * @property string $name
 *
 * @mixin Builder
 */
class Virtue extends Model
{
    use HasFactory;
    use HasRelations;

    protected $guarded = ['id'];
}
