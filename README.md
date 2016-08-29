##Elephant.io para Cakephp3x
##Configuracion

Descargar Elephant.io -> git clone git://github.com/Wisembly/elephant.io.git.

Mover el contenido a la carpeta vendor.

Añadir las siguientes lineas al controlador donde se requiere la conexión con Socket.io


    require_once(ROOT . DS . 'vendor' . DS  . 'wisembly' . DS . 'elephant.io' . DS . 'src' . DS . 'Client.php');
    require_once(ROOT . DS . 'vendor' . DS  . 'wisembly' . DS . 'elephant.io' . DS . 'src' . DS . 'EngineInterface.php');
    require_once(ROOT . DS . 'vendor' . DS  . 'wisembly' . DS . 'elephant.io' . DS . 'src' . DS . 'Engine' . DS . 'AbstractSocketIO.php');
    require_once(ROOT . DS . 'vendor' . DS  . 'wisembly' . DS . 'elephant.io' . DS . 'src' . DS . 'AbstractPayload.php');
    require_once(ROOT . DS . 'vendor' . DS  . 'wisembly' . DS . 'elephant.io' . DS . 'src' . DS . 'Payload' . DS . 'Decoder.php');
    require_once(ROOT . DS . 'vendor' . DS  . 'wisembly' . DS . 'elephant.io' . DS . 'src' . DS . 'Payload' . DS . 'Encoder.php');
    require_once(ROOT . DS . 'vendor' . DS  . 'wisembly' . DS . 'elephant.io' . DS . 'src' . DS . 'Engine' . DS . 'SocketIO' . DS . 'Session.php');
    require_once(ROOT . DS . 'vendor' . DS  . 'wisembly' . DS . 'elephant.io' . DS . 'src' . DS . 'Engine' . DS . 'SocketIO' . DS . 'Version1X.php');
    require_once(ROOT . DS . 'vendor' . DS  . 'wisembly' . DS . 'elephant.io' . DS . 'src' . DS . 'Exception' . DS . 'ServerConnectionFailureException.php');

    use ElephantIO\Client as Elephant;
    use ElephantIO\Engine\SocketIO\Version1X;
    use ElephantIO\Exception\ServerConnectionFailureException;


##Uso

El siguiente codigo muestra como añadir los metodos para enviar el evento a Socket.io

    public function holaMundo(){
        $Elephant = new Elephant(new Version1X('http://128.76.8.38:5000'));
        try {
            $Elephant->initialize();
            $Elephant->emit('cake_event',['arg' => 'Hola Mundo']);
            $Elephant->close();
        } catch (ServerConnectionFailureException $e) {
            echo "Error de conexion";
            exit();
        } 
    }
