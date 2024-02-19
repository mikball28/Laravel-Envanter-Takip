<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Product;
use App\Models\Sale;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomePageController extends Controller
{
    public function index(){

        $total_hasılat=Sale::sum('hasılat');
        $kalan_miktar=Sale::get();  
        $total_product=Product::count();
        $product=Product::orderBy('created_at','desc')->paginate(100);
        $note=Note::orderBy('created_at','desc')->paginate(4);
        $total_note=Note::count('notes');

        $startDate = now()->subMonth()->startOfMonth(); // Geçen ayın ilk günü
        $endDate = now()->subMonth()->endOfMonth(); // Geçen ayın son günü

        $last_ay=Sale::whereBetween('created_at', [$startDate, $endDate])
                        ->sum('hasılat');


                        
                    


        return view('index',compact('total_hasılat','total_product','product','note','total_note','last_ay'));
    }

    public function product(){

        $product=Product::orderBy('name','asc')->paginate(10);
        
        return view('product',compact('product'));
    }
    
    public function product_add(){

        if (empty(request('name')) || empty(request('price')) || empty(request('quantity'))){

            toastr()->warning('Ürün kayıt için bütün alanlar zorunludur.!','Uyarı' ,['progressBar'=>false]);
            return redirect()->back();

        }else{

            Product::create([
                'name'=>request('name'),
                'price'=>request('price'),
                'toplam_quantity'=>request('quantity'),
                'quantity'=>request('quantity')
            ]);
        }
        

        toastr()->success('Ürün kayıt işleminiz başarılı bir şekilde gerçekleşmiştir!','Başarılı' ,['progressBar'=>false]);

        return redirect()->back();

        
    }

    public function product_delete($id){

        Product::destroy($id);

        toastr()->success('Ürün Başarılı bir şekilde silinmiştir!!!','Başarılı!!!',['progressBar'=>false]);

        return redirect()->route('product');


    }

    public function sales(){

        $product=Product::get();
        $sales=Sale::orderBy('created_at','desc')->paginate(10);


        return view('sales',compact('product','sales'));
    }

    public function sales_add(){

        $product = Product::find(request('product_id'));

        if(empty(request('satis_miktari'))){

            toastr()->warning('Satış için bütün alanlar zorunludur.!','Uyarı' ,['progressBar'=>false]);
            return redirect()->back();

        }else{
            if ($product) {
                

                $satis_miktari = request('satis_miktari');
                $kalan_miktar = $product->quantity - $satis_miktari;
                if($kalan_miktar>=0){
                    $hasılat = $product->price * $satis_miktari;
                

                Sale::create([
                    'product_id' => $product->id,
                    'satis_miktari' => $satis_miktari,
                    'kalan_miktar' => $kalan_miktar,
                    'hasılat' => $hasılat,
                ]);

                // Ürünün stok miktarını güncelle
                $product->quantity = $kalan_miktar;
                $product->save();
            
            }
            else{
                toastr()->warning('Elinizdeki ürün sayısından fazla ürün satamazsınız!','Uyarı' ,['progressBar'=>false]);
                return redirect()->back();
            }
            toastr()->success('Satış işlemi başarılı bir şekilde gerçekleşmiştir!','Satış' ,['progressBar'=>false]);

                return redirect()->back();
            } else {
                return redirect()->back();
            }

        }
    }

    public function product_filter( Request $request){

        $product=Product::get();
        $product_id = $request->input('product_id');
        $sum_hasılat=Sale::where('product_id', $product_id)->sum('hasılat');
        $sales = Sale::where('product_id', $product_id)->orderBy('created_at','desc')->paginate(100);
        

        return view('product_filter',compact('product','sales','sum_hasılat'));
    }

    public function product_filter_add(Request $request){

        if(empty($request->input('product_id'))){

            toastr()->warning('Filtreleme işleminiz için tüm alanları doldurunuz!!!','Uyarı!!!',['progressBar'=>false]);
            return redirect()->back();  

        }else{

        $product=Product::get();
        $product_id = $request->input('product_id');
        $sum_hasılat=Sale::where('product_id', $product_id)->sum('hasılat');

        $sales = Sale::where('product_id', $product_id)->orderBy('created_at','desc')->paginate(100);

        }
        toastr()->success('Filtreleme işleminiz başarılı bir şekilde silinmiştir!!!','Başarılı!!!',['progressBar'=>false]);

        return view('product_filter',compact('sales','product','sum_hasılat'));
    }

    public function date_filter(Request $request){
        $date1=Request('date1');
        $date2=Request('date2');

        $date1 = request('date1');
        $date2 = request('date2');

        $date_filter = Sale::whereBetween('created_at', [$date1, $date2])->orderBy('created_at','desc')->get();
        $date_filter_hasılat = Sale::whereBetween('created_at', [$date1, $date2])->sum('hasılat');

        return view('date_filter',compact('date_filter','date_filter_hasılat'));
    }

    public function date_filter_add(Request $request){

        if(empty($request->input('date1')) || empty($request->input('date2'))){

            toastr()->warning('Filtreleme işleminiz için tüm alanları doldurunuz!!!','Uyarı!!!',['progressBar'=>false]);
            return redirect()->back();  

        }else{

        $date1=Request('date1');
        $date2=Request('date2');

        $date1 = request('date1');
        $date2 = request('date2');

        $date_filter = Sale::whereBetween('created_at', [$date1, $date2])->orderBy('created_at','desc')->get();
        $date_filter_hasılat = Sale::whereBetween('created_at', [$date1, $date2])->sum('hasılat');

        }

        toastr()->success('Filtreleme işleminiz başarılı bir şekilde silinmiştir!!!','Başarılı!!!',['progressBar'=>false]);

        return view('date_filter',compact('date_filter','date_filter_hasılat'));


    }

    public function last_month(){

        $startDate = now()->subMonth()->startOfMonth(); // Geçen ayın ilk günü
        $endDate = now()->subMonth()->endOfMonth(); // Geçen ayın son günü


        $last_month_filter=Sale::whereBetween('created_at', [$startDate, $endDate])
                        ->orderBy('created_at','desc')->get();

        $last_month=Sale::whereBetween('created_at', [$startDate, $endDate])
                        ->sum('hasılat');

        $total_product= Sale::whereBetween('created_at', [$startDate, $endDate])
                        ->select('product_id')
                        ->distinct()
                        ->get()
                        ->count();

        setlocale(LC_TIME, 'tr_TR.utf8');

        $monthDate = Carbon::now()->subMonth()->startOfMonth();
        $month = $monthDate->isoFormat('MMMM', 'Do MMMM YYYY');


        return view('last_month',compact('last_month_filter','startDate','endDate','last_month','total_product','month'));
    }

    public function monthly(){

        $monthlyRevenue = Sale::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(hasılat) as revenue')
        ->groupByRaw('YEAR(created_at), MONTH(created_at)')
        ->orderByRaw('year DESC, month DESC')
        ->get();
    

        return view('monthly',compact('monthlyRevenue'));
    }

       

    public function notes(){

        $note=Note::paginate(10);


        return view('notes',compact('note'));
    }

    public function notes_add(){

        if(empty(request('title')) || empty(request('notes'))){

            toastr()->warning('Not Ekleme işleminiz için bütün alanlar zorunludur!!!','Uyarı!!!',['progressBar'=>false]);
            return redirect()->back();

        }
        else{

            Note::create([
                'title'=>request('title'),
                'notes'=>request('notes')
            ]);

        }
        toastr()->success('Not Ekleme İşlemi başarılı bir şekilde gerçekleşmiştir!','Not' ,['progressBar'=>false]);

        return back();


    }
    
}
