<?php

namespace App\Repositories\Interfaces;

use App\Models\LogFile;

interface LogRepositoryInterface
{
    public function create(array $logInfo);
    public function showLogsCount(array $filters);
}
