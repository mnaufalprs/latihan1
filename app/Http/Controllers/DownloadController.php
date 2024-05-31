<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;
use App\Models\Data_loadtest;
use App\Models\Data_livetest;
use App\Models\InputLivetest;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class DownloadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $urutan_pengukuran = $request->input('urutan_pengukuran');
        
        $data_loadtest_download = Data_loadtest::where('user_id', auth()->user()->id)
                                        ->where('urutan_pengukuran', $urutan_pengukuran)
                                        ->where('algortima_LB', '!=', 'no_load_balancer')
                                        ->latest()
                                        ->first();


        $data_livetest_dwd = Data_livetest::where('user_id', auth()->user()->id)
                                        // ->where('server_address', $server_address)
                                        ->latest()
                                        ->first();

        return view('download_data.index', [
            "title" => "Download Result",
            "data_loadtest_dwd" => $data_loadtest_download,
            "data_livetest_dwd" => $data_livetest_dwd,
            // dd($urutan_pengukuran),
        ]);
    }

    public function download(Request $request)
    {

        $urutan_pengukuran = $request->input('urutan_pengukuran');

        $data_loadtest = Data_loadtest::where('user_id', auth()->user()->id)
                                        ->where('urutan_pengukuran', $urutan_pengukuran)
                                        // ->where('algortima_LB', '!=', 'no_load_balancer')
                                        ->get();

        $pdf = Pdf::loadView('pdf_template', ['data_loadtest' => $data_loadtest])
                ->setPaper('a4', 'landscape');

        return $pdf->download("data_pengukuran_loadTest.pdf");
    }

    public function download2()
    {
        $data_serverload= Data_livetest::where('user_id', auth()->user()->id)
                                        // ->where('server_address', $server_address)
                                        ->latest()
                                        ->first();

        if ($data_serverload) {
            $data_server_address = $data_serverload->server_address;
            $input_livetest_dwdid2 = $data_serverload->input_livetest_id;
        } else {
            $data_server_address = null;
            $input_livetest_dwdid2 = null;
        }
        // $data_server_address = $data_serverload->server_address;
        // $input_livetest_dwdid2 = $data_serverload->input_livetest_id;
        
        $data_livetest2 = Data_livetest::where('user_id', auth()->user()->id)
                                        ->where('server_address', $data_server_address)
                                        // ->where('algortima_LB', '!=', 'no_load_balancer')
                                        ->get();

        $input_livetest2 = InputLivetest::where('user_id', auth()->user()->id)
                                        ->where('id', $input_livetest_dwdid2)
                                        ->where('server_address', $data_server_address)
                                        ->latest()
                                        ->first();

        $pdf2 = Pdf::loadView('pdf_template2', ['data_livetest2' => $data_livetest2, 'input_livetest2' => $input_livetest2])
                ->setPaper('a4', 'landscape');

        return $pdf2->download("data_pengukuran_realtimeTest.pdf");
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
