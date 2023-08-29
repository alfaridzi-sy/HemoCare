<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bed;
use App\Models\BedUsage;
use Carbon\Carbon;

class HemodialisaController extends Controller
{
    public function daftarBed(){
        $beds = Bed::with('bed_usage')->get();
        return view('hemodialisa.index', ["beds" => $beds]);
    }

    public function display(){
        $beds = Bed::with('bed_usage')->get();
        return view('display', ["beds" => $beds]);
    }

    public function storeBedUsage(Request $request)
    {
        $bed_id = $request->bed_id;
        $service_time = $request->service_time;
        $uploaded_by = $request->uploaded_by;
        $start_time = $request->start_time;

        // Tanggal dan waktu awal dalam format Y-m-d H:i:s
        $initialDateTime = $start_time;

        // Ubah menjadi objek DateTime
        // $dateTime = new DateTime($initialDateTime);
        $dateTime = new \DateTime($initialDateTime);

        $time_amount = '+'.$service_time.' hours';

        $dateTime->modify($time_amount);


        // Format hasil ke dalam format Y-m-d H:i:s
        $finish_time = $dateTime->format('Y-m-d H:i:s');


        // $start_time = Carbon::now();
        // $start_time->setTimezone('Asia/Jakarta');
        // dd($start_time);
        // $finish_time = $start_time->copy()->addHours($service_time); // Copy start_time to prevent modification

        $data = [
            'bed_id'        => $bed_id,
            'start_time'    => $start_time,
            'finish_time'   => $finish_time,
            'service_time'  => $service_time,
            'service_status'=> 1,
            'uploaded_by'   => $uploaded_by,
        ];

        BedUsage::create($data);

        $bed = Bed::findOrFail($bed_id);

        $bed->update([
            'status'    => 1
        ]);

        return redirect('daftarBed');
    }

    public function bedRelease(Request $request)
    {
        $bedId = $request->input('bed_id');

        // Lakukan perubahan status bed menjadi tersedia
        Bed::where('bed_id', $bedId)->update(['status' => 0]);

        BedUsage::where('bed_id', $bedId)->where('service_status', 1)->update(['service_status' => 1]);

        // Berikan respon sukses ke sisi klien
        return response()->json(['message' => 'Status bed berhasil diubah menjadi tersedia']);
    }

    public function finishUsage(Request $request){
        $bedId = $request->input('bed_id_finish');
        Bed::findOrFail($bedId)->update(['status' => 0]);
        $bed_usage  = BedUsage::where('bed_id', $bedId)->where('service_status', 1)->first();

        $finish_time = Carbon::now();
        $finish_time->setTimezone('Asia/Jakarta');


        if ($request->has('additional_information')) {
            $bed_usage->update([
                'finish_time'           => $finish_time,
                'service_status'        => 3,
                'additional_information' => $request->additional_information
            ]);
        }else{
            $bed_usage->update([
                'finish_time'           => $finish_time,
                'service_status'        => 3
            ]);
        }

        return redirect('daftarBed');
    }

}
