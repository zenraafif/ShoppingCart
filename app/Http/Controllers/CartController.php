<?php

namespace App\Http\Controllers;

use DB;
use Request;
use Session;
use File;
use Illuminate\Support\Facades\Input;

class CartController extends Controller
{
    public function cart(){
    	return view('cart/cart');
    }
    public function home(){
    	return view('cart/index');
    }
    public function form(){
    	return view('cart/form');
    }
    public function pembelian(){
    	return view('cart/pembelian');
    }
    public function checkout(Request $request){
        $part = Request::input('part');
        $merk = Request::input('merk');
        $serial = Request::input('serial');
        $quantity = Request::input('quantity');
        $price = Request::input('price');
        $subtotal = Request::input('subtotal');
        $total = Request::input('total');
        $master_id  = DB::table('master')->select('id')->latest()->first()->id+1;
        $id_pembayaran = uniqid(10);

        $save['part'] = $part;
        $save['merk'] = $merk;
        $save['serial'] = $serial;
        $save['quantity'] = $quantity;
        $save['price'] = $price;
        $save['subtotal'] = $subtotal;
        $master['payment_id'] = $id_pembayaran;
        $master['total'] = $total;


        if (isset($_POST['simpan'])) {
            $actions = DB::table('master')->insert($master);
            for($i=0; $i<count($part); $i++)
            {
                $action = DB::table('orders_details')->insert(array('master_id' => $master_id, 'part' => $part[$i], 'merk' => $merk[$i], 'no_serial' => $serial[$i], 'quantity' => $quantity[$i], 'price' => $price[$i], 'subtotal' => $subtotal[$i] ));
            } 
            if ($action === TRUE) {
                return redirect('cart/pembelian')->with('alert-success', 'Berhasil !');
            }else{
                return redirect('cart/pembelian')->with('alert', 'Gagal Ditambahkan !');
            }
        } else if (isset($_POST['checkout'])) {
            return view('cart/checkout',$save);
        } else {
            echo "no button ";
        }

        // if ( isset($_POST['simpan']) ) {
        //     $actions = DB::table('master')->insert($master);
        //     for($i=0; $i<count($part); $i++)
        //       {
        //         $action = DB::table('orders_details')->insert(array('master_id' => $master_id, 'part' => $part[$i], 'merk' => $merk[$i], 'no_serial' => $serial[$i], 'quantity' => $quantity[$i], 'price' => $price[$i], 'subtotal' => $subtotal[$i] ));
        //       } 
        //     if ($action === TRUE) {
        //         return redirect('pembelian')->with('alert-success', 'Berhasil !');
        //     }else{
        //         return redirect('pembelian')->with('alert', 'Gagal Ditambahkan !');
        //     }
        // }else{
        //     dd($save);
        // }
    }
    public function TambahPinjamanAction(Request $request){

        $part = Request::input('part');
        $merk = Request::input('merk');
        $serial = Request::input('serial');   
        $quantity = Request::input('quantity');
        $price = Request::input('price');
        $subtotal = Request::input('subtotal');
        $total = Request::input('total');
        $master_id  = DB::table('master')->select('id')->latest()->first()->id+1;
        $id_pembayaran = uniqid(10);



        $save['part'] = $part;
        $save['merk'] = $merk;
        $save['serial'] = $serial;
        $save['quantity'] = $quantity;
        $save['price'] = $price;
        $save['subtotal'] = $subtotal;
        $master['payment_id'] = $id_pembayaran;
        $master['total'] = $total;

        $actions = DB::table('master')->insert($master);
        for($i=0; $i<count($part); $i++)
        {
            $action = DB::table('orders_details')->insert(array('master_id' => $master_id, 'part' => $part[$i], 'merk' => $merk[$i], 'no_serial' => $serial[$i], 'quantity' => $quantity[$i], 'price' => $price[$i], 'subtotal' => $subtotal[$i] ));
        } 
        if ($action === TRUE) {
            return redirect('riwayat')->with('alert-success', 'Berhasil !');
        }else{
            return redirect('riwayat')->with('alert', 'Gagal Ditambahkan !');
        }
    }
    public function riwayat(){ 
        $riwayat = DB::table('master')
        ->join('orders_details', 'master.id', '=', 'orders_details.master_id')
        ->select()
        ->get();
        $master = DB::table('master')
        ->get();
        $arr['master']=$master;
        return view('cart/riwayatPembelian', $arr); 
    }
    public function hapusRiwayat($id){
        $deleteMaster = DB::table('master')->where('id',$id)->delete();
        $deleteOrder = DB::table('orders_details')->where('master_id',$id)->delete();

        if ($deleteOrder === FALSE) {
            return redirect('riwayat')->with('alert', 'Gagal Dihapus !');
        }else{
            return redirect('riwayat')->with('alert-success', 'Berhasil !');
        }
    }
    public function getEdit($id){
        $orders_details = DB::table('master')
        ->join('orders_details', 'master.id', '=', 'orders_details.master_id')
        ->select()
        ->where('master_id',$id)
        ->get();
        $master = DB::table('master')
        ->where('id',$id)
        ->get();
        $arr['master'] = $master;
        $arr['orders_details'] = $orders_details;
        return view('cart/ordersDetails', $arr);
    }
    public function edit_action(Request $request, $id){
        //     $getID =DB::table('orders_details')->select('id')->where('master_id', $id)->get();
        //     dd($getID);
            $order_id = request::input('id');
            $part = request::input('part');
            $merk = request::input('merk');
            $serial = request::input('serial');
            $quantity = request::input('quantity');
            $price = request::input('price');
            $subtotal = request::input('subtotal');
            $total = request::input('total');

            $master['total'] = $total;
        // for ($i=0; $i < $part; $i++) { 
        //     $test = DB::table('orders_details')
        //     ->where('id', $id)
        //     ->update(['part' => $part[$i],'merk' => $merk[$i]  ]);  
        // }
        for ($i=0; $i<count($part); $i++) {
            $orders_details = DB::table('orders_details')
                    ->where('id',$order_id[$i])
                    ->update([
                        'part' => $part[$i],
                        'merk' => $merk[$i],
                        'no_serial' => $serial[$i],
                        'quantity' => $quantity[$i],
                        'price' => $price[$i],
                        'subtotal' => $subtotal[$i],
                            ]);        
            $upmaster = DB::table('master')
                    ->where('id', $id)
                   ->update($master);
                     
            // if ($orders_details === TRUE) {
            //             return back()->with('alert', 'Gagal Dihapus !');
            //         }else{
            //             return back()->with('alert-success', 'Berhasil !');
            //         } 

        }
        return back()->with('alert-success', 'Berhasil Diubah!');
    }

    public function deleteOrder(){
        
        }

    public function hapusOrder($id){
        $deleteOrder = DB::table('orders_details')->where('id',$id)->delete();

        if ($deleteOrder === FALSE) {
            return back()->with('alert', 'Gagal Dihapus !');
        }else{
            return back()->with('alert-success', 'Berhasil !');
        }
    }    
    



}   