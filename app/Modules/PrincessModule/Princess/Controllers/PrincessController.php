<?php

namespace App\Modules\PrincessModule\Princess\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\KingdomModule\Kingdom\Kingdom;
use App\Modules\PrincessModule\Princess\Data\PrincessData;
use App\Modules\PrincessModule\Princess\Princess;
use App\Modules\PrincessModule\Princess\Services\PrincessService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class PrincessController extends Controller
{
    public function __construct(private PrincessService $princessService)
    {
    }

    public function create(): View
    {
        return view('pages.princess.create', ['kingdoms' => Kingdom::all()]);
    }

    public function store(Request $request): RedirectResponse
    {
        try {
            $request->validate([
                'name' => 'required',
                'kingdom_id' => 'required|exists:' . Kingdom::class . ',id',
                'email' => 'required|email|unique:princesses,email'
            ]);

            /** @var Princess $model */
            $model = $this->princessService->create(PrincessData::from($request->all()));

            return redirect()->route('generate.princess.create')->with('success', 'Added princess {' . $model->name . '} successfully!');
        } catch (ValidationException $e) {
            return redirect()->route('generate.princess.create')->with('error', $e->getMessage());
        } catch (\Throwable $e) {
            Log::warning('PrincessController\store() : ' . $e->getMessage());

            return redirect()->route('generate.princess.create')->with('error', 'Failed to add princess! Check logs!');
        }
    }
}
