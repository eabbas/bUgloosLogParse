<?php

namespace App\Repositories;

use App\Repositories\Interfaces\LogRepositoryInterface;
use App\Models\LogFile;

class LogRepository implements LogRepositoryInterface
{
    //insert log info into database
    public function create(array $logInfo): bool
    {
        $result = LogFile::firstOrCreate([
            "service_name" => $logInfo['service_name'],
            "status_code" => $logInfo['status_code'],
            "route_name" => $logInfo['route_name'],
            "method_type" => $logInfo['method_type'],
            "loged_date" => $logInfo['loged_date']
        ]);

        return !!$result;
    }

    //searches log info by filters and returns count as json string
    public function showLogsCount(array $filters): string
    {
        $filtersQuery = LogFile::query();

        if(isset($filters['serviceNames'])) $filtersQuery->where('service_name', $filters['serviceNames']);
        if(isset($filters['statusCode'])) $filtersQuery->where('status_code', $filters['statusCode']);
        if(isset($filters['startDate'])) $filtersQuery->where('loged_date','>=', $filters['startDate']);
        if(isset($filters['endDate'])) $filtersQuery->where('loged_date','<=', $filters['endDate']);

        $result['count'] = $filtersQuery->count() ;
        return json_encode($result);
    }
}
