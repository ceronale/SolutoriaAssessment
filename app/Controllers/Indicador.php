<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\IndicadorModel;

class indicador extends Controller
{


    public function index()
    {
        helper(['curl']);

        $rest_api_base_url = 'https://postulaciones.solutoria.cl';

        $post_endpoint = '/api/acceso';

        $request_data = json_encode(array('userName' => 'alexanderceron16xwvpp_fjk@indeedemail.com', "flagJson" => true));

        $token = getToken($rest_api_base_url . $post_endpoint, $request_data);

        $data['token'] = $token;

        $get_endpoint = '/api/indicadores';

        $response = perform_http_request($token, $rest_api_base_url . $get_endpoint);

        $data['indicadores'] = $response;

        $modelArray = new IndicadorModel();
        $save = $modelArray->insert_batch(json_decode(($data['indicadores'])));

        $model = new IndicadorModel();

        $data['indicador_detail'] = $model->orderBy('id', 'DESC')->findAll();

        $modelChart = new IndicadorModel();

        $var = $modelChart->where('nombreIndicador', 'UNIDAD DE FOMENTO (UF)')->orderBy('fechaIndicador', 'DESC')->findAll();

        foreach ($var as $row) {
            $data['fecha'] = "'" . $row['fechaIndicador'] . "'," . $data['fecha'];
            $data['valor'] = "" . $row['valorIndicador'] . "," . $data['valor'];
        }

        return view('list', $data);
    }




    public function store()
    {
        helper(['form', 'url']);

        $model = new IndicadorModel();

        $data = [
            'nombreIndicador' => $this->request->getVar('txtNombreIndicador'),
            'codigoIndicador'  => $this->request->getVar('txtCodigoIndicador'),
            'unidadMedidaIndicador'  => $this->request->getVar('txtUnidadMedida'),
            'valorIndicador'  => $this->request->getVar('txtValor'),
            'fechaIndicador'  => $this->request->getVar('txtFecha'),
        ];
        $save = $model->insert_data($data);

        if ($save != false) {
            $data = $model->where('id', $save)->first();
            echo json_encode(array("status" => true, 'data' => $data));
        } else {
            echo json_encode(array("status" => false, 'data' => $data));
        }
    }
    public function edit($id = null)
    {
        $model = new IndicadorModel();

        $data = $model->where('id', $id)->first();

        if ($data) {
            echo json_encode(array("status" => true, 'data' => $data));
        } else {
            echo json_encode(array("status" => false));
        }
    }

    public function update()
    {

        helper(['form', 'url']);

        $model = new IndicadorModel();

        $id = $this->request->getVar('hdnIndicadorId');

        $data = [
            'nombreIndicador' => $this->request->getVar('txtNombreIndicador'),
            'codigoIndicador'  => $this->request->getVar('txtCodigoIndicador'),
            'unidadMedidaIndicador'  => $this->request->getVar('txtUnidadMedida'),
            'valorIndicador'  => $this->request->getVar('txtValor'),
            'fechaIndicador'  => $this->request->getVar('txtFecha'),
        ];

        $update = $model->update($id, $data);
        if ($update != false) {
            $data = $model->where('id', $id)->first();
            echo json_encode(array("status" => true, 'data' => $data));
        } else {
            echo json_encode(array("status" => false, 'data' => $data));
        }
    }

    public function delete($id = null)
    {
        $model = new IndicadorModel();
        $delete = $model->where('id', $id)->delete();
        if ($delete) {
            echo json_encode(array("status" => true));
        } else {
            echo json_encode(array("status" => false));
        }
    }

    public function refresh()
    {
        $model = new IndicadorModel();
        $data['indicador_detail'] = $model->orderBy('id', 'DESC')->findAll();
        return view('list', $data);
    }
}
