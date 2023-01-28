<?php

namespace App\Repositories;
use App\Repositories\Interfaces\LogRepositoryInterface;
use App\Models\LogFile;

class LogRepository implements LogRepositoryInterface
{
    //insert log info into database
    public function create(array $logInfo):bool{
        $result = LogFile::firstOrCreate([
                "service_name" => $logInfo['service_name'],
                "status_code"  => $logInfo['status_code'],
                "route_name"       => $logInfo['route_name'],
                "method_type"        => $logInfo['method_type'],
                "loged_date" => $logInfo['loged_date']
            ]);
        if($result) return true;
    }

    //searches log info by filters and returns count as json string
    public function showLogsCount(array $filters):string{
        $filtersQuery = LogFile::query();
        foreach ($filters as $key=>$filter){
            if($key == 'serviceNames') $filtersQuery->where('service_name',$filter);
            if($key == 'statusCode') $filtersQuery->where('status_code',$filter);
            if($key == 'startDate') $filtersQuery->where('loged_date' , '>=',$filter);
            if($key == 'endDate') $filtersQuery->where('loged_date' , '<=' ,$filter);
        }
        $result['count'] = $filtersQuery->count();
        return json_encode($result) ;
    }
}
