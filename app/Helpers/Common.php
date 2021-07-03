<?php
use App\Model\Chat_msg;
use App\User;

function getCommonTableData($request, $modalName, $routeName, $primaryId,  $columns, $imageColumn = '', $linkColumn = '', $where = '', $viewLink = '', $deleteLink = '')
{
   //https://johnothecoder.uk/laravel/laravel-search-filtering-tutorial/ -- for reference
   ini_set('memory_limit', '-1');
   
   if(!empty($where)){
      $whereCondition = explode(",",$where);
      $totalData = $modalName::where($whereCondition[0],$whereCondition[1],$whereCondition[2])->count();
   }
   else{
      $totalData = $modalName::count();
   } 

   $totalFiltered = $totalData; 

   $limit = $request->input('length');
   $start = $request->input('start');
   $order = $columns[$request->input('order.0.column')];
   $dir = $request->input('order.0.dir');

   if(empty($request->input('search.value')))
   {       
      if(!empty($where)){
         $whereCondition = explode(",",$where);
         $posts = $modalName::where($whereCondition[0],$whereCondition[1],$whereCondition[2])->offset($start);
      }
      else{
         $posts = $modalName::offset($start);
      }     
      $posts = $posts->limit($limit)
            ->orderBy($order,$dir)
            ->get();
   }
   else {
      $search = $request->input('search.value'); 
      
      if(!empty($where)){
         
         $whereCondition = explode(",",$where);
         $posts = $modalName::where($whereCondition[0],$whereCondition[1],$whereCondition[2])->where(function($query1) use($search, $columns){
            $searchWildcard = '%' . $search . '%';
            foreach($columns as $field){
            $query1->orWhere($field, 'LIKE', $searchWildcard);
            }
            })->offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)
            ->get();

         
         $totalFiltered = $modalName::where($whereCondition[0],$whereCondition[1],$whereCondition[2])->where(function($query1) use($search, $columns){
            $searchWildcard = '%' . $search . '%';
            foreach($columns as $field){
               $query1->orWhere($field, 'LIKE', $searchWildcard);
            }
            })->count();
      }else{
         $posts =  $modalName::where(function($query1) use($search, $columns){
                        $searchWildcard = '%' . $search . '%';
                        foreach($columns as $field){
                        $query1->orWhere($field, 'LIKE', $searchWildcard);
                        }
                        })->offset($start)
                        ->limit($limit)
                        ->orderBy($order,$dir)
                        ->get();

                     
         $totalFiltered = $modalName::where(function($query1) use($search, $columns){
                        $searchWildcard = '%' . $search . '%';
                        foreach($columns as $field){
                           $query1->orWhere($field, 'LIKE', $searchWildcard);
                        }
                        })->count();
      }
   }

   $data = array();
   if(!empty($posts))
   {
      foreach ($posts as $post)
      {
            $delete =  route("admin.".$routeName.".delete",$post->$primaryId);
            $edit =  route("admin.".$routeName.".edit",$post->$primaryId);
            
            
            switch ($routeName) {
               default:
                  $viewID =  $post->$primaryId;      
                  break;
            }
            $view =  ($viewLink != '' ) ? '| <a href="'.route($viewLink,$viewID ?? $post->$primaryId).'" target="_blanks"><i class="fa fa-eye"></i></a>' : '';
            $delete = ($deleteLink == '' ) ?  '| <a href="#" title="Delete" class="subscribers-delete" dataId="'.$post->$primaryId.'" onclick="deleteRecord('.$post->$primaryId.')"><i class="fa fa-trash"></i></a>' : '';
            
            foreach($columns as $column){
               if($column === 'is_active'){
                     $nestedData[$column] = ($post->$column == '1') ? 'Active' : 'In-Active';
               }else if($column === 'msg'){
                     $nestedData[$column] = \Illuminate\Support\Str::limit(strip_tags($post->$column),50,'...');
               }else if($column === 'sender_id'){
                     $nestedData[$column] = User::find($post->$column)->name;
                     $nestedData['sender_name'] = User::find($post->$column)->name;
               }else if($column === 'receiver_id'){
                     $nestedData[$column] = User::find($post->$column)->name;
                     $nestedData['receiver_name'] = User::find($post->$column)->name;
               }else{    
                     $nestedData[$column] = $post->$column;
               }    
            }

            $nestedData['options'] = '<a href="'.$edit.'" title="Edit"><i class="fa fa-edit"></i> </a>'.$delete.$view;
            $data[] = $nestedData;

      }
   }

   $json_data = array(
      "draw"            => intval($request->input('draw')),  
      "recordsTotal"    => intval($totalData),  
      "recordsFiltered" => intval($totalFiltered), 
      "data"            => $data   
      );

   echo json_encode($json_data); 
}

function createFile($path,$msg="")
{
   $myfile = fopen($path, "a") or die("Unable to open file!");
   fwrite($myfile,$msg."\r\n");
   fclose($myfile);
}
