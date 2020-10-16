<?php


namespace App\Controller;

use App\Logic\DateTimesCalculator;
use \DateTime;
use DateTimeInterface;
use \DateTimeZone;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use \Throwable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class EarthMarsTimeController extends AbstractController
{
    /**
     * @var DateTimesCalculator
     */
    private $earthMarsDateTimesCalculator;

    public function __construct(DateTimesCalculator $earthMarsDateTimesCalculator)
    {
        $this->earthMarsDateTimesCalculator = $earthMarsDateTimesCalculator;
    }

    /**
     * @throws BadRequestHttpException
     */
    function earthMarsTimesAction(string $gregorianUtcDateTime): JsonResponse
    {
        $gregorianUtc = $this->getGregorianUtc($gregorianUtcDateTime);
        $dateTimes = $this->earthMarsDateTimesCalculator->calculate($gregorianUtc);

        return JsonResponse::fromJsonString((string)$dateTimes);
    }

    /**
     * @throws BadRequestHttpException
     */
    private function getGregorianUtc(string $input): DateTimeInterface
    {
        $utcTimeZone = new DateTimeZone('UTC');
        try {
            $gregorianUtcTime = new DateTime($input, $utcTimeZone);
        } catch (Throwable $exception) {
            $message = "'$input' is invalid value for DateTime constructor.";
            $hint = 'Check https://www.php.net/manual/en/datetime.construct.php';
            throw new BadRequestHttpException($message . ' ' . $hint);
        }

        return $gregorianUtcTime;
    }
}
