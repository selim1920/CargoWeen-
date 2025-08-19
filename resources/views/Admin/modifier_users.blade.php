<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit Flight</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
     <form method="POST" >
            @csrf
            @method('PUT')
                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" name="name" class="form-control" value="{{ $users->name }}" required>
                    <span class="help-block"></span>
                </div>
                <div class="form-group">
                    <label  for="prenom">Prenom</label>
                    <input type="text" name="prenom" class="form-control" value="{{ $users->prenom }}" required>
                    <span class="help-block"></span>
                </div>
                <div class="form-group">
                    <label  for="pays">Pays</label>
                    <input type="text" name="pays" class="form-control"  value="{{ $users->pays }}"required>
                    <span class="help-block"></span>
                </div>
                  <div class="form-group">
                    <label  for="ville">Ville</label>
                    <input type="text" name="ville" class="form-control"  value="{{ $users->ville }}" required>
                    <span class="help-block"></span>
                </div>
                <div class="form-group">
                    <label  for="adresse">Adresse</label>
                    <input type="text" name="adresse" class="form-control"  value="{{ $users->adresse }}" required>
                    <span class="help-block"></span>
                </div>
                <div class="form-group">
                    <label  for="code_postal">Code Postal</label>
                    <input type="text" name="code_postal" class="form-control"  value="{{ $users->code_postal }}" required>
                    <span class="help-block"></span>
                </div>
                <div class="form-group">
                    <label  for="fonction">Fonction</label>
                    <input type="text" name="fonction" class="form-control"    value="{{ $users->fonction }}"  required>
                    <span class="help-block"></span>
                </div>
                <div class="form-group">
                    <label  for="email">Email</label>
                    <input type="text" name="email" class="form-control"  value="{{ $users->email }}" required>
                    <span class="help-block"></span>
                </div>
                <div class="form-group">
                    <label  for="telephone">Telephone</label>
                    <input type="text" name="telephone" class="form-control" value="{{ $users->telephone }}" required>
                    <span class="help-block"></span>
                </div>
                <div class="form-group">
                    <label  for="numero_cass">Numero_Cass</label>
                    <input type="text" name="numero_cass" class="form-control" value="{{ $users->numero_cass }}" required>
                    <span class="help-block"></span>
                </div>
                <div class="form-group">
                    <label  for="password">Password</label>
                    <input type="password" name="password" class="form-control"  value="{{ $users->password }}" required>
                    <span class="help-block"></span>
                </div>
                <div class="form-group">
                    <label  for="confirm_password">Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control"  value="{{ $users->confirm_password }}"required>
                    <span class="help-block"></span>
                </div>
                <div class="form-group">
                <input name="submit" type="submit" class="btn btn-primary" value="Submit">
                <a href="#" class="btn btn-default" style="color:red;">Cancel</a>
                </div>
            </form>
    </section>

