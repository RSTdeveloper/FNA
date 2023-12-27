<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMaster extends Model
{
    public function ReadCallCenterConsultarObligacionesCliente($schema, $campoObligacion, $id_cliente)
    {
        try {
            // $sql = "SELECT *  FROM public.obligacionespublic as o
            $sql = "SELECT *  FROM fnalanding.obligaciones as o
            WHERE o.identificacion LIKE '%$id_cliente%' ORDER BY o.dias_mora DESC; ";
            //CHARINDEX('$id_cliente',o.identificacion) > 0 ;";
            //             d.identificacion = '$id_cliente';";
            $query = $this->db->query($sql);
            $resQuery = $query->getResultArray();
            $res = (count($resQuery) >= 0) ? $resQuery : 0;
            return $res;
        } catch (\Exception $e) {
            //throw $th;
            return 0;
            //die('ERROR DE CAMPOS: '.$e->getMessage());
        }
    }

    public function ReadCallCenterConsultarObligaciones($schema, $campoObligacion, $id_cliente)
    {
        try {
            // $sql = "SELECT *  FROM public.obligacionespublic as o
            $sql = "SELECT *  FROM fnalanding.obligaciones as o
            WHERE o.identificacion LIKE '%$id_cliente%' ORDER BY o.dias_mora DESC; ";
            //CHARINDEX('$id_cliente',o.identificacion) > 0 ;";
            //             d.identificacion = '$id_cliente';";
            $query = $this->db->query($sql);
            $resQuery = $query->getResultArray();
            $res = (count($resQuery) >= 0) ? $resQuery : 0;
            return $res;
        } catch (\Exception $e) {
            //throw $th;
            return 0;
            //die('ERROR DE CAMPOS: '.$e->getMessage());
        }
    }
}
