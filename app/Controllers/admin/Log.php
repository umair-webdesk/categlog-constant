<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\admin\LogModel;

class Log extends BaseController
{
    protected $data = [];
    protected $log;

    public function __construct(){
        $this->log = new LogModel();
    }
    public function index()
    {
        
        try{

            $this->data['page_title'] = 'Activity Logs';
            $this->data['logs_types'] = $this->getLogType();

            return view('admin/comman/header',$this->data)
            . view('admin/comman/leftmenu')
            . view('admin/logs/index')
            . view('admin/comman/footer');

        }catch(Exception $e){
            exit($e->getMessage());
        }
    }

    public function getLogType(){
        try{
            $row = [];
            $query = $this->log->select('type')->groupBy('type')->get();
            if($query->getNumRows() > 0){
                $row = $query->getResult();
            }
            return $row;
        }catch(Exception $e){
            exit($e->getMessage());
        }
    }

    public function datatable(){
        try{

            $requestData = $_REQUEST;
            $requestData['sort']['field'] = 'id';

            $sql = "SELECT * ";
            $sql.=" FROM logs";
            if( !empty($requestData['query']['generalSearch']) ) { 

                $sql.=" WHERE ( id LIKE '%".$requestData['query']['generalSearch']."%' ";
                $sql.=" OR message LIKE '%".$requestData['query']['generalSearch']."%' ";
                $sql.=" OR type LIKE '%".$requestData['query']['generalSearch']."%'";
                $sql.=" OR DATE_FORMAT(created_at,'%a,%m %Y %H:%i:%s') LIKE '%".$requestData['query']['generalSearch']."%' )";

            }
            if( !empty($requestData['query']['type']) ) { 
                $sql.=" WHERE `type` = '".$requestData['query']['type']."' ";
            }
            $totalFiltered = $this->log->query($sql)->getNumRows();
            
            if(!empty($requestData['sort'])) {
                $sql.= " ORDER BY ".$requestData['sort']['field']." DESC";
            }

            if( !empty($requestData['pagination']) ) { 
            
                $page = $requestData['pagination']['page'];
                $perpage = $requestData['pagination']['perpage'];
                $pages = ceil($totalFiltered / $perpage);

                if($pages < $page){
                    $start_from = 0;
                }else{
                    $start_from = ($page - 1) * $perpage; 
                }

                $sql.= " LIMIT ".$start_from." ,".$perpage;
            }

            $query = $this->log->query($sql);

            $data = [];
            $i = 1;
            foreach($query->getResult() as $logs){

                $data['data'][$i]['id'] = $i;
                $data['data'][$i]['created_at'] = date('D,m Y H:i:s',strtotime($logs->created_at));
                $data['data'][$i]['type'] = $logs->type;
                $data['data'][$i]['message'] = $logs->message;
                $data['data'][$i]['ip_address'] = $logs->ip;
                $i++;
            }
            
            $data['meta']['sort'] = $requestData['sort']['sort'];
            $data['meta']['page'] = $page;
            $data['meta']['perpage'] = $perpage;
            $data['meta']['pages'] = $pages;
            $data['meta']['total'] = $totalFiltered;

            return $this->response->setJson($data,true);
        }catch(Exception $e){
            exit($e->getMessage());
        }
    }
}
