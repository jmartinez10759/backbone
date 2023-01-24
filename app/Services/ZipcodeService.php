<?php

namespace App\Services;

use App\Models\Zipcode;
use App\Repositories\ZipcodeRepository;
use Illuminate\Support\Str;

class ZipcodeService extends ZipcodeRepository
{
    /**
     * @param Zipcode $zipcode
     */
    public function __construct(Zipcode $zipcode)
    {
        parent::__construct($zipcode);
    }

    /**
     * @param string $zipcode
     * @return array|null
     */
    public function getZipCode(string $zipcode): ?array
    {
        #agregar cache

        $response = $this->readFileZipCode()->where("d_codigo","=",$zipcode);
        if ($response->count() > 0){
            $data = $response->first();
            $settlements = $response->map(function ($item){
                return [
                    "key"             => (int)$item["c_cve_ciudad"],
                    "name"            => strtoupper($item["d_asenta"]),
                    "zone_type"       => strtoupper($item["d_zona"]),
                    "settlement_type" => ["name" => $item["d_tipo_asenta"]],
                ];
            });
            $response = [
                "zip_code"       => $data["d_codigo"],
                "locality"       => strtoupper($data["d_ciudad"]),
                "federal_entity" => [
                    "key"             => (int)$data["id_asenta_cpcons"],
                    "name"            => strtoupper($data["d_estado"]),
                    "code"            => null,
                ],
                "settlements"  => $settlements->all(),
                "municipality" => [
                    "key"   => (int)$data["c_mnpio"],
                    "name"  => strtoupper($data["D_mnpio"]),
                ]
            ];
        }

;        return $response;

    }
}
