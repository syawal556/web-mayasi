<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
 

    public function admin()
    {

        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        $this->form_validation->set_rules('password','password','trim|required');
        
        if($this->form_validation->run()== false ){
            
            $data['title'] ='Login admin Waroeng Mayasi';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('admin/login');
            $this->load->view('templates/auth_footer');

        } else {
            //validation success
            $this->_login();
        }
       
    }



    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user',['email' => $email])->row_array();

            //jika usernya ada
        if($user) {
            
            //jika usernya aktif
            if($user['is_active'] == 1) {

                //cek password
                if( password_verify ($password, $user['password'])) {

                    $data = [
                        'email' => $user ['email'], 
                        'akses_level' => $user ['akses_level']
                    ];
                    $this->session->set_userdata($data);
                   if($user ['akses_level'] == admin){
                       
                       redirect('user');
                   } else{
                    redirect('Login_user');
                   }


                } else {
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
            Password anda salah!
            </div>');
            redirect('Admin_login/admin');

                }

            } else {
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
            Email belum belum diaktivasi!
            </div>');
            redirect('Admin_login/admin');
            }


        } else {
        
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
            Masukan email yang aktif!
            </div>');
            redirect('Admin_login/admin');

        }

    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('akses_level');
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
            Anda Telah Logout!
            </div>');
            redirect('Admin_login/admin');


    }

    public function registrasi()
    {   

        $this->form_validation->set_rules('name','Name','required|trim');
        $this->form_validation->set_rules('akses_level','akses level','required|trim');
        $this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[user.email]',[
            'is_unique' => 'Email anda sudah terdaftar, silahkan login ke akun anda!'
        ]);
        $this->form_validation->set_rules('password1','password','required|trim|min_length[5]|matches[password2]',[
            'matches' =>'password tidak sama!',
            'min_length' => 'Password min 5 karakter'
        ]);
        $this->form_validation->set_rules('password2','password','required|matches[password1]');
        if ( $this->form_validation->run() == false) {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['title'] ='Registrasi akun';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/registrasi', $data); 
        $this->load->view('templates/footer');

        } else {
            
            $data = [
                'name' => htmlspecialchars($this->input->post('name',true)),
                'email' => htmlspecialchars($this->input->post('email',true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'akses_level' => htmlspecialchars($this->input->post('akses_level',true)),
                'is_active' => 1,
                'date_created' => time()

            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Akun berhasil di daftarkan! silahkan login dengan akun anda .
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('data_user');
        }

    }


        public function edit($id)
        {
            $this->registrasi();
            if ($this->form_validation->run() == false) {
                // redirect('user');

            
                $data = array(
                    'id' => $id,
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'akses_level' => $this->input->post('akses_level'),

                );

                
                $this->tambah_user->update_data($data, 'user');
                $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert" text-center>
                <strong>Success!</strong> Data Berhasil di edit.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('data_user');
            }





        }






}

