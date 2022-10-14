@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">PROFIL</div>
                <form action="">
                    <a href="">
                        <img style="margin: 10px;" src="{{URL::to('/assets/img/avatar.png')}}" alt="photo" width="150" title="Modifier la photo"> <br>
                    </a>
                </form>
                
                <div  style="margin: 10px;">
                   <b>{{ Auth::user()->name}}</b><br>
                    
                </div>
               
                <hr>
                @if ($user->etat_demande != "En attente d'acceptation" )
                  <button style="margin: 10px;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addOrderModal">
                    <i class="bi-plus-circle"></i> Demander un financement
                </button>
                @endif
                <!-- Button trigger modal -->
                

                {{-- add new form order modal start --}}
@if (Auth::check())
<div class="modal fade" id="addOrderModal" tabindex="-1" aria-labelledby="exampleModalLabel"
data-bs-backdrop="static" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Demande de financement</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form action="#" method="POST" id="add_order_form" enctype="multipart/form-data">
      
      <input type="hidden" name="_token" value="{{ csrf_token() }}" />
      
      <div class="modal-body p-4 bg-light">
        <div class="row">
          <div class="col-lg">
            <label for="montant">Montant</label>
            <input type="number"  id="montant" name="montant" class="form-control montant" placeholder="Entrer le montant" required>
          </div>
          <div class="col-lg">
            <label for="solde_a_rembourser">Solde à rembourser</label>
            <input type="number"  id="solde_a_rembourser" name="solde_a_rembourser" class="form-control" placeholder="" readonly>
          </div>
        </div>
        <div class="row">
          <div class="col-lg">
            <label for="delai_remboursement">Délai de remboursement</label>
            <input type="number" id="delai_remboursement" name="delai_remboursement" class="form-control" placeholder="">
          </div>
          <div class="col-lg">
            <label for="nombre_versement">Nombre de versement</label>
            <input type="number" id="nombre_versement"  name="nombre_versement" class="form-control" placeholder="" readonly>
          </div>
        </div>
        <div class="row">
          <div class="col-lg">
            <label for="bien_garanti">Bien en garantie</label>
            <input type="text" id="bien_garanti" name="bien_garanti" class="form-control" placeholder="Ex: Véhicule BMW" required>
          </div>
          <div class="col-lg">
            <label for="valeur_bien_garanti">Valeur du bien en garantie</label>
            <input type="number" id="valeur_bien_garanti" name="valeur_bien_garanti" class="form-control" placeholder="" required>
          </div>
        </div>
        <div class="my-2">
          <label for="email">Description de l'activité</label>
          <textarea class="form-control" rows="4" name="activite"  placeholder="" required></textarea>
        </div>
        <div class="row">
          <div class="col-lg">
            <label for="contrat_bail">Contrat de bail</label>
            <input type="file" name="contrat_bail" class="form-control" placeholder="" >
          </div>
          <div class="col-lg">
            <label for="recu_impot">Reçu de paiement impôt</label>
            <input type="file" name="recu_impot" class="form-control" placeholder="" >
          </div>
        </div>
        <div class="row">
          <div class="col-lg">
            <label for="facture_bien">Facture du bien</label>
            <input type="file" name="facture_bien" class="form-control" placeholder="" >
          </div>
          <div class="col-lg">
            <label for="photo_entiere">Photo entière</label>
            <input type="file" name="photo_entiere" class="form-control" placeholder="" >
          </div>
        </div>
        <div class="row">
          <div class="col-lg">
            <label for="photo_cni"> CNI</label>
            <input type="file" name="photo_cni" class="form-control" placeholder="" >
          </div>
          <div class="col-lg">
            <label for="photo_bien">Photo du bien</label>
            <input type="file" name="photo_bien" class="form-control" placeholder="" >
          </div>
        </div>
        <div class="my-2">
          <label for="photo_business">Photo du business</label>
          <input type="file" name="photo_business" class="form-control" placeholder="" >
        </div>
        <div class="my-2">
          <label for=""></label>
          <input type="hidden" name="etat_demande" value="En attente d'acceptation" class="form-control" placeholder="" >
        </div>
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <button type="submit" id="add_order_btn" class="btn btn-primary">Demander un financement</button>
      </div>
    </form>
  </div>
</div>
</div>
@else
  <div class="alert alert-danger">
    Vous devez vous connectez !
  </div>
@endif
<div id="show_order_user">
  
</div>
    

                <table class="table table-bordered table-dark">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Réponse</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">Etat de la demande</th>
                        <td colspan="3" id="etat_demande">
                          @if ( $user ) 
                            {{ $user->etat_demande }}
                          @else
                            Aucune demande de financement en cours
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">Solde demandé</th>
                        <td>CFA 
                          @if ( $user ) 
                            {{ $user->montant }}
                          @else
                            0
                          @endif
                        </td>  
                      </tr>
                      <tr>
                        <th scope="row">Solde à rembourser</th>
                        <td>CFA 
                          @if ($user)
                           {{ $user->solde_a_rembourser }}
                          @else
                            0
                          @endif
                        </td>  
                      </tr>
                      <tr>
                        <th scope="row">Nombre de versements</th>
                        <td colspan="2">CFA 
                          @if ($user)
                            {{ $user->nombre_versement }}
                          @else
                           0
                          @endif
                        </td>
                        
                      </tr>
                    </tbody>
                  </table>
        
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
