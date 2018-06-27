## Elephant.io para Cakephp3x
## Instalar Elephant.io
Abrir el archivo composer.json y en el objeto "require" agregar la siguiente dependencia:

    "wisembly/elephant.io": "~3.0"

Después se debe ejecutar el siguiente comando:

    php composer.phar update
    
En caso de que aparezca un error que indique que el archivo composer.phar no se encuentra, se deben de ejecutar las siguientes líneas de comando una por una y reintentar con el comando php composer.phar:

    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    php -r "if (hash_file('SHA384', 'composer-setup.php') === 'e115a8dc7871f15d853148a7fbac7da27d6c0030b848d9b3dc09e2a0388afed865e6a3d6b3c0fad45c48e2b5fc1196ae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
    php composer-setup.php
    php -r "unlink('composer-setup.php');"

## Configuración

Añadir las siguientes líneas al controlador donde se requiere la conexión con Socket.io

    use ElephantIO\Client as Elephant;
    use ElephantIO\Engine\SocketIO\Version1X;
    use ElephantIO\Exception\ServerConnectionFailureException;


## Uso

El siguiente código muestra como añadir los métodos para enviar el evento a Socket.io

    public function publish(){
        $Elephant = new Elephant(new Version1X('http://128.76.8.38:5000'));
        try {
            $Elephant->initialize();
            $Elephant->emit('cake_event',['arg' => 'Hola Mundo']);
            $Elephant->close();
            $this->Flash->success(__('Message sent.'));
        } catch (ServerConnectionFailureException $e) {
            $this->Flash->error(__('An error occurred while trying to establish a connection to the server.'));
        } 
    }
