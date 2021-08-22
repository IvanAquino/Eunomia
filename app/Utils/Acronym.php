<?php
namespace App\Utils;

use Illuminate\Support\Str;

class Acronym {

    /**
     * Generate acronym based in project name
     * 
     * @param string $project_name
     * @return string
     */
    public static function forProject(string $project_name): string
    {
        if (str_word_count($project_name) == 1) {
            $acronym = Str::limit($project_name, 4, '');
            return strtoupper($acronym);
        }

        $words = explode(" ", $project_name);
        $acronym = "";

        foreach ($words as $w) {
            $acronym .= Str::limit($w, 1, '');
        }

        return strtoupper($acronym);
    }

}