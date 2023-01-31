<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\LogRepository;
use App\Http\Requests\LogFilterRequest;

class LogSearchController extends Controller
{
    private $repository;
    public function __construct(LogRepository $repository)
    {
        $this->repository = $repository;
    }
    // show counts of DB records by given log info filters (parameters)
    public function showLogsCount(LogFilterRequest $request)
    {
        $result = $this->repository->showLogsCount($request->validated());
        return $result;
    }
}
