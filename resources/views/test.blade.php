
  <form class="form-inline" action="/uzmi-sesiju" method="post">
    
    <div class="checkbox">
      <label><input type="number" name="auto"> auto</label><br>
      <label><input type="number" name="banane">banane</label><br>
      <label><input type="number" name="laptop"> laptop</label>
    </div>
    {{ csrf_field()}}
    <button type="submit" class="btn btn-default">Submit</button>
  </form>