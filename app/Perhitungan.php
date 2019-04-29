<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perhitungan extends Model
{
    protected $fillable = ['name','description','data'];
    protected $table = 'perhitungan';
    private static $json_data= null;


    public function getJsonData(){
        if($this->json_data == null){
            $this->json_data = json_decode($this->data,true);
        }
        return $this->json_data;
    }

    public function getKriterias(){
        return $this->getJsonData()['criterias'];
    }
}
