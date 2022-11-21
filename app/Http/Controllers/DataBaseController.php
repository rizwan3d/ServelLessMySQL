<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteRequest;
use App\Http\Requests\InsertRequest;
use App\Http\Requests\SelectRequest;
use App\Http\Requests\UpdateRequest;
use DB;
use Exception;

class DataBaseController extends Controller
{
    public function select(SelectRequest $request)
    {
        $results = null;
        try {
            if ($request->has('perm')) {
                $results = DB::select($request->input('query'), $request->input('perm'));
            } else {
                $results = DB::select($request->input('query'));
            }

            return response()->json(['status' => true, 'results' => $results], 200);
        } catch (Exception $e) {
            return response()->json(['status' => false, 'results' => $e->getMessage()], 500);
        }
    }

    public function insert(InsertRequest $request)
    {
        try {
            $results = DB::insert($request->input('query'),$request->input('perm'));
            return response()->json(['status' => true, 'results' => $results], 200);
        } catch (Exception $e) {
            return response()->json(['status' => false, 'results' => $e->getMessage()], 500);
        }
    }

    public function update(UpdateRequest $request)
    {
        try {
            $results = DB::update($request->input('query'),$request->input('perm'));
            return response()->json(['status' => true, 'results' => $results], 200);
        } catch (Exception $e) {
            return response()->json(['status' => false, 'results' => $e->getMessage()], 500);
        }
    }

    public function delete(DeleteRequest $request)
    {
        try {
            $results = DB::delete($request->input('query'))  == 1 ? true : false ;
            return response()->json(['status' => true, 'results' => $results], 200);
        } catch (Exception $e) {
            return response()->json(['status' => false, 'results' => $e->getMessage()], 500);
        }
    }
}
