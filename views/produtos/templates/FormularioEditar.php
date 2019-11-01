            <!-- Formulário Editar Produto -->
            <div class="card shadow mb-4 FormularioEditarProduto" style="display:none;">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Editar produto</h6>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-8 col-md-10 col-xl-9 col-lg-9 py-1">                    
                    <input type="text" id="id_editar" class="form-control" disabled style="display:none;"/>
                    <label>Produto</label>
                    <input type="text" id="produto_editar" class="form-control"  required />
                    <label>Categoria</label>
                    <select id="categoria_editar" class="form-control">
                      <option id="categoria_id"><p id="categoria_nome">Aqui</p></option>
                    </select>

                    

                

                  </div>
                </div>
                <div class="row"> 
                  <div class="col-12 col-md-12 col-xl-12 col-lg-12 py-1">                 
                    <button class="btn btn-primary botaoEditarProduto">Salvar</button>
                    <button class="btn btn-light botaoCancelarProduto">Cancelar</button>

                  </div>
                </div>       
              </div>
            </div>