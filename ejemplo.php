<?PHP

    require ("ORM/Usuario_ORM.php");
    
    
    $usuarios = Usuario_ORM::all('');
    
    $obj = $usuarios[0];
    
    $arreglo = get_object_vars($obj);
    var_dump($arreglo);
    
    
    $uno = Usuario_ORM::where('usuario', 'diana89');
    //print_r($uno);
    
    
    $dos = Usuario_ORM::where('usuario', 'edison');
    //print_r($dos);
    $dato = get_object_vars($dos[0]);
    echo($dato['usuario']);
    var_dump($dato);
    
    Usuario_ORM::guardarUsuarios('dianaelisa', '654321', '11@22', '1989-09-29', 'diana elisa', 'morales camacho')
?>