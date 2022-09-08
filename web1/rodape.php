<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="utf-8">
       
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <aside id="lateral">
            <h1>Sobre nós</h1>
            <img id="foto-sobre-nos" src="img/about_us.png" >
            <p class="about">
                <?php
                    echo "O Site Inovação Tecnológica é um serviço jornalístico, especializado em divulgação científica e tecnológica.";
                ?>
            </p>
            <p class="about">
                <?php
                    echo "O Site Inovação Tecnológica é o maior site de divulgação científica em língua portuguesa, no ar desde 1999. Conquistamos este posto acreditando que o conhecimento científico pode ser levado ao público em linguagem fácil, sem perder a precisão. E é com este mesmo espírito que esperamos continuar trazendo aos leitores de língua portuguesa tudo o que acontece na fronteira do conhecimento.";
                ?>
            </p>
            <table>
                <tr id="redes-sociais">
                    <td>
                        <a href="http://twitter.com/InovacaoTecnolo" title="Twitter" target="_blank">
                            <img src="img/twitter.png" width="auto"  height="auto">
                        </a>
                    </td>
                    <td>
                        <a href="https://www.inovacaotecnologica.com.br/boletim/rss.php" title="RSS" target="_blank">
                            <img src="img/rss.png" width="50px"  height="auto">
                        </a>
                    </td>
                </tr>
            </table>
            <hr>
            <h1>Categorias</h1>
            <?php get_and_render_categories_list() ?>
        </aside>

        <footer id="rodape">
            <p>
                <?php
                    echo "© 1999 - 2022 - Todos os direitos reservados";
                ?>
            </p>
        </footer>
    </body>
</html>

