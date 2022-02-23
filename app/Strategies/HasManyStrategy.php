<?php

namespace App\Strategies;

use App\Contracts\InterfaceRelationStrategy;
use Illuminate\Database\Eloquent\Model;

class HasManyStrategy implements InterfaceRelationStrategy
{
    public function syncRelationship(Model $model, string $relationship_name, array $data): Model
    {
        $present_ids = [];
        foreach ($data as $item) {
            $conditions = [
                'id' => $item['id'] ?? null
            ];

            $present_ids[] = $model->$relationship_name()
                ->updateOrCreate($conditions, $item)->id;
        }

        $model->$relationship_name()->whereNotIn('id', $present_ids)->delete();

        return $model;
    }
}
