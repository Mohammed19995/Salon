<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>A simple, clean, and responsive HTML invoice template</title>

    <style>
        body{
            direction: rtl;
            font-family: DejaVu Sans, sans-serif;
        }
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }


        table {
            width: 100%;
            line-height: inherit;
            text-align: right;
        }

         table td {
            padding: 5px;
            vertical-align: top;
        }

         table tr td:nth-child(2) {
            text-align: right;
        }

         table tr.top table td {
            padding-bottom: 20px;
        }

         table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

         table tr.information table td {
            padding-bottom: 40px;
        }

         table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

         table tr.details td {
            padding-bottom: 20px;
        }

         table tr.item td{
            border-bottom: 1px solid #eee;
        }

         table tr.item.last td {
            border-bottom: none;
        }

         table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }


    </style>
</head>

<body>
<div class="invoice-box">
    <table cellpadding="0" cellspacing="0">
        <tr class="top">
            <td colspan="2">
                <table>
                    <tr>
                        <td class="title">
                            <img src="https://www.sparksuite.com/images/logo.png" style="width:100%; max-width:300px;">
                        </td>

                        <td>
                            Invoice #: 123<br>
                            Created: January 1, 2015<br>
                            Due: February 1, 2015
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="information">
            <td colspan="2">
                <table>
                    <tr>
                        <td>
                            Sparksuite, Inc.<br>
                            12345 Sunny Road<br>
                            Sunnyville, CA 12345
                        </td>

                        <td>
                            Acme Corp.<br>
                            John Doe<br>
                            john@example.com
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="heading">
            <td>
                طريقة الدفع
            </td>

            <td>
                Check #
            </td>
        </tr>

        <tr class="details">
            <td>
                Check
            </td>

            <td>
                1000
            </td>
        </tr>

        <tr class="heading">
            <td>
                {{$product}}
            </td>

            <td>
                Price
            </td>
        </tr>

        <tr class="item">
            <td>
                مننج1
            </td>

            <td>
                $300.00
            </td>
        </tr>

        <tr class="item">
            <td>
                Hosting (3 months)
            </td>

            <td>
                $75.00
            </td>
        </tr>
        <tr class="item">
            <td>
                Hosting (3 months)
            </td>

            <td>
                $75.00
            </td>
        </tr>
        <tr class="item">
            <td>
                Hosting (3 months)
            </td>

            <td>
                $75.00
            </td>
        </tr>
        <tr class="item">
            <td>
                Hosting (3 months)
            </td>

            <td>
                $75.00
            </td>
        </tr>
        <tr class="item">
            <td>
                Hosting (3 months)
            </td>

            <td>
                $75.00
            </td>
        </tr>
        <tr class="item">
            <td>
                Hosting (3 months)
            </td>

            <td>
                $75.00
            </td>
        </tr>
        <tr class="item">
            <td>
                Hosting (3 months)
            </td>

            <td>
                $75.00
            </td>
        </tr>


        <tr class="item last">
            <td>
                Domain name (1 year)
            </td>

            <td>
                $10.00
            </td>
        </tr>

        <tr class="total">
            <td></td>

            <td>
                Total: $385.00
            </td>
        </tr>
    </table>
</div>
</body>
</html>