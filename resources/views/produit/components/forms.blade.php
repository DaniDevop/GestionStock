<div class="modal fade" id="ajoutProduitModal" tabindex="-1" aria-labelledby="ajoutProduitModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-primary">📝 Formulaire Produit</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ route('new_product') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Désignation</label>
                                            <input type="text" class="form-control" name="designation" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Prix d'Achat</label>
                                            <input type="number" class="form-control" name="prix_achat" min="1" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Prix de Vente</label>
                                            <input type="number" class="form-control" name="prix_vente" min="1" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Quantité Entrante</label>
                                            <input type="number" class="form-control" name="qteStock" min="1" value="1" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Seuil Alerte</label>
                                            <input type="number" class="form-control" name="seuil_alert" min="1" value="1" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Image</label>
                                            <input type="file" class="form-control" name="image" accept="image/*">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Fournisseur</label>
                                            <select name="fournisseur_id" class="form-select">
                                                <option value="">Aucun</option>
                                                @foreach ($fournisseurAll as $user)
                                                    <option value="{{ $user->id }}">{{ $user->nom }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Catégorie</label>
                                            <select name="categorie_id" class="form-select">
                                                <option value="">Aucun</option>
                                                @foreach ($categorie as $cat)
                                                    <option value="{{ $cat->id }}">{{ $cat->categorie }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="text-end mt-3">
                                        <button type="submit" class="btn btn-primary">✅ Valider</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>