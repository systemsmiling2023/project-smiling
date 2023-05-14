<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Smiling | No encontrada</title>
    <link rel="stylesheet" href="<?= base_url('/public/fontawesome/css/all.min.css') ?>">

    <style>
        div.logo {
            height: 200px;
            width: 155px;
            display: inline-block;
            opacity: 0.08;
            position: absolute;
            top: 2rem;
            left: 50%;
            margin-left: -73px;
        }

        body {
            height: 100%;
            background: #343a40;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            color: #eeee;
            font-weight: 300;
        }

        h1 {
            font-weight: lighter;
            letter-spacing: normal;
            font-size: 3rem;
            margin-top: 0;
            margin-bottom: 0;
            color: #eeee;
        }

        .wrap {
            max-width: 1024px;
            margin: 5rem auto;
            padding: 2rem;
            background: #6c757d;
            text-align: center;
            border: 1px solid #efefef;
            border-radius: 0.5rem;
            position: relative;
        }

        pre {
            white-space: normal;
            margin-top: 1.5rem;
        }

        code {
            background: #fafafa;
            border: 1px solid #efefef;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            display: block;
        }

        p {
            margin-top: 1.5rem;
        }

        .footer {
            margin-top: 2rem;
            border-top: 1px solid #efefef;
            padding: 1em 2em 0 2em;
            font-size: 85%;
            color: #999;
        }

        /* a:active,
        a:link,
        a:visited {
            color: #dd4814;
        } */
    </style>
</head>

<body class="bg-dark">
    <div class="wrap">
        <i class="fas fa-tooth text-secondary fa-4x" id="dienteSmiling"></i>
        <h1>Clínica Dental Smiling</h1>
        <p>PÁGINA NO ENCONTRADA</p>

        <p>
            <?php if (ENVIRONMENT !== 'production') : ?>
                <?= nl2br(esc($message)) ?>
            <?php else : ?>
                <?= lang('Errors.sorryCannotFind') ?>
            <?php endif ?>
        </p>
        <div class="row">
            <div class="col-md-12 text-center">
                <a class="btn btn-warnign" href="login">Regresar a Inicio</a>
            </div>
        </div>
    </div>
</body>

</html>