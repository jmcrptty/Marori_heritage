<?php

namespace App\Http\Controllers;

use App\Models\Poetry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PoetryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $poetries = Poetry::ordered()->get();
        return view('dashboard.poetry', compact('poetries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Tidak digunakan karena menggunakan modal
        return redirect()->route('admin.poetry.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validate text fields
            $validated = $request->validate([
                'title' => 'nullable|string|max:255',
                'content' => 'required|string',
                'translation' => 'required|string',
                'author' => 'nullable|string|max:255',
                'order' => 'nullable|integer',
            ]);

            // Get max upload size from config (default 50MB)
            $maxSizeKB = env('MAX_AUDIO_UPLOAD_SIZE', 51200);
            $maxSizeBytes = $maxSizeKB * 1024;
            $maxSizeMB = round($maxSizeKB / 1024, 2);

            // Handle audio upload
            if (isset($_FILES['audio_file']) && $_FILES['audio_file']['error'] !== UPLOAD_ERR_NO_FILE) {
                $file = $_FILES['audio_file'];
                $fileSizeMB = round($file['size'] / 1024 / 1024, 2);

                // Check upload error
                if ($file['error'] !== UPLOAD_ERR_OK) {
                    if ($file['error'] === UPLOAD_ERR_INI_SIZE) {
                        $currentUploadMax = ini_get('upload_max_filesize');
                        return redirect()->back()
                            ->withInput()
                            ->withErrors(['audio_file' => "File terlalu besar untuk PHP server! Maksimal saat ini: {$currentUploadMax}. Hubungi admin untuk meningkatkan limit."]);
                    }

                    $errors = [
                        UPLOAD_ERR_FORM_SIZE => "File terlalu besar! Max: {$maxSizeMB}MB",
                        UPLOAD_ERR_PARTIAL => 'File hanya terupload sebagian. Koneksi terputus. Coba lagi.',
                        UPLOAD_ERR_NO_TMP_DIR => 'Folder temporary server tidak ditemukan',
                        UPLOAD_ERR_CANT_WRITE => 'Gagal menulis ke disk server',
                        UPLOAD_ERR_EXTENSION => 'Upload diblok oleh PHP extension',
                    ];

                    return redirect()->back()
                        ->withInput()
                        ->withErrors(['audio_file' => $errors[$file['error']] ?? 'Upload error: ' . $file['error']]);
                }

                // Check file size
                if ($file['size'] > $maxSizeBytes) {
                    return redirect()->back()
                        ->withInput()
                        ->withErrors(['audio_file' => "File terlalu besar! Ukuran: {$fileSizeMB}MB. Maksimal: {$maxSizeMB}MB"]);
                }

                // Check file extension
                $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                if (!in_array($ext, ['mp3', 'wav', 'ogg'])) {
                    return redirect()->back()
                        ->withInput()
                        ->withErrors(['audio_file' => 'Format file harus MP3, WAV, atau OGG']);
                }

                // Create directory if not exists
                $dir = storage_path('app/public/poetry/audio');
                if (!is_dir($dir)) {
                    mkdir($dir, 0755, true);
                }

                // Generate unique filename
                $filename = time() . '_' . uniqid() . '.' . $ext;
                $destination = $dir . DIRECTORY_SEPARATOR . $filename;

                // Move uploaded file
                if (move_uploaded_file($file['tmp_name'], $destination)) {
                    $validated['audio_file'] = 'poetry/audio/' . $filename;
                } else {
                    return redirect()->back()
                        ->withInput()
                        ->withErrors(['audio_file' => 'Gagal menyimpan file. Periksa permissions folder.']);
                }
            }

            // Set default order if not provided
            if (!isset($validated['order'])) {
                $maxOrder = Poetry::max('order') ?? 0;
                $validated['order'] = $maxOrder + 1;
            }

            // Handle is_active checkbox
            $validated['is_active'] = $request->has('is_active') ? 1 : 0;

            // Create poetry
            Poetry::create($validated);

            return redirect()->route('admin.poetry.index')
                ->with('success', 'Puisi berhasil ditambahkan!');

        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withInput()
                ->withErrors($e->errors());
        } catch (\Exception $e) {
            \Log::error('Poetry store failed: ' . $e->getMessage());

            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Poetry $poetry)
    {
        return view('admin.poetry.show', compact('poetry'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Poetry $poetry)
    {
        // Tidak digunakan karena menggunakan modal
        return redirect()->route('admin.poetry.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $poetry = Poetry::findOrFail($id);

            // Validate text fields
            $validated = $request->validate([
                'title' => 'nullable|string|max:255',
                'content' => 'required|string',
                'translation' => 'required|string',
                'author' => 'nullable|string|max:255',
                'order' => 'nullable|integer',
            ]);

            // Get max upload size from config (default 50MB)
            $maxSizeKB = env('MAX_AUDIO_UPLOAD_SIZE', 51200);
            $maxSizeBytes = $maxSizeKB * 1024;
            $maxSizeMB = round($maxSizeKB / 1024, 2);

            // Handle audio upload
            if (isset($_FILES['audio_file']) && $_FILES['audio_file']['error'] !== UPLOAD_ERR_NO_FILE) {
                $file = $_FILES['audio_file'];
                $fileSizeMB = round($file['size'] / 1024 / 1024, 2);

                // Check upload error
                if ($file['error'] !== UPLOAD_ERR_OK) {
                    if ($file['error'] === UPLOAD_ERR_INI_SIZE) {
                        $currentUploadMax = ini_get('upload_max_filesize');
                        return redirect()->back()
                            ->withInput()
                            ->withErrors(['audio_file' => "File terlalu besar untuk PHP server! Maksimal saat ini: {$currentUploadMax}. Hubungi admin untuk meningkatkan limit."]);
                    }

                    $errors = [
                        UPLOAD_ERR_FORM_SIZE => "File terlalu besar! Max: {$maxSizeMB}MB",
                        UPLOAD_ERR_PARTIAL => 'Upload terputus. Coba lagi.',
                        UPLOAD_ERR_NO_TMP_DIR => 'Folder temporary tidak ditemukan',
                        UPLOAD_ERR_CANT_WRITE => 'Gagal menulis ke disk',
                        UPLOAD_ERR_EXTENSION => 'Upload diblok oleh extension',
                    ];

                    return redirect()->back()
                        ->withInput()
                        ->withErrors(['audio_file' => $errors[$file['error']] ?? 'Upload error: ' . $file['error']]);
                }

                // Check file size
                if ($file['size'] > $maxSizeBytes) {
                    return redirect()->back()
                        ->withInput()
                        ->withErrors(['audio_file' => "File terlalu besar! Ukuran: {$fileSizeMB}MB. Maksimal: {$maxSizeMB}MB"]);
                }

                // Check file extension
                $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                if (!in_array($ext, ['mp3', 'wav', 'ogg'])) {
                    return redirect()->back()
                        ->withInput()
                        ->withErrors(['audio_file' => 'Format harus MP3, WAV, atau OGG']);
                }

                // Delete old file if exists
                if ($poetry->audio_file) {
                    $oldFile = storage_path('app/public/' . $poetry->audio_file);
                    if (file_exists($oldFile)) {
                        unlink($oldFile);
                    }
                }

                // Create directory if not exists
                $dir = storage_path('app/public/poetry/audio');
                if (!is_dir($dir)) {
                    mkdir($dir, 0755, true);
                }

                // Generate unique filename
                $filename = time() . '_' . uniqid() . '.' . $ext;
                $destination = $dir . DIRECTORY_SEPARATOR . $filename;

                // Move uploaded file
                if (move_uploaded_file($file['tmp_name'], $destination)) {
                    $validated['audio_file'] = 'poetry/audio/' . $filename;
                } else {
                    return redirect()->back()
                        ->withInput()
                        ->withErrors(['audio_file' => 'Gagal menyimpan file. Periksa permissions folder.']);
                }
            }

            // Handle is_active checkbox
            $validated['is_active'] = $request->has('is_active') ? 1 : 0;

            // Update poetry
            $poetry->update($validated);

            return redirect()->route('admin.poetry.index')
                ->with('success', 'Puisi berhasil diperbarui!');

        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withInput()
                ->withErrors($e->errors());
        } catch (\Exception $e) {
            \Log::error('Poetry update failed: ' . $e->getMessage());

            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $poetry = Poetry::findOrFail($id);

        // Delete audio file if exists
        if ($poetry->audio_file && Storage::disk('public')->exists($poetry->audio_file)) {
            Storage::disk('public')->delete($poetry->audio_file);
        }

        $poetry->delete();

        return redirect()->route('admin.poetry.index')
            ->with('success', 'Puisi berhasil dihapus!');
    }

    /**
     * Update order of poetries via AJAX
     */
    public function updateOrder(Request $request)
    {
        $request->validate([
            'poetry_id' => 'required|exists:poetries,id',
            'order' => 'required|integer|min:0',
        ]);

        $poetry = Poetry::findOrFail($request->poetry_id);
        $poetry->update(['order' => $request->order]);

        return response()->json([
            'success' => true,
            'message' => 'Urutan berhasil diperbarui'
        ]);
    }
}
