<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="scripts/clipboard.min.js"></script>
 <script>
  $( document ).ready(function(){
      
        function formatDate(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2) month = '0' + month;
            if (day.length < 2) day = '0' + day;

            return [year, month, day].join('-');
        }

        function calcularEdad(fecha) {
                var hoy = new Date();
                var cumpleanos = new Date(fecha);
                var edad = hoy.getFullYear() - cumpleanos.getFullYear();
                var m = hoy.getMonth() - cumpleanos.getMonth();

                if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
                    edad--;
                }

                return edad;
        }

        function copiarAlPortapapeles(id_elemento) {
            // Crea un campo de texto "oculto"
            var aux = document.createElement("input");
            // Asigna el contenido del elemento especificado al valor del campo
            aux.setAttribute("value", document.getElementById(id_elemento).innerHTML);
            // Añade el campo a la página
            document.body.appendChild(aux);
            // Selecciona el contenido del campo
            aux.select();
            // Copia el texto seleccionado
            document.execCommand("copy");
            // Elimina el campo de la página
            document.body.removeChild(aux);

        }





         $("#calcular").click(function(){
            $("#copytable").show();
            $("#copytext").show();
            $("#copyhtml").show();
            
             let fecha  =  $("#fechanac").val();
             let edad = 0 ;
             if(fecha){
                edad = calcularEdad(fecha);
                $("#edad").val(edad) ;
             }else{
                edad =  parseInt($("#edad").val());
             }
               
              let fmax =  parseInt($("#fmax").val());
              let fmin =  parseInt($("#fmin").val());
              let u61 = $("#u61").val();
              let u6 = $("#u6").val();
              let u71 = $("#u71").val();
              let u7 = $("#u7").val();
              let u81 = $("#u81").val();
              let u8 = $("#u8").val();
              let u91 = $("#u91").val();
              let u9 = $("#u9").val();
              let u101 = $("#u101").val();
              let u10 = $("#u10").val();

              let   resultado61 = Math.round (((fmax-fmin)*u61)+fmin);
              let   resultado6 = Math.round (((fmax-fmin)*u6)+fmin);
              let   resultado71 = Math.round (((fmax-fmin)*u71)+fmin);
              let   resultado7 = Math.round (((fmax-fmin)*u7)+fmin);
              let   resultado81 = Math.round (((fmax-fmin)*u81)+fmin);
              let   resultado8 = Math.round (((fmax-fmin)*u8)+fmin);
              let   resultado91 = Math.round (((fmax-fmin)*u91)+fmin);
              let   resultado9 = Math.round (((fmax-fmin)*u9)+fmin);
              let   resultado101 = Math.round (((fmax-fmin)*u101)+fmin);
              let   resultado10 = Math.round (((fmax-fmin)*u10)+fmin);
              $("#ur61").html(resultado61) ;
              $("#ur6").html(resultado6) ;
              $("#ur71").html(resultado71) ;
              $("#ur7").html(resultado7) ;
              $("#ur81").html(resultado81) ;
              $("#ur8").html(resultado8) ;
              $("#ur91").html(resultado91) ;
              $("#ur9").html(resultado9) ;
              $("#ur101").html(resultado101) ;
              $("#ur10").html(resultado10) ;

              let fteo = (220-edad);
              $("#rfmin").html(fmin) ;
              $("#rfmax").html(fmax) ;
              $("#rfteo").html(fteo) ;
              
              let pmin = parseInt($("#pmin").val());
              let smin = parseInt($("#smin").val());
              let tmin = parseInt($("#tmin").val());

              $("#rpmin").html(pmin) ;
              $("#rsmin").html(smin) ;
              $("#rtmin").html(tmin) ;

              let prp = fmax-pmin;
              let prs = pmin-smin;
              let prt = smin-tmin;

              $("#prp").html(prp) ;
              $("#prs").html(prs) ;
              $("#prt").html(prt) ;
                /*colores */
                if(prp < 12){
                    $("#prpcolor").css("background-color", "#FFA8A8");
                }else if(prp > 12 && prp<20){
                    $("#prpcolor").css("background-color", "#C0E7F3");
                }else{
                    $("#prpcolor").css("background-color", "#A4F0B7");
                }

                if(prs < 12){
                    $("#prscolor").css("background-color", "#FFA8A8");
                }else if(prs > 12 && prs<20){
                    $("#prscolor").css("background-color", "#C0E7F3");
                }else{
                    $("#prscolor").css("background-color", "#A4F0B7");
                }

                if(prt < 12){
                    $("#prtcolor").css("background-color", "#FFA8A8");
                }else if(prt > 12 && prt<20){
                    $("#prtcolor").css("background-color", "#C0E7F3");
                }else{
                    $("#prtcolor").css("background-color", "#A4F0B7");
                }
                

                /* indice cronotropico */
               /* let indicecronotropico = (((fmax-fmin)/(fteo-fmin)) *100);*/
                 let indicecronotropico = ((fmax)/(220-edad))*100;
                $("#indicecronotropico").html(prp) ;

                /* resumen conotropico */
                let resumencronotropico = ((fmax-fmin)/(fteo-fmin)) *100;
                $("#resumencronotropico").html(prp);



         });


         $("#copyhtml").click(function(){
             copiarAlPortapapeles('tocopy')  ; 
         });

         $("#copytable").click(function(){
            console.log("estoy aqui copiando la tabla");
         
         });
  });
  
  </script>
