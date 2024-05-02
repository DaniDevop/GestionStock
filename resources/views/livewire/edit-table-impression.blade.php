<div>
    <h4 style="color: blue">{{ $message }}</h4>
    <table class="table">
        <thead>
            <tr>
                @if($editedRowId !== true)
                <th scope="col">Type</th>
                <th scope="col">Taille</th>
                <th scope="col">Couleur</th>
                <th scope="col">Prix</th>
                <th scope="col">Quantité-vendue</th>
                <th scope="col">Date-creation</th>
                <th scope="col">Mise-à-jour</th>

                @else
                <th scope="col">Type</th>
                <th scope="col">Taille</th>
                <th scope="col">Couleur</th>
                <th scope="col">Prix</th>
                <th scope="col">Quantité-vendue</th>
                <th scope="col">Valider</th>
                @endif
            </tr>
        </thead>
        <tbody>

            @foreach($impressionAll as $impression)
                <tr wire:key="{{ $impression->id }}">
                         @if($editedRowId   !== true)
                        <td>{{ $impression->type_impression }}</td>
                        <td>{{ $impression->taille }}</td>
                        <td>{{ $impression->couleur }}</td>
                        <td>{{ $impression->prix }}</td>
                        <td>{{ $impression->qte_vendue}}</td>
                        <td>{{ $impression->date_creation}}</td>
                        <td>
                            <button wire:click="editRow({{ $impression->id }},{{ $impression->idImpression }})" class="btn btn-info"><i class="bi bi-pen"></i></button>
                        </td>

                    @endif
                </tr>
            @endforeach
            <tr>
                @if($editedRowId === true)
                <td><input type="text" wire:model.defer="editedRowData.type_impression" value="{{ $editedRowData['type_impression'] }}"></td>
                <td><input type="text" wire:model.defer="editedRowData.taille" value="{{ $editedRowData['taille'] }}"></td>
                <td><input type="text" wire:model.defer="editedRowData.couleur" value="{{ $editedRowData['couleur'] }}"></td>
                <td><input type="number" wire:model.defer="editedRowData.prix" value="{{ $editedRowData['prix'] }}"></td>
                <td><input type="number" wire:model.defer="editedRowData.qte_vendue" value="{{ $editedRowData['qte_vendue'] }}"></td>
                <td><input type="hidden" wire:model.defer="editedRowData.idImpression" value="{{ $editedRowData['idImpression'] }}"></td>
                <td><input type="hidden" wire:model.defer="editedRowData.idventes_Impressions" value="{{ $editedRowData['idventes_Impressions'] }}"></td>
                <td>
                    <button wire:click="updateImpression()" class="btn btn-info"><i class="bi bi-floppy-fill"></i></button>
                </td>
            @endif
            </tr>
        </tbody>
    </table>
</div>
