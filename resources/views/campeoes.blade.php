<!doctype html>
<html lang="en">
  <head>
    <title>Classificação Campeonato Brasileiro</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body style="background-color:whitesmoke;">

    <div class="container py-3">
        <header class="px-3">
            <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white ">
                <img width="40px" src="{{asset('img/logo.png')}}" alt="" style="margin-right: 10px">
                <h5 class="my-0 mr-md-auto font-weight-normal"> Campeões</h5>
                <a class="btn btn-outline-primary" href="{{route('home')}}"> Home</a>
                <a class="btn btn-outline-primary salvar" href="" style="margin-left: 8px"> Salvar</a>
            </div>
        </header>
    <div class="container">
        <div class="table table-responsive " style="background-color:white;">
            <table class="table " id="table">
                <thead>
                    <tr>
                        <th>Campeão da Libertadores</th>
                        <th>Campeão da Copa do Brasil</th>
                        <th>Campeão da Sul-Americana</th>
                    </tr>
                </thead>
                <form action="">{{ csrf_field() }}
                <tbody id="classificacao">

                </tbody>
                </form>
            </table>
        </div>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://unpkg.com/imask"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    <script type="text/javascript">

        function atualizar() {
            $.ajax({
              type: 'GET',
              url: 'atualizar_campeoes',
              success: function(data){
                if ((data.errors)) {
                  $('.error').removeClass('d-none');
                  $('.error').text(data.errors);
                } else {
                  $('.error').remove();
                  //console.log(data)
                  document.getElementById("classificacao").innerHTML = data;
                  $('#create').modal('hide');
                }
              },
              error: function(err) {
                  console.log('Erro: '+ err.toString())
              }
            });
        }

        // ajax Form Add Post

        $(".salvar").click(function() {

            $.ajax({
                type: 'POST',
                url: 'salvar_campeoes',
                data: {
                '_token': $('input[name=_token]').val(),
                'libertadores': $('#libertadores').val(),
                'copa_brasil': $('#copa_brasil').val(),
                'sul_americana': $('#sul_americana').val()
                },
                success: function(data){
                if ((data.errors)) {
                    $('.error').removeClass('d-none');
                    $('.error').text(data.errors);
                } else {
                    $('.error').remove();
                    alert("Alterações realizadas com sucesso!", "Sucesso")
                    //atualizar();
                }
                },
                error: function(err) {
                    console.log('Erro: '+ err.toString())
                //alert("Ocorreu um erro ao carregar os dados.");
                }
            });
        });

        document.addEventListener("DOMContentLoaded", function () {
            atualizar();
        });
    </script>
</body>
</html>
