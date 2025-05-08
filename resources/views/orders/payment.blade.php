@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Paiement</div>
                <div class="card-body">
                    <h2 class="text-center mb-4" style="color: #A94A4A;">Paiement par Mobile Money</h2>

                    <div class="alert" style="background-color: #F4D793; color: #A94A4A; border: none;">
                        <p>Veuillez compléter votre paiement par mobile money pour :</p>
                        <p><strong>{{ $file->title }}</strong> - ${{ number_format($order->amount, 2) }}</p>
                        <p>ID de commande : {{ $order->id }}</p>
                    </div>

                    <!-- Ceci est un emplacement pour votre formulaire de paiement - vous allez implémenter l'intégration mobile money réelle -->
                    <div class="text-center">
                        <p>C'est ici que votre intégration mobile money apparaîtra dans le tutoriel.</p>
                        <p class="text-muted">La commande est actuellement en statut '{{ $order->status }}'</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
