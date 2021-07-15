<?php


namespace Ups;

use GuzzleHttp\Client;
use Ups\Entity\Paperless\PushToImageRepository;
use Ups\Entity\Paperless\Upload;
use Ups\Entity\Paperless\UserCreatedForm;

/**
 * @author    Maciej Kotlarz <maciej.kotlarz@pixers.uk>
 * @copyright 2019 PIXERS Ltd
 */
class Paperless
{
    const ENDPOINT = '/PaperlessDocumentAPI';

    protected string $accessKey;
    protected string $userId;
    protected string $password;
    protected string $shipperNumber;
    protected bool $useIntegration;

    public function __construct(
        string $accessKey = null,
        string $userId = null,
        string $password = null,
        string $shipperNumber = null,
        bool $useIntegration = false
    ) {
        $this->accessKey      = $accessKey;
        $this->userId         = $userId;
        $this->password       = $password;
        $this->shipperNumber  = $shipperNumber;
        $this->useIntegration = $useIntegration;
    }

    /**
     * @return mixed
     */
    public function upload(Upload $uploadRequest, string $requestOption = '')
    {
        $payload  = $this->createPayload($uploadRequest, $requestOption);
        $guzzle   = new Client();
        $response = $guzzle->post($this->getUri(), ['body' => json_encode($payload)]);

        return json_decode($response->getBody()->getContents());
    }

    protected function createPayload(Upload $request, string $requestOption): array
    {
        $userCreatedForms = [];

        /** @var UserCreatedForm $userCreatedForm */
        foreach ($request->getUserCreatedForms() as $userCreatedForm) {
            $userCreatedForms[] = $this->createUserCreatedFormPayload($userCreatedForm);
        }

        return
            [
                'UPSSecurity'   => $this->createUpsSecurity(),
                'UploadRequest' => [
                    'ShipperNumber'   => $this->shipperNumber,
                    'Request'         => [
                        'RequestOption' => $requestOption
                    ],
                    'UserCreatedForm' => $userCreatedForms
                ]
            ];
    }

    protected function getUri(): string
    {
        if ($this->useIntegration === true) {
            return 'https://wwwcie.ups.com/rest/PaperlessDocumentAPI';
        }

        return 'https://filexfer.ups.com/rest/PaperlessDocumentAPI';
    }

    protected function createUserCreatedFormPayload(UserCreatedForm $userCreatedForm): array
    {
        return [
            'UserCreatedFormFileName'     => $userCreatedForm->getUserCreatedFormFileName(),
            'UserCreatedFormFileFormat'   => $userCreatedForm->getUserCreatedFormFileFormat(),
            'UserCreatedFormDocumentType' => $userCreatedForm->getUserCreatedFormDocumentType(),
            'UserCreatedFormFile'         => $userCreatedForm->getUserCreatedFormFile()
        ];
    }

    protected function createUpsSecurity(): array
    {
        return [
            'UsernameToken'      => [
                'Username' => $this->userId,
                'Password' => $this->password
            ],
            'ServiceAccessToken' => [
                'AccessLicenseNumber' => $this->accessKey
            ]
        ];
    }

    /**
     * @return mixed
     */
    public function push(PushToImageRepository $PushToImageRepository, string $requestOption  = '')
    {
        $payload  = $this->createPushToImageRepositoryPayload($PushToImageRepository, $requestOption);
        $guzzle   = new Client();
        $response = $guzzle->post($this->getUri(), ['body' => json_encode($payload)]);

        return json_decode($response->getBody()->getContents());
    }

    protected function createPushToImageRepositoryPayload(PushToImageRepository $request, string $requestOption): array
    {
        return [
            'UPSSecurity'                  => $this->createUpsSecurity(),
            'PushToImageRepositoryRequest' => [
                'Request'                => [
                    'RequestOption' => $requestOption,
                    'TransactionReference' => [
                        'CustomerContext' => $request->getCustomerContext(),
                        'TransactionIdentifier' => $request->getTransactionIdentifier()
                    ]
                ],
                'FormsHistoryDocumentID' => [
                    'DocumentID' => $request->getDocumentID()
                ],
                'ShipmentIdentifier'     => $request->getShipmentIdentifier(),
                'ShipmentDateAndTime'    => substr($request->getDocumentID(), 0, -7),
                'ShipmentType'           => $request->getShipmentType(),
                'TrackingNumber'         => $request->getTrackingNumber(),
                'ShipperNumber'          => $this->shipperNumber,
            ]
        ];
    }
}
