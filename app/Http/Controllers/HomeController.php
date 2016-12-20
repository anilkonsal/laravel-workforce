<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Services\HomeService;

class HomeController extends Controller
{
    public function getIndex()
    {
        return view('home.index');
    }
    public function calculate(Request $request, HomeService $homeService)
    {
        $dob = $request->get('dob');
        $name = $request->get('name');
        
        $age = $homeService->calculateAge($dob);

        return view('home.calculate', ['age' => $age, 'name' => $name]);
    }
}
