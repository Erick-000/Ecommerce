<form action="index.php?modulo=factura" method="post" id="payment-form">
    <table class="table table-striped table-inverse" id="tablaPasarela">
        <thead class="thead-inverse">
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <!-- Aquí irían las filas de productos -->
        </tbody>
    </table>

    <div class="form-row">
        <h4 class="mt-3">Datos de su tarjeta</h4>
        <div id="card-element" class="form-control">
            <!-- Aquí se insertaría un elemento de Stripe, si se estuviera usando -->
        </div>

        <!-- Para mostrar errores del formulario -->
        <div id="card-errors" role="alert"></div>
    </div>
    <div class="mt-3">
        <h4>Términos y condiciones</h4>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate perferendis exercitationem dolorem voluptas nesciunt assumenda eos repellat vero nulla enim, voluptatem neque fugiat architecto placeat doloribus quam, cupiditate dolore quasi.
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa commodi officiis distinctio illo deserunt! Facere culpa nisi ab voluptate excepturi! Qui culpa minima officiis ea quo numquam magni aut. Unde.
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet voluptate saepe cumque sapiente ea minus molestias distinctio sunt perferendis tempora suscipit ipsam qui ex, ut quis officia expedita possimus deleniti?</p>
        <div class="form-check">
          <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="" id="" value="checkedValue" checked>
            Acepto los términos y condiciones
          </label>
        </div>
    </div>
    <div class="mt-3">
        <a class="btn btn-warning" href="index.php?modulo=envio" role="button">Ir a envío</a>
        <button type="submit" href="index.php?modulo=factura" class="btn btn-primary float-right">Pagar</button>
    </div>
</form>
