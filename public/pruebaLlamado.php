<?php

    require __DIR__.'/../vendor/autoload.php';
    use Andreani\Andreani;
    use Andreani\Requests\CotizarEnvio;
    // Los siguientes datos son de prueba, para la implementación en un entorno productivo deberán reemplazarse por los verdaderos
    $request = new CotizarEnvio();
    $request->setCodigoDeCliente('CL0003750');
    $request->setNumeroDeContrato('400006709');
    $request->setCodigoPostal('1014');
    $request->setPeso(500);
    $request->setVolumen(100);
    $request->setValorDeclarado(100);

    $andreani = new Andreani('xl_ws','OidJfj2309');
    $response = $andreani->call($request);
    
    // var_dump($response);
    // return;

    if($response->isValid()){
        $tarifa = $response->getMessage()->CotizarEnvioResult->Tarifa;
        echo "La cotización funcionó bien y la tarifa es $tarifa";
    } else {
        echo "La cotización falló, el mensaje de error es el siguiente";
        var_dump($response->getMessage());
    }