<a href="https://www.webcontadores.com" title="contadores de visitas"><img
        src="https://counter2.optistats.ovh/private/webcontadores.php?c=5wkxc8yl4pwteaszarkc1rl5zytd7xhf" border="0"
        title="contadores de visitas" alt="contadores de visitas"></a>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CHECKER RENNER</title>
    <link rel="icon" type="image/png" href="foto1.ico">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
    <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="assets/css/style.css?v=1.0.0" rel="stylesheet" />
    <link href="assets/demo/demo.css" rel="stylesheet" />
</head>

<body>
    <div class="col-md-11 mt-4" style="margin: auto;">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="title"><i class="fa fa-credit-card"></i> CHECKER RENNER <i
                                class="fa fa-credit-card"></i>
                        </h5>
                        <hr>
                        <textarea style="height: 8.06rem;" class="form-control text-center form-checker mb-2"
                            placeholder=" "></textarea>
                        <button class="btn btn-outline-success btn-play" style="width: 49%; float: left;"><i
                                class="fa fa-play"></i> INICIAR</button>
                        <button class="btn btn-outline-danger btn-stop text-white" style="width: 49%; float: right;"
                            disabled><i class="fa fa-stop"></i> PARAR</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="title"><i class="fas fa-code"></i> <b> CODER:</b> <b>
                                <font color="white">CENTRAL 1.0</>!</font>
                            </b></a> <i class="fas fa-code"></i></span></h5>
                        <hr>
                        <h5 class="title"><i class="fa fa-thumbs-up"></i> Aprovadas:<span
                                class="badge badge-success float-right aprovadas">0</span></h5>
                        <hr>
                        <h5 class="title"><i class="fa fa-thumbs-down"></i> Reprovadas:<span
                                class="badge badge-danger float-right reprovadas">0</span></h5>
                        <hr>
                        <h5 class="title"><i class="fa fa-sync-alt"></i> Testadas:<span
                                class="badge badge-info float-right testadas">0</span></h5>
                        <hr>
                        <h5 class="title mb-0"><i class="fa fa-share-square"></i> Carregadas:<span
                                class="badge badge-primary float-right carregadas">0</span></h5>
                        </h5>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="float-right">
                            <button type="show" class="btn btn-primary btn-sm show-Aprovadas"><i
                                    class="fa fa-eye-slash"></i></button>
                            <button class="btn btn-success btn-sm btn-copy"><i class="fa fa-copy"></i></button>
                        </div>
                        <h4 class="title mb-1"><i class="fa fa-thumbs-up text-success"></i> Aprovadas</h4>
                        <div id='lista_aprovadas'></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="float-right">
                            <button type='hidden' class="btn btn-primary btn-sm show-Reprovadas"><i
                                    class="fa fa-eye"></i></button>
                            <button class="btn btn-danger btn-sm btn-trash"><i class="fa fa-trash"></i></button>
                        </div>
                        <h4 class="title mb-1"><i class="fa fa-thumbs-down text-danger"></i> Reprovadas</h4>
                        <div style='display: none;' id='lista_reprovadas'></div>
                    </div>
                </div>
            </div>
            </section>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="assets/js/core/jquery.min.js" type="text/javascript"></script>
    <script>
    $(document).ready(function() {

        // getSaldo();

        $('.show-Aprovadas').click(function() {
            var type = $('.show-Aprovadas').attr('type');
            $('#lista_aprovadas').slideToggle();
            if (type == 'show') {
                $('.show-Aprovadas').html('<i class="fa fa-eye"></i>');
                $('.show-Aprovadas').attr('type', 'hidden');
            } else {
                $('.show-Aprovadas').html('<i class="fa fa-eye-slash"></i>');
                $('.show-Aprovadas').attr('type', 'show');
            }
        });

        $('.show-Reprovadas').click(function() {
            var type = $('.show-Reprovadas').attr('type');
            $('#lista_reprovadas').slideToggle();
            if (type == 'show') {
                $('.show-Reprovadas').html('<i class="fa fa-eye"></i>');
                $('.show-Reprovadas').attr('type', 'hidden');
            } else {
                $('.show-Reprovadas').html('<i class="fa fa-eye-slash"></i>');
                $('.show-Reprovadas').attr('type', 'show');
            }
        });

        $('.btn-trash').click(function() {
            Swal.fire({
                title: 'Reprovadas Limpas.',
                icon: 'success',
                showConfirmButton: false,
                toast: true,
                position: 'top-end',
                timer: 3000
            });
            $('#lista_reprovadas').text('');
        });

        $('.btn-copy').click(function() {
            Swal.fire({
                title: 'Aprovadas Copiadas!',
                icon: 'success',
                showConfirmButton: false,
                toast: true,
                position: 'top-end',
                timer: 3000
            });
            var lista_aprovadas = document.getElementById('lista_aprovadas').innerText;
            var textarea = document.createElement("textarea");
            textarea.value = lista_aprovadas;
            document.body.appendChild(textarea);
            textarea.select();
            document.execCommand('copy');
            document.body.removeChild(textarea);
        });


        $('.btn-play').click(function() {

            var lista = $('.form-checker').val().trim();
            var array = lista.split('\n');
            var Aprovadas = 0,
                Reprovadas = 0,
                testadas = 0,
                txt = '';

            if (!lista) {
                Swal.fire({
                    title: 'Erro: Lista Vazia!',
                    icon: 'error',
                    showConfirmButton: false,
                    toast: true,
                    position: 'top-end',
                    timer: 3000
                });
                return false;
            }

            Swal.fire({
                title: 'Teste Iniciado!',
                icon: 'success',
                showConfirmButton: false,
                toast: true,
                position: 'top-end',
                timer: 3000
            });

            var line = array.filter(function(value) {
                if (value.trim() !== "") {
                    txt += value.trim() + '\n';
                    return value.trim();
                }
            });

            /*
var line = array.filter(function(value){
return(value.trim() !== "");
});
*/

            var total = line.length;

            /*
line.forEach(function(value){
txt += value + '\n';
});
*/

            $('.form-checker').val(txt.trim());

            if (total > 10000) {
                Swal.fire({
                    title: 'Limite de Linhas Exedido!',
                    icon: 'warning',
                    showConfirmButton: false,
                    toast: true,
                    position: 'top-end',
                    timer: 3000
                });
                return false;
            }

            $('.carregadas').text(total);
            $('.btn-play').attr('disabled', true);
            $('.btn-stop').attr('disabled', false);

            // set audios vars.
            var audioLive = new Audio('liv.mp3');

            line.forEach(function(data) {
                var callBack = $.ajax({
                    url: 'api.php?lista=' + data,
                    success: function(retorno) {
                        if (retorno.indexOf("Aprovada") >= 0) {
                            Swal.fire({
                                title: '+1 Aprovada!',
                                icon: 'success',
                                showConfirmButton: false,
                                toast: true,
                                position: 'top-end',
                                timer: 3000
                            });
                            $('#lista_aprovadas').append(retorno);
                            removelinha();
                            audioLive.play();
                            Aprovadas = Aprovadas + 1;
                        } else {
                            $('#lista_reprovadas').append(retorno);
                            removelinha();
                            Reprovadas = Reprovadas + 1;
                        }
                        testadas = Aprovadas + Reprovadas;
                        $('.aprovadas').text(Aprovadas);
                        $('.reprovadas').text(Reprovadas);
                        $('.testadas').text(testadas);

                        if (testadas == total) {
                            Swal.fire({
                                title: 'Teste Finalizado!',
                                icon: 'success',
                                showConfirmButton: false,
                                toast: true,
                                position: 'top-end',
                                timer: 3000
                            });
                            $('.btn-play').attr('disabled', false);
                            $('.btn-stop').attr('disabled', true);
                        }
                    }
                });
                $('.btn-stop').click(function() {
                    Swal.fire({
                        title: 'Teste Parado!',
                        icon: 'warning',
                        showConfirmButton: false,
                        toast: true,
                        position: 'top-end',
                        timer: 3000
                    });
                    $('.btn-play').attr('disabled', false);
                    $('.btn-stop').attr('disabled', true);
                    callBack.abort();
                    return false;
                });
            });
        });
    });

    function removelinha() {
        var lines = $('.form-checker').val().split('\n');
        lines.splice(0, 1);
        $('.form-checker').val(lines.join("\n"));
    }
    </script>
</body>

</html>