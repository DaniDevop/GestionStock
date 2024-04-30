<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Calibri', 'Arial', sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #e1eff5;
            color: #333;
        }

        .report-container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
        }

        .report-title {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }

        .report-title h1 {
            font-size: 28px;
            margin: 0;
        }

        .report-title p {
            font-size: 16px;
            margin: 0;
            color: #666;
        }

        .report-content {
            margin-top: 20px;
        }

        .report-content h2 {
            font-size: 22px;
            margin-top: 30px;
            margin-bottom: 10px;
            text-decoration: underline;
        }

        .report-content p {
            font-size: 16px;
            margin: 0;
        }

        .report-content ul {
            list-style-type: disc;
            padding-left: 20px;
            margin-bottom: 10px;
        }

        .report-content li {
            font-size: 16px;
            margin-bottom: 5px;
        }

        .report-signature {
            margin-top: 40px;
            text-align: right;
            border-top: 1px solid #ccc;
            padding-top: 20px;
        }

        .report-signature p {
            font-size: 16px;
            margin: 0;
        }
    </style>
    <title>Rapport</title>
</head>
<body>
    <div class="report-container">
        <div class="report-title">
            <h1>Rapport Journalier</h1>
            <p>Date: {{$date}}</p>
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
            <p>--------------------------------PRODUIT VENDUES--------------------------------------------</p>
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


                    @foreach($sumFactures as $fact)
                <li>somme-rentré  Par des factures:  {{ $fact->sommes_factures}} FCFA</li>
                 @endforeach
            </ul>
        </div>







             <p>Bénéfice de ventes jour  :  <br>

                @foreach($sommeBeneficeDayVentes as $beneficeDay)
                <span>somme produit entrant du jour :  <span style="color: rgb(206, 43, 138)">{{$beneficeDay->somme_benefice}}FCFA</span>   |  <span style="color: blue;"> Bénéfice entrant  : {{$beneficeDay->somme_benefice - $beneficeDay->benefice_product}} FCFA</span>  </span><br>
            <span>  <p>

               </p>

               @endforeach


               @foreach($sommeBeneficeDayImpressions as $beneficeDay)
               <span id="sommesVentes">Bénéfice Impressions : <span style="color: blue">{{$beneficeDay->somme_benefice}}FCFA</span> </span><br>
               <span>  <p>
                  </p>
              </p>
              @endforeach
              <span id="total" style="color: blue"></span><br>

              ------------------------
              <p>Sommes sortie : <span style="color: blue">{{$sommeSortie}}</span> </p>
        <div class="report-signature">
            <p>Préparé par : {{$user->name}}</p>
        </div>
    </div>

    <script>
        function calculateSum(ventes, impressions) {
            return ventes + impressions;
        }

        var sommesVentes = document.getElementById('sommesVentes');
        var sommesImpressions = document.getElementById('sommesImpression');

        var sumVentes = parseInt(@json($sommeBeneficeDayVentes[0]->somme_benefice), 10);
    var sumImpressions = parseInt(@json($sommeBeneficeDayImpressions[0]->somme_benefice), 10);

    var total = sumVentes + sumImpressions;
        var total = calculateSum(sumVentes, sumImpressions);

        if (isNaN(total)) {
            total=0;
  }

        document.getElementById('total').textContent = 'Total des bénéfices : ' + total + ' FCFA';
    </script>
</body>
</html>
