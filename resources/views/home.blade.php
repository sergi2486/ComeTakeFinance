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
                
                <!-- Button trigger modal -->
                <button style="margin: 10px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                    Demander un financement
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Demande de Financement</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <form>
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
                                      <label for="">Montant du financement:</label>
                                      <input type="number" class="form-control" id="" placeholder="Max: 500.000 FCFA" >
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label for="">Quartier:</label>
                                      <input type="text" class="form-control" id="" placeholder="" >
                                    </div>
                                </div>
                                
                                
                                
                              </form>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Envoyer la demande</button>
                        </div>
                    </div>
                    </div>
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
                        <td colspan="3">Aucune demande</td>
                      </tr>
                      <tr>
                        <th scope="row">Solde demandé</th>
                        <td>CFA 0</td>  
                      </tr>
                      <tr>
                        <th scope="row">Solde à rembourser</th>
                        <td>CFA 0</td>  
                      </tr>
                      <tr>
                        <th scope="row">Montant des versements</th>
                        <td colspan="2">CFA 0</td>
                        
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