</head>
<body>
  <div class="container">
    
     <h2 class="text-center text-primary">INFORME DE MONITORIZACIÓN DEPORTIVA CARDIACA REMOTA</h2>
     <div class="panel panel-primary">
            <div class="panel-heading"><b>DATOS DEL PACIENTE</b></div>
            <div class="panel-body">
            

            <div class="form-group row">
                <div class="col-xs-2">
                    <label for="ex1">Fecha Nacimiento</label>
                    <input class="form-control" id="fechanac" type="date" >
                </div>
                <div class="col-xs-2">
                    <label for="ex1">Edad</label>
                    <input class="form-control" id="edad" type="number" >
                </div>
            </div>

            <div class="form-group row">
                <div class="col-xs-2">
                    <label for="ex1">Frecuencia cardiaca Mínima(lpm)</label>
                    <input class="form-control" id="fmin" type="number" >
                </div>
                <div class="col-xs-2">
                    <label for="ex2">Frecuencia cardicaca Máxima(lpm)</label>
                    <input class="form-control" id="fmax" type="number" >
                </div>
                <input type="hidden" id="u61" value = "0.5">
                <input type="hidden" id="u6" value = "0.6">
                <input type="hidden" id="u71" value = "0.61">
                <input type="hidden" id="u7" value = "0.7">
                <input type="hidden" id="u81" value = "0.71">
                <input type="hidden" id="u8" value = "0.84">
                <input type="hidden" id="u91" value = "0.85">
                <input type="hidden" id="u9" value = "0.94">
                <input type="hidden" id="u101" value = "0.95">
                <input type="hidden" id="u10" value = "1">

            </div>

            <h3>Tiempo de recuperacion</h3>
            <div class="form-group row">
                <div class="col-xs-2">
                    <label for="ex1">1 min (lpm)</label>
                    <input class="form-control" id="pmin" type="number" >
                </div>
                <div class="col-xs-2">
                    <label for="ex2">2 min (lpm)</label>
                    <input class="form-control" id="smin" type="number" >
                </div>
                <div class="col-xs-2">
                    <label for="ex2">3 min (lpm)</label>
                    <input class="form-control" id="tmin" type="number" >
                </div>
            </div>

            <div class="text-center">
                <input class="btn btn-lg btn-primary" type="button" id="calcular" value="Calcular">
                <br><br>
                <input class="clip btn btn-lg btn-success ninja"  type="button" id="copyhtml" value="Copiar HTML">
                <input class="btn btn-lg btn-success ninja"  type="button" id="copytable" value="Copiar Tabla">
                <input class="btn btn-lg btn-success ninja" type="button" id="copytext" value="Copiar Texto">
            </div>
            </div>
      </div>
    
  
    
