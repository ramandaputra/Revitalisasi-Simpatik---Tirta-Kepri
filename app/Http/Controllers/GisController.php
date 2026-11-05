<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class GisController extends Controller
{
    /**
     * Display the GIS Map View.
     */
    public function index()
    {
        try {
            $zonas = Pelanggan::select('kodezona')
                ->whereNotNull('kodezona')
                ->where('kodezona', '!=', '')
                ->distinct()
                ->orderBy('kodezona')
                ->pluck('kodezona');
        } catch (\Throwable $e) {
            $zonas = collect(['1', '2', '3', '4']);
        }

        return view('gis.index', compact('zonas'));
    }

    /**
     * Search customer by nosamb or name.
     */
    public function searchCustomer(Request $request)
    {
        $query = $request->get('nosamb');

        if (!$query) {
            return response()->json(['status' => 'error', 'message' => 'Query kosong'], 400);
        }

        try {
            $pelanggan = Pelanggan::where('nosamb', $query)
                ->orWhere('norekening', $query)
                ->orWhere('nama', 'LIKE', "%{$query}%")
                ->first();

            if ($pelanggan) {
                return response()->json([
                    'status' => 'success',
                    'data' => $pelanggan,
                ]);
            }
        } catch (\Throwable $e) {
            // fallback
        }

        return response()->json(['status' => 'error', 'message' => 'Data tidak ditemukan'], 404);
    }
}
