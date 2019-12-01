<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Gambar;

class UploadController extends Controller
{
	public function upload(){
		$gambar = Gambar::get();
		return view('upload',['gambar' => $gambar]);
	}

	

	public function proses_upload(Request $request){
		// $this->validate($request, [
		// 	'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
			
		// ]);

		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('file');

		$nama_file = time()."_".$file->getClientOriginalName();

      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'data_file';
		$file->move($tujuan_upload,$nama_file);

		Gambar::create([
			'file' => $nama_file,
		]);

		return "berhasil upload";
	}

	public function aplot(Request $request){
		// $gambar =new Gambar;
		$file = $request->file('file');	
		$nama_file = time()."_".$file->getClientOriginalName();
		$tujuan_upload = 'data_file';
		$file->move($tujuan_upload,$nama_file);
		Gambar::create([
			'file' => $nama_file,
		]);
		
			// 'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'

		// menyimpan data file yang diupload ke variabel $file
		// $file = $request->file('file');

		

      	        // isi dengan nama folder tempat kemana file diupload
		// $tujuan_upload = 'data_file';
		// $file->move($tujuan_upload,$nama_file);

		// Gambar::create([
		// 	'file' => $nama_file,
		// ]);

		return $gambar = Gambar::get();
	}
}
