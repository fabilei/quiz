<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" 
      xmlns:v="urn:schemas-microsoft-com:vml"
      xmlns:o="urn:schemas-microsoft-com:office:office">
    <head>
        <!--[if gte mso 9]><xml>
         <o:OfficeDocumentSettings>
          <o:AllowPNG/>
          <o:PixelsPerInch>96</o:PixelsPerInch>
         </o:OfficeDocumentSettings>
        </xml><![endif]-->
        <!-- fix outlook zooming on 120 DPI windows devices -->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- So that mobile will display zoomed in -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- enable media queries for windows phone 8 -->
        <meta name="format-detection" content="date=no"> <!-- disable auto date linking in iOS 7-9 -->
        <meta name="format-detection" content="telephone=no"> <!-- disable auto telephone linking in iOS 7-9 -->
        <title>Quiz Trezo</title>

        <style type="text/css">
            body {
                margin: 0;
                padding: 0;
                -ms-text-size-adjust: 100%;
                -webkit-text-size-adjust: 100%;
            }

            table {
                border-spacing: 0;
            }

            table td {
                border-collapse: collapse;
            }

            .ExternalClass {
                width: 100%;
            }

            .ExternalClass,
            .ExternalClass p,
            .ExternalClass span,
            .ExternalClass font,
            .ExternalClass td,
            .ExternalClass div {
                line-height: 100%;
            }

            .ReadMsgBody {
                width: 100%;
                background-color: #ebebeb;
            }

            table {
                mso-table-lspace: 0pt;
                mso-table-rspace: 0pt;
                border: .5px #e9e9e9;

            }
            td{padding: 10px;}
            .left{text-align: left;}
            .right{text-align: right;}
            hr{border: 1px solid #e9e9e9}
            img {
                -ms-interpolation-mode: bicubic;
            }

            .yshortcuts a {
                border-bottom: none !important;
            }

            @media screen and (max-width: 599px) {
                .force-row,
                .container {
                    width: 100% !important;
                    max-width: 100% !important;
                }
            }
            @media screen and (max-width: 400px) {
                .container-padding {
                    padding-left: 12px !important;
                    padding-right: 12px !important;
                }
            }
            .ios-footer a {
                color: #aaaaaa !important;
                text-decoration: underline;
            }
            a[href^="x-apple-data-detectors:"],
            a[x-apple-data-detectors] {
                color: inherit !important;
                text-decoration: none !important;
                font-size: inherit !important;
                font-family: inherit !important;
                font-weight: inherit !important;
                line-height: inherit !important;
            }
        </style>
    </head>

    <body style="margin:0; padding:0;" bgcolor="#F0F0F0" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

        <!-- 100% background wrapper (grey background) -->
        <table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0" bgcolor="#F0F0F0">
            <tr>
                <td align="center" valign="top" bgcolor="#F0F0F0" style="background-color: #F0F0F0;">

                    <br>

                    <!-- 600px container (white background) -->
                    <table border="0" width="600" cellpadding="0" cellspacing="0" class="container" style="width:600px;max-width:600px">
                        <tr>
                            <td class="container-padding header" align="left" style="font-family:Helvetica, Arial, sans-serif;font-size:24px;font-weight:bold;padding-bottom:12px;color:#2A8F9E;padding-left:24px;padding-right:24px;text-align: center;">
                                <img src="http://clubedotaurus.com.br/assets/img/logo-dark.png" width="200px" alt="Quiz Trezo" title="Quiz Trezo"/>
                            </td>

                        </tr>
                        <tr>
                            <td class="container-padding content" align="left" style="padding-left:24px;padding-right:24px;padding-top:12px;padding-bottom:12px;background-color:#ffffff">

                                <br/>
                                <div class="title" style="font-family:Helvetica, Arial, sans-serif;font-size:22px;font-weight:600;color:#3c93a0;text-align: center;">
                                    Agradecemos seu pagamento!!
                                </div>
                                <br/>

                                <br/>
                                <div class="body-text" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:20px;text-align:left;color:#3c93a0">
                                    <?php echo $usuario_pagamento != "" ? $usuario_pagamento : "Usuario pagamento:" ?>
                                    <br/>
                                    <br/>
                                    Confirmamos que recebemos seu pagamento referente ao PLANO DE ASSINATURA PREMIUM.
                                    <br/>
                                    Acesse a plataforma Quiz Trezo, faça seu login e utilize todos os recursos sem limites durante o tempo da vigência do plano.
                                    <br/>
                                    <hr/>
                                    <span style="color: #faa419;">* Caso esteja logado na plataforma, faça seu LOGOFF e entre novamente com seu login e senha.</span>
                                </div>   
                                <hr/>
                                <h2 style="font-family:Helvetica, Arial, sans-serif;font-size:18px;font-weight:600;color:#3c93a0;">Pedido nº: <strong>#<?php echo $id_pagamento != "" ? $id_pagamento : "0:" ?></strong></h2>
                                <table border="1" width="100%" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;color:#374550">
                                    <thead style="background-color: #faa419;color: #fff;">
                                        <tr>
                                            <td>QTDE.:</td>
                                            <td>ASSINATURA</td>
                                            <td>VALIDADE</td>
                                            <td>VALOR</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>01</td>  
                                            <td><?php echo $referencia_pagamento != "" ? $referencia_pagamento : "Referencia pagamento:" ?></td>  
                                            <td><?php echo $validade_pagamento != "" ? $this->funcoesuteis->DataDBtoDataBR($validade_pagamento) : "Validade:" ?></td>  
                                            <td class="right"><?php echo $valor_pagamento != "" ? $valor_pagamento : "Valor" ?></td>  
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td><h3>TOTAL</h3></td>
                                            <td class="right" colspan="3"><h3><?php echo $total_pagamento != "" ? $total_pagamento : "" ?></h3></td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <br/>
                                <hr/>
                                <div class="body-text" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:20px;text-align:left;color:#faa419;">
                                    ** Assim que sua nota fiscal eletrônica estiver disponível, estaremos enviando para o seu e-mail cadastrado em nossa plataforma.
                                </div>
                                <br/>
                                <br/>
                                <div class="body-text" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:20px;text-align:left;color:#333333">
                                    <?php echo $texto_email != "" ? $texto_email : "" ?>
                                </div>

                            </td>
                        </tr>
                        <tr>
                            <td class="container-padding footer-text" align="left" style="font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:16px;color:#aaaaaa;padding-left:24px;padding-right:24px">
                                <br><br>
                                Quiz Trezo © <?php echo date("Y") ?>.
                                <br><br>
                                Qualquer dúvida entre em contato conosco respondendo este e-mail.
                                <br/>
                                Ou acesse nossa plataforma e entre em contao através do nosso formulário de contato.
                                <br><br>
                                <strong>Quiz Trezo Ltda. - ME.</strong><br>
                                <strong>CNPJ: XX.XXX.XXXX/XXXX-XX</strong><br>
                                <!--span class="ios-footer">
                                    Quadra CLN 210 Bloco C, S/N, Sala 106 Parte J, Asa Norte,<br>
                                    Brasília, Distrito Federal, Cep 70862-530.<br>
                                    <br>
                                </span-->
                                <a href="http://clubedotaurus.com.br" style="color:#aaaaaa">http://clubedotaurus.com.br</a><br>
                                <br><br>
                            </td>
                        </tr>
                    </table>
                    <!--/600px container -->


                </td>
            </tr>
        </table>
        <!--/100% background wrapper-->

    </body>
</html>
