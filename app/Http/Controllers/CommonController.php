<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Graduates;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Storage;
use File;
use Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Response;
use ZipArchive;
class CommonController extends Controller
{
    public function fileupload(Request $request){
        $file = $request->file('image');
        $filename = 'test.jpg';
        if($file){
            Storage::disk('local')->put($filename, File::get($file));
        }
        return response()->json(['file' => $file], 201);
     }

    public function downloadPDF($id) {
            $json = [];
            $api_url = env('APP_URL');
            $show = Graduates::find($id);
            $pdf = PDF::loadView('pdf',compact('show'));
        //    return view('pdf',compact('show'));
            return $pdf->stream($show->name.'_'.$show->application_no.'.pdf');      
    }
    public function savefile(Request $request){
        $path = $request->file('file')->store('uploaded');
        $json['success'] = true;
        $json['data'] = $path;
        return response()-json($json);
     }

     public function showUploadForm()
    {
        return view('upload');
    }

    public function storeUploads(Request $request)
    {
          $json = [];
          $get = '';
        //   return $request->file('file')->getSize();
          $api_url = "http://budca.in/links/";
          $validator = Validator::make($request->all(), [
            'file' => 'max:50',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json(['errors'=>$errors]);
        }
        if($request->hasFile('file'))
        {
            $rand = rand(1,10000);
            $file = $request->file('file');
            $originalname = $rand.'_'.$file->getClientOriginalName();
            $get = 'storage/app/public/images'.'/'.$originalname;
            $path = $file->storeAs('public/images', $originalname);
        }
        $file_path = $api_url.$get;
        $json['sucess'] = true;
        $json['data'] =  $file_path;
        $json['file_name'] =  $originalname;
        return response($json);
    }
    public function piechart(){
        $json = [];
        $coimbatore = Graduates::where('district','=','coimbatore')->count('district');
        $erode = Graduates::where('district','=','erode')->count('district');
        $nilgiris = Graduates::where('district','=','nilgiris')->count('district');
        $tirupur = Graduates::where('district','=','tirpur')->count('district');
        $json['coimbatore'] =  $coimbatore;
        $json['erode'] =  $erode;
        $json['nilgiris'] =  $nilgiris;
        $json['tirpur'] =  $tirupur;
        return response($json);
    }
    public function piechart1(){
        $json = [];
        $all = Graduates::all()->count();
        $selected = Graduates::whereNotNull('photo');
        $selected = $selected->orWhereNotNull('signature');
        $selected = $selected->orWhereNotNull('deg_provitional_cerificate');
        $selected = $selected->orWhereNotNull('aadhar_proof');
        $selected = $selected->orWhereNotNull('signature')->count();
        $rejected = Graduates::whereNull('photo');
        $rejected = $rejected->whereNull('signature');
        $rejected = $rejected->whereNull('deg_provitional_cerificate');
        $rejected = $rejected->whereNull('aadhar_proof');
        $rejected = $rejected->whereNull('signature')->count();
        $json['total'] =  $all;
        $json['selected'] =  $selected;
        $json['rejected'] =  $rejected;
        return response($json);
    }
    function bulkdownload(){
        $zip = new ZipArchive;
        $fileName = 'BulkData.zip';
        if ($zip->open(public_path($fileName), ZipArchive::CREATE) === TRUE)
        {
            $files = File::files(storage_path('app/public/pdffiles'));
            foreach ($files as $key => $value) {

                $relativeNameInZipFile = basename($value);

                $zip->addFile($value, $relativeNameInZipFile);

            }
            $zip->close();

        }
        return response()->download(storage_path('app/public'));

    }
}
