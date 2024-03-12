<div>
<table id="selectedProductsTable" class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Designation</th>
            <th>Prix De vente</th>
            <th>Quantité</th>
            <th>Retirer</th>
        </tr>
    </thead>
    <tbody>
        @foreach($chart as $item)
            <tr>
                <td>{{ $item['produit_id'] }}</td>
                <td>{{ $item['designation'] }}</td>
                <td>{{ $item['prix_vente'] }}</td>
                <td>{{ $item['qte_vendue'] }}</td>
                <td><a href="" class="btn btn-primary"><i class="bi bi-trash-fill"></i></a></td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
