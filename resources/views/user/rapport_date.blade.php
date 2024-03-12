<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #83B7C1;
        }

        .report-container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
        }

        .report-title {
            text-align: center;
        }

        .report-content {
            margin-top: 20px;
        }

        .report-signature {
            margin-top: 20px;
            text-align: right;
        }
    </style>
    <title>Rapport</title>
</head>

<body>
    <div class="report-container">
        <div class="report-title">
            <h1>Rapport Journalier</h1>
            <p>Date: {{ $date }}
                <br>------------------------
            </p>

        </div>

        <div class="report-content">


            <h2>Rapport produit</h2>
            <p>Nombre de Produit retournée : {{ $product_backCount }}</p>

            @foreach ($product_backAll as $prodBack)
                <ul>
                    <li>Designation :{{ $prodBack->produit->designation }} | Quantite : {{ $prodBack->qte_entrant }} |
                        Motif : {{ $prodBack->motif }}</li>
                </ul>
            @endforeach

            <p>Nombre de produit ajouté : {{ $produitCount }}</p>
            @foreach ($produit as $prod)
                <ul>
                    <li>Designation :{{ $prod->designation }} | Prix : {{ $prod->prix_achat }} | Quantité en stock :
                        {{ $prod->qteStock }}</li>
                </ul>
            @endforeach
            <p>--------------------------------PRODUIT VENDUES--------------------------------------------</p>
            @foreach ($ventesAll as $ventes)
                <ul>
                    <li>Designation :{{ $ventes->produit->designation }} | Prix : {{ $ventes->prix_marchande }} |
                        Quantité vendue: {{ $ventes->totalSales }}</li>
                </ul>
            @endforeach
            <p>----------------------------------------------------------------------------</p>



            <h2>Rapport Global de stock</h2>
            <p>Total des produits en stock : {{ $stockAll }}</p>


            <h2>Revenue du jour :</h2>
            <p>Quelques statistiques importantes du jour:</p>
            <ul>
                @foreach ($sumImpression as $sum)
                    <li>Sommes des Revenue Impression du jour : {{ $sum->sommes_impression }} FCFA</li>
                @endforeach
                @foreach ($sumProduit as $sumProduct)
                    <li>Sommes des Revenue Produits du jour : {{ $sumProduct->sommes_produits }} FCFA</li>
                @endforeach
                @foreach ($sumFactures as $fact)
                @endforeach
            </ul>
            --------------------------------------
            <h2>Revenue Total :</h2>

            <ul>
                @foreach ($sumImpressionTotal as $sumTotal)
                    <li>Sommes des Revenue Total : {{ $sumTotal->sommes_impression }} FCFA</li>
                @endforeach
                @foreach ($sumProduitTotal as $sumPro)
                    <li>Sommes des Revenue Produits du jour : {{ $sumProduct->sommes_produits }} FCFA</li>
                @endforeach
                @foreach ($sumFactures as $fact)
                    <li>somme-rentré Par des factures: {{ $fact->sommes_factures }} FCFA</li>
                @endforeach

            </ul>
        </div>




        <div class="report-signature">
            <p>Préparé par : {{ $user->name }}</p>
        </div>
    </div>

</body>

</html>
