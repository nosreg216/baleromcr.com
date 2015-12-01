<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

public function add_banner()
{
	$this->load->model('banner_model');

	#Banner info
	$banner_data = array(
		'banner_type' => $this->input->post('banner_type'),
		'banner_desc' => $this->input->post('banner_desc')
		);
	$banner_id = $this->banner_model->add($banner_data);

	/* Load the Upload class */
	$this->load->library('upload');
	/* Upload the album cover */
	$this->upload_banner($banner_id);
	
	/* Proceed to upload songs in the editor */
	header("Location: " . base_url() . "admin/banners/");
}

public function delete_banner($banner_id)
{
	$this->load->model("banner_model");
	$this->banner_model->delete($banner_id);
	
	$image_file = "data/banners/$banner_id.jpg";
	$video_file = "data/banners/$banner_id.mp4";

	/* Delete the banner file */
	if (is_file($image_file)) {
		unlink($image_file);
	}
	if (is_file($video_file)) {
		unlink($video_file);
	}
	header("Location: " . base_url() . "admin/banners");
}

	public function upload_banner($banner_id)
	{
		$config['upload_path'] = 'data/banners/';
		$config['allowed_types'] = '*';
		$config['file_name'] = $banner_id;
		$config['overwrite'] = TRUE;

		$this->upload->initialize($config);
	    return $this->upload->do_upload('banner_file');
	}
}