<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <table style="outline:0;width:100%;min-width:100%;min-height:100%;font-family:Helvetica, Arial, sans-serif;line-height:24px;font-weight:normal;font-size:16px;border-spacing:0px;border-collapse:collapse;margin:0;padding:0;border:0;" bgcolor="#f8f9fa" class="yiv5403406287bg-light yiv5403406287body">
            <tbody>
                <tr>
                    <td valign="top" style="border-spacing:0px;border-collapse:collapse;line-height:24px;font-size:16px;margin:0;" align="left" bgcolor="#f8f9fa">
                        <table border="0" cellpadding="0" cellspacing="0" style="font-family:Helvetica, Arial, sans-serif;border-spacing:0px;border-collapse:collapse;width:100%;" class="yiv5403406287container">
                            <tbody>
                                <tr>
                                    <td align="center" style="border-spacing:0px;border-collapse:collapse;line-height:24px;font-size:16px;margin:0;padding:0 16px;">
                                        <table align="center" border="0" cellpadding="0" cellspacing="0" style="font-family:Helvetica, Arial, sans-serif;border-spacing:0px;border-collapse:collapse;width:100%;max-width:600px;margin:0 auto;">
                                            <tbody>
                                                <tr>
                                                    <td style="border-spacing:0px;border-collapse:collapse;line-height:24px;font-size:16px;margin:0;" align="left">

                                                        <table border="0" cellpadding="0" cellspacing="0" style="font-family:Helvetica, Arial, sans-serif;border-spacing:0px;border-collapse:collapse;width:100%;max-width:100%;" class="yiv5403406287table">
                                                            <tbody>
                                                                <tr>

                                                                    {{-- <td style="border-spacing:0px;border-collapse:collapse;line-height:24px;font-size:16px;margin:0;" align="left" class="yiv5403406287text-left">

                                                                        <img height="60" style="width:auto;min-height:60px;max-height:60px;line-height:100%;outline:none;text-decoration:none;border:0 none;" src="https://ecp.yusercontent.com/mail?url=https%3A%2F%2Fsignio.s3.us-east-2.amazonaws.com%2F30%2F30085b8a-b55a-11e9-a29f-06ce536ad1db%2Fimages%2F20191120213910_logotipo.png&amp;t=1655843686&amp;ymreqid=1e122e4d-9896-277b-1c7e-ca002d01d000&amp;sig=fM7pON1_jIforz915Bdf3A--~D" alt="Logotipo Tenant">

                                                                    </td> --}}

                                                                    <td style="border-spacing:0px;border-collapse:collapse;line-height:24px;font-size:16px;margin:0;" align="center" class="yiv5403406287text-center">

                                                                        <img height="60" style="width:auto;min-height:60px;max-height:60px;line-height:100%;outline:none;text-decoration:none;border:0 none;" src="{{url('/assets/img/logo.jfif')}}" alt="Logotipo Nexura">

                                                                    </td>

                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                        <table border="0" cellpadding="0" cellspacing="0" style="font-family:Helvetica, Arial, sans-serif;border-spacing:0px;border-collapse:separate !important;border-radius:4px;width:100%;overflow:hidden;border:1px solid #dee2e6;" bgcolor="#ffffff" class="yiv5403406287card ">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="border-spacing:0px;border-collapse:collapse;line-height:24px;font-size:16px;width:100%;margin:0;" align="left">
                                                                        <div style="border-top-width:5px;border-top-color:#70CDE3;border-top-style:solid;">
                                                                            <table border="0" cellpadding="0" cellspacing="0" style="font-family:Helvetica, Arial, sans-serif;border-spacing:0px;border-collapse:collapse;width:100%;" class="yiv5403406287card-body">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td style="border-spacing:0px;border-collapse:collapse;line-height:24px;font-size:16px;width:100%;margin:0;padding:20px;" align="left">

                                                                                            <h5 style="margin-top:0;margin-bottom:0;font-weight:500;color:#636c72;vertical-align:baseline;font-size:12px;line-height:24px;" align="center" class="yiv5403406287text-muted yiv5403406287text-center">{{now()}}

                                                                                                <hr>

                                                                                                <table border="0" cellpadding="0" cellspacing="0" style="font-family:Helvetica, Arial, sans-serif;border-spacing:0px;border-collapse:collapse;width:100%;max-width:100%;" bgcolor="#ffffff" class="yiv5403406287table">

                                                                                                    <tbody>

                                                                                                        <tr>

                                                                                                            <td style="border-top-width:0;border-spacing:0px;border-collapse:collapse;line-height:24px;font-size:16px;border-top-color:#e9ecef;border-top-style:solid;margin:0;padding:12px;" align="left" valign="top">

                                                                                                                <p style="line-height:24px;font-size:16px;margin:0;" align="left">
                                                                                                                    <strong>{{$data->data['nameDocument']}} - Solicitud de firma.</strong><br><br>
                                                                                                                </p>

                                                                                                                <p style="line-height:24px;font-size:16px;margin:0;" align="left">
                                                                                                                    Para firmar el documento, ingrese el codigo haciendo clic en el botón.<br><br>
                                                                                                                </p>
                                                                                                                <p style="line-height:24px;font-size:16px;margin:0;" align="center">
                                                                                                                    Codigo OTP: {{$data->data['otp'] }}<br><br>
                                                                                                                </p>

                                                                                                                <p style="border-spacing:0px;border-collapse:collapse;line-height:24px;font-size:16px;border-radius:4px;margin:0;" align="center">



                                                                                                                    <a rel="nofollow noopener noreferrer" target="_blank" href="{{ url('/custody/' . $data->data['tokenView']) }}" style="background-color:#233e5f;font-size:18px;font-family:Helvetica, Arial, sans-serif;text-decoration:none;border-radius:4.8px;line-height:30px;display:inline-block;font-weight:normal;white-space:nowrap;color:#ffffff;padding:8px 16px;border:1px solid #233e5f;">Ver documentos</a>

                                                                                                                </p>

                                                                                                            </td>

                                                                                                        </tr>

                                                                                                    </tbody>

                                                                                                </table>

                                                                                            </h5>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <div style="color:#636c72;font-size:12px;margin-top:10px;" align="center" class="yiv5403406287text-center yiv5403406287text-muted">
                                                            <strong>POR FAVOR NO COMPARTIR O REENVIAR. ESTE CORREO CONTIENE INFORMACIÓN CONFIDENCIAL.</strong>
                                                        </div>

                                                        <hr>

                                                        <div style="color:#636c72;font-size:12px;" align="center" class="yiv5403406287text-center yiv5403406287text-muted">
                                                            Este es un mensaje automático y no es necesario responder.
                                                        </div>

                                                        <hr>

                                                        {{-- <div style="color:#636c72;font-size:12px;" align="center" class="yiv5403406287text-center yiv5403406287text-muted">
                                                            <strong>Acerca de Legops Contratos Digitales</strong>
                                                            <br> Proveemos soluciones para la elaboración, distribución y firma de documentos de forma electrónica.
                                                        </div>

                                                        <hr>

                                                        <div style="color:#636c72;font-size:12px;" align="center" class="yiv5403406287text-center yiv5403406287text-muted ">
                                                            <strong>¿Dudas acerca de esta transacción?</strong>
                                                            <br> Por favor comuníquese con <strong>SOLANGIE ANDREA CORTES OVALLE</strong>.
                                                        </div> --}}

                                                        {{-- <hr> --}}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
        <img src="https://ecp.yusercontent.com/mail?url=https%3A%2F%2Fea.pstmrk.it%2Fopen%2Fv3_5S9fRdpmvWUibOEnMXrYyDbJ7SeTMlRqDMjAMwKgjMDnt2pc0KzKgOm0pFsuRd5HdwwExvIezdzoGPB-svegiSlsfMS-ZJD2sizE05ULuW6EQkcgPb5uWAUJPbPQlLEeGMVLZaEONisMjKlMhLcn5JgCP9TCuyP7dJELHf1-xjmtI6V4ay0Iws3IEgDIGfUmhhs81e4HYaZXMJ7IXidcOtCMiy4tt9Y3vnp82Ju6862tf5Ep3FFYeAwf2qGHWzjWLjQ9PzQEcbTA_7UB77vCpPm0U2hczWo08WiMf3UYWC5Fnw4KQy_5XDc1ZPgQpnyqTMKBXEpKOuFD5cW99_3kfRxiYDwVX-LBF8cz93E1MUzLFwzSyi2OaFpN4DvmxvWhUhxJRu9TZ-XtJKqVO1iAKrBxRgOvd0q1b-xHOauN1IlWvE6hAlAFoPplq6DZ1Q9iGy0zfT5C44BW2DItncxwxA&amp;t=1655843686&amp;ymreqid=1e122e4d-9896-277b-1c7e-ca002d01d000&amp;sig=3WcHEZSN1CyZEupA7ANowA--~D" width="1" height="1" border="0" alt="">
    </div>
</body>

</html>
