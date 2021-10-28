<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;

class LikeController extends Controller
{
  public function index()
  {
    $items = Like::all();
    return response()->json([
      'data' => $items
    ], 200);
  }
  public function store(Request $request)
  {
    $articles = Like::where('client_email', $request->client_email)
        ->where('post_id', $request->post_id)->first();
    if ($articles == null) {
        $create = [
            'client_id' => $request->client_id,
            'client_email' => $request->client_email,
            'post_id' => $request->post_id,
            'like' => 1,
        ];
        $item = Like::create($create);

    } else {
        if($articles->like == 0) {
        $update = [
            'like' => 1,
        ];
        } elseif ($articles->like == 1) {
        $update = [
            'like' => 0,
        ];
        }
        $item = Like::where('id', $articles->id)->update($update);
    }
    return response()->json([
      'data' => $item
    ], 201);
  }
  public function show(Like $like)
  {
    $item = Like::find($like);
    if ($item) {
      return response()->json([
        'data' => $item
      ], 200);
    } else {
      return response()->json([
        'message' => 'Not found',
      ], 404);
    }
  }
  public function update(Request $request)
  {
    if($request->like == 0) {
      $update = [
        'like' => 1,
      ];
    }
    // Like::where('post_id', $request->id)
    if($request->like == 1) {
      $update = [
        'like' => 0,
      ];
    }
    $item = Like::where('id', $request->id)->update($update);
    if ($item) {
      return response()->json([
        'message' => 'Updated successfully',
      ], 200);
    } else {
      return response()->json([
        'message' => 'Not found',
      ], 404);
    }
  }
  public function destroy(Like $like)
  {
    $item = Like::where('id', $like->id)->delete();
    if ($item) {
      return response()->json([
        'message' => 'Deleted successfully',
      ], 200);
    } else {
      return response()->json([
        'message' => 'Not found',
      ], 404);
    }
  }
}
