<?php

namespace App\Interfaces;

interface CrudInterface
{
    public function index($model);

    public function store($model, $input);

    public function show($model, $model_id);

    public function update($model, $model_id, $input);

    public function destroy($model, $model_id);
}
