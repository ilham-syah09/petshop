<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Frontend extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->u1 = $this->uri->segment(1);

        $this->load->model('M_Front', 'front');

        if (empty($this->session->userdata('log_user'))) {
            $this->dt_user = null;
        } else {
            $this->db->where('id', $this->session->userdata('id'));
            $this->dt_user = $this->db->get('user')->row();

            $this->orders = count($this->front->getListOrders([
                'idUser' => $this->dt_user->id
            ]));

            $this->cart = $this->front->getCart([
                'keranjang.idUser' => $this->dt_user->id,
                'keranjang.status' => 0
            ]);
        }

        $this->kategori = $this->front->getKategori();
    }

    private function _authentication()
    {
        if (empty($this->session->userdata('log_user'))) {
            $this->session->set_flashdata('toastr-error', 'Please log in first!');
            redirect('auth', 'refresh');
        }
    }

    private function _authenticationJson()
    {
        if (empty($this->session->userdata('log_user'))) {
            $response = [
                'status' => 'gagal',
                'msg'    => 'Please log in first!'
            ];

            echo json_encode($response);
            die;
        }
    }

    public function index()
    {
        $data = [
            'title'           => 'Home | Petshop',
            'page'            => 'frontend/home',
            'kategori'        => $this->front->getKategori(),
            'productsPopuler' => $this->front->getPopularProducts(),
            'productRandom'   => $this->front->getProductRandom(null, 6),
        ];

        $this->load->view('frontend/index', $data);
    }

    public function shop($id = null, $page = null)
    {
        if (!$id) {
            $kategori = $this->front->getKategori();
            $id       = $kategori[0]->id;
        }

        $where = [
            'kategori_id' => $id
        ];

        $per_page = 6;

        $products = $this->front->getProductsShop($where, $per_page, $this->_paging_offset($page, $per_page));

        $total_rows = $this->front->getCountProduct($where);

        $data = [
            'title'           => 'Shop | Petshop',
            'page'            => 'frontend/shop',
            'kategori'        => $this->front->getKategori(),
            'productsPopuler' => $this->front->getPopularProducts(),
            'products'        => $products,
            'kategori_ini'    => $id,
            'paging'          => $this->_paging(base_url('shop/') . $id, $total_rows, $per_page),
            'total_rows'      => $total_rows,
            'per_page'        => $per_page,
            'kategori_id'     => $id
        ];

        $this->load->view('frontend/index', $data);
    }

    public function detail($id)
    {
        $product = $this->front->getProduct([
            'barang.id' => $id
        ]);

        $this->db->where('id', $product->kategori_id);

        $kategori = $this->db->get('kategori')->row();

        $gambar = $this->front->getGambar([
            'idBarang' => $id
        ]);

        $review = $this->front->getReview([
            'review.idBarang' => $id
        ]);

        $rating = $this->front->getRating([
            'idBarang' => $id
        ]);

        $rating = [
            'rating' => round($rating->rating, 1),
            'total'  => $rating->total
        ];

        $productRandom = $this->front->getProductRandom([
            'id <>' => $id,
            'kategori_id' => $kategori->id
        ], 8);

        // echo json_encode($productRandom);
        // die;

        $data = [
            'title'             => 'Shop Detail | Citra Bakery',
            'page'              => 'frontend/detail',
            'kategori'          => $this->front->getKategori(),
            'kategori_sekarang' => $kategori,
            'product'           => $product,
            'gambar'            => $gambar,
            'products'          => $productRandom,
            'productsPopuler'   => $this->front->getPopularProducts(),
            'review'            => $review,
            'rating'            => $rating
        ];

        $this->load->view('frontend/index', $data);
    }

    public function contact()
    {
        $data = [
            'title'    => 'Contact | Citra Bakery',
            'page'     => 'frontend/contact',
            'kategori' => $this->front->getKategori()
        ];

        $this->load->view('frontend/index', $data);
    }

    public function cart()
    {
        $this->_authentication();

        $cart = $this->front->getCart([
            'keranjang.idUser' => $this->dt_user->id,
            'keranjang.status' => 0
        ]);

        $data = [
            'title'    => 'Cart | Citra Bakery',
            'page'     => 'frontend/cart',
            'kategori' => $this->front->getKategori(),
            'cart'     => $cart
        ];

        $this->load->view('frontend/index', $data);
    }

    public function checkout()
    {
        $this->_authentication();

        $cart = $this->front->getCart([
            'keranjang.idUser' => $this->dt_user->id,
            'keranjang.status' => 0
        ]);

        $data = [
            'title'    => 'Checkout | Citra Bakery',
            'page'     => 'frontend/checkout',
            'kategori' => $this->front->getKategori(),
            'cart'     => $cart
        ];

        $this->load->view('frontend/index', $data);
    }

    public function orders()
    {
        $this->_authentication();

        $orders = $this->front->getListOrders([
            'idUser' => $this->dt_user->id
        ]);

        $data = [
            'title'    => 'List Orders | Citra Bakery',
            'page'     => 'frontend/orders',
            'kategori' => $this->front->getKategori(),
            'orders'   => $orders
        ];

        $this->load->view('frontend/index', $data);
    }

    public function addToCart()
    {
        $this->_authenticationJson();

        $barang = $this->front->getBarang([
            'id' => $this->input->get('idBarang')
        ]);

        $cek = $this->front->checkCart([
            'idUser'   => $this->dt_user->id,
            'idBarang' => $this->input->get('idBarang'),
            'status'   => 0
        ]);

        if ($cek) {
            $response = [
                'status' => 'gagal',
                'msg'    => 'The product is already in your cart'
            ];
        } else {
            if ($barang->stok < 1) {
                $response = [
                    'status' => 'gagal',
                    'msg'    => 'Product is sold out'
                ];
            } elseif ($barang->stok < $this->input->get('qty')) {
                $response = [
                    'status' => 'gagal',
                    'msg'    => 'Quantity must not exceed stock'
                ];
            } else {
                if ($this->input->get('qty') == null) {
                    $data = [
                        'idUser'   => $this->dt_user->id,
                        'idBarang' => $this->input->get('idBarang')
                    ];
                } else {
                    $data = [
                        'idUser'   => $this->dt_user->id,
                        'idBarang' => $this->input->get('idBarang'),
                        'total'    => $this->input->get('qty')
                    ];
                }

                $insert = $this->db->insert('keranjang', $data);

                if ($insert) {
                    $response = [
                        'status' => 'sukses',
                        'msg'    => 'The product has been successfully added to your cart'
                    ];
                } else {
                    $response = [
                        'status' => 'sukses',
                        'msg'    => 'Product failed to add to your cart'
                    ];
                }
            }
        }

        echo json_encode($response);
    }

    public function deleteCart()
    {
        $this->_authentication();

        $this->db->where('id', $this->input->post('id'));
        $delete = $this->db->delete('keranjang');

        if ($delete) {
            $this->session->set_flashdata('toastr-success', 'Successfully deleted the product in the cart');
        } else {
            $this->session->set_flashdata('toastr-error', 'Failed to delete product in cart!!');
        }

        redirect('cart', 'refresh');
    }

    public function updateQuantity()
    {
        $this->_authentication();

        $id    = $this->input->post('id');
        $total = $this->input->post('total');
        $harga = $this->input->post('harga');

        $data = [
            'total' => $total
        ];

        $this->db->where('id', $id);
        $update = $this->db->update('keranjang', $data);

        if ($update) {
            $cart = $this->front->getTotalPrice([
                'keranjang.idUser' => $this->dt_user->id,
                'keranjang.status' => 0
            ]);

            $res = [
                'status'   => true,
                'total'    => 'Rp. ' . number_format($cart->total, 0, ',', '.'),
                'subTotal' => 'Rp. ' . number_format(($total * $harga), 0, ',', '.')
            ];
        } else {
            $res = [
                'status' => false
            ];
        }

        echo json_encode($res);
    }

    public function placeOrder()
    {
        $this->_authentication();

        $alamat           = $this->input->post('alamat');
        $catatan          = $this->input->post('catatan');
        // $tanggal          = $this->input->post('tanggal');
        // $jam              = $this->input->post('jam');
        // $opsi             = $this->input->post('opsi');
        // $idOngkir         = $this->input->post('idOngkir');
        $metodePembayaran = $this->input->post('payment');
        $totalBiaya       = $this->input->post('total');

        $cart = $this->front->getCart([
            'keranjang.idUser' => $this->dt_user->id,
            'keranjang.status' => 0
        ]);

        $data     = [];
        $idKhusus = $this->dt_user->id . '-' . date('YmdHis');

        foreach ($cart as $c) {
            $this->db->where('id', $c->id);
            $this->db->update('keranjang', [
                'status' => 1
            ]);

            $this->db->set('stok', 'stok - ' . $c->total, FALSE);
            $this->db->where('id', $c->idBarang);
            $this->db->update('barang');

            array_push($data, [
                'idUser'           => $this->dt_user->id,
                'idKeranjang'      => $c->id,
                'alamat'           => $alamat,
                'catatan'          => $catatan,
                // 'idOngkir'         => $idOngkir,
                'metodePembayaran' => $metodePembayaran,
                // 'tanggal'          => $tanggal,
                // 'jam'              => $jam,
                // 'opsi'             => $opsi,
                'idKhusus'         => $idKhusus,
                'totalBiaya'       => $totalBiaya
            ]);
        }

        $insert = $this->db->insert_batch('orders', $data);

        if ($insert) {
            $this->session->set_flashdata('toastr-success', 'The product has been successfully ordered');
        } else {
            $this->session->set_flashdata('toastr-error', 'Product failed to order!!');
        }

        redirect('orders', 'refresh');
    }

    public function getListProduct()
    {
        $this->_authentication();

        $result = [
            'data' => $this->front->getListProduct([
                'orders.idUser'   => $this->dt_user->id,
                'orders.idKhusus' => $this->input->get('idKhusus'),
            ])
        ];

        echo json_encode($result);
    }

    public function print($idKhusus)
    {
        $this->_authentication();

        $data = [
            'pesanan' => $this->front->getListProduct([
                'orders.idUser'   => $this->dt_user->id,
                'orders.idKhusus' => $idKhusus,
            ])
        ];

        $this->load->view('frontend/pdf_pesanan', $data);
    }

    public function uploadBerkas()
    {
        $this->_authentication();

        $gambar = $_FILES['gambar']['name'];

        if ($gambar) {
            $this->load->library('upload');
            $config['upload_path']   = './upload/bukti';
            $config['allowed_types'] = 'jpg|jpeg|png';
            // $config['max_size']             = 3072; // 3 mb
            $config['remove_spaces'] = TRUE;
            $config['detect_mime']   = TRUE;
            $config['encrypt_name']  = TRUE;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('gambar')) {
                $this->session->set_flashdata('toastr-error', $this->upload->display_errors());

                redirect('orders', 'refresh');
            } else {
                $upload_data = $this->upload->data();

                $data = [
                    'buktiPembayaran' => $upload_data['file_name']
                ];
            }
        } else {
            $this->session->set_flashdata('toastr-error', 'File cannot be empty');

            redirect('orders', 'refresh');
        }

        $where = [
            'idUser'   => $this->dt_user->id,
            'idKhusus' => $this->input->post('idKhusus')
        ];

        $this->db->where($where);
        $order = $this->db->get('orders')->row();

        $this->db->where($where);
        $update = $this->db->update('orders', $data);

        if ($update) {
            if ($order->buktiPembayaran != null) {
                unlink(FCPATH . 'upload/bukti/' . $order->buktiPembayaran);
            }
            $this->session->set_flashdata('toastr-success', 'File uploaded successfully');
        } else {
            $this->session->set_flashdata('toastr-error', 'File failed to upload');
        }

        redirect('orders', 'refresh');
    }

    public function getListProgres()
    {
        $this->_authentication();

        $progres = $this->front->getListProgres([
            'idUser'   => $this->dt_user->id,
            'idKhusus' => $this->input->get('idKhusus'),
        ]);

        $result = [
            'data' => ($progres) ? $progres : null
        ];

        echo json_encode($result);
    }

    public function review()
    {
        $this->_authentication();

        $chart = $this->front->checkCart([
            'idUser'   => $this->dt_user->id,
            'idBarang' => $this->input->post('idBarang')
        ]);

        if (!$chart) {
            $this->session->set_flashdata('toastr-error', 'Please order this product first!!');
            redirect($_SERVER['HTTP_REFERER'], 'refresh');
        }

        if ($this->input->post('rating') == 0 || $this->input->post('review') == '') {
            $this->session->set_flashdata('toastr-error', 'Please choose the rating correctly!!');
        } else {

            $data = [
                'idUser'   => $this->dt_user->id,
                'idBarang' => $this->input->post('idBarang'),
                'rating'   => $this->input->post('rating'),
                'review'   => $this->input->post('review')
            ];

            $insert = $this->db->insert('review', $data);

            if ($insert) {
                $this->session->set_flashdata('toastr-success', 'Review successfully sent');
            } else {
                $this->session->set_flashdata('toastr-error', 'Review failed to send!!');
            }
        }

        redirect($_SERVER['HTTP_REFERER'], 'refresh');
    }

    public function message()
    {
        $data = [
            'name'    => $this->input->post('name'),
            'email'   => $this->input->post('email'),
            'subject' => $this->input->post('subject'),
            'message' => $this->input->post('message')
        ];

        $insert = $this->db->insert('pesan', $data);

        if ($insert) {
            $this->session->set_flashdata('toastr-success', 'Message successfully sent');
        } else {
            $this->session->set_flashdata('toastr-error', 'Message failed to send!!');
        }

        redirect('contact', 'refresh');
    }

    private function _paging_offset($page, $limit)
    {
        if ($page > 1) {
            $offset = ($page - 1) * $limit;
        } else {
            $offset = $page;
        }

        return $offset;
    }

    private function _paging_tag()
    {
        $config['full_tag_open']   = "<ul class='pagination justify-content-center mb-3 my-auto'>";
        $config['full_tag_close']  = "</ul>";
        $config['first_tag_open']  = "<li class='page-link'>";
        $config['first_tag_close'] = "</li>";
        $config['next_tag_open']   = "<li class='page-link'>";
        $config['next_tag_close']  = "</li>";
        $config['cur_tag_open']    = "<li class='page-link active'><a>";
        $config['cur_tag_close']   = "</a></li>";
        $config['num_tag_open']    = "<li class='page-link'>";
        $config['num_tag_close']   = "</li>";
        $config['prev_tag_open']   = "<li class='page-link'>";
        $config['prev_tag_close']  = "</li>";
        $config['last_tag_open']   = "<li class='page-link'>";
        $config['last_tag_close']  = "</li>";
        $config['first_link']      = "First";
        $config['last_link']       = "Last";
        $config['next_link']       = "&raquo;";
        $config['prev_link']       = "&laquo;";

        return $config;
    }

    private function _paging($base_url, $total_rows, $per_page)
    {
        $this->load->library('pagination');
        $config                       = $this->_paging_tag();
        $config['base_url']           = $base_url;
        $config['total_rows']         = $total_rows;
        $config['per_page']           = $per_page;
        $config['use_page_numbers']   = TRUE;
        $config['reuse_query_string'] = TRUE;

        $this->pagination->initialize($config);

        return $this->pagination->create_links();
    }

    public function profile()
    {
        $data = [
            'title' => 'Profile | Citra Bakery',
            'page'  => 'frontend/profile',
        ];

        $this->load->view('frontend/index', $data);
    }

    public function changeProfile()
    {
        $img = $_FILES['image']['name'];

        if ($img) {
            $config['upload_path']   = 'upload/profile';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size']      = 2000;
            $config['remove_spaces'] = TRUE;
            $config['encrypt_name']  = TRUE;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('image')) {
                $this->session->set_flashdata('toastr-error', $this->upload->display_errors());
                redirect('profile');
            } else {
                $upload_data = $this->upload->data();
                $previmage   = $this->input->post('previmage');

                $data = [
                    'name'   => $this->input->post('name'),
                    'noHp'   => $this->input->post('noHp'),
                    'alamat' => $this->input->post('alamat'),
                    'image'  => $upload_data['file_name']
                ];

                $this->db->where('id', $this->dt_user->id);
                $insert = $this->db->update('user', $data);

                if ($insert) {
                    if ($previmage != 'default.jpg') {
                        unlink(FCPATH . 'upload/profile/' . $previmage);
                    }
                    $this->session->set_flashdata('toastr-success', 'success !');
                    redirect('profile');
                } else {
                    $this->session->set_flashdata('toastr-error', 'failed!');
                    redirect('profile');
                }
            }
        } else {
            $data = [
                'name'   => $this->input->post('name'),
                'noHp'   => $this->input->post('noHp'),
                'alamat' => $this->input->post('alamat'),
            ];

            $this->db->where('id', $this->dt_user->id);
            $insert = $this->db->update('user', $data);

            if ($insert) {
                $this->session->set_flashdata('toastr-success', 'success !');
                redirect('profile');
            } else {
                $this->session->set_flashdata('toastr-error', 'failed!');
                redirect('profile');
            }
        }
    }

    public function changePassword()
    {
        $current_password = $this->input->post('current_password');

        if (password_verify($current_password, $this->dt_user->password)) {
            $this->form_validation->set_rules('password', 'New Password', 'trim|required|matches[retype_password]');
            $this->form_validation->set_rules('retype_password', 'Retype New Password', 'trim|required|matches[password]');


            if ($this->form_validation->run() == TRUE) {
                $data = [
                    'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT)
                ];

                $this->db->where('id', $this->dt_user->id);
                $this->db->update('user', $data);
                $this->session->set_flashdata('toastr-success', 'Success! Your Password Changed!');
                redirect('profile');
            } else {
                $this->session->set_flashdata('toastr-error', 'Failed! Password Dont Match!');
                redirect('profile');
            }
        } else {
            $this->session->set_flashdata('toastr-error', 'Failed! Wrong Current Password');
            redirect('profile');
        }
    }
}

      /* End of file Frontend.php */
