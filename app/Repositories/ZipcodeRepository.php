<?php

namespace App\Repositories;

use App\Models\Zipcode;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ZipcodeRepository extends BaseRepository
{
    /**
     * @param Zipcode $zipcode
     */
    public function __construct(Zipcode $zipcode)
    {
        parent::__construct($zipcode);
    }

    /**
     * @return Collection|null
     */
    public function readFileZipCode(): ?Collection
    {
        $fileContent = file_get_contents(public_path("zipcode/zipcode.txt"));
        $jsonData = preg_split( "/\n/", $fileContent );
        $collection = collect();
        for ($i = 0; $i < count($jsonData); $i++) {
            if ($i > 1) {
                $arrayData = explode("|",$this->_clearWords(utf8_encode($jsonData[$i])));
                $collection->add([
                    "d_codigo"          => $arrayData[0],
                    "d_ciudad"          => $arrayData[5] ?? null,
                    "d_CP"              => $arrayData[6] ?? null,
                    "d_estado"          => $arrayData[4] ?? null,
                    "id_asenta_cpcons"  => $arrayData[7] ?? null,
                    "d_asenta"          => $arrayData[1] ?? null,
                    "d_zona"            => $arrayData[13] ?? null ,
                    "d_tipo_asenta"     => $arrayData[2] ?? null,
                    "c_mnpio"           => $arrayData[11] ?? null ,
                    "D_mnpio"           => $arrayData[3] ?? null,
                    "c_cve_ciudad"      => $arrayData[12] ?? null,
                ]);
            }
        }

        return $collection;
    }

    /**
     * @param $words
     * @return array|string|string[]
     */
    private function _clearWords($words): array|string
    {
        $notAllow = ["á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç",
            "Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹"
        ];
        $allow    = ["a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C",
            "a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E"
        ];
        return str_replace($notAllow, $allow ,$words);
    }
}
