<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PemohonIzin extends Component
{
    public function getData(Request $request){
        $nomor_tiket = $request->input('nomor_tiket');
        $user = 'skmpt5p';
        $key = md5('5kMp7$p#'.date('dmY'));
        $id = base64_encode($nomor_tiket);
        $url = "https://perizinan.jatengprov.go.id/skm/getdetaildata?user=$user&key=$key&id=$id";
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_URL,$url);
        $result=curl_exec($ch);
        curl_close($ch);
        $datas = json_decode($result,true);
        //dd($datas);
        $data_users = DataUser::all();
        foreach ($data_users as $data_user){
        }
        if (is_array($datas) || is_object($datas)){
            foreach ($datas as $data){
            }
        }
        $request_id = ($data['ticket']);
        $nama = ($data['namalengkap']);
        $nama_perusahaan = ($data['fullname_perusahaan']);
        $sektor = ($data['parent_name']);
        $jenis_izin = ($data['name']);
        $alamat = ($data['address']);
        $no_telp = ($data['phone']);
        $jenis_kelamin = ($data['gender']);

        if ($request_id == null){
            return Redirect::back()->with('bad', 'Data Tidak Ditemukan');
        }
        elseif ($request_id == $data_user->request_id){
            return Redirect::back()->with('bad', 'Maaf, Anda Sudah Pernah Mengisi Survey Kepuasan Masyarakat, Terimakasih');
        }
        else{
            return view('data-skm', compact('request_id', 'nama', 'nama_perusahaan', 'sektor', 'jenis_izin', 'alamat', 'no_telp', 'jenis_kelamin'));
        }
    }
    public function storeDataUser(Request $request)
    {
        $data_users = DataUser::all();
        foreach ($data_users as $data_user){
        }

        $request_id = $request->input('request_id');
        $nama = $request->input('nama');
        $alamat = $request->input('alamat');
        $no_telp = $request->input('no_telp');
        $jenis_kelamin = $request->input('jenis_kelamin');
        $pendidikan = $request->input('pendidikan');
        $usia = $request->input('usia');
        $sektor = $request->input('sektor');
        $jenis_izin = $request->input('jenis_izin');
        $status = $request->input('status');

        if($nama == $data_user->nama){
            return Redirect::route('home')->with('bad', 'Maaf, Anda Sudah Pernah Mengisi Survey Kepuasan Masyarakat, Terimakasih');
        }
        $store = new DataUser();
        $store->request_id = $request_id;
        $store->nama = $nama;
        $store->alamat = $alamat;
        $store->no_telp = $no_telp;
        $store->jenis_kelamin = $jenis_kelamin;
        $store->pendidikan = $pendidikan;
        $store->usia = $usia;
        $store->sektor = $sektor;
        $store->jenis_izin = $jenis_izin;
        $store->status = $status;
        //dd($store);
        $store->save();
        Session::put('key', $store->id);
        return redirect()->route('get-pertanyaan');
    }
    public function render()
    {
        return view('livewire.pemohon-izin');
    }
}
