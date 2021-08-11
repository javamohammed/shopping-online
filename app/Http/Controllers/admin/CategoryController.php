<?php


namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Section;
class CategoryController extends Controller
{
    function categories(){
        $categories = Category::all();
        return \view('admin.categories.categories', ['categories' => $categories, 'page' => 'categories']);
    }

    function changeStatusCategory(Request $request){
        $data  = $request->all();
        //dd($data);
        Category::Where('id', $data['id'])->update(['status' => $data['status']]);
        return 'nice';
    }

    function addEditCategory(Request $request, $id = null){
        if (empty($id)) 
            $title = 'Edit Category';
        else 
            $title = 'Add Category';
        
        $sections = Section::all();
        return \view('admin.categories.add_edit_category', ['title' => $title, 'page' => 'categories', 'sections' => $sections]);
        
    }

    
}
