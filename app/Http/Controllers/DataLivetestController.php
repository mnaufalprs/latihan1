<?php

namespace App\Http\Controllers;

use App\Models\Data_livetest;
use App\Http\Requests\StoreData_livetestRequest;
use App\Http\Requests\UpdateData_livetestRequest;
use App\Models\InputLivetest;
use Illuminate\Http\Request;

class DataLivetestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $server_address = $request->input('server_address');
        // Mendapatkan user_id dari pengguna yang saat ini sedang login
        $currentUserId = auth()->user()->id;
        
        $input_livetest3 = InputLivetest::where('user_id', auth()->user()->id)
                                    ->latest()
                                    ->first();

        $data_livetest2 = Data_livetest::where('user_id', auth()->user()->id)
                                    // ->where('server_address', $server_address)
                                    ->latest()
                                    ->first();
        
        
        // Jika data_livetest ada, filter input_livetest2 berdasarkan server_address
        if ($data_livetest2) {
            $server_address2 = $data_livetest2->server_address;
            $input_livetest_id2 = $data_livetest2->input_livetest_id;
            
            $input_livetest2 = InputLivetest::where('user_id', $currentUserId)
                                        ->where('id', $input_livetest_id2)
                                        ->where('server_address', $server_address2)
                                        ->latest()
                                    //    ->get()
                                        ->first();
        } else {
            $input_livetest2 = null;
            $input_livetest_id2 = null;
        }
        #$server_address2 = $data_livetest2->server_address;
        #$input_livetest_id2 = $data_livetest2->input_livetest_id;

        // $input_livetest2 = InputLivetest::where('user_id', $currentUserId)
        //                                 ->where('id', $input_livetest_id2)
        //                                 ->where('server_address', $server_address2)
        //                                 ->latest()
        //                             //    ->get()
        //                                 ->first();
        
        // dd($data_livetest); // Tambahkan ini untuk melihat data
        return view('realtime_analytic.index', [
            "title" => "Realtime Analytic",
            "data_livetest2" => $data_livetest2,
            "input_livetest2" => $input_livetest2,
            "input_livetest3" => $input_livetest3,
            "dataUserId" => $currentUserId,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreData_livetestRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Data_livetest $data_livetest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Data_livetest $data_livetest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateData_livetestRequest $request, Data_livetest $data_livetest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $server_address = $request->input('server_address');
        
        $data_livetest = Data_livetest::where('user_id', auth()->user()->id)
                                    ->where('server_address', $server_address);
                                    // ->first();
        
        if ($data_livetest) {
            $data_livetest->delete();
            return redirect()->route('realtimeAnalytic')->with('success', 'Data berhasil dihapus.');
        } else {
            return redirect()->route('realtimeAnalytic')->with('error', 'Data tidak ditemukan.');
        }
    }
}
