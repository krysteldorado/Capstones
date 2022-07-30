<?php

namespace App\Http\Controllers\File;

use App\Models\University;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UniversityController extends Controller
{
    public function logo()
    {
        $university = University::first();
        return Storage::disk('university')->get($university->logo);
    }
}
