<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Image;
use App\Models\Pesan;
use App\Models\Tanggapan;
use App\Http\Requests;

use Validator;
use DB;
use Hash;

class PesanController extends Controller
{
  public function index()
  {
    $getpesan = Pesan::get();
    // dd($getpesan);
    return view('backend/pages/kelolapesan')->with('getpesan', $getpesan);
  }

  public function store(Request $request)
  {
    // dd($request);
     $message = [
        'name.required' => 'Wajib di isi',
        'email.required' => 'Wajib di isi',
        'subject.required' => 'Wajib di isi',
        'message.required' => 'Wajib di isi',
      ];

      $validator = Validator::make($request->all(), [
        'name' => 'required',
        'email' => 'required',
        'subject' => 'required',
        'message' => 'required',
      ], $message);

      if($validator->fails())
      {
        return redirect()->route('contact.front.index')->withErrors($validator)->withInput();
      }

    $set = new Pesan;
    $set->nama = trim($request->name);
    $set->email = trim($request->email);
    $set->subject = trim($request->subject);
    $set->pesan = trim($request->message);
    $set->flag_pesan = 0;
    $set->save();

    return redirect()->route('contact.front.index')->with('message', 'Pesan akan diproses oleh admin.');
  }


  public function update(Request $request)
  {
    // dd($request);
    $message = [
        'tanggapan.required' => 'Wajib di isi',
      ];

      $validator = Validator::make($request->all(), [
        'tanggapan' => 'required',
      ], $message);

      if($validator->fails())
      {
         return redirect()->route('pesan.edit', ['id' => $request->id])->withErrors($validator)->withInput();
      }

    $set = new Tanggapan;
    $set->id_user = Auth::user()->id;
    $set->id_pesan = trim($request->id);
    $set->tanggapan = trim($request->tanggapan);
    $set->save();

    $set = Pesan::find($request->id);
    $set->id_user = Auth::user()->id;
    $set->flag_pesan = 1;
    $set->save();

     return redirect()->route('pesan.index')->with('message', 'Pesan Berhasil Ditanggapi.');
  }

  public function edit($id)
  {
     $getpesan = DB::table('pesan')->leftJoin('tanggapan','tanggapan.id_pesan','=','pesan.id')
                ->select('pesan.*','tanggapan.id as id_tanggapan','tanggapan.tanggapan as tanggapan')
                ->where('pesan.id', $id)
                ->first();
    // dd($getpesan);
    return view('backend/pages/previewpesan')->with('getpesan', $getpesan);
  }


  public function delete($id)
  {
    dd($id);
    $check = Tanggapan::where('id_pesan', $id)->first();
    if($check=="") {
      $set = Pesan::find($id);
      $set->delete();
      return redirect()->route('pesan.index')->with('message', 'Berhasil menghapus pesan.');
    } else {
      return redirect()->route('pesan.index')->with('messagefail', 'Gagal melakukan hapus data. Data Pesan telah ditanggapi.');
    }
  }
}
