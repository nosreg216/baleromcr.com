<?php
class Download_model extends CI_Model {


    public function zip_album($albumId)
    {
        $this->load->library('zip');

        // Get the item's Name
        $query = $this->db->get_where('db_album', array('album_id' => $albumId));
        $info = $query->row(); 

        // Define Zip Parameters
        $title = $info->album_title;
        $path = "data/music/albums/$albumId";

        // Add songs to the file
        $this->zip->read_dir($path);    

        // Download the ZIP file
        $this->zip->download($title);
    }

    public function zip_track($trackId)
    {
        $this->load->library('zip');

        // Get the item's Name
        $query = $this->db->get_where('db_album_track', array('track_id' => $trackId));
        $info = $query->row(); 

        // Define Zip Parameters
        $title = $info->track_title;
        $albumId = $info->track_album;
        $path = "data/music/albums/$albumId/$title";
        $cover = "data/music/albums/$albumId/cover.png";

        // Add songs to the file
        $this->zip->read_file($path);
        $this->zip->read_file($cover);
        
        // Download the ZIP file
        $this->zip->download($title);
    }

    public function zip_song($songId)
    {
        $this->load->library('zip');

        // Get the item's Name
        $query = $this->db->get_where('db_song', array('song_id' => $songId));
        $info = $query->row(); 

        // Define Zip Parameters
        $title = $info->song_title;
        $path = "data/music/songs/$songId";

        // Add songs to the file
        $this->zip->read_dir($path);    
        
        // Download the ZIP file
        $this->zip->download($title);
    }

    public function validate($itemType, $itemId, $orderId){

        $this->db->where(
            array(
            'order_id' => $orderId,
            'item_id' => $itemId,
            'item_type' => $itemType
            )
        );
        $this->db->from('db_order_item');
        $count = $this->db->count_all_results(); 

        return ($count > 0) ? TRUE : FALSE;
    }


}
