<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';
use GuzzleHttp\Client;

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->_client = new Client([
			'base_uri' => 'http://dev.farizdotid.com/api/daerahindonesia/',
		]);
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function get_provinsi() {
		$response = $this->_client->request('GET','provinsi');
		$result = json_decode($response->getBody()->getContents(),TRUE);
		echo json_encode($result['provinsi']);
	}

	public function get_kabupaten() {
		$id_provinsi = $this->input->get('id_provinsi');
		$response = $this->_client->request('GET','kota?id_provinsi='.$id_provinsi);
		$result = json_decode($response->getBody()->getContents(),TRUE);
		echo json_encode($result['kota_kabupaten']);
	}

	public function get_kecamatan() {
		$id_kabupaten = $this->input->get('id_kabupaten');
		$response = $this->_client->request('GET','kecamatan?id_kota='.$id_kabupaten);
		$result = json_decode($response->getBody()->getContents(),TRUE);
		echo json_encode($result['kecamatan']);
	}

	public function get_kelurahan() {
		$id_kecamatan = $this->input->get('id_kecamatan');
		$response = $this->_client->request('GET','kelurahan?id_kecamatan='.$id_kecamatan);
		$result = json_decode($response->getBody()->getContents(),TRUE);
		echo json_encode($result['kelurahan']);
	}
}
