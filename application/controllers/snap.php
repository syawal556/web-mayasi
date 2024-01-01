<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Snap extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


	public function __construct()
    {
        parent::__construct();
        $params = array('server_key' => 'SB-Mid-server-6hPIrt7_CdH5MMPBjV-5JhVn', 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
		$this->load->helper('url');	
		$this->load->model('model_transfer');	
    }

    public function index()
    {
    	$this->load->view('checkout_snap');
    }

    public function token()
    {
		$grossamount 	= $this->input->get('grossamount');
		// $daftar 		= $this->cart->contents();
		// Required
		$transaction_details = array(
		  'order_id' => rand(),
		  'gross_amount' => $grossamount, // no decimal allowed for creditcard
		);

		// $item_details	= array();
		// foreach ($daftar as $items){

		// 	$item_details[] = array(
		// 		'id' => $items['id'],
		// 		'price' => $items['harga_menu'],
		// 		'quantity' => $items['jumlah'],
		// 		'name' => $items['nama_menu'],
		// 	);
		// };


	

		// // Optional
		// $item1_details = array(
		//   'id' => 'a1',
		//   'price' => 18000,
		//   'quantity' => 3,
		//   'name' => "Apple"
		// );

		// // Optional
		// $item2_details = array(
		//   'id' => 'a2',
		//   'price' => 20000,
		//   'quantity' => 2,
		//   'name' => "Orange"
		// );

		// // Optional
		// $item_details = array ($item1_details, $item2_details);

		// Optional
		$billing_address = array(
		  'first_name'    => "Andri",
		  'last_name'     => "Litani",
		  'address'       => "Mangga 20",
		  'city'          => "Jakarta",
		  'postal_code'   => "16602",
		  'phone'         => "081122334455",
		  'country_code'  => 'IDN'
		);

		// Optional
		$shipping_address = array(
		  'first_name'    => "Obet",
		  'last_name'     => "Supriadi",
		  'address'       => "Manggis 90",
		  'city'          => "Jakarta",
		  'postal_code'   => "16601",
		  'phone'         => "08113366345",
		  'country_code'  => 'IDN'
		);

		// Optional
		$customer_details = array(
		  'first_name'    => "Andri",
		  'last_name'     => "Litani",
		  'email'         => "andri@litani.com",
		  'phone'         => "081122334455",
		  'billing_address'  => $billing_address,
		  'shipping_address' => $shipping_address
		);

		// Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O",$time),
            'unit' => 'minute', 
            'duration'  => 60
        );
        
        $transaction_data = array(
            'transaction_details'=> $transaction_details,
            // 'item_details'       => $item_details,
            // 'customer_details'   => $customer_details,
            // 'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry
        );

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		echo $snapToken;
    }

    public function finish()
    {
		$result = json_decode($this->input->post('result_data'), true);
		$is_processed = $this->model_transfer->index($result);
        if($is_processed) {
            $data['title'] = 'Pembayaran transfer';
			$this->cart->destroy();
            $this->load->view('template_pesanan/start', $data);
            $data['daftarMenu'] = $this->M_menu->ambil_data()->result();
            $this->load->view('auth/proses_bayar_transfer', $data, $result);
            $this->load->view('template_pesanan/end');   
        } else {
            $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert" text-center>
                <strong>Success!</strong> Pesanan gagal diproses.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('auth/pembayaran');
        }
    	// $result = json_decode($this->input->post('result_data'));
    	// echo 'RESULT <br><pre>';
    	// var_dump($result);
    	// echo '</pre>' ;

    }
}
