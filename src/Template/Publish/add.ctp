<div class="row">
  <div class="col s12 m7 offset-m2">
    <div class="card-panel">
      <?= $this->Form->create() ?>
      <div class="row">
        <div class="input-field col s12">
          <?= $this->Form->input( "message", [ "label" => "Mensaje", "class" => "validate"] ) ?>
        </div>
      </div>
      <?= $this->Form->button('<i class="material-icons">send</i>', ["type"=>"submit", "class"=>"btn waves-effect waves-light  indigo darken-4", "escape"=>false]) ?>
      <?= $this->Form->end() ?>
    </div>
  </div>
</div>
