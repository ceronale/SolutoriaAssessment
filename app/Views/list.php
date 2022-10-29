<!DOCTYPE html>
<html lang="en">

<head>
    <title>CRUD CODEIGNITER SOLUTORIA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
</head>

<body>
    <div class="container"><br /><br />
        <div class="row">
            <div class="col-lg-10">
                <h2>CRUD CODEIGNITER SOLUTORIA</h2>
            </div>
            <div class="col-lg-2">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                    Agregar +
                </button>
            </div>
        </div>

        <table class="table table-bordered table-striped" id="indicadorTable">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nombre</th>
                    <th>Codigo</th>
                    <th>Unidad Medida</th>
                    <th>Valor</th>
                    <th>Fecha</th>
                    <th width="280px">Accion</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($indicador_detail as $row) {
                ?>
                    <tr id="<?php echo $row['id']; ?>">
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['nombreIndicador']; ?></td>
                        <td><?php echo $row['codigoIndicador']; ?></td>
                        <td><?php echo $row['unidadMedidaIndicador']; ?></td>
                        <td><?php echo $row['valorIndicador']; ?></td>
                        <td><?php echo $row['fechaIndicador']; ?></td>
                        <td>
                            <a data-id="<?php echo $row['id']; ?>" class="btn btn-primary btnEdit">Edit</a>
                            <a data-id="<?php echo $row['id']; ?>" class="btn btn-danger btnDelete">Delete</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">Agregar un Indicador</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="addIndicador" name="addIndicador" action="<?php echo site_url('/store'); ?>" method="post">
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="txtNombreIndicador">Nombre Indicador:</label>
                                <input type="text" class="form-control" id="txtNombreIndicador" placeholder="Ingresa Nombre Indicador" name="txtNombreIndicador">
                            </div>

                            <div class="form-group">
                                <label for="txtCodigoIndicador">Codigo Indicador</label>
                                <input type="text" class="form-control" id="txtCodigoIndicador" placeholder="Ingresa Codigo Indicador" name="txtCodigoIndicador">
                            </div>


                            <div class="form-group">
                                <label for="txtUnidadMedida">Unidad de medida:</label>
                                <input type="text" class="form-control" id="txtUnidadMedida" placeholder="Ingresa Unidad de medida" name="txtUnidadMedida">
                            </div>


                            <div class="form-group">
                                <label for="txtValor">Valor:</label>
                                <input type="text" class="form-control" id="txtValor" placeholder="Ingresa el Valor" name="txtValor">
                            </div>

                            <div class="form-group">
                                <label for="txtFecha">Fecha:</label>
                                <input type="text" class="form-control" id="txtFecha" placeholder="Ingresa Fecha" name="txtFecha">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Agregar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">Actualizar Indicador</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="updateIndicador" name="updateIndicador" action="<?php echo site_url('/update'); ?>" method="post">
                        <div class="modal-body">
                            <input type="hidden" name="hdnIndicadorId" id="hdnIndicadorId" />
                            <div class="form-group">
                                <label for="txtNombreIndicador">Nombre Indicador:</label>
                                <input type="text" class="form-control" id="txtNombreIndicador" placeholder="Ingresa Nombre Indicador" name="txtNombreIndicador">
                            </div>

                            <div class="form-group">
                                <label for="txtCodigoIndicador">Codigo Indicador</label>
                                <input type="text" class="form-control" id="txtCodigoIndicador" placeholder="Ingresa Codigo Indicador" name="txtCodigoIndicador">
                            </div>


                            <div class="form-group">
                                <label for="txtUnidadMedida">Unidad de medida:</label>
                                <input type="text" class="form-control" id="txtUnidadMedida" placeholder="Ingresa Unidad de medida" name="txtUnidadMedida">
                            </div>


                            <div class="form-group">
                                <label for="txtValor">Valor:</label>
                                <input type="text" class="form-control" id="txtValor" placeholder="Ingresa el Valor" name="txtValor">
                            </div>

                            <div class="form-group">
                                <label for="txtFecha">Fecha:</label>
                                <input type="text" class="form-control" id="txtFecha" placeholder="Ingresa Fecha" name="txtFecha">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <br /><br />
        <div class="row">
            <div class="col-lg-10">
                <h2>GRAFICO UF</h2>
            </div>
            <div class="col-lg-2">
                <input onchange="filterData()" class="form-control" type="date" id="startdate" value="2020-01-01">
                <input onchange="filterData()" class="form-control" type="date" id="enddate" value="2021-12-31">
            </div>
        </div>

        <canvas id="line-chart" width="450" height="200"></canvas>

        <br /><br />
    </div>

    <script>
        $(document).ready(function() {
            $('#indicadorTable').DataTable();

            $("#addIndicador").validate({
                rules: {
                    txtNombreIndicador: "required",
                    txtCodigoIndicador: "required",
                    txtUnidadMedida: "required",
                    txtValor: "required",
                    txtFecha: "required",

                },
                messages: {},

                submitHandler: function(form) {
                    var form_action = $("#addIndicador").attr("action");
                    $.ajax({
                        data: $('#addIndicador').serialize(),
                        url: form_action,
                        type: "POST",
                        dataType: 'json',
                        success: function(res) {
                            $('#addIndicador')[0].reset();
                            $('#addModal').modal('hide');
                            $('#indicadorTable').DataTable().row.add([res.data.id, res.data.nombreIndicador, res.data.codigoIndicador, res.data.unidadMedidaIndicador, res.data.valorIndicador, res.data.fechaIndicador, '<td><a data-id="' + res.data.id + '" class="btn btn-primary btnEdit">Edit</a>  <a data-id="' + res.data.id + '" class="btn btn-danger btnDelete">Delete</a></td>']).draw();
                        },
                        error: function(data) {}
                    });
                },
            });

            $('body').on('click', '.btnEdit', function() {
                var indicador_id = $(this).attr('data-id');
                $.ajax({
                    url: 'indicador/edit/' + indicador_id,
                    type: "GET",
                    dataType: 'json',
                    success: function(res) {
                        $('#updateModal').modal('show');
                        $('#updateIndicador #hdnIndicadorId').val(res.data.id);
                        $('#updateIndicador #txtNombreIndicador').val(res.data.nombreIndicador);
                        $('#updateIndicador #txtCodigoIndicador').val(res.data.codigoIndicador);
                        $('#updateIndicador #txtUnidadMedida').val(res.data.unidadMedidaIndicador);
                        $('#updateIndicador #txtValor').val(res.data.valorIndicador);
                        $('#updateIndicador #txtFecha').val(res.data.fechaIndicador);
                    },
                    error: function(data) {}
                });
            });

            $("#updateIndicador").validate({
                rules: {
                    txtNombreIndicador: "required",
                    txtCodigoIndicador: "required",
                    txtUnidadMedida: "required",
                    txtValor: "required",
                    txtFecha: "required",
                },
                messages: {},
                submitHandler: function(form) {
                    var form_action = $("#updateIndicador").attr("action");
                    $.ajax({
                        data: $('#updateIndicador').serialize(),
                        url: form_action,
                        type: "POST",
                        dataType: 'json',
                        success: function(res) {

                            var indicador = '<td>' + res.data.id + '</td>';
                            indicador += '<td>' + res.data.nombreIndicador + '</td>';
                            indicador += '<td>' + res.data.codigoIndicador + '</td>';
                            indicador += '<td>' + res.data.unidadMedidaIndicador + '</td>';
                            indicador += '<td>' + res.data.valorIndicador + '</td>';
                            indicador += '<td>' + res.data.fechaIndicador + '</td>';
                            indicador += '<td><a data-id="' + res.data.id + '" class="btn btn-primary btnEdit">Edit</a>  <a data-id="' + res.data.id + '" class="btn btn-danger btnDelete">Delete</a></td>';
                            $('#indicadorTable tbody #' + res.data.id).html(indicador);
                            $('#addIndicador')[0].reset();
                            $('#updateModal').modal('hide');
                        },
                        error: function(data) {}
                    });
                }
            });

            $('body').on('click', '.btnDelete', function() {
                var indicador_id = $(this).attr('data-id');
                $.get('indicador/delete/' + indicador_id, function(data) {
                    var table = $('#indicadorTable').DataTable();
                    var indexes = table
                        .rows()
                        .indexes()
                        .filter(function(value, index) {
                            return indicador_id === table.row(value).data()[0];
                        });
                    table.rows(indexes).remove().draw();

                });
            });
        });
    </script>
    <script>
        const labels = [<?php
                        echo $fecha;
                        ?>];
        const datapoints = [<?php
                            echo $valor;
                            ?>];
        const lineChart = new Chart(document.getElementById("line-chart"), {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    data: datapoints,
                    label: "Valor",
                    borderColor: "#3e95cd",
                    fill: false
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Valores UF'
                }
            },
        });

        function filterData() {
            const labels2 = [...labels];
            const startdate = document.getElementById('startdate');
            const enddate = document.getElementById('enddate');

            var indexstartdate = labels2.indexOf(startdate.value);

            if (indexstartdate == -1) {
                var d1 = new Date(startdate.value);
                for (let index = 0; index < labels2.length; index++) {
                    var d2 = new Date(labels2[index]);
                    if (d1 < d2) {
                        indexstartdate = labels2.indexOf(labels2[index]);

                        break;
                    }
                }
            }
            var indexenddate = labels2.indexOf(enddate.value);
            if (indexenddate == -1) {
                var d1 = new Date(enddate.value);
                var d2 = new Date(labels2[labels2.length - 1]);
                if (d1 > d2) {
                    indexenddate = labels2.indexOf(labels2[labels2.length - 1]);

                }


            }

            const filterDate = labels2.slice(indexstartdate, indexenddate + 1);
            lineChart.config.data.labels = filterDate;
            const datapoints2 = [...datapoints];
            const filterDataPoints = datapoints2.slice(indexstartdate, indexenddate + 1);
            lineChart.config.data.datasets[0].data = filterDataPoints;

            lineChart.update();
        }
    </script>
</body>

</html>