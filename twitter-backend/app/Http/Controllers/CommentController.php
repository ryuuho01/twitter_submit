<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index(Comment $comment)
  {
    $items = Comment::all();
    foreach ($items as $item){
      $item->name = $item->getnameData();
    };
    return response()->json([
      'data' => $items
    ], 200);
  }
  public function store(Request $request)
  {
    $item = Comment::create($request->all());

    return response()->json([
      'data' => $item
    ], 201);
  }
  public function show(Comment $comment)
  {
    $item = Comment::find($comment);
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
  public function update(Request $request, Comment $comment)
  {
    $update = [
      'comment' => $request->comment,
    ];
    $item = Comment::where('id', $comment->id)->update($update);
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
  public function destroy(Comment $comment)
  {
    $item = Comment::where('id', $comment->id)->delete();
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
