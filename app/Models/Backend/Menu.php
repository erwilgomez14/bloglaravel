<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Menu extends Model
{
    use HasFactory;

    protected $table = "menu";
    protected $fillable = ['nombre', 'url', 'icono'];

    protected $guarded = ['id'];

    // protected $timestamps = false;

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Rol::class, 'menu_rol', 'menu_id', 'rol_id');
    }

    public function getHijos($padres, $line)
    {
        $children = [];
        foreach ($padres as $line1) {
            if ($line['id'] == $line1['menu_id']) {
                $children = array_merge($children, [array_merge($line1, ['submenu' => $this->getHijos($padres, $line1)])]);
            }
        }
        return $children;
    }

    public function getPadres($front)
    {
        if ($front) {
            return $this->whereHas('roles', function ($query) {
                $query->where('rol_id', session()->get('rol_id'))->orderby('menu_id');
            })->orderby('menu_id')
                ->orderby('orden')
                ->get()
                ->toArray();
        } else {
            return $this->orderby('menu_id')
                ->orderby('orden')
                ->get()
                ->toArray();
        }
    }

    public static function getMenu($front = false)
    {
        $menus = new Menu();
        $padres = $menus->getPadres($front);
        $menuAll = [];
        foreach ($padres as $line) {
            if ($line['menu_id'] != 0)
                break;
            $item = [array_merge($line, ['submenu' => $menus->getHijos($padres, $line)])];
            $menuAll = array_merge($menuAll, $item);
        }
        return $menuAll;
    }
    public static function guardarOrden($menus) {
        $menus = json_decode($menus);
        foreach ($menus as $var => $menu) {
            self::where('id', $menu->id)->update(['menus_id' => 0 , 'orden' => $var + 1]);
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
