<?php

namespace App\Http\Controllers\User;

use App\Model\Menu;

use App\Model\Role;

use App\Model\Module;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

use App\Model\MenuPermission;

use function MongoDB\BSON\toJSON;

use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

use App\Http\Requests\RolePermissionRequest;

class RolePermissionController extends Controller
{
    public function index()
    {
        return view('user.manage-role-permission', [
            'data' => Role::get()
        ]);
    }

    public function getAllMenu(Request $request)
    {
        $role_id     = $request->role_id;
        $permissions =  json_decode(Menu::select(DB::raw('acl_menus.id, acl_menus.name, acl_menus.menu_url, acl_menus.parent_id, acl_menus.module_id,acl_menu_permission.menu_id'))
                        ->join('acl_menu_permission', 'acl_menu_permission.menu_id', '=', 'acl_menus.id')
                        ->where('acl_menu_permission.role_id', '=', $role_id)
                        ->get()->toJson(),true);


        $allMenus = json_decode(Menu::select(DB::raw('acl_menus.*,acl_modules.name as moduleName,acl_modules.icon_class'))
                    ->join('acl_modules', 'acl_modules.id', '=', 'acl_menus.module_id')
                    ->where('acl_menus.status', '=', '1')
                    ->whereNotNull('menu_url')
                    ->get()->toJSON(),true);

        $arrayFormat = [];
        $subMenu = [];

        foreach ($allMenus as $allMenu)
        {
            $hasPermission = array_search($allMenu['id'], array_column($permissions, 'menu_id'));

            if(gettype($hasPermission) == 'integer'){
                $allMenu['hasPermission'] ='yes';
            }else{
                $allMenu['hasPermission'] ='no';
            }

            if(!empty($allMenu['action'])){
                $subMenu[$allMenu['parent_id']][] = $allMenu;
            }

            if(empty($allMenu['name'])){
                $allMenu['name'] = $allMenu['moduleName'];
                $arrayFormat[$allMenu['moduleName']][$allMenu['moduleName']] = $allMenu;
            }

            if($allMenu['action']=='' && $allMenu['name'] !=''){
                $arrayFormat[$allMenu['moduleName']][$allMenu['name']] = $allMenu;
            }
        }
        return ['arrayFormat'=>$arrayFormat,'subMenu'=>$subMenu];
    }

    public function store(RolePermissionRequest $request)
    {
        if($request->menu_id ==null){
            Toastr::error('Please checked menu permission', 'Error!');
            return redirect()->back();
        }
        try{
            DB::beginTransaction();

                $role_id    =  $request->role_id;
                MenuPermission::where('role_id', '=', $role_id)->delete();
                $menu       = count($request->menu_id);

                if($menu == 0)
                {
                    DB::commit();
                    Toastr::success('Role permission update successfully !', 'Success!');
                    return redirect()->back();
                }

                for ($i = 0; $i < $menu; $i++)
                {
                    $getParentId = Menu::where('id','=',$request->menu_id[$i])->first();
                    if($getParentId->parent_id !=0)
                    {
                        $checkParentMenuDuplicate = MenuPermission::where('role_id',$role_id)->where('menu_id',$getParentId->parent_id)->first();
                        if(!$checkParentMenuDuplicate)
                        {
                            $insertParentMenu = array(
                                "menu_id" => $getParentId->parent_id,
                                "role_id" => $role_id,
                            );
                            MenuPermission::insert($insertParentMenu);
                        }
                    }
                    $insertMenu = array(
                        "menu_id" => $request->menu_id[$i],
                        "role_id" => $role_id,
                    );
                    MenuPermission::insert($insertMenu);
                }
                if($role_id == Auth::user()->role_id) {
                    $this->reset_session();
                }
            DB::commit();
            $bug = 0;
        }
        catch(\Exception $e){
            DB::rollback();
            $bug = $e->errorInfo[1];
        }

        if($bug == 0){
            Toastr::success('Role permission update successfully !', 'Success!');
            return redirect()->back();
        } else {
            Toastr::error('Something Error Found !, Please try again', 'Error!');
            return redirect()->back();
        }

    }

    public function reset_session()
    {
        $all_menu =  array_column(json_decode(Menu::select('menu_url')->where('status', 1)->where('menu_url','!=',null)->get()->toJson(), true),'menu_url');

        $permission_menu_for_sideber_show =  json_decode(Menu::select(DB::raw('acl_menus.id, acl_menus.name, acl_menus.menu_url, acl_menus.parent_id, acl_menus.module_id'))
            ->join('acl_menu_permission', 'acl_menu_permission.menu_id', '=', 'acl_menus.id')
            ->where('acl_menu_permission.role_id',Auth::user()->role_id)
            ->where('acl_menus.status','1')
            ->whereNull('action')
            ->orderBy('module_group_id','ASC')
            ->get()->toJson(),true);

        $modules = json_decode(Module::get()->toJson(), true);

        $permission_menu = array_column(json_decode(Menu::join('acl_menu_permission', 'acl_menu_permission.menu_id', '=', 'acl_menus.id')
            ->where('role_id', Auth::user()->role_id)
            ->where('menu_url', '!=',null)
            ->get()->toJson(), true),'menu_url');


        session()->put('modules', $modules);
        session()->put('menus', $permission_menu_for_sideber_show);
        session()->put('all_menus', $all_menu);
        session()->put('permission_menu', $permission_menu);
    }

    public function back_to_home()
    {
        $this->reset_session();
        return redirect('dashboard');
    }

}