<div id ="tocopy">

            <style>


                    .fondo{
                        background: rgba(255,158,176,1);
                        background: -moz-linear-gradient(-45deg, rgba(255,158,176,1) 0%, rgba(247,54,29,1) 0%, rgba(255,158,176,1) 0%, rgba(255,158,176,1) 51%, rgba(168,255,156,1) 51%, rgba(168,255,156,1) 100%);
                        background: -webkit-gradient(left top, right bottom, color-stop(0%, rgba(255,158,176,1)), color-stop(0%, rgba(247,54,29,1)), color-stop(0%, rgba(255,158,176,1)), color-stop(51%, rgba(255,158,176,1)), color-stop(51%, rgba(168,255,156,1)), color-stop(100%, rgba(168,255,156,1)));
                        background: -webkit-linear-gradient(-45deg, rgba(255,158,176,1) 0%, rgba(247,54,29,1) 0%, rgba(255,158,176,1) 0%, rgba(255,158,176,1) 51%, rgba(168,255,156,1) 51%, rgba(168,255,156,1) 100%);
                        background: -o-linear-gradient(-45deg, rgba(255,158,176,1) 0%, rgba(247,54,29,1) 0%, rgba(255,158,176,1) 0%, rgba(255,158,176,1) 51%, rgba(168,255,156,1) 51%, rgba(168,255,156,1) 100%);
                        background: -ms-linear-gradient(-45deg, rgba(255,158,176,1) 0%, rgba(247,54,29,1) 0%, rgba(255,158,176,1) 0%, rgba(255,158,176,1) 51%, rgba(168,255,156,1) 51%, rgba(168,255,156,1) 100%);
                        background: linear-gradient(135deg, rgba(255,158,176,1) 0%, rgba(247,54,29,1) 0%, rgba(255,158,176,1) 0%, rgba(255,158,176,1) 51%, rgba(168,255,156,1) 51%, rgba(168,255,156,1) 100%);
                        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ff9eb0', endColorstr='#a8ff9c', GradientType=1 );

                    }

                    .r1{
                        background: #F1a07A;
                    }

                    .r2{
                       background: #E9967A;
                    }
                    .r3{
                        background:	#FA8072;
                    }
                    .r4{
                        background:	#CD5C5C;
                    }
                    .r5{
                        background:	#b9393d;
                    }
                    .principal  {
                        font-family: arial, sans-serif;
                        border-collapse: collapse;
                    }
                    
                    table{
                        width: 100%; 
                    }

                    .principal td, th {
                        border: 1px solid #5c5654;
                        text-align: left;
                        padding: 8px;
                        /* width: 100px; */
                        word-wrap: break-word;
                    }

                    .secundaria td, th {
                        border: 1px solid #5c5654;
                        text-align: left;
                        padding: 8px;
                        width: 100px;
                        word-wrap: break-word;
                    }

                    table .cell-up {      
                       /* height: 200px;*/
                        border-top: 0; 
                        border-left: 1px solid #555; 
                        border-right: 1px solid #555; 
                       /* border-bottom: 1px; */
                    } 
                            
                    .ninja{
                        display:none;
                    }
            </style>    


        <h2>Datos de la sesión</h2>

        <table cellspacing="0" cellpadding="0" class="principal"  style="width:100%;" id ="table">
        <tr>
            <th>
            <label for="">Frecuencia Mínima :</label>
            <label for="" id="rfmin"></label> (lpm)
            </th>
            <th>
            <label for="">Frecuencia Máxima :</label>
            <label for="" id="rfmax"></label> (lpm)
            </th>
            <th>
            <label for="">Frecuencia Teórica :</label>
            <label for="" id="rfteo"></label> (lpm)
            </th>
        </tr>
        <tr >
            <td style="padding: 0px !important; text-align:center"> Umbrales</td>
            <td style="padding: 0px !important;">
                <table >
                        <td style="text-align:center"> 50 - 60%</td>
                        <td style="text-align:center"> 61 - 70%</td>
                        <td style="text-align:center"> 71 - 84%</td>
                        <td style="text-align:center"> 85 - 94%</td>
                        <td style="text-align:center">95 - 100%</td>
                </table>  
            </td>
            <td style="padding: 0px !important;">
                <table >
                        <td style="text-align:center">1 min</td>
                        <td style="text-align:center">2 min</td>
                        <td style="text-align:center">3 min</td>
                </table>  
            </td>
        </tr>
        <tr >
        <!-- primera columna -->
            <td style="padding: 0px !important; text-align:center" rowspan="3" class="" > 
                    Aeróbicos \ Anaeróbicos
        
            </td>
            <!-- segunda columna -->
            <td style="padding: 0px !important;" rowspan="3">
                <table  >
                <!-- latidos por minuto -->
                <tr>
                        <td  class="r1" style=" text-align:center;" class="cell-up">
                        <label for="" id ='ur61'></label> -
                        <label for="" id ='ur6'></label>
                        </td>
                        <td class="r2" style=" text-align:center; " class="cell-up">
                        <label for="" id ='ur71'></label> -
                        <label for="" id ='ur7'></label>
                        </td>
                        <td class="r3" style=" text-align:center;" class="cell-up">
                        <label for="" id ='ur81'></label> -
                        <label for="" id ='ur8'></label>
                        </td>
                        <td class="r4"style=" text-align:center" class="cell-up">
                        <label for="" id ='ur91'></label> -
                        <label for="" id ='ur9'></label>
                        </td>
                        <td class="r5"style=" text-align:center" class="cell-up">
                        <label for="" id ='ur101'></label> -
                        <label for="" id ='ur10'></label>
                        </td>
                 </tr>
                 <tr>
                        <td   style=" text-align:center;" class="cell-up">
                          <b>Zona 1</b>
                        </td>
                        <td  style=" text-align:center; " class="cell-up">
                          <b>Zona 2</b>
                        </td>
                        <td  style=" text-align:center;" class="cell-up">
                         <b>Zona 3</b>
                        </td>
                        <td style=" text-align:center" class="cell-up">
                        <b> Zona 4</b>
                        </td>
                        <td style=" text-align:center" class="cell-up">
                        <b> Zona 5</b>
                        </td>
                 </tr>
                 <tr>
                      <td  colspan="5" style="text-align:center" >
                                                Indice cronotropico
                                                <br>
                                                <label for="" id ='indicecronotropico'></label>%                         
                       </td>
                 </tr>
                </table>  
            </td>

            <!-- tercera columna -->
            <td style="padding: 0px !important;">
                <table >
                        <td style="text-align:center">
                        <label for="" id ='rpmin'></label>
                        </td>
                        <td style="text-align:center">
                        <label for="" id ='rsmin'></label>
                        </td>
                        <td style="text-align:center">
                        <label for="" id ='rtmin'></label>
                        </td>
                </table>  
            </td>
        </tr>
        <tr>
            <td style="padding: 0px !important;">
                <table >
                            <td style="text-align:center" id="prpcolor">
                            <label for="" id ='prp'></label>
                            </td>
                            <td style="text-align:center" id="prscolor">
                            <label for="" id ='prs'></label>
                            </td>
                            <td style="text-align:center" id="prtcolor">
                            <label for="" id ='prt'></label>
                            </td>
                    </table>  
            </td>     
        </tr>
        <tr>
            <td style="padding: 0px !important;">
                <table >
                            <td style="text-align:center" >
                                    Reserva cronotrópica
                                    <br>
                                    <label for="" id ='resumencronotropico'></label>%
                            </td>
                    </table>  
            </td>     
        </tr>
        
        </table>

</div>
<br><br><br><br>


</body>
</html>