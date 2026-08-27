<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenda;

class AgendaController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('q');

        $agendas = Agenda::query()
            ->when($keyword, function ($query, $keyword) {
                return $query->where('agenda_name','like','%' . $keyword . '%');
            })
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'title' => $item->agenda_name,
                    'description' => $item->description,
                    'start' => $item->start_date,
                    'end' => $item->end_date,
                ];
            });
        return response()->json([
            'code' => 200,
            'status' => 'Data berhasil diambil',
            'data' => $agendas,
        ]);
    }
}
