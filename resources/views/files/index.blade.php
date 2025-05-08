@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold m-0" style="color: #A94A4A;">
            <i class="bi bi-files me-2"></i> Fichiers PDF disponibles
        </h2>
        <div class="d-flex">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Rechercher des fichiers" style="border-color: #F4D793;">
                <button class="btn btn-outline-primary" type="button">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($files as $file)
            <div class="col">
                <div class="card h-100">
                    <div class="position-relative">
                        @if ($file->thumbnail)
                            <img src="{{ asset('storage/' . $file->thumbnail) }}" class="card-img-top"
                                alt="{{ $file->title }}">
                        @else
                            <img src="https://placehold.co/600x400/889E73/FFFFFF?text={{ urlencode($file->title) }}"
                                class="card-img-top" alt="{{ $file->title }}">
                        @endif
                        <div class="position-absolute top-0 end-0 p-2">
                            <span class="badge px-3 py-2">${{ number_format($file->price, 2) }}</span>
                        </div>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold" style="color: #A94A4A;">{{ $file->title }}</h5>
                        <p class="card-text flex-grow-1">{{ Str::limit($file->description, 100) }}</p>
                        <div class="d-flex align-items-center text-muted mb-3">
                            <i class="bi bi-clock me-2" style="color: #889E73;"></i>
                            <small>{{ $file->created_at->diffForHumans() }}</small>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-0 p-3 pt-0">
                        <a href="{{ route('files.show', $file) }}" class="btn btn-primary w-100">
                            <i class="bi bi-eye me-2"></i> Voir les détails
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-4 d-flex justify-content-center">
        <!-- La pagination irait ici si nécessaire -->
    </div>
@endsection
