<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function isLoggedIn()
    {
        if (!$this->session->userdata('emailAdmin')) {
            redirect(base_url('admin/login'));
        } else {
            return false;
        }
    }
    public function index()
    {
        if (!$this->session->userdata('emailAdmin')) {
            redirect(base_url('admin/login'));
        } else {
            $data = $this->Peserta->get_statistic();
            $data['peserta'] = $this->Peserta->fetch_approval();
            $this->load->view('admin/dashboard', $data);
        }
    }
    public function asjodajoskodaod()
    {
        $data = [
            'nama' => 'ngadimin',
            'email' => 'admin@admin.com',
            'password' => password_hash('123456', PASSWORD_DEFAULT)
        ];
        $this->db->insert('admin', $data);
    }
    public function login()
    {
        if ($this->session->userdata('emailAdmin')) {
            redirect('admin');
        }
        $this->form_validation->set_rules(array(
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|trim'
            ), array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|trim'
            )
        ));
        if (!$this->form_validation->run()) {
            $this->load->view('admin/login');
        } else {
            $this->_login();
        }
    }
    private function _login()
    {
        $admin = $this->Admins->getAdminByEmail($this->input->post('email', true));
        if (!$admin) {
            $this->session->set_flashdata('message', 'User tidak ditemukan.');
            redirect(base_url('admin/login'));
            // echo var_dump($admin);
        } else {
            if (!password_verify($this->input->post('password'), $admin['password'])) {
                $this->session->set_flashdata('message', 'Password yang anda masukan salah.');
                redirect(base_url('admin/login'));
                // echo "salah pass";
            } else {
                $data = [
                    'id_admin' => $admin['id_admin'],
                    'emailAdmin' => $admin['email'],
                    'namaAdmin' => $admin['nama']
                ];
                $this->session->set_userdata($data);
                redirect(base_url('admin'));
            }
        }
    }
    public function pengumuman()
    {
        $this->isLoggedIn();
        $data['pengumuman'] = $this->Pengumuman->fetch();
        $this->load->view('admin/pengumuman', $data);
    }
    public function peserta()
    {
        $this->isLoggedIn();
        $data['peserta'] = $this->Peserta->fetch();
        $this->load->view('admin/peserta', $data);
    }
    public function transaksi()
    {
        $this->isLoggedIn();
        $this->db->select('bukti_transfer.*,peserta.nama as nama_peserta,events.nama as nama_event,peserta.status as status');
        $this->db->from('bukti_transfer');
        $this->db->join('peserta', 'bukti_transfer.id_peserta = peserta.id_peserta', 'LEFT');
        $this->db->join('events', 'bukti_transfer.id_event = events.id_event', 'LEFT');
        $data['transaksi'] = $this->db->get()->result_array();
        $this->load->view('admin/transaksi', $data);
    }
    public function logout()
    {
        session_destroy();
        redirect(base_url());
    }
    public function addPengumuman()
    {
        $this->Pengumuman->addPengumuman();
        redirect('admin/pengumuman');
    }
    public function editPengumuman()
    {
        $this->Pengumuman->editPengumuman();
        redirect('admin/pengumuman');
    }
    public function hapusPengumuman($id)
    {
        $this->Pengumuman->delete($id);
        redirect('admin/pengumuman');
    }
    public function hapusPeserta($id)
    {
        $this->Peserta->delete($id);
        redirect('admin/peserta');
    }
    public function approve($id)
    {
        $this->Peserta->approve($id);
        redirect('admin/transaksi');
    }
    public function editPeserta()
    {
        $this->Peserta->edit();
        redirect('admin/peserta');
    }
}
