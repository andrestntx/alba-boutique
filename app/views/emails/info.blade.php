@extends('emails.layout')
@section('content')
    <tr>
        <td align="center" style="padding: 20px 20px 20px 20px; color: #ffffff; font-family: Arial, sans-serif; font-size: 36px; font-weight: bold;">
            <img src="{{ $message->embed('img/icon114.png') }}" alt="Logo Alba Boutique" width="80" height="80" style="display:block;" />
        </td>
    </tr>
    <tr>
        <td align="center" bgcolor="#7c62ad" style="padding: 25px 20px 20px 20px; color: #ffffff; font-family: Arial, sans-serif; font-size: 26px;">
            <b>Gracias Por Escribirnos</b>
        </td>
    </tr>
    <tr>
        <td bgcolor="#ffffff" style="padding: 20px 20px 20px 20px; color: #555555; font-family: Arial, sans-serif; font-size: 18px; line-height: 24px;">
           <p> Hemos recibido tu mensaje a través de nuestra Pagina Web. Te responderemos lo más pronto posible a este correo electrónico o te llamaremos a tu celular de contacto. </p>
        </td>
    </tr>
    <tr>
        <td align="center" bgcolor="#7c62ad" style="padding: 20px 20px 20px 20px; color: #ffffff; font-family: Arial, sans-serif; font-size: 36px; font-weight: bold;">
            <img src="{{ $message->embed('img/placeholders/email/newsletter.png') }}" alt="Newsletter Icon" width="300" height="200" style="display:block;">
        </td>
    </tr>
    <tr>
        <td align="center" bgcolor="#f9f9f9" style="padding: 10px 20px 20px 20px; color: #555555; font-family: Arial, sans-serif; font-size: 18px; line-height: 30px;">
            Atentamente, Karen Lorena :)  - Alba Boutique
        </td>
    </tr>
    
    <tr>
        <td align="center" bgcolor="#e9e9e9" style="padding: 12px 10px 12px 10px; color: #888888; font-family: Arial, sans-serif; font-size: 12px; line-height: 18px;">
            <b>Alba Boutique</b> | Villavicencio - Meta
        </td>
    </tr>
    <tr>
        <td style="padding: 15px 10px 15px 10px;">
            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td align="center" width="100%" style="color: #999999; font-family: Arial, sans-serif; font-size: 12px;">
                        2014 &copy; <a href="http:alba.bouitque" style="color: #7c62ad;">Alba Boutique</a>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
@stop
       