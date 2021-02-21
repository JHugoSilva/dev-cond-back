<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Unit;
use App\Models\UnitPeople;
use App\Models\UnitVehicle;
use App\Models\UnitPet;

class UnitController extends Controller
{
    public function getInfo($id){
        $array = ['error'=>''];

        $unit = Unit::find($id);
        if ($unit) {
           $peoples = UnitPeople::where('id_unit',$id)->get();
           $vehicles = UnitVehicle::where('id_unit',$id)->get();
           $pets = UnitPet::where('id_unit',$id)->get();

           foreach($peoples as $peopleKey => $peopleValue){
            $peoples[$peopleKey]['birthdate'] = date('d/m/Y', strtotime($peopleValue['birthdate']));
           }

           $array['peoples'] = $peoples;
           $array['vehicles'] = $vehicles;
           $array['pets'] = $pets;
        } else {
            $array['error'] = 'Propriedade inexistente';
            return $array;
        }
        return $array;
    }
    public function addPerson($id,Request $request){
        $array = ['error'=>''];

        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'birthdate'=>'required|date'
        ]);
        if (!$validator->fails()) {
            $name = $request->input('name');
            $birthdate = $request->input('birthdate');

            $newPerson = new UnitPeople();
            $newPerson->id_unit = $id;
            $newPerson->name = $name;
            $newPerson->birthdate = $birthdate;
            $newPerson->save();
        } else {
            $array['error'] = $validator->errors()->first();
            return $array;
        }
        return $array;
    }
    public function addVehicle($id,Request $request){
        $array = ['error'=>''];

        $validator = Validator::make($request->all(),[
            'title'=>'required',
            'color'=>'required',
            'plate'=>'required',
        ]);
        if (!$validator->fails()) {
            $title = $request->input('title');
            $color = $request->input('color');
            $plate = $request->input('plate');
            

            $newVehicle = new UnitVehicle();
            $newVehicle->id_unit = $id;
            $newVehicle->title = $title;
            $newVehicle->color = $color;
            $newVehicle->plate = $plate;
            $newVehicle->save();
        } else {
            $array['error'] = $validator->errors()->first();
            return $array;
        }
        return $array;
    }
    public function addPet($id,Request $request){
        $array = ['error'=>''];

        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'race'=>'required',
        ]);
        if (!$validator->fails()) {
            $name = $request->input('name');
            $race = $request->input('race');
           
            $newUnitPet = new UnitPet();
            $newUnitPet->id_unit = $id;
            $newUnitPet->name = $name;
            $newUnitPet->race = $race;
            $newUnitPet->save();
        } else {
            $array['error'] = $validator->errors()->first();
            return $array;
        }
        return $array;
    }
    public function removePerson($id, Request $request){
        $array = ['error'=>''];
        $idItem = $request->input('id');
        $idExist = UnitPeople::find($idItem);
        if ($idExist) {
            UnitPeople::where('id',$idItem)
            ->where('id_unit',$id)->delete();
        } else {
            $array['error'] = 'ID inexistente';
            return $array;
        }
        return $array;
    }
    public function removeVehicle($id, Request $request){
        $array = ['error'=>''];
        $idItem = $request->input('id');
        $idExist = UnitVehicle::find($idItem);
        if ($idExist) {
            UnitVehicle::where('id',$idItem)
            ->where('id_unit',$id)->delete();
        } else {
            $array['error'] = 'ID inexistente';
            return $array;
        }
        return $array;
    }
    public function removePet($id, Request $request){
        $array = ['error'=>''];
        $idItem = $request->input('id');
        $idExist = UnitPet::find($idItem);
        if ($idExist) {
            UnitPet::where('id',$idItem)
            ->where('id_unit',$id)->delete();
        } else {
            $array['error'] = 'ID inexistente';
            return $array;
        }
        return $array;
    }
}
