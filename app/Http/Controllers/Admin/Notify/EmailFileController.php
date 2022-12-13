<?php

namespace App\Http\Controllers\Admin\Notify;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Notify\EmailFileRequest;
use App\Http\Services\File\FileService;
use App\Models\Notify\Email;
use App\Models\Notify\EmailFile;

class EmailFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Email $email)
    {
        return view('admin.notify.email-file.index' , compact('email'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Email $email)
    {
        // TODO  add title to file
        // TODO add where to store the file
        return view('admin.notify.email-file.create', compact('email'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmailFileRequest $request , Email $email ,FileService $fileService)
    {

        $inputs = $request->all();

        if( $request->hasFile('file') )
        {
            $fileService->setExclusiveDirectory('files' . DIRECTORY_SEPARATOR . 'email-files');
            $fileService->setFileSize($request->file('file'));
            $fileSize = $fileService->getFileSize();
            $result = $fileService-> moveToPublic($request->file('file'));
            $fileFormat = $fileService -> getFileFormat();

        }

        if($result === false)
        {
            return redirect()->route('admin.notify.email-file.index', $email->id)->with('swal-error', 'آپلود فایل با خطا مواجه شد');
        }

        $inputs['public_mail_id'] = $email->id;
        $inputs['file_path'] = $result;
        $inputs['file_size'] = $fileSize;
        $inputs['file_type'] = $fileFormat;

        
        $file = EmailFile::create($inputs);
        return redirect()->route('admin.notify.email-file.index', $email->id)->with('swal-success', 'فایل جدید شما با موفقیت آپلود شد');;
    



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
    public function edit(EmailFile $file )
    {
        return view('admin.notify.email-file.edit',compact('file'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmailFileRequest $request, EmailFile $file, FileService $fileService)
    {
        $inputs = $request->all();

        if (!empty($file->file_path))
        {
            // TODO add conditions for deleting from public or storage
            $fileService->deleteFile($file->file_path);

        }
        if( $request->hasFile('file') )
        {
            $fileService->setExclusiveDirectory('files' . DIRECTORY_SEPARATOR . 'email-files');
            $fileService->setFileSize($request->file('file'));
            $fileSize = $fileService->getFileSize();
            $result = $fileService-> moveToPublic($request->file('file'));
            if ($result === false) 
            {
                return redirect()->route('admin.notify.email-file.index')->with('swal-error', 'آپلود فایل با خطا مواجه شد');
            }

            $fileFormat = $fileService -> getFileFormat();
            
            $inputs['file_path'] = $result;
            $inputs['file_size'] = $fileSize;
            $inputs['file_type'] = $fileFormat;
        

        }

        if($result === false)
        {
            return redirect()->route('admin.notify.email-file.index', $file->email->id)->with('swal-error', 'آپلود فایل با خطا مواجه شد');
        }


        
        $file->update($inputs);
        return redirect()->route('admin.notify.email-file.index', $file->email->id)->with('swal-success', 'فایل شما با موفقیت ویرایش شد');;
    

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmailFile $file)
    {
        $result = $file->delete();
        return redirect()->route('admin.notify.email-file.index', $file->email->id)->with('swal-success', 'فایل شما با موفقیت حذف شد');
    
    }

    
    public function status(EmailFile $emailFile)
    {

        $emailFile->status = $emailFile->status == 0 ? 1 : 0;
        $result = $emailFile->save();
        if ($result) {
            if ($emailFile->status == 0) {
                return response()->json(['status' => true, 'checked' => false]);
            } else {
                return response()->json(['status' => true, 'checked' => true]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }
}
