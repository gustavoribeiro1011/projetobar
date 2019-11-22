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
                      <option id="option_categoria"></option>
                      <?php include($ModelSelectCategoria); ?>
                    </select>    
                  </div>
                  <div class="col-8 col-md-10 col-xl-9 col-lg-9 py-1">  
                   <label>Preço</label>
                   <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">R$</span>
                    </div>
                    <input type="text" class="form-control moedaBRL" id="preco_editar" aria-label="Preço">
                  </div>                   
                </div>
                <div class="col-8 col-md-10 col-xl-9 col-lg-9 py-1">    
                  <label>Unidade de medida</label>
                  <select id="unidade_medida_editar" class="form-control">
                    <option id="option_unidade_medida"></option>
                    <?php include($ModelSelectUnidadeMedida); ?>
                  </select>                      
                </div>
                               <div class="col-8 col-md-10 col-xl-9 col-lg-9 py-1">  
                 <div class="input-group mb-3">
                  <input type="text" class="form-control" id="medida_editar" aria-label="Medida">
                </div>                   
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