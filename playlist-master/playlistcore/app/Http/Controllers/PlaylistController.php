<?php

namespace App\Http\Controllers;

use App\PlaylistTrack;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    public function index()
    {
        $tracks = PlaylistTrack::orderBy('position', 'asc')
            ->orderBy('id', 'asc')
            ->get();

        return response()->json($tracks, 200);
    }

    public function show($id)
    {
        $track = PlaylistTrack::find($id);
        if (!$track) {
            return response()->json(['error' => 'Pista no encontrada'], 404);
        }

        return response()->json($track, 200);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:200',
            'artist' => 'required|string|max:200',
            'album' => 'nullable|string|max:200',
            'duration_seconds' => 'nullable|integer|min:1|max:86400',
        ]);

        $nextPos = ((int) PlaylistTrack::max('position')) + 1;
        $track = PlaylistTrack::create([
            'title' => trim($request->input('title')),
            'artist' => trim($request->input('artist')),
            'album' => trim((string) $request->input('album', '')),
            'duration_seconds' => (int) $request->input('duration_seconds', 180),
            'position' => $nextPos,
        ]);

        return response()->json($track, 201);
    }

    public function update(Request $request, $id)
    {
        $track = PlaylistTrack::find($id);
        if (!$track) {
            return response()->json(['error' => 'Pista no encontrada'], 404);
        }

        $this->validate($request, [
            'title' => 'sometimes|required|string|max:200',
            'artist' => 'sometimes|required|string|max:200',
            'album' => 'nullable|string|max:200',
            'duration_seconds' => 'sometimes|integer|min:1|max:86400',
            'position' => 'sometimes|integer|min:1',
        ]);

        foreach (['title', 'artist', 'album'] as $field) {
            if ($request->has($field)) {
                $track->{$field} = trim((string) $request->input($field));
            }
        }
        if ($request->has('duration_seconds')) {
            $track->duration_seconds = (int) $request->input('duration_seconds');
        }
        if ($request->has('position')) {
            $track->position = (int) $request->input('position');
        }
        $track->save();

        return response()->json($track, 200);
    }

    public function destroy($id)
    {
        $track = PlaylistTrack::find($id);
        if (!$track) {
            return response()->json(['error' => 'Pista no encontrada'], 404);
        }

        $track->delete();
        return response()->json(['deleted' => true, 'id' => (int) $id], 200);
    }
}
