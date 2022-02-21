<?php

namespace App\Services;

use App\Contracts\InterfaceBaseService;
use App\Contracts\InterfaceRelationStrategy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\LaravelData\Data;

abstract class BaseService implements InterfaceBaseService
{
    abstract public function getRelationships(): array;

    abstract public function getModel(?int $id = null): Model;

    public function create(Data $data): Model
    {
        return DB::transaction(function () use ($data) {
            $model = $this->getModel()->create(array_filter($data->toArray()));

            $this->updateRelationships($model, $data);

            return $model;
        });
    }

    public function update(Data $data, int $model_id): Model
    {
        return DB::transaction(function () use ($data, $model_id) {
            $model = $this->getModel($model_id);

            $this->updateRelationships($model, $data);
            $model->update(array_filter($data->toArray()));

            return $model;
        });
    }

    private function updateRelationships(Model $model, Data $data): void
    {
        if (!($data->relations)) {
            return;
        }

        foreach ($this->getRelationships() as $relationship_name) {

            if (isset($data->relations[$relationship_name])) {
                $relationship_type = get_class($model->$relationship_name());
                $strategy = $this->getStrategyClass($relationship_type);

                $strategy->syncRelationship($model, $relationship_name, $data->relations[$relationship_name]);

                continue;
            }

            if (env('APP_DEBUG') === true) {
                Log::warning(
                    'Relationship: {' . $relationship_name . '} is empty in DTO: ' . get_class($data) .
                    ' with params:' . json_encode($data, JSON_THROW_ON_ERROR)
                );
            }
        }
    }

    private function resolveStrategyName(string $class): string
    {
        $class = explode('\\', $class);
        $class = $class[array_key_last($class)];
        $namespace = explode('\\', __NAMESPACE__);
        unset($namespace[array_key_last($namespace)]);
        $namespace[] = 'Strategies\\' . ucfirst($class) . 'Strategy';

        return implode('\\', $namespace);
    }

    private function getStrategyClass(string $relationship_type): InterfaceRelationStrategy
    {
        return new ($this->resolveStrategyName($relationship_type))();
    }
}
