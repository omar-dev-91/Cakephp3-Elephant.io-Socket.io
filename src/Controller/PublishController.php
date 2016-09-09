<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

use Cake\Event\Event;

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
        $this->Flash->success(__('Message sent.'));
      } catch (ServerConnectionFailureException $e) {
        $this->Flash->error(__('An error occurred while trying to establish a connection to the server.'));
      }
    }
  }
}
