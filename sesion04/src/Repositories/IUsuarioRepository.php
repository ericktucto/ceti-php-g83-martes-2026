<?php

namespace App\Repositories;

use App\Models\Usuario;

interface IUsuarioRepository
{
    /**
     * @return Usuario[]
     */
    public function todos(): array;
}