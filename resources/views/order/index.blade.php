@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>Liste de demande de financement</h1>
    </div>
</div>

<div class="row">
    <div class="table table-responsive">
        <table class="table-bordered" id="table">
            <tr>
                <th style="width: 150px;">N°</th>
                <th>Montant</th>
                <th>Solde à rembourser</th>
                <th>Délai</th>
                <th>Nombre versement</th>
                <th>Bien en garanti</th>
                <th>Valeur du bien</th>
                <th>Activité</th>
                <th>date</th>
                <th class="text-center" style="width: 150px;">
                    <a href="#" class="create-modal btn btn-success btn-sm">
                        <i class="glyphicon glyphicon-plus">Ajouter</i>
                    </a>
                </th>
            </tr>
            {{ csrf_field() }}
            <?php $no = 1 ?>
            @foreach ($orders as $key => $value)
                <tr class="$order{{ $value->id }}">
                    <td>{{ $no++ }}</td>
                    <td>{{ $value->montant }}</td>
                    <td>{{ $value->solde_a_rembouser }}</td>
                    <td>{{ $value->delai_remboursement }}</td>
                    <td>{{ $value->nombre_versement }}</td>
                    <td>{{ $value->bien_garanti }}</td>
                    <td>{{ $value->valeur_bien_garanti }}</td>
                    <td>{{ $value->activite }}</td>
                    <td>{{ $value->created_at }}</td>
                    <td>
                        <a href="" class="show-modal btn btn-info btn-sm" data-id="{{$value->id}}" data-montant = "{{ $value->montant }}">
                            <i class="fa fa-eye"></i>
                        </a>

                        <a href="" class="edit-modal btn btn-warning btn-sm" data-id="{{$value->id}}" data-montant = "{{ $value->montant }}">
                            <i class="glyphicon glyphicon-pencil"></i>
                        </a>
                        <a href="" class="delete-modal btn btn-danger btn-sm" data-id="{{$value->id}}" data-montant = "{{ $value->montant }}">
                            <i class="glyphicon glyphicon-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="create-order" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Demande de Financement</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('addOrder') }}">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="">Nom:</label>
                    <input type="text" class="form-control" id="" placeholder="Email" readonly value="{{Auth::user()->name }}">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="">Tél:</label>
                    <input type="text" class="form-control" id="" placeholder="" readonly value="{{Auth::user()->phone_number }}">
                  </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="">Ville:</label>
                      <input type="text" class="form-control" id="" placeholder="Email" readonly value="{{Auth::user()->city }}">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="">Quartier:</label>
                      <input type="text" class="form-control" id="" placeholder="" readonly value="{{Auth::user()->quarter }}">
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="montant">Montant du financement:</label>
                      <input type="number" id="montant" name="montant" class="form-control" id="" placeholder="Max: 500.000 FCFA" >
                    </div>
                    <div class="form-group col-md-6">
                      <label for="solde">Solde à rembourser:</label>
                      <input readonly type="number" id="bien" name="bien" class="form-control" id="" placeholder="" >
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="delai">Délai:</label>
                      <input readonly type="number" id="delai" name="delai" class="form-control" id="" placeholder="Max: 500.000 FCFA" >
                    </div>
                    <div class="form-group col-md-6">
                      <label for="solde">Nombre versement:</label>
                      <input readonly type="number" id="nombre" name="nombre" class="form-control" placeholder="" >
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="bien">Bien en garanti:</label>
                      <input type="text" id="bien" name="bien" class="form-control" id="" placeholder="Ex: Voiture BMW" >
                    </div>
                    <div class="form-group col-md-6">
                      <label for="valeur">Valeur bien:</label>
                      <input type="number" id="valeur" name="valeur" class="form-control" placeholder="" >
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="delai">Activité:</label>
                      <textarea id="activite" name="activite" class="form-control" placeholder="Décrivez votre activité" >
                    </div>
                    
                </div>
                
                
              </form>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="add-order">Envoyer la demande</button>
        </div>
    </div>
    </div>
</div>

@endsection