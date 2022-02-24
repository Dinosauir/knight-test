<?php

namespace App\Modules\VirtueModule\Virtue\Controllers;

use App\Http\Controllers\Controller;

use App\Modules\VirtueModule\Virtue\Data\VirtueData;
use App\Modules\VirtueModule\Virtue\Services\VirtueService;
use App\Modules\VirtueModule\Virtue\Virtue;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class VirtueController extends Controller
{
    public function __construct(private VirtueService $virtueService)
    {
    }

    public function create(): View
    {
        return view('pages.virtue.create');
    }

    public function store(Request $request): RedirectResponse
    {
        try {
            $request->validate([
                'name' => 'required|unique:virtues'
            ]);

            /** @var Virtue $model */
            $model = $this->virtueService->create(new VirtueData(strtolower($request->input('name'))));

            return redirect()->route('generate.virtue.create')->with('success', 'Added virtue {' . $model->name . '} successfully!');
        } catch (ValidationException $e) {
            return redirect()->route('generate.virtue.create')->with('error', $e->getMessage());
        } catch (\Throwable $e) {
            Log::warning('VirtueController\store() : ' . $e->getMessage());

            return redirect()->route('generate.virtue.create')->with('error', 'Failed to add virtue! Check logs!');
        }
    }
}
