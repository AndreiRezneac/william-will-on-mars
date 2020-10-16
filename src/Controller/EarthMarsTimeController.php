<?php


namespace App\Controller;

use App\Logic\DateTimesCalculator;
use DateTime;
use DateTimeInterface;
use DateTimeZone;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Throwable;

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
        if ($gregorianUtc === null) {
            return $this->getBadRequestResponse($gregorianUtcDateTime);
        }

        $dateTimes = $this->earthMarsDateTimesCalculator->calculate($gregorianUtc);

        return JsonResponse::fromJsonString((string)$dateTimes);
    }

    /**
     * @throws BadRequestHttpException
     */
    private function getGregorianUtc(string $input): ?DateTimeInterface
    {
        $utcTimeZone = new DateTimeZone('UTC');
        try {
            $gregorianUtcTime = new DateTime($input, $utcTimeZone);
        } catch (Throwable $exception) {
            return null;
        }

        return $gregorianUtcTime;
    }

    private function getBadRequestResponse(string $gregorianUtcDateTime): JsonResponse
    {
        return new JsonResponse([
            'message' => "'$gregorianUtcDateTime' is invalid value for DateTime constructor.",
            'hint' => 'Check https://www.php.net/manual/en/datetime.construct.php'
        ], Response::HTTP_BAD_REQUEST);
    }
}
