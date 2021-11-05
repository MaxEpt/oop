<?
require_once '../vendor/autoload.php';

use App\BonusCard;
use App\PromoCode;
use App\ExampleService;
use App\ExampleService2;
use App\Repositories\LocalDiscountDataRepository;
use App\Repositories\ExternalDiscountDataRepository;

$exampleService = new ExampleService(new BonusCard('123123123', 100), new PromoCode('1qwe12', 'PROMO', 'description'));
$exampleService2 = new ExampleService2(new LocalDiscountDataRepository());
$exampleService3 = new ExampleService2(new ExternalDiscountDataRepository());
?>

<h1>EXAMPLE SERVICE RESULT</h1>
<div>
    <?= '<pre>'.print_r($exampleService->execute(), 1).'</pre>'; ?>
</div>
<hr />

<h1>EXAMPLE SERVICE2 RESULT(LOCAL DATA)</h1>
<div>
    <?= '<pre>'.print_r($exampleService2->execute(), 1).'</pre>'; ?>
</div>
<hr />

<h1>EXAMPLE SERVICE2 RESULT(EXTERNAL DATA)</h1>
<div>
    <?= '<pre>'.print_r($exampleService3->execute(), 1).'</pre>'; ?>
</div>
<hr />