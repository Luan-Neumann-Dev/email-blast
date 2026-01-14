<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Database\Eloquent\Builder;

class CampaignController extends Controller
{
    public function index()
    {
        $search = request()->get('search', null);
        $showTrash = request()->get('showTrash', false);

        $campaigns = Campaign::query()
            ->when($showTrash, fn (Builder $query) => $query->withTrashed())
            ->when($search, fn (Builder $query) => $query
                ->where('name', 'like', "%$search%")
                ->orWhere('id', '=', $search)
            )
            ->paginate(5)
            ->appends(compact('search', 'showTrash'));

        return view('campaigns.index', compact('search', 'showTrash', 'campaigns'));
    }

    public function create(?string $tab = null) {
        return view('campaigns.create', compact('tab'));
    }

    public function destroy(Campaign $campaign) {
        $campaign->delete();

        return back()->with('message', __('Campaign successfully deleted!') );
    }

    public function restore(Campaign $campaign) {
        $campaign->restore();

        return back()->with('message', __('Campaign successfully restored!') );
    }
}
