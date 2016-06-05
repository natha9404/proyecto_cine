<?PHP

    require ("ORM/ORM_Usuario.php");
    
    
    //ORM_Usuario::__construct();
    $resultado = ORM_Usuario::encontrar('edison.mamian');
    
    $arreglo = get_object_vars($resultado);
    var_dump($arreglo);
    print_r ($arreglo);
    //print 'hola';
    
?>