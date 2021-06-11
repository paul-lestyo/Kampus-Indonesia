<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Http\Resources\BlogResource;

use Validator;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();

		return $this->successResponse(BlogResource::collection($blogs), 'Blog Successfully Retrived');
    }

    public function store(Request $request)
    {
		$input = $request->all();
		$validator = Validator::make($input, [
			'title' => 'required',
			'content' => 'required'
		]);

		if($validator->fails()) {
			return $this->errorResponse('Validation Error', $validator->errors());
		}

		$blog = Blog::create($input);
		return $this->successResponse(new BlogResource($blog), 'Blog Successfully Created');
    }

    public function show($id)
    {
        $blog = Blog::find($id);

		if(is_null($blog)) {
			return $this->errorResponse('Blog Not Found');
		}

		return $this->successResponse(new BlogResource($blog), 'Blog Successfully Retrived');
    }

    public function update(Request $request, Blog $blog)
    {
        $input = $request->all();
		$validator = Validator::make($input, [
			'title' => 'required',
			'content' => 'required'
		]);

		if($validator->fails()) {
			return $this->errorResponse('Validation Error', $validator->errors());
		}

		$blog->title   = $input['title'];
		$blog->content = $input['content'];
		$blog->save();
	
		return $this->successResponse(new BlogResource($blog), 'Blog Successfully Updated');
    }

    
    public function destroy(Blog $blog)
    {
        $blog->delete();

		return $this->successResponse([], 'Blog Successfully Updated');
    }
}
