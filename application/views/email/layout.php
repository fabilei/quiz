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
            }

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
                            <td class="container-padding header" align="left" style="font-family:Helvetica, Arial, sans-serif;font-size:24px;font-weight:bold;padding-bottom:12px;color:#2A8F9E;padding-left:24px;padding-right:24px">
                                <img src="http://clubedotaurus.com.br/assets/img/logo-dark.png" width="200px" alt="Quiz Trezo" title="Quiz Trezo"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="container-padding content" align="left" style="padding-left:24px;padding-right:24px;padding-top:12px;padding-bottom:12px;background-color:#ffffff">
                                <br>

                                <div class="title" style="font-family:Helvetica, Arial, sans-serif;font-size:18px;font-weight:600;color:#374550">
                                    <?php echo $titulo_email != "" ? $titulo_email : "Informação:" ?>
                                </div>
                                <br>

                                <div class="body-text" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:20px;text-align:left;color:#333333">
                                    <?php echo $texto_email != "" ? $texto_email : "Informativo padrão." ?>
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
                                <span class="ios-footer">
                                    Dados Endereço,<br>
                                    Dados Endereço.<br>
                                    <br>
                                </span>
                                <a href="http://clubedotaurus.com.br" style="color:#aaaaaa">http://clubedotaurus.com.br</a><br>
                                <br><br>
                                <?php if($email != ''){ ?>
                                    
                                    <a href="<?php echo base_url('Home/unsubscribe?email='.$email) ?>">Deixar de receber E-mails, clique aqui!</a>
                                    <br><br><br>
                            <?php } ?>
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
