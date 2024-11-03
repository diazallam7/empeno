<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Datos</title>
    <!-- Estilos opcionales -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('success'))
        <script>
            let message = "{{ session('success') }}";
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "success",
                title: message
            });
            </script>
    @endif
    <style>
        .container {
            max-width: 500px;
            margin-top: 50px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            background-color: #f9f9f9;
        }
        .btn {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container text-center">
        <h2>Detalles del Producto</h2>
        <p><strong>Precio Compra:</strong> {{ number_format($precioCompra) }}</p>
        <p><strong>Monto Interés:</strong> {{ number_format($montoInteres) }}</p>
        <form action="{{ route('interes.destroy', $producto->id) }}" method="POST">
            @csrf
            @method('DELETE')

            <!-- Campo editable para el total -->
            <label for="total"><strong>Total:</strong></label>
            <input type="number" name="total" id="total" value="{{ $total }}" class="form-control" step="0.01" required>

            <button type="submit" class="btn btn-danger">Pagar</button>
        </form>
    </div>
</body>
</html>