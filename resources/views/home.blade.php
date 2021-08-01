<!doctype html>
<html lang="en">
  <head>
    <title>Classificação Campeonato Brasileiro</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body style="background-color:whitesmoke;">

    <div class="container py-3">
        <header class="px-3">
            <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white ">
                <img width="40px" src="{{asset('img/logo.png')}}" alt="" style="margin-right: 10px">
                <h5 class="my-0 mr-md-auto font-weight-normal"> Tabela de Classificação do Campeonato Brasileiro</h5>
                <a class="btn btn-outline-primary create-modal" href="#"> Inserir Confronto</a>
                <a class="btn btn-outline-primary" href="{{route('campeoes')}}"  style="margin-left: 8px"> Campeões Atuais</a>
            </div>
        </header>
    <div class="container">
        <div class="table table-responsive " style="background-color:white;">
            <table class="table " id="table">
                <thead>
                    <tr>
                        <th style="width: 100px;">Posição</th>
                        <th>Time</th>
                        <th>PTS</th>
                        <th>J</th>
                        <th>V</th>
                        <th>E</th>
                        <th>D</th>
                        <th>GP</th>
                        <th>GC</th>
                        <th>SG</th>
                    </tr>
                </thead>
                <tbody id="classificacao">

                </tbody>
            </table>
        </div>
        <div class="container py-3" style="background-color:white;">

            <h5>Lengenda</h5>
            <div class="d-flex flex-column flex-md-row align-items-center">
                <div style="background-color:#DAA520; width: 18px; height: 18px; margin-right: 5px;"></div>
                <div class=""> Campeão</div>
            </div>
            <div class="d-flex flex-column flex-md-row align-items-center">
                <div style="background-color:#2E8B57; width: 18px; height: 18px; margin-right: 5px;"></div>
                <div class=""> Classificado para a Copa Libertadores</div>
            </div>
            <div class="d-flex flex-column flex-md-row align-items-center">
                <div style="background-color:#4682B4; width: 18px; height: 18px; margin-right: 5px;"></div>
                <div class=""> Classificado para a Copa Sul-Americana</div>
            </div>
            <div class="d-flex flex-column flex-md-row align-items-center">
                <div style="background-color:#A52A2A; width: 18px; height: 18px; margin-right: 5px;"></div>
                <div class=""> Clubes rebaixados</div>
            </div>

        </div>
    </div>

    {{-- Modal Form Create Post --}}
