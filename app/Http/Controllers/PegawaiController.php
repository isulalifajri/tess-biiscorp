<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PegawaiController extends Controller
{
    public function index(){
        return view('page.pegawai.index',[
            'title' => 'Data Pegawai',
            'pegawai' => Pegawai::all()
        ]);
    }

    public function listAPIPegawai(){
        $pegawai = Pegawai::all();
        return response()->json(['Data Pegawai' => $pegawai]);
    }

    public function create(){
        $title = 'Pages Create Pegawai';
        $data = new Pegawai();
        return view('page.pegawai.create', compact(
            'title', 'data',
        ));
    }

    public function store(Request $request){
        $rules = [
            'name' => ['required'],
            'email' => ['required'],
            'address' => ['required'],
            'no_telepon' => ['required','numeric'],
            'image' => ['required','image','file'],
            'position' => ['required'],
            'hire_date' => ['required','date'],
        ];

      
        
        $validatedData = $request->validate($rules);
        $dt = date('Y-m-d_His_a');

        if($request->file('image')){
            $names =  implode("",array_slice(explode(" ", $request->title),0 , 2)); // 2 dalam explode di gunakan untuk mengambail 2 kata pertama dalam request name
            $extension = $request->file('image')->extension();
            $nama_file = $names . "_" . $dt . "." . $extension;

            $request->file('image')->move('assets/images/pegawai', $nama_file); //this for move to directory file with original name
            $validatedData['image'] = $nama_file; //this for create name images in database
        }


        Pegawai::create($validatedData);

        return redirect('data-pegawai')->with('success', 'Pegawai Baru Berhasil di tambahkan');
    }

    public function edit($id){
        $data = Pegawai::find($id);
        $title = 'Edit Pegawai';

        return view('page.pegawai.edit', compact(
            'title', 'data'
        ));
    }

    public function update(Request $request, $id){
        $data = Pegawai::find($id);
        $rules = [
            'name' => ['required'],
            'email' => ['required'],
            'address' => ['required'],
            'no_telepon' => ['required','numeric'],
            'image' => ['image','file'],
            'position' => ['required'],
            'hire_date' => ['required','date'],
        ];

        $dt = date('Y-m-d_His_a');

        $validatedData = $request->validate($rules);




        if($request->file('image')){
            if($data->images){
                File::delete('assets/images/pegawai/'.$data->images);
                $data->images = $request->file('image')->getClientOriginalName();
            }
            $names =  implode("",array_slice(explode(" ", $request->title),0 , 2)); // 2 dalam explode di gunakan untuk mengambail 2 kata pertama dalam request name
            $extension = $request->file('image')->extension();
            $nama_file = $names . "_" . $dt . "." . $extension;

            $request->file('image')->move('assets/images/pegawai', $nama_file); //this for move to directory file with original name
            $validatedData['image'] = $nama_file; //this for create name images in database
        }


        Pegawai::find($data->id)->update($validatedData);
       
        return redirect('data-pegawai')->with('success', "Data Updated Successfully");
    }

    public function destroy($id){
        $data = Pegawai::find($id);

        File::delete('assets/images/Pegawai/'.$data->image);

        $data->destroy($data->id); 
        return redirect('data-pegawai')->with('success-danger', "Data Deleted Successfully");
    }
}
