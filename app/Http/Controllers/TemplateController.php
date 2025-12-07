<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function index()
    {
        $search = request()->get('search', null);
        $showTrash = request()->get('showTrash', false);

        $templates = Template::query()
            ->when($showTrash, fn(Builder $query) => $query->withTrashed())
            ->when($search, fn (Builder $query) =>
                $query->where('name', 'like', "%$search%")
                ->orWhere('id',$search)
            )
            ->paginate(5)
            ->appends(compact('search'));

        return view('template.index', compact('search', 'showTrash', 'templates'));
    }

    public function create()
    {
        return view('template.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'body' => ['required'],
        ]);

        Template::create($data);

        return to_route('template.index')
            ->with('success', __('Template successfully created!'));
    }

    public function show(Template $template)
    {
        return view('template.show', compact('template'));
    }

    public function edit(Template $template)
    {
        return view('template.edit', compact('template'));
    }

    public function update(Request $request, Template $template)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'body' => ['required'],
        ]);

        $template->fill($data);
        $template->save();

        return back()
            ->with('success', __('Template successfully updated!'));
    }

    public function destroy(Template $template)
    {
        $template->delete();

        return to_route('template.index')
            ->with('success', __('Template successfully created!'));
    }
}
