<?php

use Illuminate\Support\Facades\DB;
function prx($arr){
	echo "<pre>";
		print_r($arr);
	echo"</pre>";
	die();
}

function getTopNavCat(){
    $result = DB::table('categories')
                ->where(["status"=>1])
                ->get();   
            
                $arr=[];
                foreach($result as $row){
                    $arr[$row->id]['city']=$row->category_name;
                    $arr[$row->id]['parent_id']=$row->parent_category_id;
                }
                $str = buildTreeView($arr,0);
                return $str;
}

$html='';
function buildTreeView($arr,$parent,$level=0,$prelevel= -1){
	global $html;
	foreach($arr as $id=>$data){
		if($parent==$data['parent_id']){
			if($level>$prelevel){
				if($html==''){
					$html.='<ul class="nav navbar-nav">';
				}else{
					$html.='<ul class="dropdown-menu">';
				}
				
			}
			if($level==$prelevel){
				$html.='</li>';
			}
			$html.='<li><a href="#">'.$data['city'].'<span class="caret"></span></a>';
			if($level>$prelevel){
				$prelevel=$level;
			}
			$level++;
			buildTreeView($arr,$id,$level,$prelevel);
			$level--;
		}
	}
	if($level==$prelevel){
		$html.='</li></ul>';
	}
	return $html;
}

function getUserTempId(){

	if( session()->has('USER_TEMP_ID') === false){
		$rand = rand(111111111, 999999999);
		session()->put('USER_TEMP_ID', $rand);
		return $rand;
	}else{
		return session()->get('USER_TEMP_ID');
	}
}

function layoutCartData(){
	if(session()->has('FRONT_USER_LOGIN')){
        $uid = session()->get('FRONT_USER_LOGIN');
        $utype="Reg";
    }else{
        $uid = getUserTempId();
        $utype="Not-Reg";
    }

	$result=DB::table('cart')
       ->leftJoin('products', 'products.id','=','cart.product_id')
       ->leftJoin('products_attr', 'products_attr.id','=','cart.product_attr_id')
       ->leftJoin('sizes', 'sizes.id','=','products_attr.size_id')
        ->leftJoin('colors', 'colors.id','=','products_attr.color_id')
        ->where(['user_id'=>$uid])
        ->where(['user_type'=>$utype])
        ->select('cart.qty', 'products.name', 'products.image', 'sizes.size', 'colors.color', 'products.slug', 'products_attr.price', 'products_attr.id as attr_id', 'products.id as pid')
        ->get();
        // prx($result);
       return $result;
}

?>