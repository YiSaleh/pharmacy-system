<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class Permissions_And_Roles_Seerder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //creating roles
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'owner']);
        $role3 = Role::create(['name' => 'doctor']);
        $role4 = Role::create(['name' => 'user']);

        // doctor permissions
       $p10= Permission::create(['name' => 'create doctor']);
        $p11=Permission::create(['name' => 'edit doctor']);
        $p12=Permission::create(['name' => 'delete doctor']);
        $p13=Permission::create(['name' => 'show doctor']);
        $p14=Permission::create(['name' => 'ban doctor']);


        //pharmacy permission
        $p20=Permission::create(['name' => 'create pharmacy']);
        $p21=Permission::create(['name' => 'delete pharmacy']);
        $p22=Permission::create(['name' => 'show pharmacy']);
        $p23=Permission::create(['name' => 'edit pharmacy']);
        
        //user permission
        $p30=Permission::create(['name' => 'edit user']);
        $p31=Permission::create(['name' => 'show user']);
        $p32=Permission::create(['name' => 'delete user']);

        //owner permission
        $p40=Permission::create(['name' => 'create owner']);
        $p41=Permission::create(['name' => 'show owner']);
        $p42=Permission::create(['name' => 'edit owner']);
        $p43=Permission::create(['name' => 'delete owner']);
        
       //order permission
       $p50=Permission::create(['name' => 'create order']);
       $p51=Permission::create(['name' => 'show order']);
       $p52=Permission::create(['name' => 'edit order']);
       $p53=Permission::create(['name' => 'delete order']);

       //medicine permission
        $p60=Permission::create(['name' => 'create medicine']);
       $p61=Permission::create(['name' => 'show medicine']);
       $p62=Permission::create(['name' => 'edit medicine']);
       $p63=Permission::create(['name' => 'delete medicine']);

       //area permission
        $p70=Permission::create(['name' => 'create area']);
       $p71=Permission::create(['name' => 'show area']);
       $p72=Permission::create(['name' => 'edit area']);
       $p73=Permission::create(['name' => 'delete area']);

       //user_address permission
        $p80=Permission::create(['name' => 'create address']);
       $p81=Permission::create(['name' => 'show address']);
       $p82=Permission::create(['name' => 'edit address']);
       $p83=Permission::create(['name' => 'delete address']);

       //revenue permission
       $p90=Permission::create(['name' => 'show revenue']);
       //assign role to permission
        $role1->givePermissionTo(Permission::all()); 
        $role2->syncPermissions([$p10,$p11,$p12,$p13,$p14,$p22,$p23,$p50,$p51,$p52,$p53,$p60,$p61,$p62,$p63,$p90]);
        $role3->syncPermissions([$p50,$p51,$p52,$p53,$p60,$p61,$p62,$p63]);
      
    }
}
