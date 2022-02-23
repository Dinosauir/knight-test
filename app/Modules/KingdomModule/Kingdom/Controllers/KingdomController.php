<?php

namespace App\Modules\KingdomModule\Kingdom\Controllers;

use App\Modules\KingdomModule\Kingdom\Data\KingdomData;
use App\Modules\KingdomModule\Kingdom\Kingdom;
use App\Modules\KingdomModule\Kingdom\Services\KingdomService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class KingdomController
{
    public function __construct(private KingdomService $kingdomService)
    {
    }

    public function create(): View
    {
        return view('pages.kingdom.create');
    }

    public function store(Request $request): RedirectResponse
    {
        try {
            $request->validate([
                'name' => 'required|unique:kingdoms',
            ]);

            /** @var Kingdom $kingdom */
            $kingdom = $this->kingdomService->create(new KingdomData($request->input('name')));

            return redirect()->route('generate.kingdom.create')->with('success', 'Added kingdom {' . $kingdom->name . '} successfully!');
        } catch (ValidationException $e) {
            return redirect()->route('generate.kingdom.create')->with('error', $e->getMessage());
        } catch (\Throwable $e) {
            Log::warning('KingdomController\store() : ' . $e->getMessage());

            return redirect()->route('generate.kingdom.create')->with('error', 'Failed to add kingdom! Check logs!');
        }
    }
}
