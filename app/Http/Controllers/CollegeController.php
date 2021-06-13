<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\College;
use App\Http\Resources\CollegeResource;
use App\Http\Resources\MajorResource;

use Validator;

class CollegeController extends Controller
{
    public function index()
    {
        $colleges = College::withCount('majors')->get();

		return $this->successResponse(CollegeResource::collection($colleges), 'Colleges Successfully Retrived');
    }

    public function store(Request $request)
    {
		$input = $request->all();
		$validator = Validator::make($input, [
			'name' => 'required',
		]);

		if($validator->fails()) {
			return $this->errorResponse('Validation Error', $validator->errors());
		}

		$college = College::create($input);
		return $this->successResponse(new CollegeResource($college), 'College Successfully Created');
    }

    public function show($id)
    {
        $college = College::with('majors')->find($id);

		if(is_null($college)) {
			return $this->errorResponse('College Not Found');
		}

		return $this->successResponse(new CollegeResource($college), 'College Successfully Retrived');
    }

    public function update(Request $request, College $college)
    {
        $input = $request->all();
		$validator = Validator::make($input, [
			'name' => 'required',
		]);

		if($validator->fails()) {
			return $this->errorResponse('Validation Error', $validator->errors());
		}

		$college->name   = $input['name'];
		$college->save();
	
		return $this->successResponse(new CollegeResource($college), 'College Successfully Updated');
    }

    
    public function destroy(College $college)
    {
        $college->delete();

		return $this->successResponse([], 'College Successfully Deleted');
    }

	public function showMajor($id_college, $id_major) {
		$major = College::with('majors')
						->find($id_college)
						->majors()
						->find($id_major);

		if(is_null($major)) {
			return $this->errorResponse('Major Not Found');
		}
		
		return $this->successResponse(new MajorResource($major), 'Major Successfully Retrived');
	}

	public function storeMajor(Request $request, College $college) {
		$input = $request->all();
		$validator = Validator::make($input, [
			'name' => 'required',
		]);

		if($validator->fails()) {
			return $this->errorResponse('Validation Error', $validator->errors());
		}

		$major = $college->majors()->create($input);
		return $this->successResponse(new MajorResource($major), 'Major Successfully Created');
	}

	public function updateMajor(Request $request, College $college, $id) {
		$input = $request->all();
		$validator = Validator::make($input, [
			'name' => 'required',
		]);

		if($validator->fails()) {
			return $this->errorResponse('Validation Error', $validator->errors());
		}

		$major = $college->majors()->find($id);
		$major->name   = $input['name'];
		$major->save();
	
		return $this->successResponse(new MajorResource($major), 'Major Successfully Updated');
	}

	public function destroyMajor(College $college, $id) {
		$college->majors()->find($id)->delete();

		return $this->successResponse([], 'Major Successfully Deleted');
	}
}
