<?php

namespace App\Http\Controllers;

use App\Models\EmailList;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function index(EmailList $emailList) {

        $search = request()->search;

        $subscribers = $emailList
            ->subscribers()
            ->with('emailList')
            ->when($search, fn(Builder $query) => $query
                ->where('name', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%")
                ->orWhere('id', '=', "$search"))
            ->paginate(10)
            ->appends(compact('search'));

        return view('subscriber.index', [
            'emailList' => $emailList,
            'subscribers' => $subscribers,
            'search' => $search
        ]);
    }
}