<div id="create" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form">
            {{ csrf_field() }}

            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group ">
                            <div class="row justify-content-center align-items-center">
                                <label for="exampleFormControlInput1">Time da Casa</label>
                                <select required class="form-control col-md-10" id="id_casa" name="id_casa">
                                    @foreach ($times as $time)
                                    <option value="{{$time->id}}">{{$time->nome}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                    </div>
                    <div class="col-md-4 text-center justify-content-center">
                        <div class="form-group">
                            <div class="row justify-content-center align-items-center">
                                <label for="exampleFormControlInput1" class="col-md-12">Placar</label>
                                <input type="text" class="form-control col-md-5" id="gols_casa" name="gols_casa" placeholder="0" required>
                                <span class="col-md-2">X</span>
                                <input type="text" class="form-control col-md-5" id="gols_fora" name="gols_fora" placeholder="0" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row justify-content-center align-items-center">
                                <label for="exampleFormControlInput1" class="col-md-12">Cartões Vermelhos</label>
                                <input type="text" class="form-control col-md-5" id="cv_casa" name="cv_casa" value="0" required>
                                <span class="col-md-2">X</span>
                                <input type="text" class="form-control col-md-5" id="cv_fora" name="cv_fora" value="0" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row justify-content-center align-items-center">
                                <label for="exampleFormControlInput1" class="col-md-12">Cartões Amarelos</label>
                                <input type="text" class="form-control col-md-5" id="ca_casa" name="ca_casa" value="0" required>
                                <span class="col-md-2">X</span>
                                <input type="text" class="form-control col-md-5" id="ca_fora" name="ca_fora" value="0" required>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-4" >
                        <div class="form-group ">
                            <div class="row justify-content-center align-items-center">
                                <label for="exampleFormControlInput1">Time Visitante</label>
                                <select required class="form-control col-md-10 " id="id_fora" name="id_fora">
                                    @foreach ($times as $time)
                                    <option value="{{$time->id}}">{{$time->nome}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                    </div>

                </div>
                <p class="error text-center alert alert-danger d-none"></p>
            </div>

          </form>
        </div>
        <div class="modal-footer">

            <button class="btn btn-secondary" type="button" data-dismiss="modal">Fechar</button>

            <button class="btn btn-primary" type="submit" id="add">Salvar Confronto</button>
        </div>
      </div>
    </div>
  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://unpkg.com/imask"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    <script type="text/javascript">

        function atualizar() {
            $.ajax({
              type: 'GET',
              url: 'atualizar',
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


        $(document).on('change','#id_casa', function() {

            $("#id_fora > option").each(function() {
                //alert(this.text + ' ' + this.value);
                $(this).prop('disabled', false);
            });

            id_casa = $('#id_casa').val();

            $("#id_fora option[value="+id_casa+"]").prop('disabled', true);

        });

        $(document).on('change','#id_fora', function() {

            $("#id_casa > option").each(function() {
                //alert(this.text + ' ' + this.value);
                $(this).prop('disabled', false);
            });

            id_fora = $('#id_fora').val();

            $("#id_casa option[value="+id_fora+"]").prop('disabled', true);

        });

        // ajax Form Add Post
          $(document).on('click','.create-modal', function() {
            $('#create').modal('show');
            $('.form-horizontal').show();
            $('.modal-title').text('Confronto');
          });
          $("#add").click(function() {

            id_casa = $('#id_casa').val();
            gols_casa = $('#gols_casa').val();
            id_fora = $('#id_fora').val();
            gols_fora = $('#gols_fora').val();

            cv_casa = $('#cv_casa').val();
            cv_fora = $('#cv_fora').val();
            ca_casa = $('#ca_casa').val();
            ca_fora = $('#ca_fora').val();


            if (id_casa == null || id_casa == "",
                gols_casa == null || gols_casa == "",
                id_fora == null || id_fora == "",
                gols_fora == null || gols_fora == "",
                cv_casa == null || cv_casa == "",
                cv_fora == null || cv_fora == "",
                ca_casa == null || ca_casa == "",
                ca_fora == null || ca_fora == "")
            {
                //alert("Todos os campos devem ser Preenchidos");
                $('.error').removeClass('d-none');
                $('.error').text('Todos os campos devem ser Preenchidos');
                return false;
            }

            $.ajax({
              type: 'POST',
              url: 'salvar',
              data: {
                '_token': $('input[name=_token]').val(),
                'id_casa': $('#id_casa').val(),
                'gols_casa': $('#gols_casa').val(),
                'id_fora': $('#id_fora').val(),
                'gols_fora': $('#gols_fora').val(),
                'cv_casa': $('#cv_casa').val(),
                'cv_fora': $('#cv_fora').val(),
                'ca_casa': $('#ca_casa').val(),
                'ca_fora': $('#ca_fora').val(),

              },
              success: function(data){
                if ((data.errors)) {
                  $('.error').removeClass('d-none');
                  $('.error').text(data.errors);
                } else {
                  $('.error').remove();
                  atualizar();
                }
              },
              error: function(err) {
                  console.log('Erro: '+ err.toString())
                //alert("Ocorreu um erro ao carregar os dados.");
              }
            });
            $('#id_casa').val('');
            $('#id_fora').val('');
            $('#gols_casa').val('');
            $('#gols_fora').val('');
            $('#cv_casa').val('');
            $('#cv_fora').val('');
            $('#ca_casa').val('');
            $('#ca_fora').val('');
          });

          document.addEventListener("DOMContentLoaded", function () {

            atualizar();

            var numberMask = IMask(document.getElementById('gols_casa'), {
            mask: Number,
            signed: false,
            min: 0,
            max: 100,
            thousandsSeparator: ' '
            }).on('accept', function() {

            });

            var numberMask = IMask(document.getElementById('gols_fora'), {
            mask: Number,
            signed: false,
            min: 0,
            max: 100,
            thousandsSeparator: ' '
            }).on('accept', function() {

            });

            var numberMask = IMask(document.getElementById('ca_casa'), {
            mask: Number,
            signed: false,
            min: 0,
            max: 100,
            thousandsSeparator: ' '
            }).on('accept', function() {

            });

            var numberMask = IMask(document.getElementById('ca_fora'), {
            mask: Number,
            signed: false,
            min: 0,
            max: 100,
            thousandsSeparator: ' '
            }).on('accept', function() {

            });

            var numberMask = IMask(document.getElementById('cv_casa'), {
            mask: Number,
            signed: false,
            min: 0,
            max: 100,
            thousandsSeparator: ' '
            }).on('accept', function() {

            });

            var numberMask = IMask(document.getElementById('cv_fora'), {
            mask: Number,
            signed: false,
            min: 0,
            max: 100,
            thousandsSeparator: ' '
            }).on('accept', function() {

            });

          });


        // function Edit POST
    </script>
</body>
</html>
