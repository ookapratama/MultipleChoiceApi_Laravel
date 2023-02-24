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

    public function update (Request $request, $id) {

        $this->soalContract->update($request->all(), $id);
        return response()->json(['status' => 'success update']);

    }

    public function destroy ($id) {
        $this->soalContract->destroy($id);
        return response()->json(['status' => 'success delete', 'data' => Soal::all()]);

    }

}
