<?php

namespace App\Strategies;

use App\Contracts\InterfaceRelationStrategy;
use Illuminate\Database\Eloquent\Model;

class MorphOneStrategy implements InterfaceRelationStrategy
{
    public function syncRelationship(Model $model, string $relationship_name, array $data): Model
    {
        $morphed = $model->$relationship_name()->create($data);
        $model->$relationship_name()->where('id','<>', $morphed->id)->delete();

        return $model;
    }
}
