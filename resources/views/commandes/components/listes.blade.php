<table class="table datatable">


                <thead>
                  <tr>
                    <th scope="col">Quantité entrant</th>
                    <th scope="col">Produit</th>
                    <th scope="col">Fournisseur</th>
                    <th scope="col">Date échances</th>
                    <th scope="col">Statut</th>
                    <th scope="col">Details</th>
                    <th scope="col">Valider</th>
                    <th scope="col">Annuler</th>

                  </tr>
                </thead>
                <tbody>
                <tr>
                     @foreach($commandes as $command)
                    <td>{{$command->qte_entrant}}</td>
                    <td>{{$command->produit->designation}}</td>
                    <td>{{ optional(optional($command->produit)->fournisseur)->nom }}</td>
                    @if(date('Y-m-d') >= $command->date_commandes)
                    <td ><span style="color:red;">{{$command->date_commandes}}/
                     Date dépassé
                  </span></td>
                    @else
                    <td ><span style="color:blue;">{{$command->date_commandes}}</span></td>
                    @endif
                    <td ><span style="color:blue;">{{$command->statut}}</span></td>
                    <td ><a  href="{{route('details_commandes.view',['id'=>$command->id])}}" class="btn btn-primary"><i class="bi bi-eye-fill"></i></a></td>
                    <td ><a onclick="valider()" href="{{route('commandes_valide',['id'=>$command->id])}}" class="btn btn-dark"><i class="bi bi-bookmark-check-fill"></i></a></td>
                    <td ><a  onclick="confirme()"  href="{{route('delete_commandes',['id'=>$command->id])}}" class="btn btn-danger"><i class="bi bi-trash-fill"></i></a></td>

                  </tr>
                  @endforeach
                </tbody>
              </table>