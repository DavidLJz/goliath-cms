<?php

namespace App\Http\Controllers;

use App\Models\student_group;
use App\Http\Resources\StudentGroupJson;
use Illuminate\Http\Request;
use App\Helpers\Inquiry;

class StudentGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = student_group::query();

        $data = $request->all();

        if (!empty($data)) {
            $rules = [
                'like' => ['name' => 'string'],
                'where' => ['id' => 'integer']
            ];

            $inquiry = new Inquiry($rules, $data);

            if (!empty($inquiry->errors)) {
                return response()->json([
                    'errors' => $inquiry->errors
                ]);
            }

            $query = $inquiry->buildQuery($query);
        }

        return new StudentGroupJson($query->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\student_group  $student_group
     * @return \Illuminate\Http\Response
     */
    public function show(student_group $student_group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\student_group  $student_group
     * @return \Illuminate\Http\Response
     */
    public function edit(student_group $student_group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\student_group  $student_group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, student_group $student_group)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\student_group  $student_group
     * @return \Illuminate\Http\Response
     */
    public function destroy(student_group $student_group)
    {
        //
    }
}
