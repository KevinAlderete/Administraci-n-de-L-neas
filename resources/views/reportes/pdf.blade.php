<style>
    @page {
      size: 'A4';
    }
    * {
      box-sizing: border-box;
      
    }
    .card-container {
      
    }

    .container-header-logo{
        width : 180px;
        height : auto;
        margin: 0;
        padding: 0;
    }
    .conteiner-content-title{
        font-size: .8rem;
        text-transform: uppercase;
        text-align: center;
        color:#1c52f5;
    }
    .container-content-table-head{
        border: 1px solid;
    }
    .container-content-table-body{
        border: 1px solid;
    }
  </style>
  
  <div class="container">
    <header>
        <img class="container-header-logo" src="{{ asset('img/minera-chinalco.png') }}" alt="Logo Minera Chinalco">
    </header>
    <section class="container-content">
        <div class="conteiner-content-title"><h1>Reporte</h1></div>
        <table class="container-content-table">
            <thead class="container-content-table-head">
              <tr class="">
                <th class="">Personal</th>
                <th class="">Tipo</th>
                <th class="">Plan</th>
                <th class="">Precio</th>
                <th class="">Número</th>
                <th class="">Sede</th>
                <th class="">Observación</th>

                <th class="">Fecha</th>
              </tr>
            </thead>
            <tbody class="container-content-table-body">
              @foreach ($gestionLineas as $gestionLinea)
              <tr class="">
                <td class="">
                  <p class="">{{ $gestionLinea->personal->nombre }}</p>
                </td>
                <td class="">
                  <div class="">
                    <div class="">
                      <p class="">{{ $gestionLinea->linea->tipo }}</p>
                    </div>
                  </div>
                </td>
                <td class="">
                  <div class="">
                    <div class="">
                      <p class="">{{ $gestionLinea->linea->plan }}</p>
                    </div>
                  </div>
                </td>
                <td class="">
                    <div class="">
                      <div class="">
                        <p class="">{{ $gestionLinea->linea->precio }}</p>
                      </div>
                    </div>
                </td>
                <td class="">
                    <div class="">
                      <div class="">
                        <p class="">{{ $gestionLinea->linea->linea }}</p>
                      </div>
                    </div>
                </td>
                <td class="">
                  <div class="">
                    <div class="">
                      <p class="">{{ $gestionLinea->linea->sede }}</p>
                    </div>
                  </div>
                </td>
                <td class="">
                    <div class="">
                        <div class="">
                          <p class="">{{ $gestionLinea->observacion }}</p>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="">
                        <div class="">
                          <p class="">{{ $gestionLinea->created_at->format('d-m-Y') }}</p>
                        </div>
                    </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </section>
  
  </div>
  