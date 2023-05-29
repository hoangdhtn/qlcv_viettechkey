<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadFileController extends Controller
{
    //
    public function downloadfile($filename){
        try {
            $path = public_path('files/'.$filename);
            //dd($path);
            if (file_exists($path)) {
                //dd($path);
                return response()->download(public_path() .'/files/'.$filename);
            }
        } catch (Exception $e) {
            print_r($e);
        }
    }

    public function reviewfile($filename){
        try {
            $path = public_path('files/'.$filename);
            //dd($path);
            if (file_exists($path)) {
                //dd($path);
                //return view('admincp.reviewfile.showfile')->with(compact('filename'));
                return response()->file($path);
            }
        } catch (Exception $e) {
            print_r($e);
        }
    }
}
