<?
require_once '../vendor/autoload.php';

use App\BonusCard;
use App\PromoCode;
use App\ExampleService;


$exampleService = new ExampleService(new BonusCard('123123123', 100), new PromoCode('1qwe12', 'PROMO', 'description'));
?>

<h1>EXAMPLE SERVICE RESULT</h1>
<div>
    <?= '<pre>'.print_r($exampleService->execute(), 1).'</pre>'; ?>
</div>
<hr />