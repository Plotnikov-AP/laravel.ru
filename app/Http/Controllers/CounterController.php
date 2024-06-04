<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Agent\Facades\Agent;
use App\Models\Counter;

class CounterController extends Controller
{
    public static function setAllCount() {
        $counter=Counter::find(1);
        $counter->all++;
        //$agent=new Agent;
        $deviceType=Agent::deviceType();
        //print_r($deviceType);
        switch ($deviceType) {
            case 'desktop':
                $counter->desktop++;
                break;
            case 'phone':
                $counter->phone++;
                break;
            case 'tablet':
                $counter->tablet++;
                break;
            case 'robot':
                $counter->robot++;
                break;
        }
        $counter->save();
    }
    public function getAllCount() {
        $counter=Counter::find(1);
        return [
            'all'=>$counter->all,
            'desktop'=>$counter->desktop,
            'phone'=>$counter->phone,
            'tablet'=>$counter->tablet,
            'robot'=>$counter->robot,
        ];
    }
    public function mainPage() {
            $this->setAllCount();
            //$count=$this->getAllCount();
            return view('mywelcome');
        }
}
