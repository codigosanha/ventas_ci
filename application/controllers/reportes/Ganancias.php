<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ganancias extends CI_Controller {
	private $permisos;
	public function __construct(){
		parent::__construct();
		$this->permisos = $this->backend_lib->control();
		$this->load->model("Ventas_model");
	}

	public function index(){
		$fechainicio = date("Y-m-d");
		$fechafin = date("Y-m-d");
		if ($this->input->post("buscar")) {
			$fechainicio = $this->input->post("fechainicio");
			$fechafin = $this->input->post("fechafin");
		}
		
		$productos = $this->Ventas_model->getGanancias($fechainicio,$fechafin);
		
		$data = array(
			"productos" => $productos,
			"fechainicio" => $fechainicio,
			"fechafin" => $fechafin
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/reportes/ganancias",$data);
		$this->load->view("layouts/footer");
	}

	public function pdf(){
		$this->load->library('pdfgenerator');
        $fechainicio = $this->input->post("fechainicio");
		$fechafin = $this->input->post("fechafin");
		
		$data = array(
			"productos" =>  $this->Ventas_model->getGanancias($fechainicio,$fechafin),
			"fechainicio" => $fechainicio,
			"fechafin" => $fechafin
			
		);
        $html = $this->load->view('admin/reportes/ganancias_pdf',$data, true);
        $filename = "Reporte de Ganancia";
        //Aqui es donde se genera el pdf
        $this->pdfgenerator->generate($html, $filename, true, 'A4', 'landscape');
	}
}