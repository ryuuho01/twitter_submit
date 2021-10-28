<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
  {
    $items = Client::all();
    return response()->json([
      'data' => $items
    ], 200);
  }
  public function store(Request $request)
  {
    $item = Client::create($request->all());
    return response()->json([
      'data' => $item
    ], 201);
  }
  public function show(Client $client)
  {
    $item = Client::find($client);
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
  public function update(Request $request, Client $client)
  {
    $update = [
      'name' => $request->name,
    ];
    $item = Client::where('id', $client->id)->update($update);
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
  public function destroy(Client $client)
  {
    $item = Client::where('id', $client->id)->delete();
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
