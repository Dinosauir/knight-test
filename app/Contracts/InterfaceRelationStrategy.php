<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Model;

interface InterfaceRelationStrategy
{
    public function syncRelationship(Model $model, string $relationship_name, array $data): Model;
}
