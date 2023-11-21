<?php

namespace App\Http\Controllers;
use App\Models\CarManagement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class CarManagementController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $data = CarManagement::query()->select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
        $listofcar= DB::table('listofcar')->orderby('id', 'desc')->paginate(8);
        return view('dashboard.beranda', ['listofcar'=>$listofcar]);
    }
    public function buatsewa(Request $request)
    {
        if ($request->ajax()) {
            $userId = Auth::id();
    
            $data = CarManagement::query()
                ->where('user_id', $userId)
                ->select('*');
    
            return Datatables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
        return view('dashboard.buatsewa');
    }
    public function create(Request $request){
        // dd($request);
        $validatedData = $request->validate([
            'namalengkap'=> 'required',
            'merek'=> 'required',
            'model'=> 'required',
            'platnumb'=> 'required',
            'tarif'=> 'required',
        ]);

        $CarManagement = new CarManagement;
        $CarManagement -> user_id = Auth::user()->id;
        $CarManagement -> namalengkap = $request->namalengkap;
        $CarManagement -> merek = $request->merek;
        $CarManagement -> model = $request->model;
        $CarManagement -> platnumb = $request->platnumb;
        $CarManagement -> tarif = $request->tarif;
        $CarManagement ->save();

        return redirect('/buatsewa')->with('success', "Mobil berhasil didaftarkan untuk disewakan"); 
    }
}
