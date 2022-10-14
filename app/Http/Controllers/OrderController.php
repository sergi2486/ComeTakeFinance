<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{
    //
    public function index(){
        return view('order.index');
    }

    //inserer une demande
    public function store(Request $request){
        // print_r($_POST);
        // print_r($_FILES);
        $file_contrat = $request->file('contrat_bail');
        $file_impot = $request->file('recu_impot');
        $file_facture = $request->file('facture_bien');
        $file_entiere = $request->file('photo_entiere');
        $file_cni = $request->file('photo_cni');
        $file_bien = $request->file('photo_bien');
        $file_business = $request->file('photo_business');

        
        $fileNameContrat = time() . '.' . $file_contrat->getClientOriginalExtension();
        
        $fileNameImpot = time(). '.' .$file_impot->getClientOriginalExtension(); 
        
        $fileNameFacture = time(). '.' .$file_impot->getClientOriginalExtension();
        
        $fileNameEntiere = time(). '.' .$file_entiere->getClientOriginalExtension();
        
        $fileNameCNI = time(). '.' .$file_cni->getClientOriginalExtension();
        
        $fileNameBien = time(). '.' .$file_bien->getClientOriginalExtension();
        
        $fileNameBusiness = time(). '.' .$file_business->getClientOriginalExtension();

        $file_contrat->storeAs('public/images/contrats/', $fileNameContrat);
        $file_impot->storeAs('public/images/impots', $fileNameImpot);
        $file_facture->storeAs('public/images/factures', $fileNameFacture);
        $file_entiere->storeAs('public/images/entieres', $fileNameEntiere);
        $file_cni->storeAs('public/images/cni', $fileNameCNI);
        $file_bien->storeAs('public/images/biens', $fileNameBien);
        $file_business->storeAs('public/images/business', $fileNameBusiness);

        $orders = [
            'montant' => $request->montant,
            'solde_a_rembourser' => $request->solde_a_rembourser,
            'delai_remboursement' => $request->delai_remboursement,
            'nombre_versement' => $request->nombre_versement,
            'bien_garanti' => $request->bien_garanti,
            'valeur_bien_garanti' => $request->valeur_bien_garanti,
            'activite' => $request->activite,
            'etat_demande' => $request->etat_demande,
            'contrat_bail' => $fileNameContrat,
            'recu_impot' => $fileNameImpot,
            'facture_bien' => $fileNameFacture,
            'photo_entiere' => $fileNameEntiere,
            'photo_cni' => $fileNameCNI,
            'photo_bien' => $fileNameBien,
            'photo_business' => $fileNameBusiness,
            'user_id' => $request->user_id,
        ];


        Order::create($orders);

        return response()->json([
            'status' => 200
        ]);

       // return back()->with('success','Successfully Updated',$check);
        
    }

    public function orders(){
        //$orders = Order::all();
        $orders = DB::table('orders')
                ->join('users', 'users.id', '=', 'orders.user_id')
                ->select('users.name', 'orders.*')
                ->get();
        $output = '';

        if($orders->count() > 0){
            $output .= '<table class="table table-striped table-sm text-center
            align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Photo</th>
                        <th>Nom</th>
                        <th>Montant</th>
                        <th>Solde</th>
                        <th>Delai</th>
                        <th>Nombre</th>
                        <th>Bien</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>';

                foreach($orders as $order){
                    $output .= '<tr>
                        <td>'.$order->id.'</td>
                        <td><img src="images/entieres/'.$order->photo_entiere.'" width="50" class="img-thumnail rounded-circle" /></td>
                        <td>'.$order->name.'</td>
                        <td>'.$order->montant.'</td>
                        <td>'.$order->solde_a_rembourser.'</td>
                        <td>'.$order->delai_remboursement.'</td>
                        <td>'.$order->nombre_versement.'</td>
                        <td>'.$order->bien_garanti.'</td>
                        <td>
                            <a href="#" id="'.$order->id. '" class="text-success mx-1 editIcon"
                            data-bs-toggle="modal" data-bs-target="#editOrderModal">
                                <i class="bi-pencil-square h4"></i>
                            </a>
                            <a href="#" id="'.$order->id. '" class="text-danger mx-1 deleteIcon"
                            data-bs-toggle="modal" data-bs-target="#deleteOrderModal">
                                <i class="bi-trash h4"></i>
                            </a>
                        </td>
                    </tr>';
                }
                $output .= '</tbodry></table>';
                echo $output;
            
        } else {
            echo '<h1 class="text-center text-secondary my-5">Pas de demande pour le moment</h1>';
        }
    }

    public function getUser(){
        $user = DB::table('orders')
                    ->join('users', 'users.id', '=', 'orders.user_id')
                    ->select('users.name')
                    ->get();
    }
}
