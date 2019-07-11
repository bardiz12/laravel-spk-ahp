<?php

namespace App\Http\Controllers;

use App\Perhitungan;
use Bardiz12\AHPDss\AHP;
use Illuminate\Http\Request;

class PerhitunganController extends Controller
{
    public function create(){
        return view('app.perhitungan.create');
    }

    public function lihat(Request $request,$id){
        $data = ['perhitungan'=>
                    Perhitungan::findOrFail($id)
    ];

        return view('app.perhitungan.show',$data);
    }

    public function store(Request $request){
        try{
            $input = $request->all();
            //print_r($input);
            unset($input['name']);
            unset($input['description']);
            $ahp = new AHP();
            foreach ($input['types'] as $key => $value) {
                if($value == 0){
                    $ahp->addQualitativeCriteria($input['criterias'][$key]);
                }else{
                    $ahp->addQuantitativeCriteria($input['criterias'][$key]);
                }
            }
            $ahp->setCandidates($input['alternatives']);

            //relative interest matrix
            foreach ($input['baris'] as $i => &$ar) {
                foreach ($ar as $j => &$ar2) {
                    if($ar2 == 'AUTO'){
                        $ar2 = null;
                    }
                }
            }
            $ahp->setRelativeInterestMatrix($input['baris']);

            //PairWise
            $pairWise = [];
            foreach ($input['pairwise'] as $key => &$ar) {
                foreach ($ar as $i => &$ar2) {
                    if($input['types'][$key] == 0){
                        foreach ($ar2 as $j => &$ar3) {
                            if($ar3 == 'AUTO'){
                                $ar3 = null;
                            }
                        }
                    }else{
                        if($ar2 == 'AUTO'){
                            $ar2 = null;
                        }
                    }
                }
                $pairWise[$input['criterias'][$key]] = $ar;
            }
            $ahp->setBatchCriteriaPairWise($pairWise);
            $ahp->finalize();
            $perhitungan = Perhitungan::create([
                'name'=>$request->input('name'),
                'description'=>$request->input('description'),
                'data'=>json_encode($request->all())
            ]);
            echo "<a href=".route('perhitungan.show',[$perhitungan->id]).">CLICK HERE TO SEE THE RESULT</a>";
        }catch(\ErrorException $e){
            echo "ERROR : ".$e->getMessage();
        }

        
        //return response()->json(['result'=>$ahp->getResult()], 200);
        
    }

    public function saved(Request $request){
        $search = $request->input('s');
        $data = $search ? (Perhitungan::where('name','like','%'.$search.'%')->orWhere('description','like','%'.$search.'%')->orderBy('id','desc')->paginate(5)) : (Perhitungan::orderBy('id','desc')->paginate(5));

        $data = ['perhitungans'=>$data,'search'=>$search];
        return view('app.perhitungan.saved',$data);
    }

    public function hitung(Request $request){
        $input = $request->all();
        //print_r($input);
        unset($input['name']);
        unset($input['description']);
        $ahp = new AHP();
        foreach ($input['types'] as $key => $value) {
            if($value == 0){
                $ahp->addQualitativeCriteria($input['criterias'][$key]);
            }else{
                $ahp->addQuantitativeCriteria($input['criterias'][$key]);
            }
        }
        $ahp->setCandidates($input['alternatives']);

        //relative interest matrix
        foreach ($input['baris'] as $i => &$ar) {
            foreach ($ar as $j => &$ar2) {
                if($ar2 == 'AUTO'){
                    $ar2 = null;
                }
            }
        }
        $ahp->setRelativeInterestMatrix($input['baris']);

        //PairWise
        $pairWise = [];
        foreach ($input['pairwise'] as $key => &$ar) {
            foreach ($ar as $i => &$ar2) {
                if($input['types'][$key] == 0){
                    foreach ($ar2 as $j => &$ar3) {
                        if($ar3 == 'AUTO'){
                            $ar3 = null;
                        }
                    }
                }else{
                    if($ar2 == 'AUTO'){
                        $ar2 = null;
                    }
                }
            }
            $pairWise[$input['criterias'][$key]] = $ar;
        }
        $ahp->setBatchCriteriaPairWise($pairWise);
        $ahp->finalize();
        //$ahp->debug(false);
        
        return view('app.perhitungan.tes',['result'=>$ahp->getResult(),'debug'=>$ahp->debug(false)]);
    }
}