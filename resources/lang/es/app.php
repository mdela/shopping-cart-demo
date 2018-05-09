<?php

return [

    /*
    |--------------------------------------------------------------------------
    | App Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used across the whole application for 
    | various messages that we need to display to the user.
    |
    */

    'products' => [
        'brand' => 'por :brand',
        'categories' => [
            'tv' => 'TVs',
            'tablets' => 'Tablets',
            'cell_phones' => 'Celulares'
        ],
        'shipping_charge' => [
            'title' => 'Cargo por envío',
            'description' => 'Tarda en llegar entre 4 y 5 días hábiles una vez verificada la compra.'
        ]
    ],
    
    'shopping_cart' => [
        'title' => 'Tu Carrito',
        'add' => 'Añadir al carrito',
        'added_item' => 'Producto añadido al carrito',
        'buy' => 'Comprar',
        'checkout' => 'Procesar compra',
        'destroy' => 'Deshacer carrito',
        'empty' => 'No has añadido artículos aún'
    ],

    'purchase' => [
        'title' => 'Su Compra',
        'billing_address' => 'Dirección de Envio',
        'invoice' => 'Emitir factura',
        'client' => [
            'first_name' => 'Nombre',
            'last_name' => 'Apellido',
            'dni' => 'D.N.I',
            'phone' => 'Teléfono',
            'email' => 'Email'
        ],
        'shipping_address' => [
            'street' => 'Calle',
            'number' => 'Número',
            'floor' => 'Piso',
            'dept' => 'Departamento',
            'postal_code' => 'Código Postal',
            'city'  => 'Ciudad',
            'country' => 'País',
        ]
    ],

    'invoice' => [
        'title' => 'Factura',
        'order' => 'Orden',
        'billed_to' => 'Facturado a',
        'date' => 'Fecha de Orden',
        'summary' => 'Resumen de orden',
        'item' => 'item',
        'price' => 'Precio',
        'qty' => 'Cant.',
        'totals'=> 'Totales',
        'total' => 'Total',
        'subtotal' => 'Subtotal',
        'shipping' => 'Envío'
    ],
    'button' => [
        'back' => 'Regresar',
        'top' => 'Volver arriba'
    ],

    'invalid' => [
        'email' => 'Ingrese una dirección de correo electrónico válida'
    ],
    'welcome' =>  'Bienvenido',
    'required' => 'Campo requerido',
    'logout' => 'Cerrar mi sessión',
    'select' => 'Seleccione...',
    'optional' => 'Opcional',
    'no_records'=> 'No existen registros.'

];
