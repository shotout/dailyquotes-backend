<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\User;
use App\Models\Quote;
use App\Models\MyQuote;
use App\Models\PastQuote;
use App\Models\UserQuote;
use App\Models\Subscription;
use App\Models\UserCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuoteController extends Controller
{
    public function index(Request $request)
    {
        // limit
        if ($request->has('length') && $request->input('length') != '') {
            $length = $request->input('length');
        } else {
            $length = 1;
        }

        // free user limit
        // if (auth('sanctum')->user()->is_member == 0) {
        //     $length = 10;
        // }

        // order by field
        if ($request->has('column') && $request->input('column') != '') {
            $column = $request->input('column');
        } else {
            $column = 'order';
        }

        // order direction
        if ($request->has('dir') && $request->input('dir') != '') {
            $dir = $request->input('dir');
        } else {
            $dir = 'asc';
        }

        // if user login
        // if (auth('sanctum')->check()) {
        //     $categories = UserCategory::where('user_id', auth('sanctum')->user()->id)
        //         ->pluck('category_id')
        //         ->toArray();
        // }

        // if (!count($categories)) {
        //     $categories = array(1);
        // }

        // check user category
        $isGeneral = UserCategory::where('user_id', auth('sanctum')->user()->id)
            ->where('category_id', 1)
            ->exists();
        $isFavorite = UserCategory::where('user_id', auth('sanctum')->user()->id)
            ->where('category_id', 2)
            ->exists();
        $userCategories = UserCategory::where('user_id', auth('sanctum')->user()->id)
            ->whereNotIn('category_id', [1,2])
            ->pluck('category_id')
            ->toArray();
        $userFavorites = UserQuote::where('user_id', auth('sanctum')->user()->id)
            ->where('type', 1)
            ->pluck('quote_id')
            ->toArray();
        $pastQuotes = PastQuote::where('user_id', auth('sanctum')->user()->id)
            ->pluck('quote_id')
            ->toArray();
        $myQuotes = MyQuote::where('user_id', auth('sanctum')->user()->id)->first();

        if ($isGeneral) {
            if ($isFavorite && count($userFavorites)) {
                $pastQuotes = PastQuote::where('user_id', auth('sanctum')->user()->id)
                    ->whereNotIn('quote_id', $userFavorites)
                    ->pluck('quote_id')
                    ->toArray();

                if ($myQuotes) {
                    // order by
                    if (count($userCategories)) {
                        $query = Quote::with('like')
                            ->whereIn('id', $myQuotes->quotes)
                            ->whereNotIn('id', $pastQuotes)
                            ->whereIn('category_id', $userCategories)
                            ->where('status', 2)
                            ->orderBy($column, $dir);
                    } else {
                        $query = Quote::with('like')
                            ->whereIn('id', $myQuotes->quotes)
                            ->whereNotIn('id', $pastQuotes)
                            ->where('status', 2)
                            ->orderBy($column, $dir);
                    }
                    
                    // pagination
                    $data = $query->paginate($length);

                    // check if past quotes full
                    if ($data->total() == 0) {
                        if (count($userCategories)) {
                            $query = Quote::with('like')
                                ->whereIn('id', $myQuotes->quotes)
                                ->whereIn('category_id', $userCategories)
                                ->where('status', 2)
                                ->orderBy($column, $dir);
                        } else {
                            $query = Quote::with('like')
                                ->whereIn('id', $myQuotes->quotes)
                                ->where('status', 2)
                                ->orderBy($column, $dir);
                        } 

                        $data = $query->paginate($length);
                    }
                } else {
                    // order by
                    if (count($userCategories)) {
                        $query = Quote::with('like')
                            ->whereNotIn('id', $pastQuotes)
                            ->whereIn('category_id', $userCategories)
                            ->where('status', 2)
                            ->orderBy($column, $dir);
                    } else {
                        $query = Quote::with('like')
                            ->whereNotIn('id', $pastQuotes)
                            ->where('status', 2)
                            ->orderBy($column, $dir);
                    }

                    // pagination
                    $data = $query->paginate($length);

                    // check if past quotes full
                    if ($data->total() == 0) {
                        if (count($userCategories)) {
                            $query = Quote::with('like')
                                ->whereIn('category_id', $userCategories)
                                ->where('status', 2)
                                ->orderBy($column, $dir);
                        } else {
                            $query = Quote::with('like')
                                ->where('status', 2)
                                ->orderBy($column, $dir);
                        }
                        
                        $data = $query->paginate($length);
                    }
                }
            } else {
                if ($myQuotes) {
                    // order by
                    if (count($userCategories)) {
                        $query = Quote::with('like')
                            ->whereIn('id', $myQuotes->quotes)
                            ->whereNotIn('id', $pastQuotes)
                            ->whereIn('category_id', $userCategories)
                            ->where('status', 2)
                            ->orderBy($column, $dir);
                    } else {
                        $query = Quote::with('like')
                            ->whereIn('id', $myQuotes->quotes)
                            ->whereNotIn('id', $pastQuotes)
                            ->where('status', 2)
                            ->orderBy($column, $dir);
                    }
                    
                    // pagination
                    $data = $query->paginate($length);

                    // check if past quotes full
                    if ($data->total() == 0) {
                        if (count($userCategories)) {
                            $query = Quote::with('like')
                                ->whereIn('id', $myQuotes->quotes)
                                ->whereIn('category_id', $userCategories)
                                ->where('status', 2)
                                ->orderBy($column, $dir);
                        } else {
                            $query = Quote::with('like')
                                ->whereIn('id', $myQuotes->quotes)
                                ->where('status', 2)
                                ->orderBy($column, $dir);
                        } 

                        $data = $query->paginate($length);
                    }
                } else {
                    // order by
                    if (count($userCategories)) {
                        $query = Quote::with('like')
                            ->whereNotIn('id', $pastQuotes)
                            ->whereIn('category_id', $userCategories)
                            ->where('status', 2)
                            ->orderBy($column, $dir);
                    } else {
                        $query = Quote::with('like')
                            ->whereNotIn('id', $pastQuotes)
                            ->where('status', 2)
                            ->orderBy($column, $dir);
                    }

                    // pagination
                    $data = $query->paginate($length);

                    // check if past quotes full
                    if ($data->total() == 0) {
                        if (count($userCategories)) {
                            $query = Quote::with('like')
                                ->whereIn('category_id', $userCategories)
                                ->where('status', 2)
                                ->orderBy($column, $dir);
                        } else {
                            $query = Quote::with('like')
                                ->where('status', 2)->orderBy($column, $dir);
                        }
                        
                        $data = $query->paginate($length);
                    }
                }
            }
        } else {
            if ($isFavorite && count($userFavorites)) {
                $pastQuotes = PastQuote::where('user_id', auth('sanctum')->user()->id)
                    ->whereNotIn('quote_id', $userFavorites)
                    ->pluck('quote_id')
                    ->toArray();

                // order by
                if (count($userCategories)) {
                    $query = Quote::with('like')
                        ->whereNotIn('id', $pastQuotes)
                        ->whereIn('category_id', $userCategories)
                        ->where('status', 2)
                        ->orderBy($column, $dir);
                } else {
                    $query = Quote::with('like')
                        ->whereNotIn('id', $pastQuotes)
                        ->where('status', 2)
                        ->orderBy($column, $dir);
                }
                

                // pagination
                $data = $query->paginate($length);

                // check if past quotes full
                if ($data->total() == 0) {
                    if (count($userCategories)) {
                        $query = Quote::with('like')
                            ->whereIn('category_id', $userCategories)
                            ->where('status', 2)
                            ->orderBy($column, $dir);
                    } else {
                        $query = Quote::with('like')
                            ->where('status', 2)
                            ->orderBy($column, $dir);
                    }
                    
                    $data = $query->paginate($length);
                }
            } else {
                // order by
                if (count($userCategories)) {
                    $query = Quote::with('like')
                        ->whereNotIn('id', $pastQuotes)
                        ->whereIn('category_id', $userCategories)
                        ->where('status', 2)
                        ->orderBy($column, $dir);
                } else {
                    $query = Quote::with('like')
                        ->whereNotIn('id', $pastQuotes)
                        ->where('status', 2)
                        ->orderBy($column, $dir);
                }
                
                // pagination
                $data = $query->paginate($length);

                // check if past quotes full
                if ($data->total() == 0) {
                    if (count($userCategories)) {
                        $query = Quote::with('like')
                            ->whereIn('category_id', $userCategories)
                            ->where('status', 2)
                            ->orderBy($column, $dir);
                    } else {
                        $query = Quote::with('like')
                            ->where('status', 2)
                            ->orderBy($column, $dir);
                    }
                    
                    $data = $query->paginate($length);
                }
            }
        }

        // quote notif detail
        if ($request->has('notif') && $request->notif != '') {
            $quoteNotif = Quote::with('like')->find($request->notif);
            if ($quoteNotif) {
                $data[0] = $quoteNotif;
            }
        }

        // user random themes base on quote swipe
            // $counter = 0;
            // foreach ($data as $qt) {
            //     if ($counter == count(auth('sanctum')->user()->themes)) {
            //         $counter = 0;
            //     }

            //     $qt->theme = auth('sanctum')->user()->themes[$counter];
            //     $counter++;
            // }
        // ---------------

        // free 1 month
        $isFreeUser = Subscription::where('user_id', auth('sanctum')->user()->id)
            ->where('type', 1)
            ->where('status', 2)
            ->exists();
        $hasMonthFree = Subscription::where('user_id', auth('sanctum')->user()->id)
            ->where('type', 5)
            ->exists();
        if ($isFreeUser && $hasMonthFree) {
            $month_free = true;
        } else {
            $month_free = false;
        }

        // free user limit
        // if (auth('sanctum')->user()->is_member == 0 && auth('sanctum')->user()->limit == 1) {
        //     return response()->json([
        //         'status' => 'success',
        //         'data' => null,
        //         'flag' => (object) array(
        //             'month_free' => $month_free
        //         )
        //     ], 200);
        // } else {
        //     $user = User::find(auth('sanctum')->user()->id);
        //     if ($user) {
        //         $user->limit = 1;
        //         $user->update();
        //     }
        // }
        if (auth('sanctum')->user()->is_member == 0) {
            $user = User::find(auth('sanctum')->user()->id);
            if ($user) {
                $user->limit = 1;
                $user->update();
            }
        }

        // retun response
        return response()->json([
            'status' => 'success',
            'data' => $data,
            'flag' => (object) array(
                'month_free' => $month_free
            )
        ], 200);
    }

    public function share($id)
    {
        $quote = Quote::find($id);

        if (!$quote) {
            return response()->json([
                'status' => 'failed',
                'message' => 'data not found'
            ], 404);
        }

        $quote->count_share++;
        $quote->update();

        return response()->json([
            'status' => 'success',
            'data' => null
        ], 200);
    }
}
