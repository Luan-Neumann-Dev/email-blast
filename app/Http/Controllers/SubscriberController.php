<?php

namespace App\Http\Controllers;

use App\Models\EmailList;
use App\Models\Subscriber;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function index(EmailList $emailList)
    {
        $search = request()->search;
        $showTrash = request()->get('showTrash', false);

        $subscribers = $emailList
            ->subscribers()
            ->with('emailList')
            ->when($showTrash, fn(Builder $query) => $query->withTrashed())
            ->when($search, fn(Builder $query) => $query
                ->where('name', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%")
                ->orWhere('id', '=', "$search"))
            ->paginate(10)
            ->appends(compact('search'));

        return view('subscriber.index', [
            'emailList' => $emailList,
            'subscribers' => $subscribers,
            'search' => $search,
            'showTrash' => $showTrash
        ]);
    }

    public function destroy(mixed $emailList, Subscriber $subscriber)
    {
        $subscriber->delete();

        return back()->with('message', __('Subscriber deleted from the list!'));
    }
}
