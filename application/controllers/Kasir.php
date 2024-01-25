<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Kasir extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Models', 'm');
		if (!$this->session->userdata('status_login')) {
			redirect('Auth');
		} elseif ($this->session->userdata('akses') == 'Admin') {
			redirect('Admin');
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('status_login');
		$this->session->set_flashdata('logout', TRUE);
		redirect('Auth');
	}
	public function sidebar()
	{
		$data = array(
			'beranda' => "",
			'penjualan' => "",
			'penjualan_dot' => "",
			'pembelian' => "",
			'pembelian_dot' => "",
			'laporan_re' => "",
			'laporan_re_dot' => "",
			'laporan_owner' => "",
			'laporan_owner_dot' => "",
			'laporan_supplier' => "",
			'laporan_supplier_dot' => "",
			'laporan_seluruh_supplier' => "",
			'laporan_seluruh_supplier_dot' => "",
			'laporan_piutang' => "",
			'laporan_piutang_dot' => "",
			'laporan_saldo_periode' => "",
			'laporan_saldo_periode_dot' => "",
			'transaksi' => "close",
			'transaksi_status' => "",
			'laporan' => "close",
			'laporan_status' => "",
		);
		$this->session->set_userdata($data);
	}
	public function index()
	{
		$this->sidebar();
		$data = array(
			'beranda' => " active",
		);
		$this->session->set_userdata($data);
		$select = $this->db->select('*');
		$data['penjualan'] = $this->m->Get_All('ht_penjualan', $select);
		$data['pembelian'] = $this->m->Get_All('ht_pembelian', $select);
		$this->load->view('kasir/index', $data);
	}
	public function getProduk()
	{
		$where = array(
			'id' => $this->input->get('id')
		);
		$data['getProduk'] = $this->m->Get_Where($where, 'produk');
		$this->load->view('kasir/getProduk', $data);
	}
	function AddCartLagiPenjualan($row_id, $qty)
	{
		$data = array(
			'rowid' => $row_id,
			'qty' => $qty + 1,
		);
		$this->cart->update($data);
		$this->ShowCartPenjualan();
	}
	function DeleteCartQtyPenjualan($row_id, $qty)
	{
		$data = array(
			'rowid' => $row_id,
			'qty' => $qty - 1,
		);
		$this->cart->update($data);
		$this->ShowCartPenjualan();
	}
	function AddCartLagiPembelian($row_id, $qty)
	{
		$data = array(
			'rowid' => $row_id,
			'qty' => $qty + 1,
		);
		$this->cart->update($data);
		$this->ShowCartPembelian();
	}
	function DeleteCartQtyPembelian($row_id, $qty)
	{
		$data = array(
			'rowid' => $row_id,
			'qty' => $qty - 1,
		);
		$this->cart->update($data);
		$this->ShowCartPembelian();
	}
	function ShowCartPenjualan()
	{
		$output = '';
		$no = 1;
		foreach ($this->cart->contents() as $items) {
			$output .= '
					<tr>
						<td class="text-center">' . $no++ . '.</td>
						<td>' . $items['name'] . '</td>
						<td>Rp<span class="float-right">' . number_format($items['price'], 0, ".", ".") . '</span></td>
						<td class="text-center">' . $items['qty'] . '</td>
						<td>Rp<span class="float-right">' . number_format(($items['qty'] * $items['price']), 0, ".", ".") . '</span></td>
						<td class="text-center">
							<button type="button" class="btn btn-sm bg-success" onclick="return tambah_lagi(`' . $items['rowid'] . '`, `' . $items['qty'] . '`)">
								<i class="fal fa-circle-plus"></i>
							</button>
							<button type="button" class="btn btn-sm bg-success" onclick="return kurangi_qty(`' . $items['rowid'] . '`, `' . $items['qty'] . '`)">
								<i class="fal fa-circle-minus"></i>
							</button>
							<button type="button" class="btn btn-sm bg-danger" onclick="return batalan(`' . $items['rowid'] . '`)">
								<i class="fal fa-circle-x"></i>
							</button>
						</td>
					</tr>
					';
		}
		$output .= '
				<tr>
					<th colspan="4" class="text-center text-bold">TOTAL</th>
					<th colspan="2" class="text-bold">Rp<span class="float-right">' . number_format($this->cart->total(), 0, ".", ".") . '</span></td>
				</tr>
		';
		echo $output;
	}
	function AddCartPenjualan($id, $qty)
	{
		$where = array(
			'id' => $id
		);
		$getProduk = $this->m->Get_Where($where, 'produk');
		foreach ($getProduk as $d) {
			$data = array(
				'id'			=> $d->id,
				'name'			=> $d->nama_produk,
				'qty' 			=> $qty,
				'price' => trim(str_replace(".", "", $d->harga_jual)),
				'harga_beli' => trim(str_replace(".", "", $d->harga_beli))
			);
		}
		$this->cart->insert($data);
		$this->ShowCartPenjualan();
	}
	function DeleteCartPenjualan($row_id)
	{
		$data = array(
			'rowid' => $row_id,
			'qty' => 0,
		);
		$this->cart->update($data);
		$this->ShowCartPenjualan();
	}
	function ShowCartPembelian()
	{
		$output = '';
		$no = 1;
		foreach ($this->cart->contents() as $items) {
			$output .= '
					<tr>
						<td class="text-center">' . $no++ . '.</td>
						<td>' . $items['name'] . '</td>
						<td>Rp<span class="float-right">' . number_format($items['price'], 0, ".", ".") . '</span></td>
						<td class="text-center">' . $items['qty'] . '</td>
						<td>Rp<span class="float-right">' . number_format(($items['qty'] * $items['price']), 0, ".", ".") . '</span></td>
						<td class="text-center">
							<button type="button" class="btn btn-sm bg-success" onclick="return tambah_lagi(`' . $items['rowid'] . '`, `' . $items['qty'] . '`)">
								<i class="fal fa-circle-plus"></i>
							</button>
							<button type="button" class="btn btn-sm bg-success" onclick="return kurangi_qty(`' . $items['rowid'] . '`, `' . $items['qty'] . '`)">
								<i class="fal fa-circle-minus"></i>
							</button>
							<button type="button" class="btn btn-sm bg-danger" onclick="return batalan(`' . $items['rowid'] . '`)">
								<i class="fal fa-circle-x"></i>
							</button>
						</td>
					</tr>
					';
		}
		$output .= '
				<tr>
					<th colspan="4" class="text-center text-bold">TOTAL</th>
					<th colspan="2" class="text-bold">Rp<span class="float-right">' . number_format($this->cart->total(), 0, ".", ".") . '</span></td>
				</tr>
		';
		echo $output;
	}
	function AddCartPembelian($id, $qty)
	{
		$where = array(
			'id' => $id
		);
		$getProduk = $this->m->Get_Where($where, 'produk');
		foreach ($getProduk as $d) {
			$data = array(
				'id'			=> $d->id,
				'name'			=> $d->nama_produk,
				'qty' 			=> $qty,
				'price' => trim(str_replace(".", "", $d->harga_beli)),
				'harga_jual' => trim(str_replace(".", "", $d->harga_jual))
			);
		}
		$this->cart->insert($data);
		$this->ShowCartPembelian();
	}
	function DeleteCartPembelian($row_id)
	{
		$data = array(
			'rowid' => $row_id,
			'qty' => 0,
		);
		$this->cart->update($data);
		$this->ShowCartPembelian();
	}
	public function penjualan()
	{
		$this->sidebar();
		$data = array(
			'transaksi' => 'open',
			'transaksi_status' => " active",
			'penjualan' => ' active',
			'penjualan_dot' => "dot-",
		);
		$this->session->set_userdata($data);
		$data['dari'] = date('Y-m-d');
		$data['sampai'] = date('Y-m-d');
		$select = $this->db->select('*, sum(harga_jual*qty) as total_omset');
		$select = $this->db->join('dt_penjualan', 'ht_penjualan.id=dt_penjualan.id');
		if (isset($_POST['cari'])) {
			$data['dari'] = $_POST['dari'];
			$data['sampai'] = $_POST['sampai'];
			$date = date('Y-m-d', strtotime($data['sampai'] . "+1 days"));
			$select = $this->db->where('waktu >= "' . $data['dari'] . '"');
			$select = $this->db->where('waktu <= "' . $date . '"');
		} else {
			$select = $this->db->where('waktu LIKE "' . date('Y-m-d') . '%"');
		}
		$select = $this->db->group_by('ht_penjualan.id');
		$select = $this->db->order_by('waktu', 'DESC');
		$data['read'] = $this->m->Get_All('ht_penjualan', $select);
		$select = $this->db->select('*');
		$data['produk'] = $this->m->Get_All('produk', $select);
		$data['total_bayar'] = 0;
		$data['total_piutang'] = 0;
		$data['total_omset'] = 0;
		foreach ($data['read'] as $r) {
			$data['total_bayar'] += $r->total_bayar;
			$data['total_omset'] += $r->total_omset;
		}
		$data['total_piutang'] = $data['total_omset'] - $data['total_bayar'];
		$data['customer'] = $this->m->Get_All('customer', $select);
		$this->load->view('kasir/penjualan', $data);
	}
	public function SaveTransaksiPenjualan()
	{
		if (count($this->cart->contents()) < 1) {
			$this->session->set_flashdata('emptycart', true);
			redirect('Kasir/penjualan');
		} else {
			$id = date('YmdHis');
			$id_customer = $this->input->post('id_customer');
			$where = array(
				'id' => preg_replace("/[^0-9]+/", "", $id_customer),
			);
			$dapat_customer = $this->m->Get_Where($where, 'customer');
			if (preg_replace("/\d/", "", $id_customer) != 'Karyawan') {
				$total_bayar = $this->cart->total();
			} else {
				$total_bayar = trim(str_replace(".", "", $this->input->post('total_bayar')));
			}
			foreach ($dapat_customer as $dc) {
				$data = array(
					'id' => $id,
					'id_customer' => $id_customer,
					'nama_customer' => $dc->nama_customer,
					'waktu' => date('Y-m-d H:i:s'),
					'total_bayar' => $total_bayar,
					'status' => $dc->status,
					'kasir' => $this->session->userdata('nama'),
				);
				$this->m->Save($data, 'ht_penjualan');
			}
			foreach ($this->cart->contents() as $items) {
				$data = array(
					'id' => $id,
					'id_produk' => $items['id'],
					'nama_produk' => $items['name'],
					'harga_beli' => $items['harga_beli'],
					'harga_jual' => $items['price'],
					'qty' => $items['qty'],
				);
				$select = $this->db->select('*');
				$select = $this->db->join('owner', 'produk.id_owner = owner.id');
				$select = $this->db->where('produk.id', $items['id']);
				$get_produk = $this->m->Get_All('produk', $select);
				foreach ($get_produk as $p) {
					$data['id_owner'] = $p->id_owner;
					$data['nama_owner'] = $p->nama_owner;
					$this->m->Save($data, 'dt_penjualan');
					$where = array(
						'id' => $items['id']
					);
					$data = array(
						'qty' => $p->qty - $items['qty']
					);
					$this->m->Update($where, $data, 'produk');
				}
			}
			$this->cart->destroy();
			redirect('Kasir/penjualan');
		}
	}
	public function CetakFakturPenjualan($id)
	{
		$where = array(
			'id'	=> $id
		);
		$data['ht_penjualan'] = $this->m->Get_Where($where, 'ht_penjualan');
		$data['dt_penjualan'] = $this->m->Get_Where($where, 'dt_penjualan');
		$this->load->view('kasir/CetakFakturPenjualan', $data);
	}
	public function pembelian()
	{
		$this->sidebar();
		$data = array(
			'transaksi' => 'open',
			'transaksi_status' => " active",
			'pembelian' => ' active',
			'pembelian_dot' => "dot-",
		);
		$this->session->set_userdata($data);
		$data['dari'] = date('Y-m-d');
		$data['sampai'] = date('Y-m-d');
		$select = $this->db->select('*, sum(harga_beli*qty) as totalin');
		$select = $this->db->join('dt_pembelian', 'ht_pembelian.id=dt_pembelian.id');
		if (isset($_POST['cari'])) {
			$data['dari'] = $_POST['dari'];
			$data['sampai'] = $_POST['sampai'];
			$date = date('Y-m-d', strtotime($data['sampai'] . "+1 days"));
			$select = $this->db->where('waktu >= "' . $data['dari'] . '"');
			$select = $this->db->where('waktu <= "' . $date . '"');
		} else {
			$select = $this->db->where('waktu LIKE "' . date('Y-m-d') . '%"');
		}
		$select = $this->db->group_by('ht_pembelian.id');
		$select = $this->db->order_by('waktu', 'DESC');
		$data['read'] = $this->m->Get_All('ht_pembelian', $select);
		$select = $this->db->select('*');
		$data['produk'] = $this->m->Get_All('produk', $select);
		$data['totalin'] = 0;
		foreach ($data['read'] as $r) {
			$data['totalin'] += $r->totalin;
		}
		$data['supplier'] = $this->m->Get_All('supplier', $select);
		$this->load->view('kasir/pembelian', $data);
	}
	public function SaveTransaksiPembelian()
	{
		if (count($this->cart->contents()) < 1) {
			$this->session->set_flashdata('emptycart', true);
			redirect('Kasir/pembelian');
		} else {
			$id = date('YmdHis');
			$id_supplier = $this->input->post('id_supplier');
			$where = array(
				'id' => $id_supplier,
			);
			$dapat_supplier = $this->m->Get_Where($where, 'supplier');
			foreach ($dapat_supplier as $ds) {
				$data = array(
					'id' => $id,
					'id_supplier' => $id_supplier,
					'nama_supplier' => $ds->nama_supplier,
					'waktu' => date('Y-m-d H:i:s'),
					'total_bayar' => $this->cart->total(),
					'kasir' => $this->session->userdata('nama'),
				);
				$this->m->Save($data, 'ht_pembelian');
			}
			foreach ($this->cart->contents() as $items) {
				$data = array(
					'id' => $id,
					'id_produk' => $items['id'],
					'nama_produk' => $items['name'],
					'harga_beli' => $items['price'],
					'harga_jual' => $items['harga_jual'],
					'qty' => $items['qty'],
				);
				$select = $this->db->select('*');
				$select = $this->db->join('owner', 'produk.id_owner = owner.id');
				$select = $this->db->where('produk.id', $items['id']);
				$get_produk = $this->m->Get_All('produk', $select);
				foreach ($get_produk as $p) {
					$data['id_owner'] = $p->id_owner;
					$data['nama_owner'] = $p->nama_owner;
					$this->m->Save($data, 'dt_pembelian');
					$where = array(
						'id' => $items['id']
					);
					$data = array(
						'qty' => $p->qty + $items['qty']
					);
					$this->m->Update($where, $data, 'produk');
				}
			}
			$this->cart->destroy();
			redirect('Kasir/pembelian');
		}
	}
	public function CetakFakturPembelian($id)
	{
		$where = array(
			'id'	=> $id
		);
		$data['ht_pembelian'] = $this->m->Get_Where($where, 'ht_pembelian');
		$data['dt_pembelian'] = $this->m->Get_Where($where, 'dt_pembelian');
		$this->load->view('kasir/CetakFakturPembelian', $data);
	}
	public function laporan_re()
	{
		$this->sidebar();
		$data = array(
			'laporan' => 'open',
			'laporan_status' => " active",
			'laporan_re' => ' active',
			'laporan_re_dot' => "dot-",
		);
		$this->session->set_userdata($data);
		$data['dari'] = date('Y-m-d');
		$data['sampai'] = date('Y-m-d', strtotime($data['dari'] . '+ 1 months'));
		$this->load->view('kasir/laporan_re', $data);
	}
	public function cetak_laporan_re()
	{
		$sampai = date('Y-m-d', strtotime($this->input->get('sampai') . ' + 1 days'));
		$select = $this->db->select('*');
		$select = $this->db->join('dt_penjualan', 'ht_penjualan.id=dt_penjualan.id');
		$select = $this->db->where('ht_penjualan.waktu >= "' . $this->input->get('dari') . '"');
		$select = $this->db->where('ht_penjualan.waktu <= "' . $sampai . '"');
		$select = $this->db->where('id_owner', '1');
		$data['penjualan'] = $this->m->Get_All('ht_penjualan', $select);
		$data['dari'] = $this->input->get('dari');
		$data['sampai'] = $this->input->get('sampai');
		$this->load->view('kasir/CetakLaporanRE', $data);
	}
	public function laporan_owner()
	{
		$this->sidebar();
		$data = array(
			'laporan' => 'open',
			'laporan_status' => " active",
			'laporan_owner' => ' active',
			'laporan_owner_dot' => "dot-",
		);
		$this->session->set_userdata($data);
		$select = $this->db->select('*');
		$select = $this->db->where('id >' . '1');
		$data['owner'] = $this->m->Get_All('owner', $select);
		$data['dari'] = date('Y-m-d');
		$data['sampai'] = date('Y-m-d', strtotime($data['dari'] . '+ 1 months'));
		$this->load->view('kasir/laporan_owner', $data);
	}
	public function cetak_laporan_owner()
	{
		$sampai = date('Y-m-d', strtotime($this->input->get('sampai') . ' + 1 days'));
		$select = $this->db->select('*');
		$select = $this->db->join('dt_penjualan', 'ht_penjualan.id=dt_penjualan.id');
		$select = $this->db->where('waktu >= "' . $this->input->get('dari') . '"');
		$select = $this->db->where('waktu <= "' . $sampai . '"');
		$select = $this->db->where('id_owner', $_GET['owner']);
		$data['penjualan'] = $this->m->Get_All('ht_penjualan', $select);
		$data['nama_owner'] = "";
		foreach ($data['penjualan'] as $d) {
			$data['nama_owner'] = $d->nama_owner;
		}
		$data['dari'] = $this->input->get('dari');
		$data['sampai'] = $this->input->get('sampai');
		$this->load->view('kasir/CetakLaporanOwner', $data);
	}
	public function laporan_supplier()
	{
		$this->sidebar();
		$data = array(
			'laporan' => 'open',
			'laporan_status' => " active",
			'laporan_supplier' => ' active',
			'laporan_supplier_dot' => "dot-",
		);
		$this->session->set_userdata($data);
		$select = $this->db->select('*, ht_pembelian.id as id')->join('supplier', 'supplier.id = ht_pembelian.id_supplier');
		$data['read'] = $this->m->Get_All('ht_pembelian', $select);
		$select = $this->db->select('*');
		$data['supplier'] = $this->m->Get_All('supplier', $select);
		$data['dari'] = date('Y-m-d');
		$data['sampai'] = date('Y-m-d', strtotime($data['dari'] . ' + 1 months'));
		$this->load->view('kasir/laporan_supplier', $data);
	}
	public function cetak_laporan_supplier()
	{
		$sampai = date('Y-m-d', strtotime($this->input->get('sampai') . ' + 1 days'));
		$select = $this->db->select('*');
		$select = $this->db->join('dt_pembelian', 'ht_pembelian.id=dt_pembelian.id');
		$select = $this->db->where('waktu >= "' . $this->input->get('dari') . '"');
		$select = $this->db->where('waktu <= "' . $sampai . '"');
		$select = $this->db->where('id_supplier', $_GET['supplier']);
		$data['pembelian'] = $this->m->Get_All('ht_pembelian', $select);
		$data['nama_supplier'] = "";
		foreach ($data['pembelian'] as $d) {
			$data['nama_supplier'] = $d->nama_supplier;
		}
		$data['dari'] = $this->input->get('dari');
		$data['sampai'] = $this->input->get('sampai');
		$this->load->view('kasir/CetakLaporanSupplier', $data);
	}
	public function laporan_seluruh_supplier()
	{
		$this->sidebar();
		$data = array(
			'laporan' => 'open',
			'laporan_status' => " active",
			'laporan_seluruh_supplier' => ' active',
			'laporan_seluruh_supplier_dot' => "dot-",
		);
		$this->session->set_userdata($data);
		$select = $this->db->select('*, ht_pembelian.id as id')->join('supplier', 'supplier.id = ht_pembelian.id_supplier');
		$data['read'] = $this->m->Get_All('ht_pembelian', $select);
		$select = $this->db->select('*');
		$data['supplier'] = $this->m->Get_All('supplier', $select);
		$data['dari'] = date('Y-m-d');
		$data['sampai'] = date('Y-m-d', strtotime($data['dari'] . ' + 1 months'));
		$this->load->view('kasir/laporan_seluruh_supplier', $data);
	}
	public function cetak_laporan_seluruh_supplier()
	{
		$sampai = date('Y-m-d', strtotime($this->input->get('sampai') . ' + 1 days'));
		$select = $this->db->select('*');
		$select = $this->db->join('dt_pembelian', 'ht_pembelian.id=dt_pembelian.id');
		$select = $this->db->where('waktu >= "' . $this->input->get('dari') . '"');
		$select = $this->db->where('waktu <= "' . $sampai . '"');
		$data['pembelian'] = $this->m->Get_All('ht_pembelian', $select);
		$data['dari'] = $this->input->get('dari');
		$data['sampai'] = $this->input->get('sampai');
		$this->load->view('kasir/CetakLaporanSeluruhSupplier', $data);
	}
	public function laporan_piutang()
	{
		$this->sidebar();
		$data = array(
			'laporan' => 'open',
			'laporan_status' => " active",
			'laporan_piutang' => ' active',
			'laporan_piutang_dot' => "dot-",
		);
		$this->session->set_userdata($data);
		$select = $this->db->select('*, ht_pembelian.id as id')->join('supplier', 'supplier.id = ht_pembelian.id_supplier');
		$data['read'] = $this->m->Get_All('ht_pembelian', $select);
		$select = $this->db->select('*');
		$data['supplier'] = $this->m->Get_All('supplier', $select);
		$data['dari'] = date('Y-m-d');
		$data['sampai'] = date('Y-m-d', strtotime($data['dari'] . ' + 1 months'));
		$this->load->view('kasir/laporan_piutang', $data);
	}
	public function cetak_laporan_piutang()
	{
		$sampai = date('Y-m-d', strtotime($this->input->get('sampai') . ' + 1 days'));
		$select = $this->db->select('*, sum(total_bayar) as total_bayar, sum(harga_jual * qty) as total_omset');
		$select = $this->db->join('dt_penjualan', 'ht_penjualan.id=dt_penjualan.id');
		$select = $this->db->where('status = ', 'Karyawan');
		$select = $this->db->where('waktu >= "' . $this->input->get('dari') . '"');
		$select = $this->db->where('waktu <= "' . $sampai . '"');
		$select = $this->db->group_by('ht_penjualan.id_customer');
		$select = $this->db->order_by('ht_penjualan.id');
		$data['penjualan'] = $this->m->Get_All('ht_penjualan', $select);
		$data['dari'] = $this->input->get('dari');
		$data['sampai'] = $this->input->get('sampai');
		$this->load->view('kasir/CetakLaporanPiutang', $data);
	}
	public function laporan_saldo_periode()
	{
		$this->sidebar();
		$data = array(
			'laporan' => 'open',
			'laporan_status' => " active",
			'laporan_saldo_periode' => ' active',
			'laporan_saldo_periode_dot' => "dot-",
		);
		$this->session->set_userdata($data);
		$data['dari'] = date('Y-m-d');
		$data['sampai'] = date('Y-m-d', strtotime($data['dari'] . '+ 1 months'));
		$this->load->view('kasir/laporan_saldo_periode', $data);
	}
	public function cetak_laporan_saldo_periode()
	{
		$sampai = date('Y-m-d', strtotime($this->input->get('sampai') . ' + 1 days'));
		$select = $this->db->select('*');
		$select = $this->db->join('dt_penjualan', 'ht_penjualan.id=dt_penjualan.id');
		$select = $this->db->join('produk', 'dt_penjualan.id_produk=produk.id');
		$select = $this->db->join('kategori', 'produk.id_kategori=kategori.id');
		$select = $this->db->where('ht_penjualan.waktu >= "' . $this->input->get('dari') . '"');
		$select = $this->db->where('ht_penjualan.waktu <= "' . $sampai . '"');
		$data['penjualan'] = $this->m->Get_All('ht_penjualan', $select);
		$data['pembelian'] = $this->m->Get_All('dt_pembelian', $select);
		$data['dari'] = $this->input->get('dari');
		$data['sampai'] = $this->input->get('sampai');
		$this->load->view('kasir/CetakLaporanSaldoPeriode', $data);
	}
	public function profil()
	{
		$select = $this->db->select('*');
		$data['read'] = $this->m->Get_All('user', $select);
		$this->load->view('kasir/profil', $data);
	}
}
