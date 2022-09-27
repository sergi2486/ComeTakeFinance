@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nom complet</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                            <label for="phone_number" class="col-md-4 control-label">Numéro(whatsapp)</label>

                            <div class="col-md-6">
                                <input id="phone_number" type="number" class="form-control" name="phone_number" value="{{ old('phone_number') }}" required autofocus>

                                @if ($errors->has('phone_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Adresse email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                            <label for="city" class="col-md-4 control-label">Ville</label>

                            <div class="col-md-6">
                                <select name="city" id="city" class="form-control" required>
                                    <option value="Abong-Mbang">Abong-Mbang</option>
                                    <option value="Akonolinga">Akonolinga</option>
                                    <option value="Bafang">Bafang</option>
                                    <option value="Bafia">Bafia</option>
                                    <option value="Bafoussam">Bafoussam</option>
                                    <option value="Bali">Bali</option>
                                    <option value="Bamenda">Bamenda</option>
                                    <option value="Bagangté">Bagangté</option>
                                    <option value="Banyo">Banyo</option>
                                    <option value="Batibo">Batibo</option>
                                    <option value="Batouri">Batouri</option>
                                    <option value="Bélabo">Bélabo</option>
                                    <option value="Bertoua">Bertoua</option>
                                    <option value="Blangoua">Blangoua</option>
                                    <option value="Bogo">Bogo</option>
                                    <option value="Buea">Buea</option>
                                    <option value="Douala">Douala</option>
                                    <option value="Dschang">Dschang</option>
                                    <option value="Ebolowa">Ebolowa</option>
                                    <option value="Edéa">Edéa</option>
                                    <option value="Eséka">Eséka</option>
                                    <option value="Figuil">Figuil</option>
                                    <option value="Fontem">Fontem</option>
                                    <option value="Foumban">Foumban</option>
                                    <option value="Foumbot">Foumbot</option>
                                    <option value="Fundong">Fundong</option>
                                    <option value="Garoua">Garoua</option>
                                    <option value="Garoua-Boulaï">Garoua-Boulaï</option>
                                    <option value="Gazawa">Gazawa</option>
                                    <option value="Guider">Guider</option>
                                    <option value="Guidiguis">Guidiguis</option>
                                    <option value="Kaélé">Kaélé</option>
                                    <option value="Kékem">Kékem</option>
                                    <option value="Kousseri">Kousseri</option>
                                    <option value="Koutaba">Koutaba</option>
                                    <option value="Kribi">Kribi</option>
                                    <option value="Kumba">Kumba</option>
                                    <option value="Kumbo">Kumbo</option>
                                    <option value="Limbé">Limbé</option>
                                    <option value="Limbé">Limbé</option>
                                    <option value="Loum">Loum</option>
                                    <option value="Maga">Maga</option>
                                    <option value="Magba">Magba</option>
                                    <option value="Makénéné">Makénéné</option>
                                    <option value="Mamfé">Mamfé</option>
                                    <option value="Manjo">Manjo</option>
                                    <option value="Maroua">Maroua</option>
                                    <option value="Mbalmoyo">Mbalmoyo</option>
                                    <option value="Mbandjock">Mbandjock</option>
                                    <option value="Mbanga">Mbanga</option>
                                    <option value="Mbouda">Mbouda</option>
                                    <option value="Meiganga">Meiganga</option>
                                    <option value="Melong">Melong</option>
                                    <option value="Mokolo">Mokolo</option>
                                    <option value="Mora">Mora</option>
                                    <option value="Muyuka">Muyuka</option>
                                    <option value="Nanga-Eboko">Nanga-Eboko</option>
                                    <option value="Ndop">Ndop</option>
                                    <option value="Ngaoundal">Ngaoundal</option>
                                    <option value="Ngaoundéré">Ngaoundéré</option>
                                    <option value="Nkambé">Nkambé</option>
                                    <option value="Nkongsamba">Nkongsamba</option>
                                    <option value="Nkonteng">Nkonteng</option>
                                    <option value="Obala">Obala</option>
                                    <option value="Pitoa">Pitoa</option>
                                    <option value="Sangmélima">Sangmélima</option>
                                    <option value="Tcholliré">Tcholliré</option>
                                    <option value="Tibati">Tibati</option>
                                    <option value="Tiko">Tiko</option>
                                    <option value="Tombel">Tombel</option>
                                    <option value="Tonga">Tonga</option>
                                    <option value="Tonga">Tonga</option>
                                    <option value="Touboro">Touboro</option>
                                    <option value="Wum">Wum</option>
                                    <option value="Yabassi">Yabassi</option>
                                    <option value="Yagoua">Yagoua</option>
                                    <option value="Yaoundé">Yaoundé</option>
                                    <option value="Yokadouma">Yokadouma</option>
                                    
                                </select>
                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>

                        <div class="form-group{{ $errors->has('quarter') ? ' has-error' : '' }}">
                            <label for="quarter" class="col-md-4 control-label">Quartier</label>

                            <div class="col-md-6">
                                <input id="quarter" type="text" class="form-control" name="quarter" value="{{ old('quarter') }}" required autofocus>

                                @if ($errors->has('quarter'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('quarter') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Mot de passe</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmer</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
