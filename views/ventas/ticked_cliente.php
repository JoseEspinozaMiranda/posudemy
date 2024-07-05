<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['title']; ?></title> 
    <!-- <link rel="stylesheet" href="<?php echo BASE_URL . 'assets/css/ticked.css'; ?>"> -->
    <style> 
          
        /* .btnTicket {
            display: inline-block;
            width: 100%;
            text-align: center;
            padding: 10px 0;
            background-color: #000;
            color: #fff;
            text-decoration: none;
            margin: 10px 0;
            font-size: 14px;
            font-weight: bold;
            border-radius: 5px; 
        }  */
    </style>
</head>

<body style="margin-right: 160px; margin-left: 160px;">
    <span style="color: #316ac5; font-weight: bold; font-size: 20px;">FACTURA ELECTRÓNICA <?= $data['venta']['serie']; ?></span>
    <hr style="margin-bottom: 20px; color: #cccccc; font-size: 1;">
    <p>Hola, </p>
    <p>Adjuntamos en este email un COMPROBANTE DE PAGO ELECTRÓNICO</p>
    <p><b>Datos del Emisor:</b></p>
    <!-- <p class="title">Datos del Emisor:</h3> -->
    <div class="datos-empresa unoDos">
        <ul>
            <li style="font-weight: normal;"><?= $data['empresa']['nombre']; ?></li>
            <li style="font-weight: normal;"><strong>RUC: </strong> <?= $data['empresa']['ruc']; ?></li>
            <!-- <li style="font-weight: normal;"><strong>Teléfono: </strong> <?= $data['empresa']['telefono']; ?></li> -->
            <!-- <li style="font-weight: normal;"><strong>Dirección: </strong> <?= $data['empresa']['direccion']; ?></li> -->
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

    <div style="margin:5px 0; text-align: center;"><br>
        <a style="display:inline-block;padding:15px;background:#000;font-weight:bold;color:#fff;text-align:center; text-decoration:none; border-radius:5px" href="<?= BASE_URL . 'ventas/reporte/ticked/' . $data['venta']['id']; ?>" target="_blank">VER EN TICKET</a>

        <a style="display:inline-block;padding:15px;background:#000;font-weight:bold;color:#fff;text-align:center; justify-content:center; text-decoration:none; border-radius:5px" href="<?= BASE_URL . 'ventas/reporte/factura/' . $data['venta']['id']; ?>" target="_blank">VER EN PDF</a>
    </div>

    
    <!-- <a class="btnTicket" href="<?= BASE_URL . 'ventas/reporte/ticked/' . $data['venta']['id']; ?>" target="_blank">Ver Ticket</a>
    <a class="btnTicket" href="<?= BASE_URL . 'ventas/reporte/factura/' . $data['venta']['id']; ?>" target="_blank">Ver PDF</a> -->


    <table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#ffffff">
        <tbody>
            <tr valign="top">
                <td valign="top" style="padding-top:10px;color:#333333;text-align:left" align="left" rowspan="1" colspan="1">
                    <p>Muchas gracias por hacer negocios con nosotros</p><br><span>Saludos,</span><br clear="none"><span><b>EQUIPO <?= $data['empresa']['nombre']; ?></b><br> <?= $data['empresa']['direccion']; ?><br>Cel: <?= $data['empresa']['telefono']; ?> | <a href="mailto:<?= $data['empresa']['correo']; ?>" target="_blank">espinozamirandajose1@gmail.com</a></span>
                </td>
            </tr>
        </tbody>
    </table>
    <table width="620px" cellpadding="0" cellspacing="0" border="0" bgcolor="#ffffff" align="center">
        <tbody>
            <tr>
                <td style="color:#cccccc" valign="top" width="100%" rowspan="1" colspan="1">
                    <hr color="#cccccc" size="1">
                </td>
            </tr>
            <tr>
                <td rowspan="1" colspan="1">
                    <div>
                        <table width="620px" cellpadding="0" cellspacing="0" border="0" bgcolor="#ffffff" align="center">
                            <tbody>
                                <tr>
                                    <td valign="top" style="padding-top:10px;color:#707070;font-size:12px;line-height:14px;text-align:left" align="left" rowspan="1" colspan="1"><b>Comprobante generado desde:</b>
                                        <div style="color:#316ac5"><b><a href="<?= BASE_URL . 'admin'; ?>" target="_blank"><?= TITLE; ?></a></b></div>
                                        <div style="color:#134ead"><b>Sistema de Ventas con Facturación Electrónica</b></div>
                                        <div>Móvil o WhatsApp: <?= $data['empresa']['telefono']; ?></div>
                                        <div><a href="<?= BASE_URL . 'admin'; ?>" target="_blank"><?= BASE_URL . 'admin'; ?></a></div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

    <!-- <h5 class="title">Detalle de los Productos</h5>
    <table style="width: 100%;">
        <thead style="background-color: black;">
            <tr>
                <th style="color: white;">Cant</th>
                <th style="color: white;">Descripción</th>
                <th style="color: white;">Precio</th>
                <th style="color: white;">SubTotal</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $productos = json_decode($data['venta']['productos'], true);
            foreach ($productos as $producto) { ?>
                <tr>
                    <td><?php echo $producto['cantidad']; ?></td>
                    <td><?php echo $producto['nombre']; ?></td>
                    <td><?php echo number_format($producto['precio'], 2); ?></td>
                    <td><?php echo number_format($producto['cantidad'] * $producto['precio'], 2); ?></td>
                </tr>
            <?php } ?>
            <tr>
                <td class="text-right" colspan="3">Descuento</td>
                <td class="text-right"><?php echo number_format($data['venta']['descuento'], 2); ?></td>
            </tr>
            <tr>
                <td class="text-right" colspan="3">Total con descuento</td>
                <td class="text-right"><?php echo number_format($data['venta']['total'] - $data['venta']['descuento'], 2); ?></td>
            </tr>
            <tr>
                <td class="text-right" colspan="3">Total sin descuento</td>
                <td class="text-right"><?php echo number_format($data['venta']['total'], 2); ?></td>
            </tr>
        </tbody>
    </table> -->
    <div class="mensaje">
        <h4><?php echo $data['venta']['metodo'] ?></h4>
        <?php echo $data['empresa']['mensaje']; ?>
        <?php if ($data['venta']['estado'] == 0) { ?>
            <h1>Venta Anulado</h1>
        <?php } ?>
    </div>

</body>

</html>