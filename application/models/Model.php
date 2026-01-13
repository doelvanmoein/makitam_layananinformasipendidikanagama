<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Model {

    function __construct(){
		parent::__construct();
		$this->load->library(array('session'));		
		$this->user = $this->session->userdata('user_splkb');
	}

    public function simpleQuery($table, $param){
        return $query = $this->db->get_where($table, $param);
    }

    public function updateData($table,$data,$key){
        return $this->db->update($table, $data, $key);
    }

    public function addData($tabel,$data){
        return $this->db->insert($tabel,$data);
    }

    public function deleteData($tabel,$where){
        $exec = $this->db->delete($tabel,$where);
        return $exec;
    }

    // public function getAllUser(){
    //     $query = $this->db->query("select * from t_user");
    //     return $query;
    // }

    public function getAllUser()
    {
        return $this->db->get('t_user');
    }

    public function getUser($limit, $start, $keyword)
    {
        // if($keyword){
        //     $this->db->like('user_realname', $keyword);
        //     $this->db->or_like('user_nip', $keyword);
        // }
        // return $this->db->get('t_user', $limit, $start)->result_array();

        $this->db->select('t_user.user_id, t_user.user_nip, t_user.user_type, t_user.user_realname, t_user.user_gender, t_user.user_rank_id, t_rank.rank_name, t_rank.rank_grade, t_rank.rank_room, t_user.user_position_id, t_position.position_name, t_user.user_workarea_id, t_workarea.workarea_name, t_user.user_email');
        $this->db->from('t_user');
        $this->db->join('t_rank', 't_rank.rank_id=t_user.user_rank_id', 'left');
        $this->db->join('t_position', 't_position.position_id=t_user.user_position_id', 'left');
        $this->db->join('t_workarea', 't_workarea.workarea_id=t_user.user_workarea_id', 'left');
        $this->db->limit($limit, $start);
        if($keyword){
            $this->db->like('t_user.user_realname', $keyword);
            $this->db->or_like('t_user.user_nip', $keyword);
        }
        $query= $this->db->get()->result_array();
        return $query;
    }

    public function getRank($limit, $start, $keyword)
    {
        if($keyword){
            $this->db->like('rank_name', $keyword);
            // $this->db->or_like('user_nip', $keyword);
        }
        return $this->db->get('t_rank', $limit, $start)->result_array();
    }

    public function getGrade($limit, $start, $keyword)
    {
        if($keyword){
            $this->db->like('grade_name', $keyword);
            // $this->db->or_like('user_nip', $keyword);
        }
        return $this->db->get('t_grade', $limit, $start)->result_array();
    }

    public function getPosition($limit, $start, $keyword)
    {
        if($keyword){
            $this->db->like('position_name', $keyword);
            // $this->db->or_like('user_nip', $keyword);
        }
        return $this->db->get('t_position', $limit, $start)->result_array();
    }

    public function getWorkarea($limit, $start, $keyword)
    {
        if($keyword){
            $this->db->like('workarea_name', $keyword);
            // $this->db->or_like('user_nip', $keyword);
        }
        return $this->db->get('t_workarea', $limit, $start)->result_array();
    }

    public function getReporttype($limit, $start, $keyword)
    {
        if($keyword){
            $this->db->like('reporttype_name', $keyword);
            // $this->db->or_like('user_nip', $keyword);
        }
        return $this->db->get('t_reporttype', $limit, $start)->result_array();
    }

    public function getWorshiphouseList($limit, $start)
    {
        // if($keyword) {
        //     $this->db->like('lkb_year', $keyword);
        // }
        // return $this->db->get('t_lkb', $limit, $start)->result_array();

        // $this->db->order_by('lkb_month', 'asc');
        // $this->db->order_by("worshiphouse_name"); // worked
        // $this->db->where('t_lkb.lkb_emp_user_id', $this->user);
        // $result = $this->db->get('t_worshiphouse', $limit, $start)->result_array();// worked

        $this->db->select('*');
        $this->db->from('t_worshiphouse');
        // $this->db->join('t_kelurahandesa', 't_lkb.lkb_emp_user_id=t_user.user_id', 'inner');
        // $this->db->join('t_rank', 't_rank.rank_id=t_user.user_rank_id', 'left');
        $this->db->join('t_kelurahandesa', 't_kelurahandesa.kel_id=t_worshiphouse.worshiphouse_kel_id', 'left');
        $this->db->join('t_kecamatan', 't_kecamatan.kec_id=t_worshiphouse.worshiphouse_kec_id', 'left');
        $this->db->limit($limit, $start);
        $result= $this->db->get()->result_array();
        return $result;
    }

    public function getFaqList()
    {
        $this->db->select('*');
        $this->db->from('t_worshiphouse_faq');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getLkbAdmin($limit, $start, $keyword, $filter_tahun, $filter_bulan)
    {   
        if ($filter_tahun)
		{
			$this->db->like('t_lkb.lkb_year', $filter_tahun);
		}

        if ($filter_bulan)
		{
			$this->db->like('t_lkb.lkb_month', $filter_bulan);
		}

        if ($keyword){
            $this->db->like('t_user.user_realname', $keyword);
            $this->db->or_like('t_user.user_nip', $keyword);
        }

        $this->db->select('*');
        $this->db->from('t_lkb');
        $this->db->join('t_user', 't_lkb.lkb_emp_user_id=t_user.user_id', 'inner');
        $this->db->join('t_rank', 't_rank.rank_id=t_user.user_rank_id', 'left');
        $this->db->join('t_position', 't_position.position_id=t_user.user_position_id', 'left');
        $this->db->join('t_workarea', 't_workarea.workarea_id=t_user.user_workarea_id', 'left');
        $this->db->limit($limit, $start);
        $query= $this->db->get()->result_array();
        return $query;
    }

    public function getDetailLKB($id)
    {
        $this->db->select('*');
        $this->db->from('t_lkb');
        $this->db->join('t_user', 't_lkb.lkb_emp_user_id=t_user.user_id', 'inner');
        $this->db->join('t_rank', 't_rank.rank_id=t_user.user_rank_id', 'left');
        $this->db->join('t_position', 't_position.position_id=t_user.user_position_id', 'left');
        $this->db->join('t_workarea', 't_workarea.workarea_id=t_user.user_workarea_id', 'left');
        $this->db->where('t_lkb.lkb_id', $id);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getDetailLKBfile($id)
    {
        $this->db->select('t_lkb_detail.lkbdetail_id, t_lkb.lkb_id, t_reporttype.reporttype_name, t_lkb_detail.lkbdetail_file');
        $this->db->from('t_lkb_detail');
        $this->db->join('t_lkb', 't_lkb.lkb_id=t_lkb_detail.lkbdetail_lkb_id', 'inner');
        $this->db->join('t_reporttype', 't_reporttype.reporttype_id=t_lkb_detail.lkbdetail_reporttype_id', 'left');
        $this->db->where('t_lkb.lkb_id', $id);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getNotification()
    {
        $this->db->select('t_notification.notification_content as content, t_user.user_realname as subject, t_notification.insert_timestamp as waktu');
        $this->db->from('t_notification');
        $this->db->join('t_user', 't_user.user_id=t_notification.insert_user_id', 'left');
        $this->db->order_by('t_notification.insert_timestamp', 'desc');
        $this->db->limit(6);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function countAllUser()
    {
        return $this->db->get('t_user')->num_rows();
    }

    public function countAllRank()
    {
        return $this->db->get('t_rank')->num_rows();
    }

    public function countAllGrade()
    {
        return $this->db->get('t_grade')->num_rows();
    }

    public function countAllPosition()
    {
        return $this->db->get('t_position')->num_rows();
    }

    public function countAllWorkarea()
    {
        return $this->db->get('t_workarea')->num_rows();
    }

    public function countAllReporttype()
    {
        return $this->db->get('t_reporttype')->num_rows();
    }

    public function countUserASN()
    {
        return $this->db->get_where('t_user', array('user_type' => '2'))->num_rows();
    }

    public function countPNS()
    {
        // return $this->db->get_where('t_user', array('SUBSTRING(user_nip, 13, 2) <' => '20'))->num_rows();
        // Query => "SELECT SUBSTRING(user_nip, 13, 2) AS ExtractString 
        // FROM t_user
        // WHERE SUBSTRING(user_nip, 13, 2) > 20; "
        $query = $this->db->get_where('t_user', array('SUBSTRING(user_nip, 13, 2) <' => '20', 'user_type' => 2))->num_rows();
        // echo "<pre>";print_r($this->db->last_query());echo "</pre>";die;
        return $query;


    }

    public function countPPPK()
    {
        return $this->db->get_where('t_user', array('SUBSTRING(user_nip, 13, 2) >' => '20'))->num_rows();
    }

    public function countAsnPerWorkarea()
    {
        $this->db->select('t_workarea.workarea_name, COUNT(t_user.user_nip) as total');
        $this->db->from('t_workarea');
        $this->db->join('t_user', 't_user.user_workarea_id=t_workarea.workarea_id', 'left');
        $this->db->group_by('t_workarea.workarea_id');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function countLKB($year, $month)
    {
        $this->db->select('COUNT(t_lkb.lkb_id) as total');
        $this->db->from('t_lkb');
        $this->db->join('t_user', 't_user.user_id=t_lkb.lkb_emp_user_id');
        $this->db->where('t_lkb.lkb_year', $year);
        $this->db->where('t_lkb.lkb_month', $month);
        $query = $this->db->get()->result_array();
        $query = array_shift($query)['total'];
        return $query;
    }

    public function insert($data)
    {
        $insert = $this->db->insert_batch('t_user', $data);
        if($insert)
        {
            return true;
        }
    }

    public function add_multiple($data, $table_name)
    {
        $insert = $this->db->insert_batch($table_name, $data);
        if($insert)
        {
            return true;
        }
    }

    public function upload_file($filename)
	{
		// load library upload
		$this->load->library('upload');

		$config['upload_path'] = './excel/';
		$config['allowed_types'] = 'xlsx';
		$config['max_size'] = '2048';
		$config['overwrite'] = true;
		$config['file_name'] = $filename;

		$this->upload->initialize($config);
		if($this->upload->do_upload('file')) 
		{
			$return = array(
				'result' => 'success',
				'file' => $this->upload->data(),
				'error' => ''
			);
			return $return;
		}else{
			$return = array(
				'result' => 'failed',
				'file' => '',
				'error' => $this->upload->display_errors()
			);
			return $result;
		}
	}

	public function insert_multiple($data)
	{
		$this->db->insert_batch('t_user', $data);
	}
    

    // $this->db->select('*')->from('my_table')
    //     ->group_start()
    //             ->where('a', 'a')
    //             ->or_group_start()
    //                     ->where('b', 'b')
    //                     ->where('c', 'c')
    //             ->group_end()
    //     ->group_end()
    //     ->where('d', 'd')
    // ->get();

// Generates:
// SELECT * FROM (`my_table`) WHERE ( `a` = 'a' OR ( `b` = 'b' AND `c` = 'c' ) ) AND `d` = 'd'

    public function detailRank($id)
    {   
        return $this->db->get_where('t_rank', array('rank_id' => $id))->result_array();
    }

    public function detailData($arr_key, $table_name)
    {
        return $this->db->get_where($table_name, $arr_key)->result_array();
    }

    public function getAllData($table_name)
    {
        return $this->db->get($table_name)->result_array();
    }

    public function checkStatusLKB($year, $month)
    {
        $this->db->select('t_lkb.lkb_status as status');
        $this->db->from('t_lkb');
        $this->db->where('lkb_year', $year);
        $this->db->where('lkb_month', $month);
        $this->db->where('lkb_emp_user_id', $this->user);
        $query = $this->db->get()->result_array();
        return $query;

    }

    public function countAllLKB()
    {
        return $this->db->get_where('t_lkb', array('lkb_emp_user_id' => $this->user))->num_rows();
    }

    public function countAllLKBthisYear()
    {
        return $this->db->get_where('t_lkb', array('lkb_emp_user_id' => $this->user, 'lkb_year' => date('Y')))->num_rows();
    }

    public function detailUser()
    {
        $this->db->select('*');
        $this->db->from('t_user');
        $this->db->where('user_id', $this->user);
        $query = $this->db->get()->row();
        return $query;
    }

    public function detailUserManagement($id)
    {   
        // return $this->db->get_where('t_user', array('user_id' => $id))->result_array();
        $this->db->select('t_user.user_id, t_user.user_nip, t_user.user_type, t_user.user_realname, t_user.user_gender, t_user.user_rank_id, t_rank.rank_name, t_user.user_position_id, t_position.position_name, t_user.user_workarea_id, t_workarea.workarea_name, t_user.user_email');
        $this->db->from('t_user');
        $this->db->join('t_rank', 't_rank.rank_id=t_user.user_rank_id', 'left');
        $this->db->join('t_position', 't_position.position_id=t_user.user_position_id', 'left');
        $this->db->join('t_workarea', 't_workarea.workarea_id=t_user.user_workarea_id', 'left');
        $this->db->where('t_user.user_id', $id);
        $query= $this->db->get()->result_array();
        // echo "<pre>"; print_r($this->db->last_query());echo "</pre>";
        return $query;
    }

    public function getAllNip()
    {
        return $this->db->get_where('t_user', array('user_type' => '2', 'user_nip !=' => '' ))->result_array();
    }

    public function getWorshiphouseGroupByReligion()
    {
        // query jumlah rumah ibadah berdasarkan jenis rumah ibadah
        // $query = "
        //     SELECT b.worshiphousetype_name, COUNT(a.worshiphouse_id) as jumlah_rumahibadah
        //     FROM t_worshiphouse a
        //     JOIN t_worshiphouse_type b ON b.worshiphousetype_id = a.worshiphouse_worshiphousetype_id
        //     GROUP BY b.worshiphousetype_id
        // ";

        // query jumalh rumah ibadah berdasarkan agama
        $query = "
            SELECT a.worshiphouse_religion, COUNT(a.worshiphouse_id) as jumlah_rumahibadah
            FROM t_worshiphouse a
            JOIN t_worshiphouse_type b ON b.worshiphousetype_id = a.worshiphouse_worshiphousetype_id
            GROUP BY a.worshiphouse_religion
        ";

        // $this->db->select('t_worshiphouse.worshiphousetype_name, COUNT(a.worshiphouse_id) as jumlah_ibadah');
        // $this->db->from('t_worshiphouse');
        // $this->db->join('t_worshiphouse_type', 't_worshiphouse_type.worshiphousetype_id=t_worshiphouse.worshiphouse_worshiphousetype_id', 'left');
        // $this->db->group_by('t_worshiphouse_type.worshiphousetype_id');
        // $this->db->where('t_user.user_id', $id);
        // $query = $this->db->get()->result_array();
        // echo "<pre>"; print_r($this->db->last_query());echo "</pre>";
        $query = $this->db->query($query)->result_array();
        
        return $query;
    }

    public function getWorshiphouseByKecamatan()
    {
        $query = "
        SELECT 
            k.kec_name AS kecamatan,
            ji.worshiphousetype_name,
            COUNT(r.worshiphouse_id) AS total
        FROM t_worshiphouse r
        LEFT JOIN t_worshiphouse_type ji ON r.worshiphouse_worshiphousetype_id = ji.worshiphousetype_id
        LEFT JOIN t_kecamatan k ON r.worshiphouse_kec_id = k.kec_id
        GROUP BY k.kec_name, ji.worshiphousetype_name
        ORDER BY k.kec_name, ji.worshiphousetype_name
        ";

        $query = $this->db->query($query)->result_array();
        
        return $query;
    }

    public function get_rumah_ibadah_by_kecamatan() {
        // Query untuk mendapatkan jumlah rumah ibadah per kecamatan
        $this->db->select('k.nama_kecamatan, COUNT(r.id_rumah_ibadah) AS jumlah_ibadah');
        $this->db->from('rumah_ibadah r');
        $this->db->join('kecamatan k', 'r.id_kecamatan = k.id_kecamatan');
        $this->db->group_by('k.id_kecamatan'); // Mengelompokkan berdasarkan kecamatan
        $this->db->order_by('k.nama_kecamatan');
        
        $query = $this->db->get();
        return $query->result_array(); // Mengembalikan data dalam bentuk array
    }

    public function getWorshiphouseForScatterChart() {
        // // Query for get count of worshiphouse per region
        // $this->db->select('k.nama_kecamata, COUNT(r.id_rumah_ibadah) AS jumlah_ibadah');
        // $this->db->from('rumah_ibadah r');
        // $this->db->join('kecamatan k', 'r.id_kecamatan = k.id_kecamatan');
        // $this->db->group_by('k.id_kecamatan'); // grouping by region /kecamatan
        // $this->db->order_by('k.nama_kecamatan');

        // $query = $this->db->get();
        // return $query->result_array(); 

        // Query 1
        // $query = "
        // SELECT b.kec_name, YEAR(a.worshiphouse_buildyear) AS tahun, COUNT(a.worshiphouse_id) AS qty
        // FROM t_worshiphouse a
        // JOIN t_kecamatan b ON b.kec_id = a.worshiphouse_kec_id
        // GROUP BY b.kec_id, a.worshiphouse_buildyear
        // ORDER BY b.kec_name
        // ";

        // Query 2
        $query = "
            SELECT 
                kec.kec_id AS kec_id,
                kec.kec_name AS kecamatan,
                wh.worshiphouse_buildyear AS build_year,
                COUNT(wh.worshiphouse_id) AS total
            FROM 
                t_worshiphouse AS wh
            JOIN 
                t_kecamatan AS kec
            ON 
                wh.worshiphouse_kec_id = kec.kec_id
            WHERE 
                wh.worshiphouse_buildyear IS NOT NULL
            GROUP BY 
                kec.kec_id, wh.worshiphouse_buildyear
            ORDER BY 
                kecamatan, build_year
        ";

        $query = $this->db->query($query)->result_array();
        
        return $query;
    }

    // public function getWorshiphouseForLinechart() {
    //     $query = "
    //     SELECT 
    //         YEAR(r.worshiphouse_buildyear) AS tahun, 
    //         a.worshiphousetype_name AS jenis_rumah_ibadah,
    //         COUNT(r.worshiphouse_id) AS qty
    //     FROM 
    //         t_worshiphouse r
    //     LEFT JOIN t_worshiphouse_type a ON a.worshiphousetype_id = r.worshiphouse_worshiphousetype_id
    //     GROUP BY 
    //         YEAR(r.worshiphouse_buildyear), r.worshiphouse_worshiphousetype_id
    //     ORDER BY 
    //         tahun, r.worshiphouse_worshiphousetype_id
    //     ";

    //     // $query = "
    //     //     SELECT 
    //     //         wt.worshiphousetype_name AS worshiphouse_type,
    //     //         wh.worshiphouse_buildyear AS build_year,
    //     //         COUNT(wh.worshiphouse_id) AS total
    //     //     FROM 
    //     //         t_worshiphouse AS wh
    //     //     JOIN 
    //     //         t_worshiphouse_type AS wt
    //     //     ON 
    //     //         wh.worshiphouse_worshiphousetype_id = wt.worshiphousetype_id
    //     //     WHERE 
    //     //         wh.worshiphouse_buildyear IS NOT NULL
    //     //     GROUP BY 
    //     //         wt.worshiphousetype_id, wh.worshiphouse_buildyear
    //     //     ORDER BY 
    //     //         wt.worshiphousetype_id, wh.worshiphouse_buildyear
    //     // ";

    //     $query = $this->db->query($query)->result_array();
    //     return $query;
    // }

    public function getWorshiphouseForLinechart_2() {
        // $query = "
        // SELECT 
        //     YEAR(r.worshiphouse_buildyear) AS tahun, 
        //     a.worshiphousetype_name AS jenis_rumah_ibadah,
        //     COUNT(r.worshiphouse_id) AS qty
        // FROM 
        //     t_worshiphouse r
        // LEFT JOIN t_worshiphouse_type a ON a.worshiphousetype_id = r.worshiphouse_worshiphousetype_id
        // GROUP BY 
        //     YEAR(r.worshiphouse_buildyear), r.worshiphouse_worshiphousetype_id
        // ORDER BY 
        //     tahun, r.worshiphouse_worshiphousetype_id
        // ";

        $query = "
            SELECT 
                wt.worshiphousetype_name AS worshiphouse_type,
                wh.worshiphouse_buildyear AS build_year,
                COUNT(wh.worshiphouse_id) AS total
            FROM 
                t_worshiphouse AS wh
            JOIN 
                t_worshiphouse_type AS wt
            ON 
                wh.worshiphouse_worshiphousetype_id = wt.worshiphousetype_id
            WHERE 
                wh.worshiphouse_buildyear IS NOT NULL
            GROUP BY 
                wt.worshiphousetype_id, wh.worshiphouse_buildyear
            ORDER BY 
                wt.worshiphousetype_id, wh.worshiphouse_buildyear
        ";

        $query = $this->db->query($query)->result_array();
        return $query;
    }

    public function getWorshiphouseForLinechart() {
        $query = $this->db->query("
            SELECT 
                YEAR(w.worshiphouse_buildyear) AS build_year,
                wt.worshiphousetype_name AS worshiphouse_type,
                COUNT(w.worshiphouse_id) AS total
            FROM 
                t_worshiphouse w
            JOIN 
                t_worshiphouse_type wt ON w.worshiphouse_worshiphousetype_id = wt.worshiphousetype_id
            WHERE 
                w.worshiphouse_buildyear IS NOT NULL
            GROUP BY 
                YEAR(w.worshiphouse_buildyear), wt.worshiphousetype_name
            ORDER BY 
                YEAR(w.worshiphouse_buildyear), wt.worshiphousetype_name
        ");
        return $query->result_array();
    }
    

    public function getDoughnutchart()
    {
        $query = "
            SELECT 
                CASE 
                    WHEN wh.worshiphouse_religion = 1 THEN 'Islam'
                    WHEN wh.worshiphouse_religion = 2 THEN 'Kristen Protestan'
                    WHEN wh.worshiphouse_religion = 3 THEN 'Katolik'
                    WHEN wh.worshiphouse_religion = 4 THEN 'Hindu'
                    WHEN wh.worshiphouse_religion = 5 THEN 'Buddha'
                    WHEN wh.worshiphouse_religion = 6 THEN 'Konghucu'
                    ELSE 'Lainnya'
                END AS religion,
                wt.worshiphousetype_name AS worshiphousetype_name,
                COUNT(wh.worshiphouse_id) AS total
            FROM 
                t_worshiphouse AS wh
            JOIN 
                t_worshiphouse_type AS wt
            ON 
                wh.worshiphouse_worshiphousetype_id = wt.worshiphousetype_id
            GROUP BY 
                wh.worshiphouse_religion;
        ";

        $query = $this->db->query($query)->result_array();
        return $query;
    }

    public function getMadrasahList($limit, $start)
    {
        $this->db->select('*');
        $this->db->from('t_madrasah');
        
        $this->db->limit($limit, $start);
        $result= $this->db->get()->result_array();
        return $result;
    }

    public function get_all_berita($limit = 9, $start = 0)
    {
        $this->db->where('berita_status', 'Publish');
        // $this->db->order_by("DATE_FORMAT(input_timestamp, '%Y-%m-%d') AS input_timestamp", 'DESC');
        // $this->db->order_by("DATE_FORMAT(insert_timestamp, '%Y-%m-%d') AS insert_timestamp", 'DESC');
        $this->db->where('berita_is_unggulan', 0);
        $this->db->order_by('insert_timestamp', 'DESC');
        return $this->db->get('t_berita', $limit, $start)->result();
    }

    public function count_berita()
    {
        $this->db->where('berita_status', 'Publish');
        return $this->db->count_all_results('t_berita');
    }

    public function get_berita_by_slug($slug)
    {
        return $this->db->get_where('t_berita', [
            'berita_slug' => $slug,
            'berita_status' => 'Publish'
        ])->row();
    }

    public function get_berita_by_id($id)
    {
        return $this->db->get_where('t_berita', [
            'berita_id' => $id,
            'berita_status' => 'Publish'
        ])->row();
    }
    
    public function count_berita_test()
    {
        return $this->db->count_all_results('t_berita');
    }

    public function get_berita_unggulan()
    {
        return $this->db->where('berita_status', 'Publish')
                        ->where('berita_is_unggulan', 1)
                        ->order_by('insert_timestamp', 'DESC')
                        ->limit(1)
                        ->get('t_berita')
                        ->row();
    }

}