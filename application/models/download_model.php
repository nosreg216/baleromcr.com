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

        $path = "data/music/albums/$albumId/$title.mp3";
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
        $path = "data/music/songs/$songId/$title.mp3";
        $cover = "data/music/songs/$songId/cover.png";

        // Add songs to the file
        $this->zip->read_file($path);
        $this->zip->read_file($cover);
        
        // Download the ZIP file
        $this->zip->download($title);
    }

    public function zip_video($videoId)
    {
       $this->load->library('zip');

        // Get the item's Name
        $query = $this->db->get_where('db_video', array('video_id' => $videoId));
        $info = $query->row(); 

        // Define Zip Parameters
        $title = $info->song_title;

        $path = "data/music/songs/$videoId/$title.$format";
        $cover = "data/music/songs/$videoId/cover.png";

        // Add songs to the file
        $this->zip->read_file($path);
        $this->zip->read_file($cover);
        
        // Download the ZIP file
        $this->zip->download($title);
    }

    /*
    | Validates if the user had exceeded the maximum number of
    | downloads allowed for the item.
    | @param itemId: Identifier code of the Item (PK).
    | @param itemType: Identifier type of the Item (PK).
    | @param orderId: Identifier code of the Order.
    | @returns: Boolean. True in case of success, False otherwise.
    */
    public function validate($itemType, $itemId, $orderId){

        $this->db->select('downloaded');
        $this->db->from('db_order_item');
        $this->db->where(
            array(
            'order_id' => $orderId,
            'item_id' => $itemId,
            'item_type' => $itemType
            )
        );
        $query = $this->db->get();
        $count = $query->row();
        return $count->downloaded;
    }

    public function register_download($itemType, $itemId, $orderId, $downloaded){
        $data = array('downloaded' => $downloaded+1);
        $this->db->where(
            array(
            'order_id' => $orderId,
            'item_id' => $itemId,
            'item_type' => $itemType
            )
        );
        return $this->db->update('db_order_item', $data);
    }

    public function countDownloads($range)
    {
        $this->db->select_sum('downloaded', 'total');
        $query = $this->db->get('db_order_item'); 
    }


}