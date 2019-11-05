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
                    <input type="text" id="preco" class="form-control" />
                  </div>
                </div>
                <div class="row"> 
                  <div class="col-2 col-md-2 col-xl-1 col-lg-1 py-1">                 
                    <button class="btn btn-primary" id="botaoCadastrarProduto">Cadastrar</button>
                  </div>
                </div>       
              </div>
            </div>