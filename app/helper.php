<?php

	use Illuminate\Support\Facades\DB;

	function dateConvertFormtoDB($date){
		if(!empty($date)){
			return date("Y-m-d",strtotime(str_replace('/','-',$date)));
		}
	}

	function dateConvertDBtoForm($date){
		if(!empty($date)){
			$date = strtotime($date);
			return date('d/m/Y', $date);
		}
	}

	function showMenu(){
        $modules = \Illuminate\Support\Facades\Session::get('modules');
        $menus = \Illuminate\Support\Facades\Session::get('menus');

        $sideMenu = [];
        if($menus){
            foreach ($menus as $menu){
                if(!isset($sideMenu[$menu['module_id']])){
                    $moduleId = array_search($menu['module_id'], array_column($modules, 'id'));
                    if($menu['name'] !='') {
                        $sideMenu[$menu['module_id']] = [];
                        $sideMenu[$menu['module_id']]['id'] = $modules[$moduleId]['id'];
                        $sideMenu[$menu['module_id']]['name'] = $modules[$moduleId]['name'];
                        $sideMenu[$menu['module_id']]['icon_class'] = $modules[$moduleId]['icon_class'];
                        $sideMenu[$menu['module_id']]['menu_url'] = '#';
                        $sideMenu[$menu['module_id']]['parent_id'] = '';
                        $sideMenu[$menu['module_id']]['module_id'] = $modules[$moduleId]['id'];
                        $sideMenu[$menu['module_id']]['flag'] = "hasChildMenu";
                        $sideMenu[$menu['module_id']]['sub_menu'] = [];
                    }else{
                        $sideMenu[$menu['module_id']] = [];
                        $sideMenu[$menu['module_id']]['id'] = $modules[$moduleId]['id'];
                        $sideMenu[$menu['module_id']]['name'] = $modules[$moduleId]['name'];
                        $sideMenu[$menu['module_id']]['icon_class'] = $modules[$moduleId]['icon_class'];
                        $sideMenu[$menu['module_id']]['menu_url'] = $menu['menu_url'];
                        $sideMenu[$menu['module_id']]['flag'] = "noChildMenu";
                        $sideMenu[$menu['module_id']]['sub_menu'] = [];
                    }
                }
                if($menu['name'] !='') {
                    if ($menu['parent_id'] == 0) {
                        $sideMenu[$menu['module_id']]['sub_menu'][$menu['id']] = $menu;
                        $sideMenu[$menu['module_id']]['sub_menu'][$menu['id']]['sub_menu'] = [];
                    } else {
                        if (isset($sideMenu[$menu['module_id']]['sub_menu'][$menu['parent_id']])){
                            array_push($sideMenu[$menu['module_id']]['sub_menu'][$menu['parent_id']]['sub_menu'], $menu);
                        }
                    }
                }

            }
        }
        return $sideMenu;
    }


?>