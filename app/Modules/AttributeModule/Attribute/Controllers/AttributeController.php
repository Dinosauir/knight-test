<?php

namespace App\Modules\AttributeModule\Attribute\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\AttributeModule\Attribute\Attribute;
use App\Modules\AttributeModule\Attribute\Data\AttributeData;
use App\Modules\AttributeModule\Attribute\Services\AttributeService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class AttributeController extends Controller
{
    public function __construct(private AttributeService $attributeService)
    {
    }

    public function create(): View
    {
        return view('pages.attribute.create');
    }

    public function store(Request $request): RedirectResponse
    {
        try {
            $request->validate([
                'name' => 'required|unique:attributes'
            ]);

            /** @var Attribute $model */
            $model = $this->attributeService->create(new AttributeData(strtolower($request->input('name'))));

            return redirect()->route('generate.attribute.create')->with('success', 'Added attribute {' . $model->name . '} successfully!');
        } catch (ValidationException $e) {
            return redirect()->route('generate.attribute.create')->with('error', $e->getMessage());
        } catch (\Throwable $e) {
            Log::warning('AttributeController\store() : ' . $e->getMessage());

            return redirect()->route('generate.attribute.create')->with('error', 'Failed to add attribute! Check logs!');
        }
    }
}
