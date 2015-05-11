<?php
error_reporting(0);
	class Data extends CI_Controller 
	{	
		private $limit=10;

		function __construct()
		{
			parent::__construct();
			$this->load->library('template');
			$this->load->library(array('table','form_validation'));
			$this->load->helper(array('form','url'));
			$this->load->model('data_model','',TRUE);
		}

		public function index()
		{
				$this->load->view('header');
			$this->load->view('home');
			$this->load->view('footer');

		}

		function add()
		{
			 //set common properties
			$data1['title']='Tambah data baru';
			$data1['action']=site_url('index.php/data/add');
			$data1['link_back']= anchor('index.php/data/index','Kembali ke Daftar Data',array('class'=>'back'));

			$this->_set_rules();

			//run validation
			if ($this->form_validation->run()=== FALSE)
			{
				//$data1['message']='';
				// set common properties
				$data1['title']='Add new data';
				$data1['message']='';
				$data1['data']['nim']='';
				$data1['data']['nama']='';
				$data1['data']['alamat']='';
				$data1['data']['jeniskelamin']='';
				$data1['data']['tanggallahir']='';
				$data1['data']['tahunakademik']='';
				

				$this->load->view('dataEdit',$data1);
			}
			else
			{
				// save data
				$data = array('nim'=>$this->input->post('nim'),
							'nama'=>$this->input->post('nama'),
							'alamat'=>$this->input->post('alamat'),
							'jeniskelamin'=>$this->input->post('jenis_kelamin',true),
							'tanggallahir'=>$this->input->post('tanggal_lahir',TRUE),
							'tahunakademik'=>$this->input->post('thnpt',true));
				$nim=$this->data_model->save($data);

				$this->validation->id = $nim;

				redirect('index.php/data/index/add_success');
			}
		}
		
		
		function cetak($offset=0,$order_column='nim',$order_type='asc')
		{
			if (empty($offset)) $offset=0;
			if (empty($order_column)) $order_column='nim';
			if (empty($order_type)) $order_type='asc';

			//load data
			$datas=$this->data_model->get_paged_list($this->limit,$offset,$order_column,$order_type)->result();
			
			//generate pagnation
			$this->load->library('pagination');
			$config['base_url']= site_url('index.php/data/cetak/');
			$config['total_rows']= $this->data_model->count_all();
			$config['per_page']=$this->limit;
			$config['uri_segment']=3;
			$this->pagination->initialize($config);
			$data1['pagination']=$this->pagination->create_links();

			//generate table data
			$this->load->library('table');
			$this->table->set_empty("&nbsp;");
			$new_order=($order_type=='asc'?'desc':'asc');
			$this->table->set_heading(
				'NIM',
				'Nama',
				'Alamat',
				'Jenis Kelamin',
				'Tanggal Lahir',
				'Tahun Akademik',
				'Actions'
				);
			$i=0+$offset;
			foreach($datas as $data)
			{
				$this->table->add_row(
					$data->nim,
					$data->nama,
					$data->alamat,
					$data->jeniskelamin, //berdasarkan nama kolom tabel
					$data->tanggallahir,
					$data->tahunakademik,
					anchor('index.php/data/view/'.$data->nim,'view',array('class'=>'view')).' '.
					anchor('index.php/data/update1/'.$data->nim,'update',array('class'=>'update1')).' '.
					anchor('index.php/data/delete/'.$data->nim,'delete',array('class'=>'delete','onclick'=>"return confirm('Apakah Anda Ingin Menghapus Data?')"))
					);
			}
			$data1['table']=$this->table->generate();
			if ($this->uri->segment(3) == 'delete_success')
				$data1['message']='Data berhasil dihapus';
			else if ($this->uri->segment(3) == 'add_success')
				$data1['message']='Data berhasil ditambah';
			
			else 
				$data1['message']='';
			

			//load view
			$this->load->view('dataList',$data1);
		}
		
		function home()
		{
			// set common properties
			$data['title']='Home';
			$data['action']=site_url('index.php/data/home');
			$data['link_back']= anchor('index.php/data/index/','Lihat Data',array('class'=>'back'));
			
			
			$this->load->view('header');
			$this->load->view('home');
			$this->load->view('footer');			
		}
		
		function about()
		{
			// set common properties
			$data['title']='Home';
			$data['action']=site_url('index.php/data/about');
			$data['link_back']= anchor('index.php/data/index/','Lihat Data',array('class'=>'back'));
			
			
			$this->load->view('header');
			$this->load->view('about');
			$this->load->view('footer');			
		}
		
		function view($nim)
		{
			// set common properties
			$data['title']='Data Details';
			

			$data['data']=$this->data_model->get_by_id($nim)->row();

			$this->load->view('dataView',$data);	
		}

		function update1($nim)
		{
			
			// set common properties
			$data1['title']='Update Data';
			
			
			$this->load->library('form_validation');
			// set validation properties
				$this->_set_rules();
				$data1['action']=('index.php/data/update1/');

				//run validation
				if ($this->form_validation->run() === FALSE)
				{
					$data1['message']='';
					$data1['data']=$this->data_model->get_by_id($nim)->row_array();
					
					$data1['title']='update data';
					$data1['message'] = '';
					$this->load->view('add',$data1);
				}	
				else
				{
					$nim=$this->input->post('nimbaru');
					$data1=array('nim'=>$this->input->post('nim'),
					'nama'=>$this->input->post('nama'),
					'alamat'=>$this->input->post('alamat'),
					'jeniskelamin'=>$this->input->post('jenis_kelamin',true),
					'tanggallahir'=>$this->input->post('tanggal_lahir',TRUE),
					'tahunakademik'=>$this->input->post('thnpt',true));
					$this->data_model->update($nim,$data1);
					$data1['data']=$this->data_model->get_by_id($nim)->row_array();
					redirect(base_url().'index.php/data/index/add_success');
				}
				
				
		}
		

		function delete($nim)
		{
			$this->data_model->delete($nim);

			redirect('index.php/data/index/delete_success','refresh');
		}

		function _set_rules()
		{
			$this->form_validation->set_rules('nim','NIM','required');
			$this->form_validation->set_rules('nama','Nama','required|trim');
			$this->form_validation->set_rules('alamat','Alamat','required');
			$this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required');
			$this->form_validation->set_rules('tanggal_lahir','Tanggal Lahir','required');
			$this->form_validation->set_rules('thnpt','Tahun Akademik','required');
		
		}
	}