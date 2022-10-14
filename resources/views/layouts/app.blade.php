<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" 
    crossorigin="anonymous">
    <link 
    rel="stylesheet" 
    type="text/css" 
    href="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.css"/>
    <link rel="stylesheet" 
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">


    <title>{{ config('app.name', 'ComeTake Finance') }}</title>
    
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('order.index')}} ">ComeTake Finance</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('order.index') }}">Accueil <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">Se connecter</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">Créer un compte</a>
            </li>
            <li class="nav-item">
              <a href="{{ route('logout') }}" class="nav-link"
                  onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                  Déconnexion
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
          </li>
          </ul>
        </div>
      </nav>
      {{-- <script href="{{ URL::asset('js/jquery.min.js') }}" rel="script"></script> --}}
      <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
      {{-- <script type="text/javascript" src="/js/jquery.min.js"></script> --}}
      <script 
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" 
      integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" 
      crossorigin="anonymous"></script>
      <script 
      type="text/javascript" 
      src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> 

      <script type="text/javascript">
      $(function(){

        let delai = [2592000, 40, 50, 60];
        let temps = [3, 4, 5, 6];
        var days, hours, minutes, seconds;
        var state_order = ['En attente d\'acceptation', 'Eligible pour une vérification', 'Validée' ]

        //récupérer toutes les demandes
        fetchAllOrder();
        function fetchAllOrder(){

          $.ajax({
            url: '{{route('orders')}}',
            method: 'get',
            success: function(res){
              $('#show_all_orders').html(res);
              $('table').DataTable({
                order: [0, 'asc']
              });
            }
          });
        }

        function getUserCheck(){
          $.ajax({
            url: '{{ route('home') }}',
            method: 'get',
            success: function(res){
              $('#show_order_user').html(res)
            }
          });
        }
        
        //var x = setInterval(decrementerDelai1, 1000)
        function decrementerDelai1(){
          delai[0] = delai[0] - 1;
          //$('#time').text(delai[0]);
          if(delai[0] == 0){
            clearTimout(x)
          }
        }
  
        //console.log(times[0]);
        
        $(document).on('change', '#montant', function(e){
            
           var montant = $('#montant').val();
           var solde_a_rembourser
           console.log(montant);
            if(montant >= 0){
              if(montant >= 1 && montant <= 200000 ){
                solde_a_rembourser =(parseInt( montant * 25 ) / 100) + parseInt(montant);
                $('#solde_a_rembourser').val(parseInt(solde_a_rembourser));
                $('#delai_remboursement').val(delai[0]);
                $('#nombre_versement').val(3)
              } else if(montant <= 150000){
                solde_a_rembourser =(parseInt( montant * 27 ) / 100) + montant;
              } else if( montant >= 350000 && montant <= 500000 ){
                solde_a_rembourser =(( montant * 20 ) / 100) + montant;
              }
            }
        });
        
        $(document).on('click', '#add_order_btn', function(e){
          e.preventDefault();

          const fd = new FormData(document.getElementById('add_order_form'));
          $('#add_order_btn').text('Demande...');
          var token =  $('input[name="_token"]').attr('value');
          
          
         
          // xhr = new XMLHttpRequest();
          // xhr.open('POST', url)

           $.ajax({
            url: '{{ route('store') }}',
            method: 'post',
            data: fd,
            cache: false,
            processData: false,
            contentType: false,
            headers: {
                "X-CSRFToken": token
            },
            success: function(res){
              if(res.status == 200){
                Swal.fire(
                  'Demande faite',
                  'Votre demande a été effectuée avec success',
                  'success'
                );
                fetchAllOrder();
               
              }else{
                Swal.fire(
                  'Erreur',
                  'Il y a eu un problème',
                  'error'
                );
              }
              $('#addOrderModal').modal('hide');
              $('#add_order_form')[0].reset();
              $('#add_order_btn').text('Demander un financement');
            }
           });
        });

        $('#accepter').click(function(e){
            e.preventDefault();
            
            //let user_id = $('#user_id').val();
            const fd = new FormData(document.getElementById('etat_demande_form'));
          
            $.ajax({
              url: '{{ route('update') }}',
              method: 'post',
              //data: {user_id: user_id},
              data: fd,
              cache: false,
              processData: false,
              contentType: false,
              success: function(res){
                $('#etat_demande_form')[0].reset();
                $('#acceptationDemande').modal('hide')
              }
            });
          });

        $(document).on('click', '.etat_demande', function(e){
          e.preventDefault();
          let user_id = $(this).attr('id');
          
          var token =  $('input[name="_token"]').attr('value');

            $.ajax({
              url: '{{ route('state_order') }}',
              method: 'get',
              data: {
                user_id: user_id,
                _token: token
              },

              success: function(res){
                $('#user_id').val(res.id); 
              }
            });
          
        });

        
      });
      </script>
      <div class="container">
          @yield('content')
      </div>
      
     

      
      
      
  </body>
</html>