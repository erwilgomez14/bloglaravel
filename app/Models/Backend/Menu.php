<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Menu extends Model
{
    use HasFactory;

    protected $table = "menus";

    protected $fillable = [
        'nombre',
        'url',
        'icono',
    ];
    protected $guarded = ['id'];

    // protected $timestamps = false;

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Rol::class, 'menus_roles', 'menus_id', 'roles_id');
    }

    private function getMenuPadres($front){

        if($front) {
            return $this->whereHas('roles', function($query) {
                $query->where('rol_id', session('rol_id'))->orderby('menus_id');
            })
            ->orderby('menus_id')
            ->orderby('orden')
            ->get()
            ->toArray();
        }
        else {
            return $this->orderby('menus_id')
            ->orderby('orden')
            ->get()
            ->toArray();
        }
    }

    private function getMenuHijos($padres, $line)
    {
        $hijos = [];
        foreach ($padres as $line2) {
            if ($line['id'] = $line2['menus_id']) {
                $hijos = array_merge($hijos, [array_merge($line2, ['submenu' => $this->getHijos($padres, $line2)])]);
            }
        }
        return $hijos;
    }

    public static function getMenu($front = false) {
        $menus = new Menu();
        $padres = $menus->getMenuPadres($front);
        $menuAll = [];
        foreach ($padres as $line) {
            if($line['menus_id'] != null)
                break;
            $item = [array_merge($line, ['submenu'=> $menus->getMenuHijos($padres, $line)])];
            $menuAll = array_merge($menuAll, $item);
        }
        return $menuAll; 
    }
    public static function guardarOrden($menus) {
        $menus = json_decode($menus);
        foreach ($menus as $var => $menu) {
            self::where('id', $menu->id)->update(['menus_id' => null , 'orden' => $var + 1]);
            if(!empty($menu->children)) {
                self::guardarOrdenHijos($menu->children, $menu);
            }
        }
    }
    public static function guardarOrdenHijos($hijos, $padre) {
        foreach ($hijos as $key => $hijo) {
            self::where('id', $hijo->id)->update(['menus_id' => $padre->id, 'orden' => $key + 1]);
            if(!empty($hijo->children)) {
                self::guardarOrdenHijos($hijo->children, $hijo);
            }
        }
    }
}
