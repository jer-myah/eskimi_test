<?php

namespace App\Services;

use App\Interfaces\CrudInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserService
{
    private $crudInterface;
    private $userModel;

    public function __construct(CrudInterface $crudInterface, User $userModel)
    {
        $this->crudInterface = $crudInterface;
        $this->userModel = $userModel;
    }

    public function getAll()
    {
        return $this->crudInterface->index($this->userModel);
    }

    public function getById($id)
    {
        return $this->crudInterface->show($this->userModel, $id);
    }

    public function updateById($id, $input)
    {
        $data = [
            'name' => $input->name,
            'email' => $input->email,
        ];

        return $this->crudInterface->update($this->userModel, $id, $data);
    }
}
