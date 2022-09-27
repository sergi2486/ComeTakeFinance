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
                    <label for="">Nom:</label> <b>{{ Auth::user()->name}}</b><br>
                    <label for="">Tel:(+237) </label> <b>{{ Auth::user()->phone_number}}</b><br>
                    <label for="">Ville: </label> <b>{{ Auth::user()->city}}</b><br>
                    <label for="">Quartier: </label> <b>{{ Auth::user()->quarter}}</b><br>
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
                                    <label for="">Nom</label>
                                    <input type="email" class="form-control" id="" placeholder="Email" readonly value="{{Auth::user()->name }}">
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="">Tél:</label>
                                    <input type="text" class="form-control" id="" placeholder="" readonly value="{{Auth::user()->phone_number }}">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="inputAddress">Address</label>
                                  <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                                </div>
                                <div class="form-group">
                                  <label for="inputAddress2">Address 2</label>
                                  <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                                </div>
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label for="inputCity">City</label>
                                    <input type="text" class="form-control" id="inputCity">
                                  </div>
                                  <div class="form-group col-md-4">
                                    <label for="inputState">State</label>
                                    <select id="inputState" class="form-control">
                                      <option selected>Choose...</option>
                                      <option>...</option>
                                    </select>
                                  </div>
                                  <div class="form-group col-md-2">
                                    <label for="inputZip">Zip</label>
                                    <input type="text" class="form-control" id="inputZip">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                    <label class="form-check-label" for="gridCheck">
                                      Check me out
                                    </label>
                                  </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Sign in</button>
                              </form>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
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
