<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;
use App\Http\Resources\DocumentResource;
use App\Models\Document;
use Illuminate\Http\Client\Response;
use Symfony\Component\HttpFoundation\Response as ResponseCode;
use Illuminate\Http\Request;
use PHPUnit\Logging\OpenTestReporting\Status;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $query = Document::query();

        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        $documents = $query->get();

        // return response()->json($documents);
        return DocumentResource::collection($documents);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDocumentRequest $request)
    {
        //
        $document = Document::create($request->validated());

        return response()->json(new DocumentResource($document), ResponseCode::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Document $document)
    {
        //
        return response()->json(new DocumentResource($document), ResponseCode::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDocumentRequest $request, Document $document)
    {
        //
        $document->update($request->validated());
        return response()->json([
            'message' => 'Document updated successfully.',
            'data' => new DocumentResource($document)
        ], ResponseCode::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        //
        $document->delete();
        return response()->json([
            'message' => 'Document deleted successfully.'
        ], ResponseCode::HTTP_OK);
    }
}
