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
        if (empty($id)) {
            $title = 'Edit Category';
            $category =  new Category;
        }else{
            $title = 'Add Category';
        } 
        if ($request->isMethod('post')) {
            $data  = $request->all();

            //validation
            $rules = [
                'category_name' => 'required',
                'section_id' => 'required',
                'category_image' => 'required|image',
            ];
            $customMessages = [
                'category_name.required' => 'Name is Required',
                'section_id.required' => 'Section is Required',
                'category_image.required' => 'Valid Image is required',
                'category_image.image' => 'Valid Image is required',
            ];
            $this->validate($request, $rules, $customMessages);
            if ($request->hasFile('category_image')) 
             {
                 $imageTmp = $request->file('category_image');
                // dd($imageTmp);
                if($imageTmp->isValid())
                {
                    $imageName = rand(111, 99999).'.'.$imageTmp->getClientOriginalName();
                    $imagePath = 'images/category_images/'.$imageName;
                    \Image::make($imageTmp)->resize(160,160)->save($imagePath);
                    //\File::delete('images/category_images/'.$data['current_image']);
                }
             }

            $category->parent_id =  $data['parent_id'] ;
            $category->section_id =  $data['section_id'] ;
            $category->category_name =  $data['category_name'] ;
            $category->category_image =  $imageName;
            $category->category_discount =  $data['category_discount'] ;
            $category->description =  $data['description'] ;
            $category->url =  $data['url'] ;
            $category->meta_title =  $data['meta_title'] ;
            $category->meta_description =  $data['meta_description'] ;
            $category->meta_keywords =  $data['meta_keywords'] ;
            $category->status = 1 ;
            $category->save();
            \Session::flash('success_message', 'Category has been added successfully');
            return redirect('/admin/categories');
        }
        
        $sections = Section::all();
        return \view('admin.categories.add_edit_category', ['title' => $title, 'page' => 'categories', 'sections' => $sections]);
        
    }

    
}
