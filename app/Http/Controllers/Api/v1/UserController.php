<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\User;
use App\Models\Quote;
use App\Models\Theme;
use App\Models\Category;
use App\Models\UserQuote;
use App\Models\Collection;
use Illuminate\Http\Request;
use App\Models\CollectionQuote;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function quote(Request $request, $id)
    {
        $request->validate([
            'type' => 'required',
        ]);

        $quote = Quote::find($id);

        if (!$quote) {
            return response()->json([
                'status' => 'failed',
                'message' => 'data not found'
            ], 404);
        }

        $userQuote = UserQuote::where('user_id', auth('sanctum')->user()->id)
            ->where('quote_id', $id)
            ->first();

        if (!$userQuote) {
            $userQuote = new UserQuote;
        }

        $userQuote->user_id = auth('sanctum')->user()->id;
        $userQuote->quote_id = $id;
        $userQuote->type = $request->type;
        if ($request->type == 1) {
            $userQuote->flag = "like";
        } else {
            $userQuote->flag = "dislike";
        }
        $userQuote->save();

        return response()->json([
            'status' => 'success',
            'data' => $userQuote
        ], 200);
    }

    public function updateTheme($id)
    {
        $theme = Theme::find($id);

        if (!$theme) {
            return response()->json([
                'status' => 'failed',
                'message' => 'data not found'
            ], 404);
        }

        $user = User::find(auth('sanctum')->user()->id);
        $user->theme_id = (int)$id;
        $user->update();

        return response()->json([
            'status' => 'success',
            'data' => $user
        ], 200);
    }

    public function updateCategory(Request $request)
    {
        if ($request->has('categories') && $request->categories != '') {
            $categories = Category::whereIn('id', $request->categories)->pluck('id')->toArray();

            $user = User::find(auth('sanctum')->user()->id);
            $user->categories()->sync($categories);

            $data = User::with('categories')->find(auth('sanctum')->user()->id);

            return response()->json([
                'status' => 'success',
                'data' => $data
            ], 200);
        }
    }

    public function myCollection()
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

    public function myCollectionDetail($id)
    {

    }

    public function addCollection(Request $request)
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

    public function addQuoteToCollection($collection, $quote)
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
}
