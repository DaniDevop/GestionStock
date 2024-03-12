

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
body {
    
}

h1 {
    text-align: center;
}

.styled-table {
    width: 100%;
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 18px;
    text-align: left;
}

.styled-table th,
.styled-table td {
    padding: 20px 5px;
    border-bottom: 1px solid #ddd;
    font-size: 14px; /* Ajustez la taille du texte selon vos besoins */
}


.styled-table th {
    background-color: #007BFF;
    color: #fff;
}

.styled-table tbody tr:nth-child(even) {
    background-color: #f2f2f2;
}

.styled-table tbody tr:hover {
    background-color: #e0e0e0;
}

/* Style pour la ligne active (par exemple, la ligne sélectionnée) */
.active-row {
    background-color: #cce5ff;

}

    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTES DES FOURNISSEURS</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <h1>LISTES DES FOURNISSEURS</h1>

    <table class="styled-table">
        <thead>
            <tr>
                    <th >NUMERO</th>
                    <th >NOM</th>
                    <th >PRENOM</th>
                    <th >EMAIL</th>
                    <th >ADRESSE</th>
                    <th >DATE CREER</th>
            </tr>
        </thead>
        <tbody>
    @foreach($fournisseurs as $fournisseur)
        <tr>
            <td>{{ $fournisseur->id }}</td>
            <td>{{ $fournisseur->nom }}</td>
            <td>{{ $fournisseur->prenom }}</td>
            <td>{{ $fournisseur->email }}</td>
            <td>{{ $fournisseur->adresse }}</td>
            <td>{{ $fournisseur->created_at }}</td>
        </tr>
    @endforeach
</tbody>
    </table>

</body>
</html>
