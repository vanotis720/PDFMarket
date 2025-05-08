@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Confirmer le paiement</div>
                <div class="card-body">
                    <h3 style="color: #A94A4A;">{{ $file->title }}</h3>
                    <p>{{ $file->description }}</p>
                    <hr style="border-color: #F4D793;">
                    <div class="d-flex justify-content-between">
                        <span>Prix :</span>
                        <span class="fw-bold" style="color: #A94A4A">${{ number_format($file->price, 2) }}</span>
                    </div>
                    <hr style="border-color: #F4D793;">
                    <form action="{{ route('orders.store', $file) }}" method="POST">
                        @csrf
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Continuer vers le paiement</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
