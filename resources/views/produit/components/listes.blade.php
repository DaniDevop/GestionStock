<table class="table table-striped table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Catégorie</th>
                                        <th>Désignation</th>
                                        <th>Prix d'Achat</th>
                                        <th>Prix de Vente</th>
                                        <th>Quantité</th>
                                        <th>Seuil Alerte</th>
                                        <th>Status</th>
                                        <th>Détails</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($produit as $product)
                                        <tr>
                                            <td>{{ optional($product->categorie)->categorie ?? 'Aucune' }}</td>
                                            <td>{{ $product->designation }}</td>
                                            <td>{{ number_format($product->prix_achat, 2, ',', ' ') }} F CFA</td>
                                            <td>{{ number_format($product->prix_vente, 2, ',', ' ') }} F CFA</td>
                                            <td>{{ $product->qteStock }}</td>
                                            <td>{{ $product->seuil_alert }}</td>
                                            <td>
                                                @if ($product->qteStock <= $product->seuil_alert)
                                                    <span class="badge bg-danger">⚠️ Approvisionnement nécessaire</span>
                                                @else
                                                    <span class="badge bg-success">✅ Stock stable</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('details_produit_vue', ['id' => $product->id]) }}"
                                                    class="btn btn-outline-primary">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>