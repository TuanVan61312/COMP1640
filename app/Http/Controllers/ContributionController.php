<?php

namespace App\Http\Controllers;

use App\Models\Contribution;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class ContributionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contributions = Contribution::all();
        return view('admin.contribution.view', compact('contributions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contribution.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate other fields
        $validatedData = $request->validate([
            'user_id' => 'required|integer',
            'faculty_id' => 'required|integer',
            'title' => 'required|string|max:50',
            'description' => 'required|string',
            'file' => 'required|mimes:doc,docx,pdf,jpg,jpeg,png',
            'event_id' => 'required|integer',
        ]);

        // if ($request->hasFile('file')) {
        //     $file = $request->file('file')->getClientOriginalName();
        //     $request->file('file')->move(public_path('uploads'), $file);
        // }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
    
            // Tạo tên file mới với timestamp và đuôi mở rộng
            $fileName = time() . '.' . $file->getClientOriginalExtension();
    
            // Lưu trữ file trong thư mục uploads
            $file->move(public_path('storage'), $fileName);
    
            // Cập nhật mảng validatedData với đường dẫn file
            $validatedData['file'] = $fileName;
            // $validatedData['file'] = 'app/public/uploads/' . $fileName;
        }

        // Set submitted_on field to current time
        $validatedData['submitted_on'] = Carbon::now();

        Contribution::create($validatedData);
        return redirect()->route('contributions.create')->with('success', 'Contribution created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function download(Contribution $contribution){
        try {
            $filePath = $contribution->file;
            $fullFilePath = public_path('storage' . $filePath);
    
            if (!file_exists($fullFilePath)) {
                return response()->json(['error' => 'File không tồn tại'], 404);
            }
    
            $zip = new ZipArchive();
            $fileName = "my-zip-file.zip";

            // $files = File::files($fullFilePath);
            //     $filteredFiles = array_filter($files, function($file) use ($contribution) {
            //         return basename($file) === $contribution->file;
            //     });

            if($zip->open($fileName, ZipArchive::CREATE)){
                $files = File::files($fullFilePath);
                // $filteredFiles = array_filter($files, function($file) use ($contribution) {
                //     return basename($file) === $contribution->file;
                // });
                foreach($files as $file){
                    $nameInZipFile = basename($file);
                    $zip->addFile($file, $nameInZipFile);
                }
                $zip->close();
            }

            return response()->download($fileName);
        } catch (\Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
