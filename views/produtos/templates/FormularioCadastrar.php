            <!-- Formulário Cadasrar Produtos -->
            <div class="card shadow mb-4 FormularioCadastrarProduto">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Cadastrar produto</h6>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-8 col-md-10 col-xl-9 col-lg-9 py-1">
                    <label>Produto</label>
                    <input type="text" id="produto" class="form-control"  required />
                  </div>
                  <div class="col-8 col-md-10 col-xl-9 col-lg-9 py-1">    
                    <label>Categoria</label>
                    <select class="form-control" id="categoria">                      
                      <?php include($ModelSelectCategoria); ?>
                    </select>
                  </div>
                  <div class="col-8 col-md-10 col-xl-9 col-lg-9 py-1">  
                   <label>Preço</label>
                   <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">R$</span>
                    </div>
                    <input type="text" class="form-control moedaBRL" id="preco" aria-label="Preço">
                  </div>                   
                </div>
                <div class="col-8 col-md-10 col-xl-9 col-lg-9 py-1">    
                  <label>Unidade de medida</label>
                  <select class="form-control" id="unidade_medida">                      
                    <?php include($ModelSelectUnidadeMedida); ?>
                  </select>
                </div>
                <div class="col-8 col-md-10 col-xl-9 col-lg-9 py-1">  
                 <div class="input-group mb-3">
                  <input type="text" class="form-control" id="medida" aria-label="Medida">
                </div>                   
              </div>
            </div>
            <div class="row"> 
              <div class="col-2 col-md-2 col-xl-1 col-lg-1 py-1">                 
                <button class="btn btn-primary" id="botaoCadastrarProduto">Cadastrar</button>
              </div>
            </div>       
          </div>
        </div>