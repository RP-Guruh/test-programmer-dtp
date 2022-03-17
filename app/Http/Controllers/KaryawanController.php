<?php

namespace App\Http\Controllers;

use App\Models\dataPekerjaan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\dataDiri;
use App\Models\dataPendidikan;


class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawan = dataDiri::orderBy('created_at', 'ASC')->get();
        return view('data_karyawan', [
            'karyawan' => $karyawan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Membuat validasi
        $validated = $request->validate([
            'nama_karyawan' => 'required',
            'alamat' => 'required',
            'no_ktp' => 'required|max:12'
        ]);

        $kodeKaryawan = "KRY-" . random_int(100000, 999999);
        $personalInfo = new dataDiri;
        $personalInfo->nama_karyawan = $request->nama_karyawan;
        $personalInfo->no_ktp = $request->no_ktp;
        $personalInfo->alamat = $request->alamat;
        $personalInfo->kode_karyawan = $kodeKaryawan;
        $personalInfo->save();

        foreach ($request->addpendidikan as $key => $value) {
            dataPendidikan::create([
                'kode_karyawan' => $kodeKaryawan,
                'nama_sekolah' => $value['nama_sekolah'],
                'jurusan' => $value['jurusan'],
                'tahun_masuk' => $value['tahun_masuk'],
                'tahun_lulus' => $value['tahun_lulus'],
            ]);
        }

        foreach ($request->addpekerjaan as $key => $value) {
            dataPekerjaan::create([
                'kode_karyawan' => $kodeKaryawan,
                'perusahaan' => $value['perusahaan'],
                'jabatan' => $value['jabatan'],
                'tahun' => $value['tahun'],
                'keterangan' => $value['keterangan'],
            ]);
        }

        alert()->success('Pesan Sukses', 'Data Berhasil Tersimpan');

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $karyawan = dataDiri::where('kode_karyawan', $id)->first();
        $pendidikan = dataPendidikan::where('kode_karyawan', $id)->get();
        $pekerjaan = dataPekerjaan::where('kode_karyawan', $id)->get();

        return view('detail', [
            'karyawan' => $karyawan,
            'pendidikan' => $pendidikan,
            'pekerjaan' => $pekerjaan
        ]);

        foreach ($request->addpendidikan as $key => $value) {
            dataPendidikan::create([
                'kode_karyawan' => $kodeKaryawan,
                'nama_sekolah' => $value['nama_sekolah'],
                'jurusan' => $value['jurusan'],
                'tahun_masuk' => $value['tahun_masuk'],
                'tahun_lulus' => $value['tahun_lulus'],
            ]);
        }

        foreach ($request->addpekerjaan as $key => $value) {
            dataPekerjaan::create([
                'kode_karyawan' => $kodeKaryawan,
                'perusahaan' => $value['perusahaan'],
                'jabatan' => $value['jabatan'],
                'tahun' => $value['tahun'],
                'keterangan' => $value['keterangan'],
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $karyawan = dataDiri::where('kode_karyawan', $id)->first();
        $pendidikan = dataPendidikan::where('kode_karyawan', $id)->get();
        $pekerjaan = dataPekerjaan::where('kode_karyawan', $id)->get();

        return view('edit', [
            'karyawan' => $karyawan,
            'pendidikan' => $pendidikan,
            'pekerjaan' => $pekerjaan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dataDiri::where('kode_karyawan', $id)
            ->update([
                'nama_karyawan' => $request->nama_karyawan,
                'no_ktp' => $request->no_ktp,
                'alamat' => $request->alamat,
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $karyawan = dataDiri::where('kode_karyawan', $id)->delete();
        $pendidikan = dataPendidikan::where('kode_karyawan', $id)->delete();
        $pekerjaan = dataPekerjaan::where('kode_karyawan', $id)->delete();

        alert()->success('Pesan Sukses', 'Data Berhasil Terhapus');

        return redirect('karyawan/data');
    }
}
