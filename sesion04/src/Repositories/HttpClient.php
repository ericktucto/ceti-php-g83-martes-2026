<?php

namespace App\Repositories;

use GuzzleHttp\Psr7\Response;

interface HttpClient
{
    public function get(): Response;
}