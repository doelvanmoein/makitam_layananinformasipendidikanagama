<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model');
        $this->load->library(array('session', 'pagination'));	
        $this->load->helper('text');
    }

    public function index()
    {
        // Pagination config
        // $config['base_url'] = site_url('News/index');
        // $config['total_rows'] = $this->Model->count_berita();
        // echo "<pre>"; print_r($this->db->last_query()); echo "</pre>";

        $config['per_page'] = 9;
        $config['uri_segment'] = 3;

        // Bootstrap 4 Pagination Style
        // $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
        // $config['full_tag_close'] = '</ul>';
        // $config['attributes'] = ['class' => 'page-link'];
        // $config['first_link'] = false;
        // $config['last_link'] = false;
        // $config['prev_link'] = '&laquo;';
        // $config['next_link'] = '&raquo;';
        // $config['prev_tag_open'] = '<li class="page-item">';
        // $config['prev_tag_close'] = '</li>';
        // $config['next_tag_open'] = '<li class="page-item">';
        // $config['next_tag_close'] = '</li>';
        // $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        // $config['cur_tag_close'] = '</a></li>';
        // $config['num_tag_open'] = '<li class="page-item">';
        // $config['num_tag_close'] = '</li>';

        // $this->pagination->initialize($config);

        // $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        // $data['berita'] = $this->Model->get_all_berita($config['per_page'], $page);
        // $data['pagination'] = $this->pagination->create_links();

        // $this->load->view('berita/index', $data);

        // config
		$this->db->from('t_berita');
        $this->db->where('berita_status', 'Publish');
		$this->db->order_by("insert_timestamp");
		$config['base_url'] = base_url('News/index');
		$config['total_rows'] = $this->db->count_all_results();
		$config['per_page'] = 3;
		$data['start'] = $this->uri->segment(3);
		$data['berita'] = $this->Model->get_all_berita($config['per_page'], $data['start']);

        $data['path_image'] = $this->config->item('url').$this->config->item('path_news_image');

		// var_dump($data['worshiphouseList']);

		// initialize
		$this->pagination->initialize($config);

        $data['unggulan'] = $this->Model->get_berita_unggulan();
        // echo "<pre>"; print_r($this->db->last_query()); echo "</pre>";
        // var_dump($data['unggulan']);

        $data['badge_classification'] = [
            'Pengumuman' => 'badge-warning',
            'Kegiatan'   => 'badge-info',
            'Layanan'    => 'badge-success',
            'Informasi'  => 'badge-primary',
            // 'Agenda'     => 'badge-warning'
        ];


        $data['active_menu'] = 'news';

		$this->load->view('patch/header');
		$this->load->view('patch/menu', $data);
		$this->load->view('news_2');
		$this->load->view('patch/footer');
    }

    public function detail()
    {

        $post = $this->uri->segment(3);
        // var_dump($post); die;
        $data['berita'] = $this->Model->get_berita_by_id($post);

        $data['badge_classification'] = [
            'Pengumuman' => 'badge-warning',
            'Kegiatan'   => 'badge-info',
            'Layanan'    => 'badge-success',
            'Informasi'  => 'badge-primary',
            // 'Agenda'     => 'badge-warning'
        ];

        $data['path_image'] = $this->config->item('url').$this->config->item('path_news_image');

    //     if (!$data['berita']) {
    //         show_404();
    //     }

        // $this->load->view('berita/detail', $data);

        // echo "<pre>"; print_r($data); echo "</pre>";

        $this->load->view('patch/header');
		$this->load->view('patch/menu', $data);
		$this->load->view('news_detail');
		$this->load->view('patch/footer');
    }
}
