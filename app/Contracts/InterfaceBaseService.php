<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\Data;

interface InterfaceBaseService
{
    public function getRelationships(): array;

    public function getModel(?int $id = null): Model;

    public function create(Data $data): Model;

    public function update(Data $data, int $model_id): Model;
}
