<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validación del idioma
    |--------------------------------------------------------------------------
    |
    | Las siguientes líneas de idioma contienen los mensajes de error predeterminados utilizados por
    | La clase validadora. Algunas de estas reglas tienen múltiples versiones tales
    | como las reglas de tamaño. Siéntase libre de modificar cada uno de estos mensajes aquí.
    |
    */

    'accepted' => 'El campo  debe ser aceptado.',
    'accepted_if' => 'El campo  debe ser aceptado cuando :other es :value.',
    'active_url' => 'El campo  no es una URL válida.',
    'after' => 'El campo  debe ser una fecha después de :date.',
    'after_or_equal' => 'El campo  debe ser una fecha después o igual a :date.',
    'alpha' => 'El campo  sólo puede contener letras.',
    'alpha_dash' => 'El campo  sólo puede contener letras, números y guiones.',
    'alpha_num' => 'El campo  sólo puede contener letras y números.',
    'array' => 'El campo  debe ser un arreglo.',
    'before' => 'El campo  debe ser una fecha antes de :date.',
    'before_or_equal' => 'El campo  debe ser una fecha antes o igual a :date.',
    'between' => [
        'numeric' => 'El campo  debe estar entre :min - :max.',
        'file' => 'El campo  debe estar entre :min - :max kilobytes.',
        'string' => 'El campo  debe estar entre :min - :max caracteres.',
        'array' => 'El campo  debe tener entre :min y :max elementos.',
    ],
    'boolean' => 'El campo  debe ser verdadero o falso.',
    'confirmed' => 'El campo de confirmación de :attribute no coincide.',
    'current_password' => 'La contraseña actual no es correcta',
    'date' => 'El campo  no es una fecha válida.',
    'date_equals' => 'El campo  debe ser una fecha igual a :date.',
    'date_format' => 'El campo  no corresponde con el formato :format.',
    'declined' => 'El campo  debe marcar como rechazado.',
    'declined_if' => 'El campo  debe marcar como rechazado cuando :other es :value.',
    'different' => 'Los campos :attribute y :other deben ser diferentes.',
    'digits' => 'El campo  debe ser de :digits dígitos.',
    'digits_between' => 'El campo  debe tener entre :min y :max dígitos.',
    'dimensions' => 'El campo  no tiene una dimensión válida.',
    'distinct' => 'El campo  tiene un valor duplicado.',
    'doesnt_end_with' => 'El campo  no puede finalizar con uno de los siguientes valores: :values.',
    'doesnt_start_with' => 'El campo  no puede comenzar con uno de los siguientes valores: :values.',
    'email' => 'El formato del :attribute no es válido.',
    'ends_with' => 'El campo  debe terminar con alguno de los valores: :values.',
    'enum' => 'El campo seleccionado en :attribute no es válido.',
    'exists' => 'El campo  seleccionado no es válido.',
    'file' => 'El campo  debe ser un archivo.',
    'filled' => 'El campo  es requerido.',
    'gt' => [
        'numeric' => 'El campo  debe ser mayor que :value.',
        'file' => 'El campo  debe ser mayor que :value kilobytes.',
        'string' => 'El campo  debe ser mayor que :value caracteres.',
        'array' => 'El campo  puede tener hasta :value elementos.',
    ],
    'gte' => [
        'numeric' => 'El campo  debe ser mayor o igual que :value.',
        'file' => 'El campo  debe ser mayor o igual que :value kilobytes.',
        'string' => 'El campo  debe ser mayor o igual que :value caracteres.',
        'array' => 'El campo  puede tener :value elementos o más.',
    ],
    'image' => 'El campo  debe ser una imagen.',
    'in' => 'El campo  seleccionado no es válido.',
    'in_array' => 'El campo  no existe en :other.',
    'integer' => 'El campo  debe ser un entero.',
    'ip' => 'El campo  debe ser una dirección IP válida.',
    'ipv4' => 'El campo  debe ser una dirección IPv4 válida.',
    'ipv6' => 'El campo  debe ser una dirección IPv6 válida.',
    'json' => 'El campo  debe ser una cadena JSON válida.',
    'lt' => [
        'numeric' => 'El campo  debe ser menor que :max.',
        'file' => 'El campo  debe ser menor que :max kilobytes.',
        'string' => 'El campo  debe ser menor que :max caracteres.',
        'array' => 'El campo  puede tener hasta :max elementos.',
    ],
    'lte' => [
        'numeric' => 'El campo  debe ser menor o igual que :max.',
        'file' => 'El campo  debe ser menor o igual que :max kilobytes.',
        'string' => 'El campo  debe ser menor o igual que :max caracteres.',
        'array' => 'El campo  no puede tener más que :max elementos.',
    ],
    'mac_address' => 'El campo  debe ser una dirección MAC válida.',
    'max' => [
        'numeric' => 'El campo  debe ser menor que :max.',
        'file' => 'El campo  debe ser menor que :max kilobytes.',
        'string' => 'El campo  debe ser menor que :max caracteres.',
        'array' => 'El campo  puede tener hasta :max elementos.',
    ],
    'max_digits' => 'El campo  no puede superar los :max dígitos.',
    'mimes' => 'El campo  debe ser un archivo de tipo: :values.',
    'mimetypes' => 'El campo  debe ser un archivo de tipo: :values.',
    'min' => [
        'numeric' => 'El campo  debe tener al menos :min.',
        'file' => 'El campo  debe tener al menos :min kilobytes.',
        'string' => 'El campo  debe tener al menos :min caracteres.',
        'array' => 'El campo  debe tener al menos :min elementos.',
    ],
    'min_digits' => 'El campo  debe ser como mínimo de :min dígitos.',
    'multiple_of' => 'El campo  debe ser un múltiplo de :value.',
    'not_in' => 'El campo  seleccionado es invalido.',
    'not_regex' => 'El formato del campo  no es válido.',
    'numeric' => 'El campo  debe ser un número.',
    'password' => [
        'letters' => 'El campo  debe contener al menos una letra.',
        'mixed' => 'El campo  debe contener al menos una letra mayúscula y una minúscula.',
        'numbers' => 'El campo  debe contener al menos un número.',
        'symbols' => 'El campo  debe contener al menos un símbolo.',
        'uncompromised' => 'El valor del campo  aparece en alguna filtración de datos. Por favor indica un valor diferente.',
    ],
    'present' => 'El campo  debe estar presente.',
    'prohibited' => 'El campo  no está permitido.',
    'prohibited_if' => 'El campo  no está permitido cuando :other es :value.',
    'prohibited_unless' => 'El campo  no está permitido si :other no está en :values.',
    'prohibits' => 'El campo  no permite que :other esté presente.',
    'regex' => 'El formato del campo  no es válido.',
    'required' => 'El campo  es requerido.',
    'required_array_keys' => 'El campo  debe contener entradas para: :values.',
    'required_if' => 'El campo  es requerido cuando el campo :other es :value.',
    'required_unless' => 'El campo  es requerido a menos que :other esté presente en :values.',
    'required_with' => 'El campo  es requerido cuando :values está presente.',
    'required_with_all' => 'El campo  es requerido cuando :values está presente.',
    'required_without' => 'El campo  es requerido cuando :values no está presente.',
    'required_without_all' => 'El campo  es requerido cuando ningún :values está presente.',
    'same' => 'El campo  y :other debe coincidir.',
    'size' => [
        'numeric' => 'El campo  debe ser :size.',
        'file' => 'El campo  debe tener :size kilobytes.',
        'string' => 'El campo  debe tener :size caracteres.',
        'array' => 'El campo  debe contener :size elementos.',
    ],
    'starts_with' => 'El :attribute debe empezar con uno de los siguientes valores :values',
    'string' => 'El campo  debe ser una cadena.',
    'timezone' => 'El campo  debe ser una zona válida.',
    'unique' => 'El campo  ya ha sido tomado.',
    'uploaded' => 'El campo  no ha podido ser cargado.',
    'url' => 'El formato de :attribute no es válido.',
    'uuid' => 'El :attribute debe ser un UUID valido.',

    /*
    |--------------------------------------------------------------------------
    | Validación del idioma personalizado
    |--------------------------------------------------------------------------
    |
    |   Aquí puede especificar mensajes de validación personalizados para atributos utilizando el
    | convención "attribute.rule" para nombrar las líneas. Esto hace que sea rápido
    | especifique una línea de idioma personalizada específica para una regla de atributo dada.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Atributos de validación personalizados
    |--------------------------------------------------------------------------
    |
    | Las siguientes líneas de idioma se utilizan para intercambiar los marcadores de posición de atributo.
    | con algo más fácil de leer, como la dirección de correo electrónico.
    | de "email". Esto simplemente nos ayuda a hacer los mensajes un poco más limpios.
    |
    */

    'attributes' => [],

];
