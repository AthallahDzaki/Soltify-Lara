<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

use App\Models\Coins;
use Illuminate\Http\RedirectResponse;

class CoinsController extends Controller
{
    public function coins(): View
    {
        $coins = Coins::all();
        return view('coins', compact('coins'));
    }

    public function addCoin(Request $request): RedirectResponse
    {
        $data = $request->all();

        $request->validate([
            'name' => 'required',
            'stands' => 'required',
            'api_endpoint' => 'required',
            'image' => 'required:image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/storage');
            $image->move($destinationPath, $name);
            $data['image'] = $name;
        }

        $coin = new Coins();
        $coin->addCoin($data);
        return redirect()->back()->with('success', 'Coin added successfully');
    }

    public function editCoin($id): View
    {
        $coin = Coins::find($id);
        return view('edit-coin', compact('coin'));
    }

    public function updateCoin(Request $request, $id): RedirectResponse
    {
        $data = $request->all();
        $coin = new Coins();
        $coin->updateCoin($data, $id);
        return redirect()->back()->with('success', 'Coin updated successfully');
    }

    public function deleteCoin($id): RedirectResponse
    {
        $coin = Coins::find($id);
        $coin->delete();
        return redirect()->back()->with('success', 'Coin deleted successfully');
    }

    public function coin($id): View
    {
        $coin = Coins::find($id);
        return view('coin', compact('coin'));
    }
}
