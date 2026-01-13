<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library(array('session', 'pagination'));		
		$this->load->helper('session');
		$this->user = $this->session->userdata('user_splkb');
	}

	public function index()
	{
		// $this->load->view('home');
		$data['active_menu'] = 'dashboard';

		$this->load->view('patch/header');
		$this->load->view('patch/menu', $data);
		$this->load->view('dashboard');
		$this->load->view('patch/footer');
	}

	public function data() {
		$data = array();

		$data['active_menu'] = 'data';
		$data['arr_religion'] = array('Islam', 'Kristen Protestan', 'Kristen Katolik', 'Hindu', 'Budha', 'Kongkhucu');
		$data['arr_worshiphouse_type'] = array('Masjid', 'Musholla', 'Gereja', 'Pura', 'Vihara', 'Klenteng/Litang');

		// config
		$this->db->from('t_worshiphouse');
		$this->db->order_by("worshiphouse_name");
		$config['base_url'] = base_url('Home/data');
		$config['total_rows'] = $this->db->count_all_results();
		$config['per_page'] = 5;
		$data['start'] = $this->uri->segment(3);
		$data['worshiphouseList'] = $this->Model->getWorshiphouseList($config['per_page'], $data['start']);

		// var_dump($data['worshiphouseList']);

		// initialize
		$this->pagination->initialize($config);

		$this->load->view('patch/header');
		$this->load->view('patch/menu', $data);
		$this->load->view('data');
		$this->load->view('patch/footer');
	}

	public function madrasah() {
		$data = array();

		$data['active_menu'] = 'data';
		$data['arr_religion'] = array('Islam', 'Kristen Protestan', 'Kristen Katolik', 'Hindu', 'Budha', 'Kongkhucu');
		$data['arr_worshiphouse_type'] = array('Masjid', 'Musholla', 'Gereja', 'Pura', 'Vihara', 'Klenteng/Litang');

		// config
		$this->db->from('t_madrasah');
		$this->db->order_by("madrasah_name");
		$config['base_url'] = base_url('Home/madrasah');
		$config['total_rows'] = $this->db->count_all_results();
		$config['per_page'] = 5;
		$data['start'] = $this->uri->segment(3);
		$data['madrasahList'] = $this->Model->getMadrasahList($config['per_page'], $data['start']);

		// var_dump($data['madrasahList']);

		// initialize
		$this->pagination->initialize($config);

		$this->load->view('patch/header');
		$this->load->view('patch/menu', $data);
		$this->load->view('madrasah');
		$this->load->view('patch/footer');
	}

	public function pontren() {
		$data = array();

		$data['active_menu'] = 'data';
		$data['arr_religion'] = array('Islam', 'Kristen Protestan', 'Kristen Katolik', 'Hindu', 'Budha', 'Kongkhucu');
		$data['arr_worshiphouse_type'] = array('Masjid', 'Musholla', 'Gereja', 'Pura', 'Vihara', 'Klenteng/Litang');

		// config
		$this->db->from('t_madrasah');
		$this->db->where('madrasah_is_pontren', 1);
		$this->db->order_by("madrasah_name");
		$config['base_url'] = base_url('Home/pontren');
		$config['total_rows'] = $this->db->count_all_results();
		$config['per_page'] = 5;
		$data['start'] = $this->uri->segment(3);
		$data['pontrenList'] = $this->Model->getPontrenList($config['per_page'], $data['start']);

		// var_dump($data['madrasahList']);

		// initialize
		$this->pagination->initialize($config);

		$this->load->view('patch/header');
		$this->load->view('patch/menu', $data);
		$this->load->view('pontren');
		$this->load->view('patch/footer');
	}

	public function tpa() {
		$data = array();

		$data['active_menu'] = 'data';
		$data['arr_religion'] = array('Islam', 'Kristen Protestan', 'Kristen Katolik', 'Hindu', 'Budha', 'Kongkhucu');
		$data['arr_worshiphouse_type'] = array('Masjid', 'Musholla', 'Gereja', 'Pura', 'Vihara', 'Klenteng/Litang');

		// config
		$this->db->from('t_madrasah');
		$this->db->where('madrasah_is_tpa', 1);
		$this->db->order_by("madrasah_name");
		$config['base_url'] = base_url('Home/tpa');
		$config['total_rows'] = $this->db->count_all_results();
		$config['per_page'] = 5;
		$data['start'] = $this->uri->segment(3);
		$data['tpaList'] = $this->Model->getTpaList($config['per_page'], $data['start']);

		// var_dump($data['madrasahList']);

		// initialize
		$this->pagination->initialize($config);

		$this->load->view('patch/header');
		$this->load->view('patch/menu', $data);
		$this->load->view('tpa');
		$this->load->view('patch/footer');
	}

	public function diniyah() {
		$data = array();

		$data['active_menu'] = 'data';
		$data['arr_religion'] = array('Islam', 'Kristen Protestan', 'Kristen Katolik', 'Hindu', 'Budha', 'Kongkhucu');
		$data['arr_worshiphouse_type'] = array('Masjid', 'Musholla', 'Gereja', 'Pura', 'Vihara', 'Klenteng/Litang');

		// config
		$this->db->from('t_madrasah');
		$this->db->where('madrasah_is_pd', 1);
		$this->db->order_by("madrasah_name");
		$config['base_url'] = base_url('Home/tpa');
		$config['total_rows'] = $this->db->count_all_results();
		$config['per_page'] = 5;
		$data['start'] = $this->uri->segment(3);
		$data['diniyahList'] = $this->Model->getDiniyahList($config['per_page'], $data['start']);

		// var_dump($data['madrasahList']);

		// initialize
		$this->pagination->initialize($config);

		$this->load->view('patch/header');
		$this->load->view('patch/menu', $data);
		$this->load->view('diniyah');
		$this->load->view('patch/footer');
	}

	public function detail() 
	{
		$post = $this->uri->segment(3);
		// var_dump($post);

		if (!empty($post))
		{
			$detail = $this->Model->detailData(array('worshiphouse_id' => $post), 't_worshiphouse');
			$data = array_shift($detail);
		}

		echo json_encode($data);
	}

	public function news()
	{
		$data['active_menu'] = 'news';

		$this->load->view('patch/header');
		$this->load->view('patch/menu', $data);
		$this->load->view('news');
		$this->load->view('patch/footer');
	}

	public function statistic()
	{
		// Doughnut Chart
		$data_doughnut_chart = $this->Model->getDoughnutchart();
		$processed_doughnut_chart = $this->generateDoughnutChart($data_doughnut_chart);
		$data['dataset_doughnutchart'] = json_encode($processed_doughnut_chart);

		// Bar Chart
		$data_bar_chart = $this->Model->getWorshiphouseByKecamatan();
		$processed_bar_chart = $this->generateBarChart($data_bar_chart);
		$data['dataset_barchart'] = json_encode($processed_bar_chart);

		// Scatter Chart
		$data_scatter_chart = $this->Model->getWorshiphouseForScatterChart();
		$processed_scatter_chart = $this->generateScatterChart($data_scatter_chart);
		$data['dataset_scatterchart'] = json_encode($processed_scatter_chart);

		// Line Chart
		$data_line_chart = $this->Model->getWorshiphouseForLinechart();
		$processed_line_chart = $this->generateLineChart($data_line_chart);
		$data['dataset_linechart'] = json_encode($processed_line_chart);

		$data['active_menu'] = 'statistic';

		$this->load->view('patch/header');
		$this->load->view('patch/menu', $data);
		$this->load->view('statistic');
		$this->load->view('patch/footer');
	}

	private function generateDoughnutChart($data) {
		$result = [
			'labels' => [], // nama agama
			'datasets' => [] // data yang akan ditampilkan
		];

		if (!empty(array_column($data, 'religion'))) {
			foreach (array_column($data, 'religion') as $key => $val) {
				$religion[] = "'".$val."'";
				$random_color[] = sprintf('#%06X', mt_rand(0, 0xFFFFFF)); // warna acak
			}

			$total_data = array_sum(array_column($data, 'total'));

			foreach (array_column($data, 'total') as $key => $val) {
				$percentage[] = (($val/$total_data)*100);
			}

			$result['labels'] = array_column($data, 'religion');
			$result['datasets'][] = [
				'label' => 'Persentase Rumah Ibadah Berdasarkan Agama',
				'data' => $percentage,
				'backgroundColor' => $random_color
			];
		}

		return $result;


	}

	private function generateBarChart($data) {
		$result = [
			'labels' => [], // kecamatan sebagai sumbu X
			'datasets' => [] // Data untuk tiap jenis rumah ibadah
		];

		// Ambil semua label kecamatan unik
		$labels = [];
		foreach ($data as $row) {
			if (!in_array($row['kecamatan'], $labels)) {
				$labels[] = $row['kecamatan'];
			}
		}
		$result['labels'] = $labels;

		// Ambil semua jenis rumah ibadah unik
		$types = [];
		foreach ($data as $row) {
			if (!in_array($row['worshiphousetype_name'], $types)) {
				$types[] = $row['worshiphousetype_name'];
			}
		}

		// Buat dataset untuk tiap jenis rumah ibadah
		foreach ($types as $type) {
			$random_color = sprintf('#%06X', mt_rand(0, 0xFFFFFF)); // warna acak
			$dataset = [
				'label' => $type,
				'data' => [],
				'backgroundColor' => $random_color,
				'borderColor' => $random_color,
				'borderWidth' => 1
			];	

			foreach ($labels as $kecamatan) {
				// Cari data berdasarkan kecamatan dan jenis rumah ibadah
				$filtered = array_filter($data, function ($item) use ($kecamatan, $type) {
					return $item['kecamatan'] === $kecamatan && $item['worshiphousetype_name'] === $type;
				});

				// Tambahkan jumlah ke data
				$dataset['data'][] = !empty($filtered) ? array_values($filtered)[0]['total'] : 0;
			}

			$result['datasets'][] = $dataset;
		}

		return $result;
	}

	private function generateScatterChart($data) {
		$result = [];

		// Ambil kecamatan unik
		$kecamatans = [];
		foreach ($data as $row) {
			if (!in_array($row['kecamatan'], $kecamatans)) {
				$kecamatans[] = $row['kecamatan'];
			}
		}

		// Buat dataset untuk tiap kecamatan
		foreach ($kecamatans as $kecamatan) {
			$dataset = [
				'label' => $kecamatan,
				'data' => [],
				'backgroundColor' => sprintf('#%06X', mt_rand(0, 0xFFFFFF)) // warna acak
			];

			foreach ($data as $row) {
				if ($row['kecamatan'] === $kecamatan) {
					$dataset['data'][] = [
						'x' => (int) $row['build_year'], // Tahun sebagai X
						'y' => (int) $row['total'] // Jumlah sebagai Y
					];
				}
			}

			$result[] = $dataset;
		}

		return $result;
	}

	private function process_line_data($data) {
        $result = [
            'labels' => [], // Tahun sebagai sumbu X
            'datasets' => [] // Data untuk tiap jenis rumah ibadah
        ];

        // Ambil semua tahun unik
        $years = [];
        foreach ($data as $row) {
            if (!in_array($row['build_year'], $years)) {
                $years[] = $row['build_year'];
            }
        }
        sort($years); // Urutkan tahun
        $result['labels'] = $years;

        // Ambil semua jenis rumah ibadah unik
        $types = [];
        foreach ($data as $row) {
            if (!in_array($row['worshiphouse_type'], $types)) {
                $types[] = $row['worshiphouse_type'];
            }
        }

        // Buat dataset untuk tiap jenis rumah ibadah
        foreach ($types as $type) {
            $dataset = [
                'label' => $type,
                'data' => [],
                'borderColor' => sprintf('#%06X', mt_rand(0, 0xFFFFFF)), // Warna acak
                'fill' => false
            ];

            foreach ($years as $year) {
                // Cari data berdasarkan tahun dan jenis rumah ibadah
                $filtered = array_filter($data, function ($item) use ($year, $type) {
                    return $item['build_year'] == $year && $item['worshiphouse_type'] === $type;
                });

                // Tambahkan jumlah ke data
                $dataset['data'][] = !empty($filtered) ? array_values($filtered)[0]['total'] : 0;
            }

            $result['datasets'][] = $dataset;
        }

        return $result;
    }

	private function generateLineChart($raw_data) {
		// Ambil daftar tahun unik
		$build_years = array_unique(array_column($raw_data, 'build_year'));
		sort($build_years);
	
		// Ambil daftar jenis rumah ibadah unik
		$types = array_unique(array_column($raw_data, 'worshiphouse_type'));
	
		// Inisialisasi dataset
		$datasets = [];
	
		foreach ($types as $type) {
			$data = [];
			foreach ($build_years as $year) {
				// Cari data untuk kombinasi tahun dan jenis tertentu
				$filtered = array_filter($raw_data, function ($item) use ($type, $year) {
					return $item['worshiphouse_type'] === $type && $item['build_year'] == $year;
				});
				
				// Ambil total, atau 0 jika tidak ada data
				$data[] = !empty($filtered) ? array_values($filtered)[0]['total'] : 0;
			}
			// Tambahkan ke dataset
			$datasets[] = [
				'label' => $type,
				'data' => $data,
				'fill' => false,
				'borderColor' => sprintf('rgba(%d, %d, %d, 1)', rand(0, 255), rand(0, 255), rand(0, 255)),
				'tension' => 0.1
			];
		}
	
		return [
			'labels' => $build_years,
			'datasets' => $datasets
		];
	}

	private function getColorForAgama($agama) {
		$colors = [
			'Islam' => '#3498db',
			'Kristen Protestan' => '#2ecc71',
			'Katolik' => '#f1c40f',
			'Hindu' => '#e74c3c',
			'Buddha' => '#9b59b6',
			'Konghucu' => '#09f',
		];
		return isset($colors[$agama]) ? $colors[$agama] : '#7f8c8d';  // Default gray color
	}
	
	private function getColorForJenis($jenis) {
		$colors = [
			'Masjid' => '#3498db',
			'Musholla' => '#2ecc71',
			'Gereja' => '#f1c40f',
			'Pura' => '#e74c3c',
			'Vihara' => '#9b59b6',
		];
		return isset($colors[$jenis]) ? $colors[$jenis] : '#7f8c8d';  // Default gray color
	}

	// Fungsi untuk memilih warna berdasarkan kecamatan
	private function getColorForKecamatan($kecamatan) {
        $colors = [
            'Barangin' => '#3498db',
            'Lembah Segar' => '#2ecc71',
            'Silungkang' => '#f1c40f',
            'Talawi' => '#e74c3c',
            // Tambahkan warna untuk kecamatan lainnya jika diperlukan
        ];
        return isset($colors[$kecamatan]) ? $colors[$kecamatan] : '#95a5a6';  // Default gray color
    }

    // Fungsi untuk memilih border color berdasarkan kecamatan
    private function getBorderColorForKecamatan($kecamatan) {
        $colors = [
            'Barangin' => '#3498db',
            'Lembah Segar' => '#2ecc71',
            'Silungkang' => '#f1c40f',
            'Talawi' => '#e74c3c',
            // Tambahkan warna untuk kecamatan lainnya jika diperlukan
        ];
        return isset($colors[$kecamatan]) ? $colors[$kecamatan] : '#7f8c8d';  // Default gray border
    }

	public function faq()
	{
		$data['active_menu'] = 'faq';
		$data['arrFaqCategory'] = array(
			array ('id' => '1', 'name' => 'Umum', 'tag' => 'general'),
			array ('id' => '2', 'name' => 'Layanan & Fasilitas', 'tag' => 'facility'),
			array ('id' => '3', 'name' => 'Jadwal Ibadah', 'tag' => 'schedule'),
			array ('id' => '4', 'name' => 'Lokasi & Aksesibilitas', 'tag' => 'location'),
			array ('id' => '5', 'name' => 'Kegiatan Keagamaan', 'tag' => 'activity')
		);
		// echo "<pre>"; print_r($data['arrFaqCategory']); echo "</pre>";
		$data['faqList'] = $this->Model->getFaqList();
		$faqList = $this->Model->getFaqList();
		// var_dump($faqList);
		if (!empty($faqList)) {
			$arrFaqList = array();
			foreach ($faqList as $key => $val) {
				$arrFaqList[$val['worshiphousefaq_category']][] = $val; 
			}

			// echo "<pre>"; print_r($arrFaqList); echo "</pre>";
			$data['arrFaqList'] = $arrFaqList;
		}

		// echo "<pre>"; print_r($arrFaqList); echo "</pre>";

		$this->load->view('patch/header');
		$this->load->view('patch/menu', $data);
		$this->load->view('faq');
		$this->load->view('patch/footer');
	}

	public function login_page()
	{
		$this->load->view('login-page');
	}

	public function profile()
	{
		if (!$this->user)
		{
			redirect(base_url());
		}
		$user = $this->ModelLKB->simpleQuery('t_user', array('user_id' => $this->user))->result_array();
		$data['user'] = $user[0];	

		$this->load->view('user-profile', $data);
	}

	public function profile_user()
	{
		$user = $this->ModelLKB->simpleQuery('t_user', array('user_id' => $this->user))->result_array();
		$data['user'] = $user[0];	

		$this->load->view('profile-user', $data);
	}

	public function user_management()
	{
		$this->load->view('user-management');
	}

	public function lkb_admin()
	{
		$this->load->view('lkb-admin');
	}

	public function lkb_user()
	{
		$this->load->view('lkb-user');
	}

	public function change_password()
	{
		$user = $this::detailUser();

		if ($this->session->userdata('user_type')==1) {
			$data['url'] = base_url('UserPage/admin_page');
			$this->load->view('header-admin', $user);
			$this->load->view('sidebar-admin');
		} else{
			$data['url'] = base_url('UserPage/user_page');
			$this->load->view('header-user', $user);
			$this->load->view('sidebar-user');
		}

		$this->load->view('change-password', $data);
		$this->load->view('footer-admin');
	}

	public function do_change_password()
	{
		$this->form_validation->set_rules('old_password', 'Password Lama', 'callback_checkOldPass');
		$this->form_validation->set_rules('new_password', 'Password Baru', 'required|min_length[6]|callback_checkNewPass');
		$this->form_validation->set_rules('re_new_password', 'Re-Password Baru', 'required|matches[new_password]');

		if ($this->form_validation->run()==FALSE)
		{
			$status=0; $locate = 0;
			$msg= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
						'.validation_errors().'
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>';
		} else{
			$newPass = $this->security->xss_clean($this->input->post('new_password'));
			$params = array('user_password' => md5($newPass));

			$result = $this->ModelLKB->updateData('t_user', $params, array('user_id' => $this->user));

			if ($result) 
			{
				$status = 1; $locate = 0;
				$msg= '<div class="alert alert-success alert-dismissible fade show" role="alert">
							Sukses, password berhasil diperbaharui !!!
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>';
			} else {
				$status = 0; $locate = 0;
				$msg= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
							Terdapat kesalahan, password gagal diperbaharui !
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>';
			}
		}

		$arrMsg = array(
			'status' => $status,
			'msg' => $msg
		);

		$this->session->set_flashdata('fdCPass', $arrMsg);

		echo json_encode(array('status' => $status, 'msg' => $msg, 'url' => base_url('Home/change_password'), 'locate' => $locate));
	}

	public function checkOldPass($key) {
		if (trim($key) == "" OR empty($key))
		{
			$this->form_validation->set_message('checkOldPass', 'The %s field is required !');
			return FALSE;
		} else {
			$query = $this->ModelLKB->simpleQuery('t_user', array('user_password' => md5($key), 'user_id' => $this->user));
			if ( empty($query->num_rows()) ) {
				$this->form_validation->set_message('checkOldPass', 'The %s yang diinputkan salah !');    
				return FALSE;
			} else {
				return TRUE;
			}
		}
	}

	public function checkNewPass($key) {
		if (trim($key) == "" OR empty($key))
		{
			$this->form_validation->set_message('checkNewPass', 'The %s field is required !');
			return FALSE;
		} else if(strlen($key) < 6) {
			$this->form_validation->set_message('checkNewPass', '%s should be at least 6 characters long or more !');
			return FALSE;
		} else {
			$query = $this->ModelLKB->simpleQuery('t_user', array('user_password' => md5($key), 'user_id' => $this->user));
			if ( !empty($query->num_rows()) ) {
				$this->form_validation->set_message('checkNewPass', '%s tidak boleh sama dengan Password Lama !');    
				return FALSE;
			} else {
				return TRUE;
			}
		}
	}

	public function logout(){
		$this->session->unset_userdata(array('user_splkb'));
		return redirect(base_url());
	}

	public function detailUser()
	{
		$data = array();
		$detail = $this->ModelLKB->detailUser();
		if(!empty($detail))
		{
			$data =  (array) $detail;
		}

		$path = $this->config->item('url').$this->config->item('path_photo').$detail->user_photo_name;
		
		$check_path = get_headers($path);
		$path = (!empty($detail->user_photo_name) && $check_path[0] == 'HTTP/1.1 200 OK') ? $path : base_url('assets2/img/no_photo.png');
		$photo_status = (!empty($detail->user_photo_name) && $check_path[0] == 'HTTP/1.1 200 OK') ? 1 : 0;

		$data['photo'] = '<img src="'.$path.'" alt="Profile" class="rounded-pill" />';
		$data['photo_form'] = '<img src="'.$path.'" alt="" id="photoProfile" alt="Profile" class="rounded-pill" />';
		$data['photo_small'] = '<img src="'.$path.'" alt="Profile" class="rounded-circle">';
		$data['photo_status'] = $photo_status;
		$data['photo_file'] = $detail->user_photo_name;

		return $data;
	}

	public function destroy_sessions(){
		// destroy all session except for some exceptions
		// $keep_items = array('user_splkb', 'user_type', 'user_realname', 'userpass_splkb');
		// unset_userdata_except($keep_items);
		return "ok";
	}
}
