<?php

class Upload extends My_Controller {

        public function __construct()
        {
                parent::__construct();
        }

        public function do_upload()
        {               

                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png|mp4';
                $config['max_size']             = 2560;
                $config['max_width']            = 2560;
                $config['max_height']           = 2560;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $data = array('status_code' => '200','data' => array('error' => $this->upload->display_errors()));
                        $this->_resp($data);
                        // $this->load->view('upload_form', $error);
                }
                else
                {
                         $data = array('status_code' => '200','data' =>array('upload_data' => $this->upload->data()));
                        $this->_resp($data);
                        // $this->load->view('upload_success', $data);
                }
        }
}