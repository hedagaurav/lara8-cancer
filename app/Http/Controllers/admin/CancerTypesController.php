<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCancerTypesRequest;
use App\Http\Requests\UpdateCancerTypesRequest;
use App\Models\CancerTypes;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CancerTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cancer_types_list = CancerTypes::all();
        return view('admin/cancer_type_list',compact('cancer_types_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/cancer_type_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCancerTypesRequest $request)
    {
        DB::beginTransaction();
        try {
            $cancer_type = new CancerTypes();
            $cancer_type->name = $request->cancer_type_name;
            $cancer_type->description = $request->cancer_type_description;
            
            if($cancer_type->save()){

                $cancer_type_id = $cancer_type->id;
                DB::commit();            
                echo "cancer type added";
            }
        } catch (Exception $ex) {
            DB::rollBack();
            dd($ex);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCancerTypesRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
