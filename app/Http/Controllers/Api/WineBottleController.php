<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Enum\BottleQuantity;
use App\Models\WineBottle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Enum;

class WineBottleController extends Controller
{
    public function index()
    {
        return WineBottle::cursor()->toJson();
    }

    public function show(WineBottle $wineBottle)
    {
        return $wineBottle->toJson();
    }

    public function delete(WineBottle $wineBottle)
    {
        $wineBottle->delete();

        return response(status: 204);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:wine_bottles|max:255',
            'description' => 'required',
            'quantity' => [new Enum(BottleQuantity::class)],
            'year_of_filling' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response($validator->errors()->toArray(), status: 400);
        }

        return WineBottle::create($validator->validate())->toJson();
    }
}
