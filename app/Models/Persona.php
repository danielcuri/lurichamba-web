<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Persona extends Authenticatable  implements JWTSubject
{
    use HasFactory;

    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    public $timestamps = true;

    protected $guarded = ['id'];

    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    /*protected $appends = [
        'profile_photo_url',
    ];*/

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }



    // public function traerDatosPersonales($id){

    //     // $datos = DB::select('select * from personas where id = ?', [$id]);
    //     $datos = Persona::where('id', [$id])->first();

    //     return $datos;
    // }

    public function encontrarPersona($id)
    {

        $persona = Persona::find($id);

        return $persona;
    }




    public function estadosProceso()
    {
        return $this->belongsTo(EstadoProceso::class, 'estado_proceso_id');
    }


    public function tipoUtilidad()
    {
        return $this->belongsTo(TipoUtilidad::class, 'tipo_utilidad_id');
    }

    public function tipoDocumento()
    {
        return $this->belongsTo(TipoDocumento::class, 'tipo_documento_id');
    }
    public function documentos()
    {
        return $this->hasMany(PersonaDocumento::class);
    }
    // public function fromDateTime($value)
    // {
    //     return DateTime::createFromFormat('Y-m-d H:i:s.u', parent::fromDateTime($value));
    // }
    public function publicaciones()
    {
        return $this->hasMany(Publicacion::class);
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
