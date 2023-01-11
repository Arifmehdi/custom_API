<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Validator;

class ApiController extends Controller
{

    //method get api for all category / single category  

    public function showcategory($id=null)
    {

        if($id == '' ){
            $category = Category::get();
            return response()->json(['category' => $category],200);
        }else{
            $category = Category::find($id);
            return response()->json(['category'=> $category],200);
        }

    }
    




    //method post api for single category 


    public function addcategory(Request $request)
    {

        $data = $request->all();
        $rules = [
            'category_name' => 'required',
            'category_code' => 'required',
            'description' => 'required',
        ];

        $customMessage = [
            'category_name.required' => 'Enter your category name',
            'category_code.required' => 'Enter your category code',
            'description.required' => 'Enter your category description',
        ];

        $validator = Validator::make($data, $rules,  $customMessage);

        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }

        if($request->ismethod('post')){

            // return $data;

            $category = new Category();
            $category->category_name = $request->category_name;
            $category->category_code = $request->category_code;
            $category->description = $request->description;
            $category->save();

            $message = 'Category added successfully';
            return response()->json(['message'=>$message],201);
        }
    }







    //method post api for multiple category 

    public function addMultipleCategory(Request $request)
    {

        $data = $request->all();
        $rules = [
            'categories.*.category_name' => 'required',
            'categories.*.category_code' => 'required',
            'categories.*.description' => 'required',
        ];

        $customMessage = [
            'categories.*.category_name.required' => 'Enter your category name',
            'categories.*.category_code.required' => 'Enter your category code',
            'categories.*.description.required' => 'Enter your category description',
        ];

        $validator = Validator::make($data, $rules,  $customMessage);

        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }

        if($request->ismethod('post')){



            // $category = new Category();
            // $category->category_name = $request->category_name;
            // $category->category_code = $request->category_code;
            // $category->description = $request->description;
            // $category->save();


                        //========================for categories camoe from json array name===============================

            foreach($data['categories'] as $multiCategory ){
                $category = new Category();
                $category->category_name = $multiCategory['category_name'];
                $category->category_code = $multiCategory['category_code'];
                $category->description = $multiCategory['description'];
                $category->save();
            }


            $message = 'Multiple category added successfully';
            return response()->json(['message'=>$message],201);
        }
    }






    //method put api for update category details

    public function updateCategoryDetails(Request $request, $id)
    {

        $data = $request->all();
        $rules = [
            'category_name' => 'required',
            'category_code' => 'required',
            'description' => 'required',
        ];

        $customMessage = [
            'category_name.required' => 'Enter your category name',
            'category_code.required' => 'Enter your category code',
            'description.required' => 'Enter your category description',
        ];

        $validator = Validator::make($data, $rules,  $customMessage);

        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }

        if($request->ismethod('put')){


            $category = Category::findOrFail($id);
            $category->category_name = $request->category_name;
            $category->category_code = $request->category_code;
            $category->description = $request->description;
            $category->save();

            $message = 'Category updated successfully';
            return response()->json(['message'=>$message],201);
        }
    }

        //patch api for update single field or record details

    public function updateSingleCategoryDetails(Request $request, $id)
    {
    
        $data = $request->all();
        $rules = [
            'category_name' => 'required',

        ];
    
        $customMessage = [
            'category_name.required' => 'Enter your category name',

        ];
    
        $validator = Validator::make($data, $rules,  $customMessage);
    
        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }
    
        if($request->ismethod('patch')){
    
    
            $category = Category::findOrFail($id);
            $category->category_name = $request->category_name;
            $category->save();
    
            $message = 'Category updated patch method successfully';
            return response()->json(['message'=>$message],201);
        }
    }

    //method delete api for delete category details with param
    public function deleteCategory($id=null)
    {
        Category::findOrFail($id)->delete();
        $message = 'Category deleted (with param) successfully';
        return response()->json(['message'=>$message],200);
    }
 
    //method delete api for delete category details with json
    public function jsonDeleteCategory(Request $request)
    {
        if($request->isMethod('delete')){


        $data = $request->all();
            // return $data;
        $a = Category::where('id',$data['id'])->delete();
        }
        $message = 'Category deleted (with json) method successfully';
        return response()->json(['message'=>$message],200);
    }

    //method delete api for delete multiple category details with param
    public function deleteMultipleCategory($ids)
    {
        $ids = explode(',',$ids);
        Category::whereIn('id',$ids)->delete();
        $message = 'Multiple Category deleted (with param)  successfully';
        return response()->json(['message'=>$message],200);


    }

    //method delete api for delete multiple category details with json
    public function jsonDeleteMultipleCategory(Request $request)
    {
        if($request->isMethod('delete'))
        {
            $data = $request->all();
            Category::whereIn('id',$data['ids'])->delete();
            $message = 'Multiple category deleted (with json) successfully';
            return response()->json(['message'=>$message],200);
        }
    }


    public function jsonDeleteMultipleCategoryWithJWT(Request $request)
    {

        $header = $request->header('Authorization');
        if($header == ''){
            $message = 'Authoraization is required';
            return response()->json(['message'=>$message],422);
        }else{
           if($header == 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkFyaWYgTWVoZWRpIiwiaWF0IjoxNTE2MjM5MDIyfQ.t4wrmKW8QhEjoSI6VZwp8wmezcEYZXUu7yUK03YUt-g' ){
            $data = $request->all();
            Category::whereIn('id',$data['ids'])->delete();
            $message = 'Multiple category deleted (with json) successfully';
            return response()->json(['message'=>$message],200);

           }else{
            $message = 'Authoraization does not match';
            return response()->json(['message'=>$message],422);
           }
        }

    }
}
