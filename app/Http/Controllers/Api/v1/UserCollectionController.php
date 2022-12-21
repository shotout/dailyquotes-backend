<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Quote;
use App\Models\Collection;
use Illuminate\Http\Request;
use App\Models\CollectionQuote;
use App\Http\Controllers\Controller;

class UserCollectionController extends Controller
{
    public function index()
    {
        $collections = Collection::where('user_id', auth('sanctum')->user()->id)
            ->withCount('quotes')
            ->where('status', 2)
            ->get();

        return response()->json([
            'status' => 'success',
            'data' => $collections
        ], 200);
    }

    public function show(Request $request, $id)
    {
        $collection = Collection::find($id);
        if (!$collection) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Collection not found'
            ], 404);
        }

        // limit
        if ($request->has('length') && $request->input('length') != '') {
            $length = $request->input('length');
        } else {
            $length = 10;
        }

        // query
        $query = CollectionQuote::with('quote')
            ->where('collection_id', $collection->id)
            ->orderBy('id', 'desc');

        // search
        if ($request->has('search') && $request->input('search') != '') {
            $query->whereHas('quote', function($q) use($request) {
                $q->where('title', 'like', '%' . $request->input('search') . '%');
            });
        }

        // pagination
        $quotes = $query->paginate($length);

        return response()->json([
            'status' => 'success',
            'data' => (object) array(
                'collection' => $collection,
                'quotes' => $quotes
            )
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $collection = Collection::where('name', $request->name)
            ->where('user_id', auth('sanctum')->user()->id)
            ->first();

        if ($collection) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Collection name has taken'
            ], 400);
        }

        $collection = new Collection;
        $collection->user_id = auth('sanctum')->user()->id;
        $collection->name = $request->name;
        $collection->save();

        return response()->json([
            'status' => 'success',
            'data' => $collection
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $hasCollection = Collection::where('name', $request->name)
            ->where('user_id', auth('sanctum')->user()->id)
            ->first();

        if ($hasCollection) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Collection name has taken'
            ], 400);
        }

        $collection = Collection::find($id);
        if (!$collection) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Collection not found'
            ], 404);
        }
        $collection->name = $request->name;
        $collection->update();

        return response()->json([
            'status' => 'success',
            'data' => $collection
        ], 201);
    }

    public function destroy($id)
    {
        $collection = Collection::where('id', $id)
            ->where('user_id', auth('sanctum')->user()->id)
            ->first();

        if (!$collection) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Collection not found'
            ], 404);
        }

        CollectionQuote::where('collection_id', $collection->id)->delete();
        $collection->delete();

        return response()->json([
            'status' => 'success',
            'data' => $collection
        ], 200);
    }

    public function storeQuote($collection, $quote)
    {
        $findCollection = Collection::find($collection);
        $findQuote = Quote::find($quote);

        if (!$findCollection) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Collection not found'
            ], 404);
        }

        if (!$findQuote) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Quote not found'
            ], 404);
        }

        $cq = CollectionQuote::where('collection_id', $collection)
            ->where('quote_id', $quote)
            ->first();

        if (!$cq) {
            $cq = new CollectionQuote;
            $cq->collection_id = $collection;
            $cq->quote_id = $quote;
            $cq->save();
        }

        return response()->json([
            'status' => 'success',
            'data' => $cq
        ], 201);
    }

    public function destroyQuote($collection, $quote)
    {
        $findCollection = Collection::find($collection);
        $findQuote = Quote::find($quote);

        if (!$findCollection) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Collection not found'
            ], 404);
        }

        if (!$findQuote) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Quote not found'
            ], 404);
        }

        $cq = CollectionQuote::where('collection_id', $collection)
            ->where('quote_id', $quote)
            ->first();

        if ($cq) {
            $cq->delete();
        }

        return response()->json([
            'status' => 'success',
            'data' => $cq
        ], 201);
    }
}