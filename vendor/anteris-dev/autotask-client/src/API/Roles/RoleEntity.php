<?php

namespace Anteris\Autotask\API\Roles;

use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents Role entities.
 */
class RoleEntity extends DataTransferObject
{
    public ?string $description;
    public float $hourlyFactor;
    public float $hourlyRate;
    public $id;
    public bool $isActive;
    public ?bool $isExcludedFromNewContracts;
    public ?bool $isSystemRole;
    public string $name;
    public ?int $quoteItemDefaultTaxCategoryId;
    public ?int $roleType;
    /** @var \Anteris\Autotask\Support\UserDefinedFields\UserDefinedFieldEntity[]|null */
    public ?array $userDefinedFields;

    /**
     * Creates a new Role entity.
     * If this entity has dates, they will be cast as Carbon objects.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function __construct(array $array)
    {
        parent::__construct($array);
    }

    /**
     * Creates an instance of this class from an Http response.
     *
     * @param  Response  $response  Http response.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public static function fromResponse(Response $response)
    {
        $responseArray = json_decode($response->getBody(), true);

        if (isset($responseArray['item']) === false) {
            throw new \Exception('Missing item key in response.');
        }

        return new self($responseArray['item']);
    }
}