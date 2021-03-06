<?php

namespace App\Http\Controllers\PMS;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Models\pms_pnwr_mst as modelMst;
use App\Http\Requests\reqPmsPnwrMst as reqMst;
use Carbon;
use DB;


class pnwrMstController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // DB::enableQueryLog();    
        // dd($request->all());
        $query = modelMst::with('customer')->where('sys_status_aktif','A');
        // dd(explode(",", $request->get('not_in')));

        if($request->get('not_in') and !empty($request->get('not_in'))){
            $query->whereNotIn('id_pnwr', explode(",", $request->get('not_in')));
        }

        if($request->get('f_customer')){
            $query->where('f_customer', $request->get('f_customer'));
        }

        if($request->get('search')){
            $items = $query->where("judul_iklan", "LIKE", "%".$request->get('search')."%")->paginate(5);      
        }else{
            $items = $query->paginate(5);
        }

        // dd(DB::getQueryLog());   
        // dd($items);

        return response($items);        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(reqMst $request, modelMst $model)
    {

        $request->offsetUnset("nama_customer");
        $request->offsetUnset("nama_produk");
        // dd($request->all());
        $request->merge(array(
            'id_pnwr' => $this->generate_id(),
            'sys_user_update' => 'ADMIN',
        ));
        

        $model->create($request->all());
        // dd($request->all());   
        return $model->find($request->id_customer);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    public function show(Request $request, $id)
    {
        // dd($request->all());    
        // $items = modelMst::with('customer', 'produk')->find($id);
        $items = modelMst::with('customer', 'produk')->find($request->_id);
        
        // dd($items);
        return response($items);
        // dd(modelMst::find($id));

        // return modelMst::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(modelMst $pnwrMst, reqMst $request)
    public function update(reqMst $request, $id )
    {
        // DB::enableQueryLog();    
        // $id = $request->id_pnwr;
        $request->offsetUnset("nama_customer");
        $request->offsetUnset("nama_produk");
        $request->offsetUnset("customer");
        $request->offsetUnset("produk");
        // $request->offsetUnset("id_pnwr");
        // $request->offsetUnset("$$hashKey");
        // dd($id);
        // $id = $request->id_pnwr;
        // dd($request->all());
        // modelMst::fill($request->all())->save();
        // $pnwrMst = modelMst::where('id_pnwr',$request->id_pnwr);//->update($request->all());
        // $pnwrMst = new modelMst;
        // $pnwrMst->findOrFail($request->id_pnwr);
        // $pnwrMst->where('id_pnwr',$request->id_pnwr)->get();
        // return response(modelMst::find(($id)));
        $pnwrMst = modelMst::findOrFail($request->id_pnwr);
        if($pnwrMst)
            $pnwrMst->fill($request->all())->save();
        // dd(DB::getQueryLog());   

        return response($pnwrMst->find($request->id_pnwr));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    public function destroy(Request $request, $id)
    {
        // modelMst::where((new modelMst)->getKeyName(), $id)->update(['sys_status_aktif'=>'N']);        
        modelMst::where((new modelMst)->getKeyName(), $request->_id)->update(['sys_status_aktif'=>'N']);        
    }

    /**
     * @function generate_id dibuat dan dikembangkan oleh rianday.
     * @depok
     * @return id
     */
    private function generate_id(){
        // $max_id = modelMst::where('id_pnwr','like','%RSAU-SP-'.date('m-Y'))->max('id_pnwr');
        // return (!empty($max_id) ? str_pad(((int)substr($max_id, strpos($max_id,'-')+1)+1),5,'0',STR_PAD_LEFT) : '00001').'-RSAU-SP-'.date('m-Y'); 
        // DB::enableQueryLog();    
        $max_id = modelMst::where('id_pnwr','like','%RSAU/SP/'.date('m/Y'))->max('id_pnwr');
        // dd(DB::getQueryLog());   

        // return (!empty($max_id) ? str_pad(((int)substr($max_id, strpos($max_id,'/')+1)+1),5,'0',STR_PAD_LEFT) : '00001').'/RSAU/SP/'.date('m/Y'); 
        return (!empty($max_id) ? str_pad(((int)substr($max_id, 0, strpos($max_id,'/'))+1),5,'0',STR_PAD_LEFT) : '00001').'/RSAU/SP/'.date('m/Y'); 
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getForFaktur(Request $request)
    {
        DB::enableQueryLog();    
        // dd($request->all());
        // SELECT aa.*, (pnwr_hpp - total_nilai_biaya) sisa FROM `pms_pnwr_mst` aa 
        //   left join v_fp_rangkuman bb on aa.id_pnwr = bb.f_pnwr

        $query = modelMst::with('customer')
                        ->leftjoin('v_fp_rangkuman','id_pnwr','=','f_pnwr')
                        ->where('sys_status_aktif','A')
                        ->whereRaw('(pnwr_hpp - COALESCE(total_nilai_biaya,0)) > 0');
        // dd(explode(",", $request->get('not_in')));

        if($request->get('not_in') and !empty($request->get('not_in'))){
            $query->whereNotIn('id_pnwr', explode(",", $request->get('not_in')));
        }

        if($request->get('f_customer')){
            $query->where('f_customer', $request->get('f_customer'));
        }

        if($request->get('search')){
            $items = $query->where("judul_iklan", "LIKE", "%".$request->get('search')."%")->paginate(5);      
        }else{
            $items = $query->paginate(5);
        }

        // dd(DB::getQueryLog());   
        // dd($items);

        return response($items);        
    }


}
