<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder{
    public function run(){
        $rolAdmin = Role::create(["name"=>"Admin"]);
        // Permissions for categories
        Permission::create(["name"=>"categories.index","description"=>"Dashboard de las categorias"])->syncRoles([$rolAdmin]);
        Permission::create(["name"=>"categories.create","description"=>"Agregar una categoria"])->syncRoles([$rolAdmin]);
        Permission::create(["name"=>"categories.show","description"=>"Mostrar mas informacion de una categoria"])->syncRoles([$rolAdmin]);
        Permission::create(["name"=>"categories.edit","description"=>"Actualizar una categoria"])->syncRoles([$rolAdmin]);
        Permission::create(["name"=>"categories.destroy","description"=>"Eliminar una categoria"])->syncRoles([$rolAdmin]);
        // Permissions for clients
        Permission::create(["name"=>"clients.index","description"=>"Dashboard de los clientes"])->syncRoles([$rolAdmin]);
        Permission::create(["name"=>"clients.create","description"=>"Agregar un cliente"])->syncRoles([$rolAdmin]);
        Permission::create(["name"=>"clients.show","description"=>"Mostrar mas informacion de un cliente"])->syncRoles([$rolAdmin]);
        Permission::create(["name"=>"clients.edit","description"=>"Actualizar un cliente"])->syncRoles([$rolAdmin]);
        Permission::create(["name"=>"clients.destroy","description"=>"Eliminar un cliente"])->syncRoles([$rolAdmin]);
        // Permissions for product
        Permission::create(["name"=>"providers.index","description"=>"Dashboard de los productos"])->syncRoles([$rolAdmin]);
        Permission::create(["name"=>"providers.create","description"=>"Agregar un producto"])->syncRoles([$rolAdmin]);
        Permission::create(["name"=>"providers.show","description"=>"Mostrar mas informacion de un producto"])->syncRoles([$rolAdmin]);
        Permission::create(["name"=>"providers.edit","description"=>"Actualizar un producto"])->syncRoles([$rolAdmin]);
        Permission::create(["name"=>"providers.destroy","description"=>"Eliminar un producto"])->syncRoles([$rolAdmin]);
        Permission::create(["name"=>"change.status.providers","description"=>"Cambiar el estado de un producto"])->syncRoles([$rolAdmin]);
        // Permissions for providers
        Permission::create(["name"=>"products.index","description"=>"Dashboard de los proveedores"])->syncRoles([$rolAdmin]);
        Permission::create(["name"=>"products.create","description"=>"Agregar un proveedor"])->syncRoles([$rolAdmin]);
        Permission::create(["name"=>"products.show","description"=>"Mostrar mas informacion de un proveedor"])->syncRoles([$rolAdmin]);
        Permission::create(["name"=>"products.edit","description"=>"Actualizar un proveedor"])->syncRoles([$rolAdmin]);
        Permission::create(["name"=>"products.destroy","description"=>"Eliminar un proveedor"])->syncRoles([$rolAdmin]);
        // Permission for purchases
        Permission::create(["name"=>"purchases.index","description"=>"Dashboard de las compras"])->syncRoles([$rolAdmin]);
        Permission::create(["name"=>"purchases.create","description"=>"Agregar una compra"])->syncRoles([$rolAdmin]);
        Permission::create(["name"=>"purchases.show","description"=>"Mostrar mas informacion de una compra"])->syncRoles([$rolAdmin]);
        Permission::create(["name"=>"purchases.pdf","description"=>"Generar un PDF de la compra"])->syncRoles([$rolAdmin]);
        Permission::create(["name"=>"change.status.purchases","description"=>"Cambiar el estado de una compra"])->syncRoles([$rolAdmin]);
        // Permissions for sales
        Permission::create(["name"=>"sales.index","description"=>"Dashboard de las ventas"])->syncRoles([$rolAdmin]);
        Permission::create(["name"=>"sales.create","description"=>"Agregar una venta"])->syncRoles([$rolAdmin]);
        Permission::create(["name"=>"sales.show","description"=>"Mostrar mas informacion de una venta"])->syncRoles([$rolAdmin]);
        Permission::create(["name"=>"sales.pdf","description"=>"Generar un PDF de la venta"])->syncRoles([$rolAdmin]);
        Permission::create(["name"=>"change.status.sales","description"=>"Cambiar el estado de una venta"])->syncRoles([$rolAdmin]);
        Permission::create(["name"=>"sales.print","description"=>"Imprimir el reporte de ventas"])->syncRoles([$rolAdmin]);
        // Permissions for Bussiness
        Permission::create(["name"=>"bussinesses.create","description"=>"Dashboard de las empresas"])->syncRoles([$rolAdmin]);
        Permission::create(["name"=>"bussinesses.index","description"=>"Agregar una empresa"])->syncRoles([$rolAdmin]);
        // Permissions for Printers
        Permission::create(["name"=>"printers.create","description"=>"Dashboard de las impresoras"])->syncRoles([$rolAdmin]);
        Permission::create(["name"=>"printers.index","description"=>"Agregar una impresora"])->syncRoles([$rolAdmin]);
        // Permissions for Users
        Permission::create(["name"=>"users.index","description"=>"Dashboard de los usuarios"])->syncRoles([$rolAdmin]);
        Permission::create(["name"=>"users.create","description"=>"Agregar un usuario"])->syncRoles([$rolAdmin]);
        Permission::create(["name"=>"users.show","description"=>"Mostrar mas informacion de un usuario"])->syncRoles([$rolAdmin]);
        Permission::create(["name"=>"users.edit","description"=>"Actualizar un usuario"])->syncRoles([$rolAdmin]);
        Permission::create(["name"=>"users.destroy","description"=>"Eliminar un usuario"])->syncRoles([$rolAdmin]);
        // Permissions for Roles
        Permission::create(["name"=>"roles.index","description"=>"Dashboard de los roles"])->syncRoles([$rolAdmin]);
        Permission::create(["name"=>"roles.create","description"=>"Agregar un rol"])->syncRoles([$rolAdmin]);
        Permission::create(["name"=>"roles.show","description"=>"Mostrar mas informacion de un rol"])->syncRoles([$rolAdmin]);
        Permission::create(["name"=>"roles.edit","description"=>"Actualizar un rol"])->syncRoles([$rolAdmin]);
        Permission::create(["name"=>"roles.destroy","description"=>"Eliminar un rol"])->syncRoles([$rolAdmin]);
    }
}
