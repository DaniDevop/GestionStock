<div class="modal fade" id="ajoutFournisseurModal" tabindex="-1" aria-labelledby="ajoutFournisseurModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                <div class="card-body">
                                    <h5 class="card-title">EFFECTUER UNE COMMANDES</h5>
                                    <form  method="post" action="{{route('commandes_new_commandes_produits')}}">
                                        @csrf


                          <div class="mb-3">
                              <label for="adresseFournisseur" class="form-label">DATE DE LA COMMANDES</label>
                              <input type="date" class="form-control" id="adresseFournisseur" name="date_commandes" required>
                          </div>
                          <div class="mb-3">
                              <label for="adresseFournisseur" class="form-label">PRODUITS</label>
                              <select name="produit_id" id="" class="form-select">
                                  @foreach($produits as $product)
                                  <option value="{{$product->id}}">{{$product->designation}} |Stock-Actuel : {{$product->qteStock}}</option>
                                  @endforeach
                              </select>

                              </div>

                              <div class="mb-3">
                                  <label for="emailFournisseur" class="form-label">QUANTITE ENTRANT</label>
                                  <input type="number" class="form-control" id="emailFournisseur" name="qte_entrant" required>
                              </div>

                                <input type="hidden" class="form-control" id="emailFournisseur" name="statut" value="Non valide" >

                                        <button type="submit" class="btn btn-primary">Ajouter</button>
                                    </form>
                                </div>
                            </div>
                                        </div>
                                    </div>
                                </div>
              </div>