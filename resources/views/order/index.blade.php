@extends('layouts.app')

@section('content')
<h1 id="time"></h1>
{{-- add new employee modal start --}}
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
            <input type="file" name="photo_business" class="form-control" placeholder="E-mail" >
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          <button type="submit" id="add_order_btn" class="btn btn-primary">Demander un financement</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- add new employee modal end --}}

{{-- edit employee modal start --}}
<div class="modal fade" id="editOrderModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Employee</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="#" method="POST" id="edit_employee_form" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="emp_id" id="emp_id">
        <input type="hidden" name="emp_avatar" id="emp_avatar">
        <div class="modal-body p-4 bg-light">
          <div class="row">
            <div class="col-lg">
              <label for="fname">First Name</label>
              <input type="text" name="fname" id="fname" class="form-control" placeholder="First Name" required>
            </div>
            <div class="col-lg">
              <label for="lname">Last Name</label>
              <input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name" required>
            </div>
          </div>
          <div class="my-2">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="E-mail" required>
          </div>
          <div class="my-2">
            <label for="phone">Phone</label>
            <input type="tel" name="phone" id="phone" class="form-control" placeholder="Phone" required>
          </div>
          <div class="my-2">
            <label for="post">Post</label>
            <input type="text" name="post" id="post" class="form-control" placeholder="Post" required>
          </div>
          <div class="my-2">
            <label for="avatar">Select Avatar</label>
            <input type="file" name="avatar" class="form-control">
          </div>
          <div class="mt-2" id="avatar">

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="edit_employee_btn" class="btn btn-success">Update Employee</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- edit employee modal end --}}

<body class="bg-light">
  <div class="container">
    <div class="row my-5">
      <div class="col-lg-12">
        <div class="card shadow">
          <div class="card-header bg-secondary d-flex justify-content-between align-items-center">
            <h3 class="text-light">Gestion des financements</h3>
            <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addOrderModal"><i
                class="bi-plus-circle me-2"></i>Nouvelle demande</button>
          </div>
          <div class="card-body" id="show_all_orders">
            <h1 class="text-center text-secondary my-5">Chargement...</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
  

</body>
@endsection