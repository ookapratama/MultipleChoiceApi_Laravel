<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use App\Repositories\Contracts\SoalContract;
use Illuminate\Http\Request;

class SoalController extends Controller
{
    
    private $soalContract;

    public function __construct(SoalContract $soalContract)
    {
        $this->soalContract = $soalContract;
    }

    public function index() {
        $data = $this->soalContract->index();
        return response()->json([
            'Title' => 'Data Soal',
            'Data' => $data
        ]);
    }

    public function store(Request $request) {

        $this->soalContract->store($request->all());
        return response()->json([
            'status' => 'success store',
            // 'Data' => Soal::all()
        ]);

    }

    public function jawab(Request $request, $id_soal) {

        $data = $request->all();
        // dd($data);
        $this->soalContract->jawab($data, $id_soal);
        return response()->json([
            'status' => 'success jawab',
            'Data' => Soal::find($id_soal)
        ]);

    }

    public function edit($id) {
        $data = $this->soalContract->edit($id);
        return response()->json([
            'Data' => $data
        ]);

    }

    public function update (Request $request, $id) {
        // dd($id);
        $this->soalContract->update($request->all(), $id);
        return response()->json([
            'status' => 'success update',
            'Data' => Soal::find($id)
        ]);

    }

    public function destroy ($id) {
        $this->soalContract->destroy($id);
        return response()->json([
            'status' => 'success delete',
            'data' => Soal::all()
        ]);

    }

}
