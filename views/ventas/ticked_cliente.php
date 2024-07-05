<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['title']; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;

        }

        .factura-title {
            color: #316ac5;
            font-weight: bold;
            font-size: 20px;
        }

        .separator {
            margin-bottom: 20px;
            color: #cccccc;
            font-size: 1;
        }

        .datos-empresa li,
        .datos-info li {
            font-weight: normal;
        }

        .button-container {
            margin: 5px 0;
            text-align: center;
        }

        .button {
            display: inline-block;
            padding: 15px;
            background: #000;
            font-weight: bold;
            color: #fff !important;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            margin: 5px;
        }

        .message-table {
            width: 100%;
            color: #333333;
            text-align: left;
        }

        .footer-table {
            width: 620px;
            background: #ffffff;
            color: #cccccc;
            margin-top: 20px;
        }

        .footer-separator {
            color: #cccccc;
        }

        .footer-info-table {
            width: 620px;
            background: #ffffff;
            color: #707070;
            font-size: 12px;
            line-height: 14px;
            text-align: left;
        }

        .company-link {
            display: block;
            color: #316ac5;
            text-decoration: none;
        }

        .link-company {
            display: block;
            color: #316ac5;
        }

        .contacto {
            color: #707070;
        }

        .company-info {
            color: #316ac5;
            text-decoration: none;
        }

        .mensaje h4 {
            font-size: 18px;
            font-weight: bold;
            color: #316ac5;
        }

        .mensaje h1 {
            font-size: 24px;
            color: red;
        }
    </style>
</head>

<body style="margin: 0 160px 0 160px;">
    <span class="factura-title">FACTURA ELECTRÓNICA <?= $data['venta']['serie']; ?></span>
    <hr class="separator">
    <p>Hola, </p>
    <p>Adjuntamos en este email un COMPROBANTE DE PAGO ELECTRÓNICO</p>
    <p><b>Datos del Emisor:</b></p>
    <div class="datos-empresa">
        <ul>
            <li><?= $data['empresa']['nombre']; ?></li>
            <li><strong>RUC: </strong> <?= $data['empresa']['ruc']; ?></li>
        </ul>
    </div>
    <p><b>Información del Comprobante:</b></p>
    <div class="datos-info">
        <ul>
            <li><strong><?= $data['venta']['identidad']; ?>: </strong> <?= $data['venta']['num_identidad']; ?></li>
            <li><strong>Nombre: </strong> <?= $data['venta']['nombre']; ?></li>
            <li><strong>Teléfono: </strong> <?= $data['venta']['telefono']; ?></li>
        </ul>
    </div>

    <div class="button-container">
        <a class="button" href="<?= BASE_URL . 'ventas/reporte/ticked/' . $data['venta']['id']; ?>" target="_blank">VER EN TICKET</a>
        <a class="button" href="<?= BASE_URL . 'ventas/reporte/factura/' . $data['venta']['id']; ?>" target="_blank">VER EN PDF</a>
    </div>

    <table class="message-table">
        <tbody>
            <tr>
                <td>
                    <p>Muchas gracias por hacer negocios con nosotros</p>
                    <span>Saludos,</span>
                    <br>
                    <span><b>EQUIPO <?= $data['empresa']['nombre']; ?></b><br> <?= $data['empresa']['direccion']; ?><br>Cel: <?= $data['empresa']['telefono']; ?> | <a href="mailto:<?= $data['empresa']['correo']; ?>" target="_blank">espinozamirandajose1@gmail.com</a></span>
                </td>
            </tr>
        </tbody>
    </table>
    <hr class="footer-separator">
    <table class="footer-info-table">
        <tbody>
            <tr>
                <td>
                    <b>Comprobante generado desde:</b>
                    <div class="company-info">
                        <b><a class="company-link" href="<?= BASE_URL . 'admin'; ?>" target="_blank"><?= TITLE; ?></a></b>
                        <b>Sistema de Ventas con Facturación Electrónica</b>
                        <div class="contacto">Móvil o WhatsApp: <?= $data['empresa']['telefono']; ?></div>
                        <a class="link-company" href="<?= BASE_URL . 'admin'; ?>" target="_blank"><?= BASE_URL . 'admin'; ?></a>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="mensaje">
        <h4><?php echo $data['venta']['metodo']; ?></h4>
        <?php echo $data['empresa']['mensaje']; ?>
        <?php if ($data['venta']['estado'] == 0) { ?>
            <h1>Venta Anulado</h1>
        <?php } ?>
    </div>
</body>

</html>