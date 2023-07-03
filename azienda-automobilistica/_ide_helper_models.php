<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Accessorio
 *
 * @property int $codice_accessorio
 * @property string $nome
 * @property string $prezzo
 * @method static \Illuminate\Database\Eloquent\Builder|Accessorio newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Accessorio newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Accessorio query()
 * @method static \Illuminate\Database\Eloquent\Builder|Accessorio whereCodiceAccessorio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Accessorio whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Accessorio wherePrezzo($value)
 */
	class Accessorio extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\AcquistoInStore
 *
 * @property int $codice_acquisto
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $costo_totale
 * @property string $metodo_pagamento
 * @property string $CF_cliente
 * @property int $codice_officina
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Accessorio> $accessori
 * @property-read int|null $accessori_count
 * @property-read \App\Models\Cliente|null $cliente
 * @property-read \App\Models\Officina|null $officina
 * @method static \Illuminate\Database\Eloquent\Builder|AcquistoInStore newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AcquistoInStore newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AcquistoInStore query()
 * @method static \Illuminate\Database\Eloquent\Builder|AcquistoInStore whereCFCliente($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AcquistoInStore whereCodiceAcquisto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AcquistoInStore whereCodiceOfficina($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AcquistoInStore whereCostoTotale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AcquistoInStore whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AcquistoInStore whereMetodoPagamento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AcquistoInStore whereUpdatedAt($value)
 */
	class AcquistoInStore extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Cliente
 *
 * @property string $CF
 * @property string $nome
 * @property string $cognome
 * @property string $data_nascita
 * @property int $telefono
 * @property string $buono_acquisto
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Cliente newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cliente newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cliente query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cliente whereBuonoAcquisto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cliente whereCF($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cliente whereCognome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cliente whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cliente whereDataNascita($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cliente whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cliente whereTelefono($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cliente whereUpdatedAt($value)
 */
	class Cliente extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Meccanico
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Meccanico newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Meccanico newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Meccanico query()
 */
	class Meccanico extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Officina
 *
 * @property int $codice_officina
 * @property string $nome
 * @property string $sede_città
 * @property string $sede_via
 * @property int $sede_civico
 * @property string $bilancio
 * @property int $centrale
 * @property int|null $gestita_da
 * @method static \Illuminate\Database\Eloquent\Builder|Officina newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Officina newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Officina query()
 * @method static \Illuminate\Database\Eloquent\Builder|Officina whereBilancio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Officina whereCentrale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Officina whereCodiceOfficina($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Officina whereGestitaDa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Officina whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Officina whereSedeCittà($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Officina whereSedeCivico($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Officina whereSedeVia($value)
 */
	class Officina extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Recensione
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Recensione newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Recensione newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Recensione query()
 */
	class Recensione extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property mixed $password
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 */
	class User extends \Eloquent {}
}

