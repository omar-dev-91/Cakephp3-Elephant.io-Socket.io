<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

use Cake\Event\Event;

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

class PublishController extends AppController
{
  public function index()
  {
    $this->viewBuilder()->layout('publish');
  }

  public function add()
  {
    $this->viewBuilder()->layout('publish');

    if($this->request->is('post'))
    {
      $Elephant = new Elephant(new Version1X('http://128.76.8.38:5000'));
      try {
          $Elephant->initialize();
          $Elephant->emit('cake_event',[ 'arg' => $this->request->data['message'] ]);
          $Elephant->close();
      } catch (ServerConnectionFailureException $e) {
          echo "Error de conexion";
          exit();
          $this->ErrorConnectionSocket($e);
      }
    }
  }
}
