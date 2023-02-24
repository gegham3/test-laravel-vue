<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Resources\Item as ItemResource;
use App\Models\Item;
use Illuminate\Support\Facades\Validator;

class ItemController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();

        return $this->sendResponse(ItemResource::collection($items), 'Items retrieved successfully.');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $input = $request->only([ 'left','entered' ]);

        $validator = Validator::make($input, [
            'left' => 'integer',
            'entered' => 'integer'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $item->current_stock = $item->current_stock - $input['left'] + $input['entered'] ;
        $item->monthly_consumption = $input['left'] + $input['entered'];

        $item->update($input);

        return $this->sendResponse(new ItemResource($item), 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();

        return $this->sendResponse([], 'Item deleted successfully.');
    }
}