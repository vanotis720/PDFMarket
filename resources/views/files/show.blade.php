@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
            <li class="breadcrumb-item active">{{ $file->title }}</li>
        </ol>
    </nav>

    <div class="card border-0 shadow-sm overflow-hidden">
        <div class="row g-0">
            <div class="col-md-6">
                @if ($file->thumbnail)
                    <img src="{{ asset('storage/' . $file->thumbnail) }}" class="img-fluid h-100 object-fit-cover"
                        alt="{{ $file->title }}">
                @else
                    <div class="bg-light h-100 d-flex align-items-center justify-content-center p-4"
                        style="background-color: #FFF6DA !important;">
                        <img src="https://placehold.co/600x400/889E73/FFFFFF?text={{ urlencode($file->title) }}"
                            class="img-fluid rounded" alt="{{ $file->title }}">
                    </div>
                @endif
            </div>
            <div class="col-md-6">
                <div class="card-body p-5">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <h1 class="card-title fw-bold mb-2" style="color: #A94A4A;">{{ $file->title }}</h1>
                    <div class="d-flex align-items-center mb-3">
                        <span class="badge px-3 py-2 fs-6">{{ number_format($file->price, 2) }} €</span>
                        <div class="ms-auto">
                            <i class="bi bi-calendar-event me-1" style="color: #889E73;"></i>
                            <span class="text-muted">Ajouté {{ $file->created_at->diffForHumans() }}</span>
                        </div>
                    </div>

                    <hr class="my-4" style="border-color: #F4D793;">

                    <div class="mb-4">
                        <h5 class="fw-bold" style="color: #889E73;">Description</h5>
                        <p class="card-text">{{ $file->description }}</p>
                    </div>

                    <div class="d-grid gap-2">
                        @if (auth()->check() && auth()->user()->purchasedFiles()->where('file_id', $file->id)->exists())
                            <a href="{{ route('files.download', $file) }}" class="btn btn-primary btn-lg w-100 mb-2">
                                <i class="bi bi-download me-2"></i> Télécharger le fichier
                            </a>
                            <a href="{{ route('home') }}" class="btn btn-outline-secondary"
                                style="border-color: #A94A4A; color: #A94A4A;">
                                <i class="bi bi-arrow-left me-2"></i> Retour aux fichiers
                            </a>
                        @else
                            <form action="{{ route('orders.create', $file) }}" method="GET">
                                @csrf
                                <button type="submit" class="btn btn-success btn-lg w-100">
                                    <i class="bi bi-credit-card me-2"></i> Acheter maintenant
                                </button>
                            </form>
                            <a href="{{ route('home') }}" class="btn btn-outline-secondary"
                                style="border-color: #A94A4A; color: #A94A4A;">
                                <i class="bi bi-arrow-left me-2"></i> Retour aux fichiers
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
