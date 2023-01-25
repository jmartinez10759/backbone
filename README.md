<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Acerca del Endpoint

Se creo un Endpoint para poder hacer las busquedas de los codigos postales de México, mediante el numero que se 
proporciona en relacion a colonia que se requiere obtener, los puntos a considerar son los siguientes:

- Archivo de texto dividido por pibes (|) con alrededor de 160,000 registros
- Acentos y caracteres invalidos fueron reemplazados
- Lectura del archivo para mayor performance
- Validacion del numero ingresado del Codigo Postal
- Collection de Laravel
- Cache Redis para velocidad de respuesta
- Unit Test del endpoint de codigos postales
- Manejo de Servicio
- Manejo de Repository
- Manejo de Resource y Collection como repuesta de los datos
- Se reemplazo el prefijo "data" de los endpoint de Laravel,para mayor legibilidad
- La url del endpoint la puede encontrar [aqui](https://backbone.itsolutionsengly.com/api/zip-codes/)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
