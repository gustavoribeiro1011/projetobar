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
                  </div>
                  <div class="col-8 col-md-10 col-xl-9 col-lg-9 py-1">    
                    <label>Categoria</label>
                    <select id="categoria_editar" class="form-control">
                      <option id="teste"></option>
                      <?php include($ModelSelectCategoria); ?>
                    </select>    
                  </div>
                  <div class="col-8 col-md-10 col-xl-9 col-lg-9 py-1">    
                    <label>Preço</label>                
                    <input type="text" id="preco_editar" class="form-control" />
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