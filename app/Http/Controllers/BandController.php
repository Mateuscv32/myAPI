<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BandController extends Controller {

    public function getAll() {

        $bands = $this->getBands();

        return response()->json($bands);
    }

    public function getById($id) {
        $band = null;

        foreach ($this->getBands() as $_band):
            if ($_band['id'] == $id):
                $band = $_band;
            endif;
        endforeach;

        return $band ? response()->json($band) : abort(404);
    }

    public function getByGender($gender) {
        $bands = [];

       foreach ($this->getBands() as $_band):
            if ($_band['gender'] == $gender):
                $bands[] = $_band;
            endif;
        endforeach;

        return $bands ? response()->json($bands) : abort(404);

    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required'
        ]);

        return response()->json($request->all());
    }

    protected function getBands() {
       return [
            [
                'id' => 1,
                'name' => 'San Marino',
                'gender' => 'bandinha'
            ],
            [
                'id' => 2,
                'name' => '2001',
                'gender' => 'bandinha'
            ],
            [
                'id' => 2,
                'name' => 'Amado Batista',
                'gender' => 'sofrencia'
            ]
       ];
    }


}
