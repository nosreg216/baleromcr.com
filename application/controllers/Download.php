<?php
class Download extends CI_Controller {

	public function download()
	{
		$this->load->model('download_model');

		$itemType = $this->input->post('item_type');
		$itemId = $this->input->post('item_id');
		$orderId = $this->input->post('order_id');

		switch ($item_type) {
			case 1: $this->download_model->zip_album($itemId);
			case 2: $this->download_model->zip_track($itemId);
			case 3: $this->download_model->zip_song($itemId);
			case 4: $this->download_model->zip_video($itemId);
			case 5: $this->download_model->zip_bundle($itemId);
		}
	}


}