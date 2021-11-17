<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pegawai;
use App\Models\Contact;
use App\Models\ContactLabel;
use App\Models\Label;
use Illuminate\Support\Facades\DB;


class FormController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'berhasil'
        ], 200);
    }

    public function search()
    {
        $alamat=$_GET['alamat'];
        $kode_jabatan=$_GET['kode_jabatan'];
        $pegawai = Pegawai::where('alamat', $alamat)
                            ->where('kode_jabatan', $kode_jabatan)
                            ->first();

        return response()->json([
            'message' => 'success',
            'pegawai' => $pegawai
        ], 200);

        // return response()->json([
        //     'alamat' => $alamat,
        //     'kode_jabatan' => $kode_jabatan
        // ], 200);
    }

    public function new(Request $request)
    {
        $pegawai = new Pegawai;
        $pegawai->nama = $request->nama;
        $pegawai->alamat = $request->alamat;
        $pegawai->kelamin = $request->kelamin;
        $pegawai->tgl_lahir = $request->tgl_lahir;
        $pegawai->kode_pegawai = $request->kode_pegawai;
        $pegawai->kode_jabatan = $request->kode_jabatan;
        $pegawai->save();

        return response()->json([
            'message' => 'berhasil'
        ], 200);
    }

    public function post(Request $request)
    {
        $pegawai = new Contact;
        $pegawai->name = $request->name;
        $pegawai->email = $request->email;
        $pegawai->phone = $request->phone;
        $pegawai->notes = $request->notes;
        $pegawai->save();

        return response()->json([
            'message' => 'berhasil'
        ], 200);
    }

    public function view()
    {
        $q=$_GET['q'];
        $label=$_GET['label'];
        $contact = DB::table('contacts')
                            ->join('contact_labels', 'contact_labels.contact_id', '=', 'contacts.id')
                            ->join('labels', 'contact_labels.label_id', '=', 'labels.id')
                            ->orWhere('contacts.name','like', $q.'%')
                            ->orWhere('contacts.email', $q)
                            ->orWhere('contacts.phone', $q)
                            ->orWhere('contacts.notes', $q)
                            ->where('labels.slug', $label)
                            ->get();

        return response()->json([
            'message' => 'success',
            'pegawai' => $contact
        ], 200);

        // return response()->json([
        //     'alamat' => $alamat,
        //     'kode_jabatan' => $kode_jabatan
        // ], 200);
    }
}
