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
            background-color:#83B7C1;
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
            <p>Date: {{$date}}
            <br>------------------------
            </p>

        </div>

        <div class="report-content">
            <h2>Introduction</h2>
            <p>Dans ce rapport mensuel, nous examinons les activités et les performances du mois précédent.</p>

            <h2>Rapport produit</h2>
            <p>Nombre de produit ajouté : {{$produitCount}}</p>
            <p>Nombre de Produit retournée : {{$product_backAll}}</p>
            @foreach($produit as $prod)
            <ul>
                <li>Designation :{{$prod->designation}} | Prix : {{$prod->prix_achat}} | Quantité en stock : {{$prod->qteStock}}</li>
            </ul>
            @endforeach
            <p >--------------------------------PRODUIT VENDUES--------------------------------------------</p>
             @foreach($ventesAll as $ventes)
            <ul>
                <li>Designation :{{$ventes->produit->designation}} | Prix : {{$ventes->prix_marchande}}  | Quantité vendue: {{$ventes->totalSales}} Date : {{$ventes->date_creation}}</li>
            </ul>
            @endforeach
              @foreach($sumProduit as $sumProduct)
                <li>Total entrant : {{ $sumProduct->sommes_produits}} FCFA</li>
                 @endforeach
            <p>----------------------------------------------------------------------------</p>

            <h2>Rapport Fournisseur</h2>
            <p>Nombre de Fournisseur ajouté : {{$fournisseurCount}}</p>
           @foreach($fournisseur as $fourn)
            <ul>
                <li>Nom :{{$fourn->nom}} | Tel : {{$fourn->tel}}</li>
            </ul>
            @endforeach
            <h2>Rapport Commande </h2>
            <p>Nombre de Commandes  Total: {{$commandesCount}}</p>
            <p>Nombre de Commandes  Entrée: {{$commandeEntree}}</p>
            <p>Nombre de Commandes  En attente: {{$commandeAttente}}</p>
                
            <h2>Rapport Global de stock</h2>
            <p>Total des produits en stock : {{$stockAll}}</p>
              @foreach($sommeBenefice as $somme)
                <p>Bénéfice des Produits selon le stock : {{$somme->somme_benefice}} FCFA</p>
              @endforeach

            <h2>Statistiques Clés</h2>
            <p>Quelques statistiques importantes :</p>
            <ul>
                 @foreach($sumImpression as $sum)
     
                <li>Sommes des Revenue Impression  du jour : {{$sum->sommes_impression}} FCFA</li>
                 @endforeach
                
                    @foreach($sumFactures as $fact)
                <li>somme-rentré  Par des factures:  {{ $fact->sommes_factures}} FCFA</li>
                 @endforeach
            </ul>
        </div>
          
             <p>Sommes Entrant :  {{$sommeEntrant}} FCFA</p>
             
             <p>Sommes sortie : {{$sommeSortie}}</p>
             


        <div class="report-signature">
            <p>Préparé par : {{$user->name}}</p>
        </div>
    </div>
      
</body>
</html>
