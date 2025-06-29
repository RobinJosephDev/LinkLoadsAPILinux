<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class FileTransferController extends Controller
{
    public function uploadFile(Request $request)
    {
        try {
            Log::info('Incoming file upload request:', $request->all());

            $request->validate([
                'brok_carr_aggmt' => 'nullable|file|mimes:doc,docx,pdf,jpg,jpeg,png,gif,tiff,bmp|max:10240',
                'coi_cert' => 'nullable|file|mimes:doc,docx,pdf,jpg,jpeg,png,gif,tiff,bmp|max:10240',
                'cust_sbk_agreement' => 'nullable|file|mimes:doc,docx,pdf,jpg,jpeg,png,gif,tiff,bmp|max:10240',
                'cust_credit_agreement' => 'nullable|file|mimes:doc,docx,pdf,jpg,jpeg,png,gif,tiff,bmp|max:10240',
                'company_package' => 'nullable|file|mimes:doc,docx,pdf,jpg,jpeg,png,gif,tiff,bmp|max:10240',
                'insurance' => 'nullable|file|mimes:doc,docx,pdf,jpg,jpeg,png,gif,tiff,bmp|max:10240',
            ]);

            $uploadedFiles = [];

            if ($request->hasFile('brok_carr_aggmt')) {
                $file = $request->file('brok_carr_aggmt');

                Log::info("File received: " . $file->getClientOriginalName());
                Log::info("File size: " . $file->getSize() . " bytes");

                if ($file->isValid()) {
                    $originalName = $file->getClientOriginalName();
                    $fileName = time() . '_' . $originalName;
                    $filePath = $file->storeAs('carrier_agreements', $fileName, 'public');

                    if (!$filePath) {
                        Log::error("Failed to store brok_carr_aggmt.");
                        return response()->json(['error' => 'File storage failed'], 500);
                    }

                    Log::info("File stored at: storage/carrier_agreements/$fileName");

                    $uploadedFiles['brok_carr_aggmt'] = [
                        'fileUrl' => asset("storage/carrier_agreements/$fileName"),
                        'fileName' => $originalName,
                    ];
                } else {
                    Log::error('brok_carr_aggmt upload failed: Invalid file.');
                    return response()->json(['error' => 'Invalid brok_carr_aggmt file'], 400);
                }
            }

            if ($request->hasFile('coi_cert')) {
                $file = $request->file('coi_cert');

                Log::info("File received: " . $file->getClientOriginalName());
                Log::info("File size: " . $file->getSize() . " bytes");

                if ($file->isValid()) {
                    $originalName = $file->getClientOriginalName();
                    $fileName = time() . '_' . $originalName;
                    $filePath = $file->storeAs('coi_certificates', $fileName, 'public');

                    if (!$filePath) {
                        Log::error("Failed to store coi_cert.");
                        return response()->json(['error' => 'File storage failed'], 500);
                    }

                    Log::info("File stored at: storage/coi_certificates/$fileName");

                    $uploadedFiles['coi_cert'] = [
                        'fileUrl' => asset("storage/coi_certificates/$fileName"),
                        'fileName' => $originalName,
                    ];
                } else {
                    Log::error('coi_cert upload failed: Invalid file.');
                    return response()->json(['error' => 'Invalid coi_cert file'], 400);
                }
            }

            if ($request->hasFile('cust_sbk_agreement')) {
                $file = $request->file('cust_sbk_agreement');

                Log::info("File received: " . $file->getClientOriginalName());
                Log::info("File size: " . $file->getSize() . " bytes");

                if ($file->isValid()) {
                    $originalName = $file->getClientOriginalName();
                    $fileName = time() . '_' . $originalName;
                    $filePath = $file->storeAs('customer_agreements', $fileName, 'public');

                    if (!$filePath) {
                        Log::error("Failed to store cust_sbk_agreement.");
                        return response()->json(['error' => 'File storage failed'], 500);
                    }

                    Log::info("File stored at: storage/customer_agreements/$fileName");

                    $uploadedFiles['cust_sbk_agreement'] = [
                        'fileUrl' => asset("storage/customer_agreements/$fileName"),
                        'fileName' => $originalName,
                    ];
                } else {
                    Log::error('cust_sbk_agreement upload failed: Invalid file.');
                    return response()->json(['error' => 'Invalid cust_sbk_agreement file'], 400);
                }
            }

            if ($request->hasFile('cust_credit_agreement')) {
                $file = $request->file('cust_credit_agreement');

                Log::info("File received: " . $file->getClientOriginalName());
                Log::info("File size: " . $file->getSize() . " bytes");

                if ($file->isValid()) {
                    $originalName = $file->getClientOriginalName();
                    $fileName = time() . '_' . $originalName;
                    $filePath = $file->storeAs('customer_agreements', $fileName, 'public');

                    if (!$filePath) {
                        Log::error("Failed to store cust_credit_agreement.");
                        return response()->json(['error' => 'File storage failed'], 500);
                    }

                    Log::info("File stored at: storage/customer_agreements/$fileName");

                    $uploadedFiles['cust_credit_agreement'] = [
                        'fileUrl' => asset("storage/customer_agreements/$fileName"),
                        'fileName' => $originalName,
                    ];
                } else {
                    Log::error('cust_credit_agreement upload failed: Invalid file.');
                    return response()->json(['error' => 'Invalid cust_credit_agreement file'], 400);
                }
            }

            if ($request->hasFile('company_package')) {
                $file = $request->file('company_package');

                Log::info("File received: " . $file->getClientOriginalName());
                Log::info("File size: " . $file->getSize() . " bytes");

                if ($file->isValid()) {
                    $originalName = $file->getClientOriginalName();
                    $fileName = time() . '_' . $originalName;
                    $filePath = $file->storeAs('company_documents', $fileName, 'public');

                    if (!$filePath) {
                        Log::error("Failed to store company_package.");
                        return response()->json(['error' => 'File storage failed'], 500);
                    }

                    Log::info("File stored at: storage/company_documents/$fileName");

                    $uploadedFiles['company_package'] = [
                        'fileUrl' => asset("storage/company_documents/$fileName"),
                        'fileName' => $originalName,
                    ];
                } else {
                    Log::error('company_package upload failed: Invalid file.');
                    return response()->json(['error' => 'Invalid company_package file'], 400);
                }
            }

            if ($request->hasFile('insurance')) {
                $file = $request->file('insurance');

                Log::info("File received: " . $file->getClientOriginalName());
                Log::info("File size: " . $file->getSize() . " bytes");

                if ($file->isValid()) {
                    $originalName = $file->getClientOriginalName();
                    $fileName = time() . '_' . $originalName;
                    $filePath = $file->storeAs('company_documents', $fileName, 'public');

                    if (!$filePath) {
                        Log::error("Failed to store insurance.");
                        return response()->json(['error' => 'File storage failed'], 500);
                    }

                    Log::info("File stored at: storage/company_documents/$fileName");

                    $uploadedFiles['insurance'] = [
                        'fileUrl' => asset("storage/company_documents/$fileName"),
                        'fileName' => $originalName,
                    ];
                } else {
                    Log::error('insurance upload failed: Invalid file.');
                    return response()->json(['error' => 'Invalid insurance file'], 400);
                }
            }

            if (empty($uploadedFiles)) {
                Log::error('No files were uploaded.');
                return response()->json(['error' => 'No files uploaded'], 400);
            }

            return response()->json(['files' => $uploadedFiles]);
        } catch (\Exception $e) {
            Log::error('Exception during file upload: ' . $e->getMessage());
            return response()->json(['error' => 'File upload failed', 'message' => $e->getMessage()], 500);
        }
    }


    public function downloadFile($folder, $filename)
    {
        $filePath = "public/$folder/$filename";

        if (!Storage::exists($filePath)) {
            return response()->json(['error' => 'File not found'], 404);
        }

        return Storage::download($filePath);
    }
}
