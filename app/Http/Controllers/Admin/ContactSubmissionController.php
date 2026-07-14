<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSubmission;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class ContactSubmissionController extends Controller
{
    public function index(Request $request): View
    {
        $submissions = ContactSubmission::query()
            ->when($request->filled('status'), fn ($q) => $q->where('status', $request->string('status')))
            ->when($request->filled('product_interest'), fn ($q) => $q->where('product_interest', $request->string('product_interest')))
            ->latest()
            ->paginate(20)
            ->withQueryString();

        return view('admin.contact-submissions.index', [
            'submissions' => $submissions,
            'statuses' => ['baru', 'dihubungi', 'selesai', 'spam'],
            'products' => ['sekolah', 'klinik', 'ticket', 'lainnya'],
        ]);
    }

    public function updateStatus(Request $request, ContactSubmission $contactSubmission): RedirectResponse
    {
        $validated = Validator::make($request->all(), [
            'status' => ['required', 'in:baru,dihubungi,selesai,spam'],
        ])->validate();

        $contactSubmission->update(['status' => $validated['status']]);

        return back()->with('status', 'Status berhasil diperbarui.');
    }
}
