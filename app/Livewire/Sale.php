<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Customer;
use App\Models\SalesDetail;
use App\Models\Sale as ModelSale;

class Sale extends Component
{
    public $SalesID, $ProductID, $total, $getChange, $totalAll, $sale_date;
    public $saleActive;
    public $messageError;
    public $pay = 0;
    public $searchMember = '';
    public $members = [];
    public $Customer_ID;
    public $customerName;
    public $customerPhone;
    public $product;
    public $Product_ID;
    public $productName;
    public $searchProduct = '';
    public $products = [];
    public $discount = false;
    public $subtotal = 0;

    public function newSale()
    {
        $this->reset();
        $this->saleActive = new ModelSale();
        $this->saleActive->SalesID = 'INV/' . date('YmdHis');
        $this->saleActive->total = 0;
        $this->saleActive->sale_date = date('Y-m-d H:i:s');
        $this->saleActive->status = 'pending';
        $this->saleActive->payment = 0;
        $this->saleActive->discount = false;
        $this->saleActive->subtotal = 0;
        // $this->saleActive->Customer_ID = $this->Customer_ID ?? null;
        $this->saleActive->save();
    }


    public function updatedSearchMember()
    {
        $this->members = Customer::where('name_customer', 'like', '%' . $this->searchMember . '%')->get();
    }

    public function selectMember($customer_id)
    {
        $this->Customer_ID = $customer_id;

        // Ambil nama pelanggan berdasarkan Customer_ID
        $member = Customer::find($customer_id);
        $this->customerName = $member ? $member->name_customer : 'No customer selected';
        $this->customerPhone = $member ? $member->phone : 'No phone selected';

        $this->saleActive->Customer_ID = $customer_id;
        $this->saleActive->discount = 5;
        $this->saleActive->save();

        $this->searchMember = '';
        $this->members = [];
    }

    public function updatedSearchProduct()
    {
        $this->products = Product::where('name_product', 'like', '%' . $this->searchProduct . '%')->get();
    }

    public function selectProduct($product_id)
    {
        $this->Product_ID = $product_id;

        $product = Product::find($product_id);

        if (!$product) {
            $this->messageError = 'Product not found';
        } else {
            $this->messageError = null;
        }

        if ($product && $product->stock > 0) {
            $detail = SalesDetail::firstOrNew([
                'Sales_ID' => $this->saleActive->id,
                'Product_ID' => $product->id,
            ], [
                'quantity' => 0
            ]);

            $detail->quantity += 1;
            $detail->save();
            $product->stock -= 1;
            $product->save();
            $this->searchProduct = '';
            $this->products = [];
            $this->reset('ProductID'); // Reset ProductID setelah menambahkan detail produk
        } else {
            $this->messageError = 'Product out of stock';
        }
    }

    // public function selectProduct($product_id) {
    //     $this->Product_ID = $product_id;

    //     $product = \App\Models\Product::find($product_id);
    //     $this->productName = $product ? $product->name_product : 'No product selected';
    //     $this->saleActive->Product_ID = $product_id;
    //     $this->saleActive->save();

    //     $this->searchProduct = '';
    //     $this->products = [];

    //     $productk = Product::where('name_product', $this->ProductID)->first();

    //     if (!$productk) {
    //         $this->messageError = 'Product not found';
    //     } else {
    //         $this->messageError = null;
    //     }

    //     if ($productk && $productk->stock > 0) {
    //         $detail = SalesDetail::firstOrNew([
    //             'Sales_ID' => $this->saleActive->id,
    //             'Product_ID' => $productk->id,
    //         ], [
    //             'quantity' => 0
    //         ]);
    //         $detail->quantity += 1;
    //         $detail->save();
    //         $productk->stock -= 1;
    //         $product->save();
    //         $this->reset('ProductID'); // Reset ProductID setelah menambahkan detail produk
    //     }
    // }


    public function payDone()
    {
        $this->saleActive->total = $this->totalAll;
        $this->saleActive->status = 'done';
        $this->saleActive->subtotal = $this->totalAll / (1 - ($this->saleActive->discount / 100));
        $this->saleActive->Customer_ID = $this->Customer_ID;
        $this->saleActive->payment = $this->pay;
        $this->saleActive->save();
        $this->reset();
    }


    public function deleteProduct($id)
    {
        $detail = SalesDetail::find($id);
        if ($detail) {
            // Cari produk yang terkait dengan detail pesanan
            $product = Product::find($detail->Product_ID);
            // Tambahkan kembali jumlah ke stok produk
            if ($product) {
                $product->stock += $detail->quantity;
                $product->save();
            }
            // Hapus detail pesanan setelah stok ditambah
            $detail->delete();
        }
    }

    public function cancelSale()
    {
        if ($this->saleActive) {
            // Ambil semua detail penjualan yang terkait dengan penjualan saat ini
            $saleDetail = SalesDetail::where('Sales_ID', $this->saleActive->id)->get();
            foreach ($saleDetail as $detail) {
                // Update stok produk dengan menambahkan jumlah yang dihapus
                $product = Product::find($detail->Product_ID);
                if ($product) {
                    $product->stock += $detail->quantity;
                    $product->save();
                }
                // Hapus detail pesanan
                $detail->delete();
            }
            // Hapus objek penjualan
            $this->saleActive->delete();
        }
        $this->reset();
    }


    public function updatedPay()
    {
        if ($this->pay > 0) {
            $this->getChange = $this->pay - $this->totalAll;
        }
    }

    public function render()
    {
        if ($this->saleActive) {
            $allProduct = SalesDetail::with('product') // Pastikan relasi product di-load
                ->where('Sales_ID', $this->saleActive->id)
                ->get();

            // Menghitung subtotal tanpa diskon
            $this->subtotal = $allProduct->sum(function ($detail) {
                return $detail->product->price * $detail->quantity;
            });

            // Menghitung total setelah diskon (jika ada)
            $this->totalAll = $this->subtotal;
            if ($this->saleActive->discount > 0) {
                $this->totalAll *= (1 - $this->saleActive->discount / 100);
            }
        } else {
            $allProduct = [];
        }

        return view('livewire.sale', compact('allProduct'));
    }


}
