<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Form;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;
use File;
use ZipArchive;

class FormController extends Controller
{
    public function apply(Request $request): JsonResponse
    {
        
        $validator = Validator::make($request->all(), [
            'lastName' => 'required|string',
            'firstName' => 'required|string',
            'email' => 'required|email|unique:forms,email',
            'birthdate' => 'required',
            'birthPlace' => 'nullable',
            'address' => 'nullable|string',
            'phone' => 'required|string',
            'studyLevel' => 'string|nullable',
            'englishLevel' => 'string|nullable',
            'training' => 'string|nullable',
            'enterprise' => 'nullable|string',
            'job_status' => 'nullable|string',
            'piece_no' => 'string|nullable',
            'piece_photo' => 'nullable',
            'id_type' => 'string|nullable',
            'doc_bac' => 'required',
            'resume' => 'nullable',
            'other_doc' => 'nullable',
            'serie' => 'required|max:2',
            'mention_bac' => 'nullable'
        ]);

        $userEmail = Form::where('email', '=', $request->email)->first();

        if($userEmail != null){
            return response()->json(['message' => 'le mail existe déjà'], 422);
        }

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }      

        $zip = new ZipArchive;
        $fileName = 'Candidature.zip';

        $piece_photo = $request->piece_photo ? time().'_'.$request->file('piece_photo')->getClientOriginalName() : null;
        $piece_photo_url = $piece_photo? $request->file('piece_photo')->storeAs('backend/'.$request->email, $piece_photo, 'public'): null;

        $resume = $request->resume ? time().'_'.$request->file('resume')->getClientOriginalName() : null;
        $resume_url = $resume ? $request->file('resume')->storeAs('backend/'.$request->email, $resume, 'public') : null;


        $other_doc = $request->other_doc ? time().'_'.$request->file('other_doc')->getClientOriginalName() : null;
        $other_doc_url = $other_doc ? $request->file('other_doc')->storeAs('backend/'.$request->email, $other_doc, 'public') : null;


        $doc_bac = time().'_'.$request->file('doc_bac')->getClientOriginalName();
        
        $doc_bac_url = $request->file('doc_bac')->storeAs('backend/'.$request->email, $doc_bac, 'public');

        $form  = Form::create(array_merge($validator->validated(), [
            'piece_photo' => $piece_photo_url ? $piece_photo_url : null,
           'resume' => $resume_url ? $resume_url : null,
            'doc_bac' => $doc_bac_url ? $doc_bac_url : null,
           'other_doc' => $other_doc_url ? $other_doc_url : null
        ]));
        return response()->json($form, 201);

    }

    public function retrieveForms(): JsonResponse
    {
        $forms = Form::all();
        return response()->json($forms, 201);
    }

    public function deleteCandidate($id): JsonResponse
    {
        $form = Form::find($id);
        if($form){
            $form->delete();
            return response()->json(['message' => 'Candidature supprimée'], 201);
        }
    }

    public function downloadDoc(Request $request) {
        return Storage::download('public/'.$request->file_path);
    }

    public function downloadDocZip(Request $request) {
        $zip = new ZipArchive();
        $fileName = 'Candidature.zip';
        if ($zip->open(storage_path('app/public/backend/'.$fileName), ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE)
        {
            $files = Storage::files('public/backend/' .$request->file_path);
            foreach ($files as $key => $value) {
                $relativeNameInZipFile = basename($value);
                $zip->addFile(storage_path('app/'.$value), $relativeNameInZipFile);
            }
            $zip->close();
        }
        return Storage::download('public/backend/'.$fileName);
    }
}