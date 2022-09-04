<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Upload extends CI_Controller {

    public function __construct()  {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->view('header');
    }

    public function form(){
        $this->load->view('upload_form');
        $this->load->view('footer');
    }

    public function file_data(){
        //validate the form data 

        $this->form_validation->set_rules('pic_title', 'Picture Title', 'required');

        if ($this->form_validation->run() == FALSE){
            $this->load->view('upload_form');
        }else{
            
            //get the form values
            $data['pic_title'] = $this->input->post('pic_title', TRUE);
            $data['pic_desc'] = $this->input->post('pic_desc', TRUE);

            //file upload code 
            //set file upload settings 
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 100;

            $this->upload->initialize($config);

            if ( ! $this->upload->do_upload('pic_file')){
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('upload_form', $error);
            }else{

                //file is uploaded successfully
                //now get the file uploaded data 
                $upload_data = $this->upload->data();

                //get the uploaded file name
                $data['pic_file'] = $upload_data['file_name'];
                $data['user_id'] = $this->session->userdata('user')['login_id'];
                //store pic data to the db
                $this->user_model->store_pic_data($data);
                $this->session->set_flashdata('success','Your file was successfully uploaded!');
                redirect('upload/form');
            }
            $this->load->view('footer');
        }
    }
}