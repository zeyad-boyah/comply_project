<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDocumentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'client_name' => 'required|string|max:255',
            'status' => 'required|in:pending,approved,rejected',
            'reviewed_by' => 'nullable|string|max:255',
            'reviewed_at' => 'nullable|date',
        ];
    }

    /**
     * Summary of messages
     * @return array{client_name.max: string, client_name.required: string, reviewed_at.date: string, reviewed_by.string: string, status.in: string, status.required: string, title.max: string, title.required: string}
     */
    public function messages()
    {
        return [
            'title.required' => 'A document title is required.',
            'title.max' => 'The title cannot exceed 255 characters.',

            'client_name.required' => 'Please provide the client name.',
            'client_name.max' => 'Client name cannot exceed 255 characters.',

            'status.required' => 'The document status is required.',
            'status.in' => 'Status must be one of: pending, approved, or rejected.',

            'reviewed_by.string' => 'Reviewer name must be a text value.',
            'reviewed_at.date' => 'Reviewed date must be a valid date.',
        ];
    }
}
