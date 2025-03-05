<table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">Numéro</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Prenom</th>
                                        <th scope="col">Contact</th>
                                        <th scope="col">Details</th>
                                        <th scope="col">Supprimer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach($fournisseur as $user)
                                        <th scope="row">{{$user->id}}</th>
                                        <td>{{$user->nom}}</td>
                                        <td>{{$user->prenom}}</td>
                                        <td>{{$user->tel}}</td>
                                        <td><a href="{{route('show_details_fournisseur', ['id' => $user->id]) }}"
                                                class="btn btn-primary"><i class="bi bi-eye"></i></a></td>
                                        <td><button class="btn btn-dark"
                                                ><a onclick="confirmer()"
                                                    href="{{route('delete.fournisseur',['id'=> $user->id])}}"><i
                                                        class="bi bi-trash3"></i></button></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>