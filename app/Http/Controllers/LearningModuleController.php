<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Models\LearningModule;


class LearningModuleController extends Controller
{
    public function download($id)
{
    $module = LearningModule::findOrFail($id);
    $path = $module->mod_file; // Contoh: "modules/kimia.pdf"

    if (!Storage::disk('public')->exists($path)) {
        abort(404, 'File tidak ditemukan.');
    }

    return Storage::disk('public')->download($path);
}
}
