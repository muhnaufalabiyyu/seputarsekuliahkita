<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Event extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Event', 'm_event');
    }

    public function index(){
        if(@$_GET['category'] == null){
            $data['event'] = $this->m_event->get()->result();
            $data['title'] = 'Event';
        }
        else {
            $data['title'] = @$_GET['category'];
            $data['event'] = $this->m_event->get(['kategori' => @$_GET['category']])->result();
        }
        template('event/v_event', $data);
    }
}