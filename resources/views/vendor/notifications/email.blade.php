<style>
@import url('https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,900');
</style>
<table width="100%" border="0" align="center" cellspacing="0" cellpadding="0" style="background-color:#f2f2f2;font-family: 'Montserrat', sans-serif;;table-layout:fixed">
    <tbody>
        <tr>
            <td align="center" style="padding-top:30px;padding-bottom:30px">
                <img height="30" alt="logo" src="{{ url('/') }}/front/images/logo.png">
            </td>
        </tr>
        <tr>
            <td>
    <center>
        <table border="0" cellspacing="0" cellpadding="0" style="max-width:700px;width:100%;">
            <tbody>
                <tr>
                    <td align="center" style="padding-top:20px;padding-left:70px;padding-right:70px;background-color:#fff">

                        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#fff;font-weight:200">
                            <tbody>
                                <tr>
                                    <td style="padding:10px 0">
                                        <h1 style="font-size:30px;line-height:36px;color:#606060;margin:0;font-weight:bold;text-align:center;font-family: 'Montserrat', sans-serif;">
                                          @if(!empty($greeting))
                                           {{@$greeting}}
                                           @endif
                                        </h1>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:10px 0">
                                        <p style="font-size:14px;line-height:22px;color:#606060; font-family: 'Montserrat', sans-serif;margin:0;padding:0">As requested, here is your password reset link:
                                            {{-- Action Button --}}
                                            @isset($actionText)
                                            <?php
                                            switch ($level) {
                                                case 'success':
                                                    $color = 'green';
                                                    break;
                                                case 'error':
                                                    $color = 'red';
                                                    break;
                                                default:
                                                    $color = 'blue';
                                            }
                                            ?>
                                            @component('mail::button', ['url' => $actionUrl, 'color' => $color])
                                            {{ $actionText }}
                                            @endcomponent
                                            @endisset
                                           <p style="color: #606060; font-size: 14px;"> If you did not request a password reset, no further action is required.</p>
                                        </p>
                                        <p style="font-size:13px;line-height:22px;color:#606060; font-family: 'Montserrat', sans-serif;margin:0;padding:0;display:block;margin-top:30px;">
                                            <strong style="display:table">Thank you!</strong>
                                            <strong style="display:table">The WeiZard Team</strong>
                                            <strong style="display:table">Powered by WeiCrowd</strong>                                            
                                        </p>
                                        <p  style="padding:20px 0"></p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td align="justify" style="padding:20px 15px 5px">
                        <table width="100%" style="text-align:center; font-family: 'Montserrat', sans-serif;font-size:11px;border-top:1px solid #00405c;border-bottom:1px solid #00405c">
                            <tbody><tr>
                                    <td style="padding:10px 0">
                                        <a  target="_blank" href="https://www.weicrowd.com" style="text-decoration:none;font-weight:bold;color:#262626; font-family: 'Montserrat', sans-serif;">Website</a>
                                    </td>
                                    <td style="padding:10px 0">
                                        <a  target="_blank" href="https://twitter.com/WeiCrowd" style="text-decoration:none;font-weight:bold;color:#262626; font-family: 'Montserrat', sans-serif;">Twitter</a>
                                    </td>
                                    <td style="padding:10px 0">
                                        <a  target="_blank" href="https://www.facebook.com/Weicrowd/" style="text-decoration:none;font-weight:bold;color:#262626; font-family: 'Montserrat', sans-serif;" >Facebook</a>
                                    </td>
                                    <td style="padding:10px 0">
                                        <a  target="_blank" href="https://www.linkedin.com/company/weicrowd/" style="text-decoration:none;font-weight:bold;color:#262626;font-family: 'Montserrat', sans-serif;" >LinkedIn</a>
                                    </td>
                                    <td style="padding:10px 0">
                                        <a  target="_blank" href="https://medium.com/weicrowd" style="text-decoration:none;font-weight:bold;color:#262626;font-family: 'Montserrat', sans-serif;" >Medium</a>
                                    </td>
                                    <td style="padding:10px 0">
                                        <a  target="_blank" href="https://www.reddit.com/user/Weicrowd" style="text-decoration:none;font-weight:bold;color:#262626;font-family: 'Montserrat', sans-serif;" >Reddit</a>
                                    </td>
                                    <td style="padding:10px 0">
                                        <a  target="_blank" href="https://t.me/WeiCrowd" style="text-decoration:none;font-weight:bold;color:#262626;font-family: 'Montserrat', sans-serif;" >Telegram</a>
                                    </td>
                                </tr>
                            </tbody></table>
                    </td>
                </tr>
                <tr>
                    <td style="padding:5px 70px 0px">
                        <p style="font-size:14px;color:#9a9a9a;line-height:22px;text-align:center;margin-bottom:15px;font-family: 'Montserrat', sans-serif;">
                            For queries mail at : <a href="mailto:support@weizard.com">support@weizard.com</a>.
                        </p>
                        
                        <p style="font-size:14px;color:#9a9a9a;line-height:22px;text-align:center;margin-bottom:15px;font-family: 'Montserrat', sans-serif;">
                            WeiZard Pte Ltd., Singapore &copy; 2018. All Rights Reserved
                        </p>

                    </td>
                </tr>

            </tbody>
        </table>
    </center>
</td>
</tr>
</tbody>
</table>

