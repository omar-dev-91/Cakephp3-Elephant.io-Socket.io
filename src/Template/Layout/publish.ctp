<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Publishing</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <?= $this->Html->css('materialize.min') ?>
    <?= $this->Html->css('styles') ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="http://128.76.8.38:5000/socket.io/socket.io.js" type="text/javascript"></script>
    <?= $this->Html->script('materialize.min') ?>
    <?= $this->Html->script('initializers') ?>
    <?= $this->Html->script('SocketClient') ?>
  </head>
  <body>
    <header>
      <nav class="indigo darken-4">
        <div class="nav-wrapper container">
          <a href="/published" class="brand-logo">Notify Push</a>
          <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
          <ul class="right hide-on-med-and-down">
            <li><a href="/published/agregar"> <i class="material-icons">add</i></a></li>
            <li><a href="/published"> <i class="material-icons">refresh</i></a></li>
          </ul>
          <ul class="side-nav" id="mobile-demo">
            <li><a href="/published"> <i class="material-icons">refresh</i></a></li>
          </ul>
        </div>
      </nav>
    </header>
    <br>
    <?= $this->Flash->render() ?>
    <section class="container">
      <?= $this->fetch('content') ?>
    </section>
  </body>
</html>
