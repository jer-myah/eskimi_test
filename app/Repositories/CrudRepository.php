<?php

namespace App\Repositories;

use App\Interfaces\CrudInterface;

class CrudRepository implements CrudInterface
{
    public function index($model)
    {
        // TODO: Implement index() method.
        return $model::get();
    }

    public function store($model, $input)
    {
        // TODO: Implement store() method.
        return $model::create($input);
    }

    public function show($model, $model_id)
    {
        // TODO: Implement show() method.
        return $model::where('id', $model_id)->first();
    }

    public function update($model, $model_id, $input)
    {
        // TODO: Implement update() method.
        return $model::where('id', $model_id)->update($input);
    }

    public function destroy($model, $model_id)
    {
        // TODO: Implement destroy() method.
        return $model::where('id', $model_id)->delete();
    }
}
