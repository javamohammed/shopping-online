<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Section;
class SectionController extends Controller
{
    //
    function sections(){
        $sections = Section::all();
        return \view('admin.sections.sections', ['sections' => $sections, 'page' => 'sections']);
    }
    function changeStatusSection(Request $request){
        $data  = $request->all();
        //dd($data);
        Section::Where('id', $data['id'])->update(['status' => $data['status']]);
        return 'nice';
    }
}

