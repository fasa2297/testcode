<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) return redirect('dashboard.beranda');
        return view('login');
    }

    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'phonenumb' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // dd('can login');
            return redirect()->intended('dashboard.beranda');
        }

        return redirect()->back()->with('message', "Nomor hp atau password salah");
    }

    public function flush(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        request() -> session() -> invalidate();
        request() -> session() -> regenerateToken();
        session()->flush();
        return redirect('/loginadmin');
    }
    
    public function create(Request $request)
    {
        // dd($request);
        $credentials = $request->validate([
            'name' => ['required'],
            'address' => ['required'],
            'phonenumb' => ['required'],
            'simnumb' => ['required'],
            'password' => ['required'],
        ]);

        $existsusers = DB::table('users')->get();
        foreach($existsusers as $user){
            if($request->phonenumb == $user->phonenumb){
                return redirect()->back()->with('message', "Nomor hp telah terdaftar, gunakan nomor hp lainnya");
            }
        }

        $user = new User;
        $user->name = $request->name;
        $user->address = $request->address;
        $user->phonenumb = $request->phonenumb;
        $user->simnumb = $request->simnumb;
        $user->password = Hash::make($request->password);

        // // penyimpanan data tersebut ke database
        $user->save();
        return redirect()->route('login')->with('success', "Berhasil Registrasi, Silahkan Lanjut Login");
    }
}
