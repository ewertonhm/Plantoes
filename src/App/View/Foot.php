<?php


namespace App\View;


class Foot
{
    public function __construct()
    {
        echo <<<TAG

    <script src='assets/js/jquery.min.js'></script>
    <script src='assets/bootstrap/js/bootstrap.min.js'></script>
</body>

</html>
TAG;

    }

}