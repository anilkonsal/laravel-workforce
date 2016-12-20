<?php

namespace App\Services;
use Carbon\Carbon;

class HomeService {
    public function calculateAge($dob = '')
    {
        if (empty($dob)) {
            throw new Exception('DOB cannot be empty!');
        }

        $age = Carbon::createFromFormat('d/m/Y', $dob);

        return Carbon::create($age->format('Y'), $age->format('m'), $age->format('d'), 0, 0 ,0)
                    ->diff(Carbon::now())
                    ->format('%y years, %m months, %d days and %h hours');


    }
}