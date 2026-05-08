<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        return view('admin.about.index', [
            'abouts' => About::where('profile_id', $this->currentProfile()->id)->get(),
        ]);
    }

    public function create()
    {
        return view('admin.about.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'max:50'],
            'text' => ['required'],
        ]);

        $about = new About();
        $about->title = $request->title;
        $about->text = $request->text;
        $about->image = $request->image ?: 'default.png';
        $about->is_main = $request->has('is_main') ? 1 : 0;
        $about->profile_id = $this->currentProfile()->id;
        $about->save();

        return redirect()->route('about.index')->with('success', 'Resumo cadastrado com sucesso.');
    }

    public function edit(About $about)
    {
        $this->authorizeProfileRecord($about);

        return view('admin.about.edit', [
            'about' => $about,
        ]);
    }

    public function update(About $about, Request $request)
    {
        $this->authorizeProfileRecord($about);

        $request->validate([
            'title' => ['required', 'max:50'],
            'text' => ['required'],
        ]);

        $about->title = $request->title;
        $about->text = $request->text;
        $about->image = $request->image ?: $about->image;
        $about->is_main = $request->has('is_main') ? 1 : 0;
        $about->save();

        return redirect()->route('about.index')->with('success', 'Resumo atualizado com sucesso.');
    }

    public function destroy(About $about)
    {
        $this->authorizeProfileRecord($about);
        $about->delete();

        return redirect()->route('about.index')->with('success', 'Resumo removido com sucesso.');
    }
}
