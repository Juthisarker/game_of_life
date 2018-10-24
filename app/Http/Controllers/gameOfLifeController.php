<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\TwoGrid;

class gameOfLifeController extends Controller
{
    public function store(Request $request)
    {
        $x_axis = $request->x_axis;
        $y_axis = $request->y_axis;
        $data = $request->data;

        $creation = TwoGrid::create([
            'x_axis' => $x_axis,
            'y_axis' => $y_axis,
            'data' => json_encode($data)
        ]);
        return $creation;
//        dd($creation);
//        return json_encode($result);
    }

    public function blank(Request $request, $id)
    {

//    $flight->save();
        $TwoGrid = TwoGrid::find($id);
        $TwoGrid->x_axis = $request->x_axis;
        $TwoGrid->y_axis = $request->y_axis;
        $data = $request->data;

//        $gridArray = [[]];
//        for ($i = 0; $i < $TwoGrid->x; $i++) {
//            for ($j = 0; $j < $TwoGrid->y; $j++) {
//                $gridArray[$i][$j] = $data[$i][$j];
//            }
//        }
        $TwoGrid->data = json_encode($data);
        $TwoGrid->save();
        return $TwoGrid;
        dd($TwoGrid);

    }

    public function get($id)
    {
        return TwoGrid::find($id);
    }

    public function represent($id)
    {
        $getData = $this->get($id);
        if (isset($_GET['after'])) {
            $ages = $_GET['after'];
//            dd($ages);
            $ages = explode(',', $ages);
            // dd($ages);
            foreach ($ages as $key => $generation) {
                $x_axis = $getData->x_axis;
                $y_axis = $getData->y_axis;
                $data = json_decode($getData->data);
                dd($data);
            }
            $countGen = 0;
            $genation = $ages;
            $NewGeneration = [[]];
            $NewGridData=[];
            while ($countGen < $genation) {
                for ($i = 0; $i < $x_axis; $i++) {
                    for ($j = 0; $j < $y_axis; $j++) {
                        $count = 0;
                        if ($i != 0 && $j != 0) {
                            if ($data[$i - 1][$j - 1] == 1) {
                                $count++;
                            }
                        }
                        if ($i != 0) {
                            if ($data[$i - 1][$j] == 1) {
                                $count++;
                            }
                        }
                        if ($i != 0 && $j != $y_axis - 1) {
                            if ($data[$i - 1][$j + 1] == 1) {
                                $count++;
                            }
                        }
                        if ($j != 0) {
                            if ($data[$i][$j - 1] == 1) {
                                $count++;
                            }
                        }
                        if ($j != $y_axis - 1) {
                            if ($data[$i][$j + 1] == 1) {
                                $count++;
                            }
                        }
                        if ($i != $x_axis - 1 && $j != 0) {
                            if ($data[$i + 1][$j - 1] == 1) {
                                $count++;
                            }
                        }
                        if ($i != $x_axis - 1) {
                            if ($data[$i + 1][$j] == 1 && ($i + 1) >= 0 && ($j) >= 0 && ($i + 1) < $x_axis && ($j) < $y_axis) {
                                $count++;
                            }
                        }
                        if ($i != $x_axis - 1 && $j != $y_axis - 1) {
                            if ($data[$i + 1][$j + 1] == 1 && ($i + 1) >= 0 && ($j + 1) >= 0 && ($i + 1) < $x_axis && ($j + 1) < $y_axis) {
                                $count++;
                            }
                        }
                        if ($count == 3) {
                            $NewGeneration[$i][$j] = 1;
                        } else {
                            $NewGeneration[$i][$j] = 0;
                        }
                        $count = 0;
                    }
                }
                for ($i = 0; $i < $x_axis; $i++) {
                    for ($j = 0; $j < $y_axis; $j++) {
                        $data[$i][$j] = $NewGeneration[$i][$j];
                    }
                }
                $countGen++;
              dd($countGen);
            //    $NewGridData=$NewGeneration[$i][$j];
            }
            }
            else{
                return json_encode($getData);
        }
    }
}