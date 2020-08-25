<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => ':attribute vajab kinnitust.',
    'active_url'           => ':attribute URL\'i ei eksisteeri.',
    'after'                => ':attribute  peab olema hilisem kui  :date.',
    'after_or_equal'       => ':attribute peab olema hilisem või võrdne kuupäevaga :date.',
    'alpha'                => ':attribute tohib sisaldada ainult tähti.',
    'alpha_dash'           => ':attribute tohib sisaldada ainult tähti, numbreid ja kirjavahemärke',
    'alpha_num'            => ':attribute  tohib sisaldada ainult tähti ja numbreid.',
    'array'                => ':attribute peab olema massiiv.',
    'before'               => ':attribute peab olema varasem kui :date.',
    'before_or_equal'      => ':attribute  peab olema varasem või võrdne kuupäevaga :date.',
    'between'              => [
        'numeric' => ':attribute peab jääma vahemikku :min - :max.',
        'file'    => ':attribute peab jääma vahemikku :min - :max kilobaiti.',
        'string'  => ':attribute peab jääma vahemikku :min - :max tähemärki.',
        'array'   => ':attribute pidi jääma vahemikku :min - :max tk.',
    ],
    'boolean'              => 'The :attribute field must be true or false.',
    'confirmed'            => ':attribute ei ole võrdne.',
    'date'                 => ':attribute ei ole kuupäev.',
    'date_format'          => ':attribute ei vasta formaadile :format.',
    'different'            => ':attribute ja :other peavad erinema.',
    'digits'               => ':attribute peab olema :digits numbrit.',
    'digits_between'       => 'T:attribute peab jääma vahemikku :min ja :max.',
    'dimensions'           => ':attribute pildi mõõtmed on valed.',
    'distinct'             => ':attribute väli sisaldab topeltväärtust.',
    'email'                => ':attribute peab olema e-posti aadress.',
    'exists'               => 'Valitud :attribute ei kehti.',
    'file'                 => ':attribute peab olema fail.',
    'filled'               => ':attribute väli peab sisadama väärtust.',
    'image'                => ':attribute peab olema pilt.',
    'in'                   => 'Valitud :attribute ei kehti.',
    'in_array'             => ':attribute välja ei eksisteeri :other.',
    'integer'              => ':attribute peab olema number.',
    'ip'                   => ':attribute peab olema kehtiv IP address.',
    'ipv4'                 => ':attribute peab olema kehtiv IPv4 address.',
    'ipv6'                 => ':attribute peab olema kehtiv IPv6 address.',
    'json'                 => ':attribute peab olema kehtiv JSON string.',
    'max'                  => [
        'numeric' => ':attribute ei tohi olla suurem kui :max.',
        'file'    => ':attribute ei tohi olla suurem kui :max kilobytes.',
        'string'  => ':attribute ei tohi olla suurem kui :max characters.',
        'array'   => ':attribute ei tohi olla rohkem kui :max tk.',
    ],
    'mimes'                => ':attribute failitüüp peab olema: :values.',
    'mimetypes'            => ':attribute failitüüp peab olema: :values.',
    'min'                  => [
        'numeric' => ':attribute peab olema vähemalt :min.',
        'file'    => ':attribute peab olema vähemalt :min kilobaiti.',
        'string'  => ':attribute peab olema vähemalt :min tähemärki.',
        'array'   => ':attribute peab sisaldama vähemalt :min tk.',
    ],
    'not_in'               => 'Valitud :attribute on vale.',
    'numeric'              => ':attribute peab olema number.',
    'present'              => ':attribute väli peab eksisteerima.',
    'regex'                => ':attribute formaat on vale.',
    'required'             => ':attribute väli on vajalik.',
    'required_if'          => 'The :attribute field is required when :other is :value.',
    'required_unless'      => 'The :attribute field is required unless :other is in :values.',
    'required_with'        => 'The :attribute field is required when :values is present.',
    'required_with_all'    => 'The :attribute field is required when :values is present.',
    'required_without'     => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same'                 => ':attribute ja :other peavad olema võrdsed.',
    'size'                 => [
        'numeric' => ':attribute peab olema suurusega :size.',
        'file'    => ':attribute peab olema suurusega:size kilobaiti.',
        'string'  => ':attribute peab olema suurusega:size tähemärki.',
        'array'   => ':attribute olema suurusega :size tk.',
    ],
    'string'               => ':attribute olema tüüpi string.',
    'timezone'             => ':attribute peab olema kehtiv tsoon.',
    'unique'               => ':attribute on juba kasutusel.',
    'uploaded'             => ':attribute üleslaadimine ebaõnnestus.',
    'url'                  => ':attribute on vales formaadis.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
