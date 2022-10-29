<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class IndicadorModel extends Model
{
    protected $table = 'indicadorfinanciero';

    protected $allowedFields = ['nombreIndicador', 'codigoIndicador', 'unidadMedidaIndicador', 'valorIndicador', 'fechaIndicador'];

    public function __construct()
    {
        parent::__construct();
        //$this->load->database();
        $db = \Config\Database::connect();
        $builder = $db->table('indicadorfinanciero');
    }

    public function insert_data($data)
    {
        if ($this->db->table($this->table)->insert($data)) {
            return $this->db->insertID();
        } else {
            return false;
        }
    }

    public function insert_batch($data)
    {
        
        if ($this->db->table($this->table)->insertBatch($data)) {
            return $this->db->insertID();
        } else {
            return false;
        }
    }
}
