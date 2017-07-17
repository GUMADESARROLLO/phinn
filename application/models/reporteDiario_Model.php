<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class reporteDiario_Model extends CI_Model
{	
	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function caberaReporte($idReporteDiario) {
		$query=$this->db->query("CALL cabeceraReporteDiario(".$idReporteDiario.")");
		if ($query->num_rows()>0) {
			return $query->result_array();
		} else {
			return false;
		}
	}

    public function cambiarEstadoReporteD($idRtpD, $estado) {
       	$data = array('Estado' => (int)$estado);
	    $this->db->where('IdReporteDiario =', $idRtpD);
	    $query=$this->db->update('reporte_diario', $data);
	    echo $query;
    }

    public function eliminarRptDiario($idReporteDiario){
    	$this->db->where('IdReporteDiario=', $idReporteDiario);
		$query=$this->db->get('cargas_pulper');
		if ($query->num_rows()>0) {
			echo "TRUE";
		} else {
			$this->db->where('IdReporteDiario=', $idReporteDiario);
			$query=$this->db->get('horas_molienda');
			if ($query->num_rows()>0) {
				echo "TRUE";
			}else {
				$this->db->where('IdReporteDiario=', $idReporteDiario);
				$query=$this->db->get('pasta');
				if ($query->num_rows()>0) {
					echo "TRUE";
				}else {
					$this->db->where('IdReporteDiario=', $idReporteDiario);
					$query=$this->db->get('produccion');
					if ($query->num_rows()>0) {
						echo "TRUE";
					}else {
						$this->db->where('IdReporteDiario=', $idReporteDiario);
						$query=$this->db->get('tiempos_muertos');
						if ($query->num_rows()>0) {
							echo "TRUE";
						}else {
							$this->db->where('IdReporteDiario=', $idReporteDiario);
							$query=$this->db->delete('reporte_diario'); 
							if ($query==1) {
								echo "FALSE";
							}else{
								echo "ERROR";
							}
						}
					}
				}
			}
		}
    }

    public function reporteControlPiso($consecutivo) {
    	$query=$this->db->query("CALL reporteControlPiso('".$consecutivo."')");   	
		if ($query->num_rows()>0) {
			$res = $query->result_array();
			$query->free_result();
			$query->next_result();
			return $res;
		} else {
			$query->free_result();
			$query->next_result();
			return false;
		}
    }

    public function llenaComboOrdenProd() {
    	$this->db->select('IdOrden');
    	$this->db->select('NoOrden');
    	$query=$this->db->get('orden_produccion');
    	if ($query->num_rows()>0) {
    		return $query->result_array();
    	}else {
    		return false;
    	}
    }

    public function filtrandoOrdenesTrabajo($noOrden) {
    	$json=array();
    	$this->db->select('IdReporteDiario');
    	$this->db->select('consecutivo');
    	$this->db->select('Turno');
    	$this->db->where('NoOrder=', $noOrden);
    	$query=$this->db->get('reporte_diario');
    	if ($query->num_rows()>0) {
    		foreach ($query->result_array() as $key) {
    			if ($key['Turno']==1) {
    				$turno = 'Matutino';
    			}elseif ($key['Turno']==2) {
    				$turno = 'Vespertino';
    			}
    			$data = array(
    			'IdReporteDiario' => $key['IdReporteDiario'],
    			'consecutivo' => $key['consecutivo'].' / '.$turno
    		);
    			$json[] = $data;
    		}	
    	}
    	echo json_encode($json);
    }

    public function reporteConsoliadoFinal($consecutivo) {
    	$query=$this->db->query("CALL cabeceraConsolidado('".$consecutivo."')");   	
		if ($query->num_rows()>0) {
			$query->next_result();
			return $query->result_array();
			$query->free_result();
		} else {
			$query->free_result();
			$query->next_result();
			return false;
		}
	}
}

?>