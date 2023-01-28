<?php
namespace App\Classes;

use App\Repositories\LogRepository;
use Log ;

class ParseLog{
    private $repository;
    public function __construct(LogRepository $repository)
    {
        $this->repository = $repository;
    }
    //parses file and returns true if done without any error
    public function parseFile(string $fileName):bool{
        try {
            $file = fopen(storage_path("logs/".$fileName), "r") or die("Unable to open file!");
            while (!feof($file)) {
                $line = trim(fgets($file), "\0\t\n\x0B\r ");
                 if(strlen($line) < 1){
                     continue;
                 }
               $lineInfoArray = explode( ' ' , $line);
               $lineInfoArrayMapped = $this->mappInfoArray($lineInfoArray);
               $this->repository->create($lineInfoArrayMapped);
            }
            fclose($file);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            die($e->getMessage());
        }
        return true;
    }

    //gets line all parameters mappes them to new array
    public function mappInfoArray(array $lineInfoArray):array{
        $mappedInfo['service_name'] = explode('-' , $lineInfoArray[0])[0] ;
        $mappedInfo['status_code'] = $lineInfoArray[6] ;
        $mappedInfo['route_name'] = ltrim($lineInfoArray[4] , '/') ;
        $mappedInfo['method_type'] = ltrim($lineInfoArray[3] , "\"") ;
        $mappedInfo['loged_date'] = $this->mapDate($lineInfoArray[2]) ;
        return $mappedInfo;
    }

    // formats log info lines date in a new format
    public function mapDate(string $date):string{
        $dateAsArray = explode(':' , str_replace("/", " ", ltrim(rtrim($date ,  ']') , '[' ))) ;
        $dateAsString = $dateAsArray[0] . ' ' . $dateAsArray[1]  . ':' . $dateAsArray[2] . ':' . $dateAsArray[3] ;
        return date("Y-m-d H:i:s", strtotime($dateAsString));
    }
}
